<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| T Category Controller
*| --------------------------------------------------------------------------
*| T Category site
*|
*/
class T_category extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_t_category');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all T Categorys
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('t_category_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['t_categorys'] = $this->model_t_category->get($filter, $field, $this->limit_page, $offset);
		$this->data['t_category_counts'] = $this->model_t_category->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/t_category/index/',
			'total_rows'   => $this->model_t_category->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('T Category List');
		$this->render('backend/standart/administrator/t_category/t_category_list', $this->data);
	}
	
	/**
	* Add new t_categorys
	*
	*/
	public function add()
	{
		$this->is_allowed('t_category_add');

		$this->template->title('T Category New');
		$this->render('backend/standart/administrator/t_category/t_category_add', $this->data);
	}

	/**
	* Add New T Categorys
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('t_category_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[20]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_t_category = $this->model_t_category->store($save_data);
            

			if ($save_t_category) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_t_category;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/t_category/edit/' . $save_t_category, 'Edit T Category'),
						anchor('administrator/t_category', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/t_category/edit/' . $save_t_category, 'Edit T Category')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/t_category');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/t_category');
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
	* Update view T Categorys
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('t_category_update');

		$this->data['t_category'] = $this->model_t_category->find($id);

		$this->template->title('T Category Update');
		$this->render('backend/standart/administrator/t_category/t_category_update', $this->data);
	}

	/**
	* Update T Categorys
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('t_category_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[20]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_t_category = $this->model_t_category->change($id, $save_data);

			if ($save_t_category) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/t_category', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/t_category');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/t_category');
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
	* delete T Categorys
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('t_category_delete');

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
            set_message(cclang('has_been_deleted', 't_category'), 'success');
        } else {
            set_message(cclang('error_delete', 't_category'), 'error');
        }

		redirect_back();
	}

		/**
	* View view T Categorys
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('t_category_view');

		$this->data['t_category'] = $this->model_t_category->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('T Category Detail');
		$this->render('backend/standart/administrator/t_category/t_category_view', $this->data);
	}
	
	/**
	* delete T Categorys
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$t_category = $this->model_t_category->find($id);

		
		
		return $this->model_t_category->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('t_category_export');

		$this->model_t_category->export('t_category', 't_category');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('t_category_export');

		$this->model_t_category->pdf('t_category', 't_category');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('t_category_export');

		$table = $title = 't_category';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_t_category->find($id);
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


/* End of file t_category.php */
/* Location: ./application/controllers/administrator/T Category.php */