<?php 
class User_model extends CI_Model{
    public function showAll(){
       $query = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
     public function addUser($data){
        return $this->db->insert('users', $data);
    }
        public function updateUser($id,$field){
        $this->db->where('id', $id);
        $this->db->update('users', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }
      public function deleteUser($id){
         $this->db->where('id', $id);
        $this->db->delete('users');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }
    public function loginUser($data){
          
                $this->db->where($data);
       $query = $this->db->get('users');
                
        if($query->num_rows() > 0){
            return array(
                    "id" =>$query->row()->id,
                    "username" =>$query->row()->email,
                    "type" => $query->row()->usertype
                    );
        }else{
            return false;
        }
        //var_dump($data);
        
    }
   
}
?>