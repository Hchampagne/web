<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cards extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }
 
    public function get_current_page_records($limit, $start) 
    {
        $this->db->select('cartemetiers.*, metiers.metier, metiers.id as idm');
        $this->db->from('cartemetiers');
        $this->db->join('metiers', 'cartemetiers.id_metiers = metiers.id');
        $this->db->order_by('idm', 'asc'); 
        $this->db->limit($limit, $start);
       

    
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("cartemetiers");
    }
}