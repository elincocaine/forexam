<?php 
class Inventory_model extends CI_Model{

	public function storeItems($data){
		  return $this->db->insert('inventory', $data);
	}
	public function fetchAll(){
            $this->db->where('status','1');
	$query = $this->db->get('inventory');
             //;
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
	}
	public function fetchById($payload){
	$query = $this->db->get('inventory');
			$$this->db->where('id', $payload);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }	
	}
	public function updateById($id,$field){
		 $this->db->where('id', $id);
       	 $this->db->update('inventory', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        		
	}

    public function fetchItembyId($data){
            $this->db->where('id',$data);
    $query = $this->db->get('inventory');
             //;
        if($query->num_rows() > 0){
            return array(
                    "id" =>$query->row()->id,
                    "quantity" =>$query->row()->quantity,
                    
                    );
        }else{
            return false;
        }
    }
    public function updateInventory($data){
        //var_dump($data);
        $orderid = $data['req_id'];
         $field = array("status" => 1);
          var_dump($orderid);
            $this->db->where('request_id', $data['req_id']);
            $this->db->update('order_request', $field);


        $field2 = array("quantity" => $data['nqty']);
          $this->db->where('id', $data['item_id']);
         $this->db->update('inventory', $field);

   
    }
    






}