<?php 
class Order_model extends CI_Model{

	public function storeItems($data){
		  return $this->db->insert('order_request', $data);
	}

	public function fetchAllPending(){
            $this->db->where('status',2);
	$query = $this->db->get('order_request');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
	}

	public function fetchById($payload){
	$query = $this->db->get('order_request');
			$$this->db->where('id', $payload);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }	
	}
	
	public function updateById($id,$field){
		 $this->db->where('id', $id);
       	 $this->db->update('order_request', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        		
	}

    public function fetchByUserId($payload){
            $this->db->where('user_id', $payload);
    $query = $this->db->get('order_request');
            
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }   
    }
    

}