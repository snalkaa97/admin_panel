<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_portfolio extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'portfolio';
    private $field_search   = ['name', 'client', 'id_category', 'description', 'image', 'link_demo'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "portfolio.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "portfolio.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "portfolio.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "portfolio.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "portfolio.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "portfolio.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('portfolio.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('t_category', 't_category.id = portfolio.id_category', 'LEFT');
        
        $this->db->select('portfolio.*,t_category.name as t_category_name');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.created_by', get_user_data('id'));
        $this->db->where($this->table_name.'.modiefied_by', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_portfolio.php */
/* Location: ./application/models/Model_portfolio.php */