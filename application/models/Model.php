<?php 

class model extends CI_Model{

	public function listProducts(){
        $sql = "SELECT * FROM tb_products WHERE status = 1";
        
		return $this->db->query($sql);
    }
}