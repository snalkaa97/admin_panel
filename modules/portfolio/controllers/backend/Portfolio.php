<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Portfolio Controller
*| --------------------------------------------------------------------------
*| Portfolio site
*|
*/
class Portfolio extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_portfolio');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Portfolios
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('portfolio_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['portfolios'] = $this->model_portfolio->get($filter, $field, $this->limit_page, $offset);
		$this->data['portfolio_counts'] = $this->model_portfolio->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/portfolio/index/',
			'total_rows'   => $this->model_portfolio->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Portfolio List');
		$this->render('backend/standart/administrator/portfolio/portfolio_list', $this->data);
	}
	
	/**
	* Add new portfolios
	*
	*/
	public function add()
	{
		$this->is_allowed('portfolio_add');

		$this->template->title('Portfolio New');
		$this->render('backend/standart/administrator/portfolio/portfolio_add', $this->data);
	}

	/**
	* Add New Portfolios
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('portfolio_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('client', 'Client', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
				'client' => $this->input->post('client'),
				'id_category' => implode(',', (array) $this->input->post('id_category')),
				'description' => $this->input->post('description'),
				'link_demo' => $this->input->post('link_demo'),
			];

			if (!is_dir(FCPATH . '/uploads/portfolio/')) {
				mkdir(FCPATH . '/uploads/portfolio/');
			}

			if (count((array) $this->input->post('portfolio_image_name'))) {
				foreach ((array) $_POST['portfolio_image_name'] as $idx => $file_name) {
					$portfolio_image_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['portfolio_image_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/portfolio/' . $portfolio_image_name_copy);

					$listed_image[] = $portfolio_image_name_copy;

					if (!is_file(FCPATH . '/uploads/portfolio/' . $portfolio_image_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['image'] = implode($listed_image, ',');
			}
		
			
			$save_portfolio = $this->model_portfolio->store($save_data);
            

			if ($save_portfolio) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_portfolio;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/portfolio/edit/' . $save_portfolio, 'Edit Portfolio'),
						anchor('administrator/portfolio', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/portfolio/edit/' . $save_portfolio, 'Edit Portfolio')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/portfolio');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/portfolio');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Portfolios
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('portfolio_update');

		$this->data['portfolio'] = $this->model_portfolio->find($id);

		$this->template->title('Portfolio Update');
		$this->render('backend/standart/administrator/portfolio/portfolio_update', $this->data);
	}

	/**
	* Update Portfolios
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('portfolio_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('client', 'Client', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
				'client' => $this->input->post('client'),
				'id_category' => implode(',', (array) $this->input->post('id_category')),
				'description' => $this->input->post('description'),
				'date_created' => date('Y-m-d H:i:s'),
				'link_demo' => $this->input->post('link_demo'),
				'created_by' => get_user_data('id'),				'created_at' => $this->input->post('created_at'),
				'modiefied_by' => get_user_data('id'),				'modified_at' => date('Y-m-d H:i:s'),
			];

			$listed_image = [];
			if (count((array) $this->input->post('portfolio_image_name'))) {
				foreach ((array) $_POST['portfolio_image_name'] as $idx => $file_name) {
					if (isset($_POST['portfolio_image_uuid'][$idx]) AND !empty($_POST['portfolio_image_uuid'][$idx])) {
						$portfolio_image_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['portfolio_image_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/portfolio/' . $portfolio_image_name_copy);

						$listed_image[] = $portfolio_image_name_copy;

						if (!is_file(FCPATH . '/uploads/portfolio/' . $portfolio_image_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['image'] = implode($listed_image, ',');
		
			
			$save_portfolio = $this->model_portfolio->change($id, $save_data);

			if ($save_portfolio) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/portfolio', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/portfolio');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/portfolio');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Portfolios
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('portfolio_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'portfolio'), 'success');
        } else {
            set_message(cclang('error_delete', 'portfolio'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Portfolios
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('portfolio_view');

		$this->data['portfolio'] = $this->model_portfolio->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Portfolio Detail');
		$this->render('backend/standart/administrator/portfolio/portfolio_view', $this->data);
	}
	
	/**
	* delete Portfolios
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$portfolio = $this->model_portfolio->find($id);

		
		if (!empty($portfolio->image)) {
			foreach ((array) explode(',', $portfolio->image) as $filename) {
				$path = FCPATH . '/uploads/portfolio/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_portfolio->remove($id);
	}
	
	
	/**
	* Upload Image Portfolio	* 
	* @return JSON
	*/
	public function upload_image_file()
	{
		if (!$this->is_allowed('portfolio_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'portfolio',
		]);
	}

	/**
	* Delete Image Portfolio	* 
	* @return JSON
	*/
	public function delete_image_file($uuid)
	{
		if (!$this->is_allowed('portfolio_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'portfolio',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/portfolio/'
        ]);
	}

	/**
	* Get Image Portfolio	* 
	* @return JSON
	*/
	public function get_image_file($id)
	{
		if (!$this->is_allowed('portfolio_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$portfolio = $this->model_portfolio->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'image', 
            'table_name'        => 'portfolio',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/portfolio/',
            'delete_endpoint'   => 'administrator/portfolio/delete_image_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('portfolio_export');

		$this->model_portfolio->export('portfolio', 'portfolio');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('portfolio_export');

		$this->model_portfolio->pdf('portfolio', 'portfolio');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('portfolio_export');

		$table = $title = 'portfolio';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_portfolio->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file portfolio.php */
/* Location: ./application/controllers/administrator/Portfolio.php */