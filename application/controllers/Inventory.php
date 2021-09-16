<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller{

	 function __construct(){
        parent::__construct();
        $this->load->model('inventory_model','inventory');
       
    }
  public function index(){
        $this->load->view('template/header');
        $this->load->view('inventory/index');
        $this->load->view('template/footer');
    }

    function fetchAll(){
      $result = array();
       $query=  $this->inventory->fetchAll();
             if($query){
                   $result['inventory']  =  $query;
             }
        echo json_encode($result);
    }

     function addItem(){
     	$config = array(
        array('field' => 'itemName',
              'label' => 'ItemName',
              'rules' => 'trim|required'
             ),
             array('field' => 'itemDescription',
              'label' => 'ItemDescription',
              'rules' => 'trim|required'
             ),
             array('field' => 'quantity',
              'label' => 'Quantity',
              'rules' => 'trim|required'
             )
			);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                'itemName'=>form_error('itemName'),
                'itemDescription'=>form_error('itemDescription'),
                'quantity'=>form_error('quantity'),
            );
            
        }else{
                $data = array(
                'item_name'=> $this->input->post('itemName'),
                'item_description'=> $this->input->post('itemDescription'),
                'quantity'=> $this->input->post('quantity'),
            );
            if($this->inventory->storeItems($data)){
               $result['status'] = "SUCCESS";
                $result['message'] ='Item Created Successfully';
            }
            
        }
        echo json_encode($result);
     }
      function updateItem(){		
         $config = array(
        array('field' => 'item_name',
              'label' => 'item_name',
              'rules' => 'trim|required'
             ),
             array('field' => 'item_description',
              'label' => 'item_description',
              'rules' => 'trim|required'
             ),
             array('field' => 'quantity',
              'label' => 'Quantity',
              'rules' => 'trim|required'
             )

		);	
	$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                'item_name'=>form_error('item_name'),
                'item_description'=>form_error('item_description'),
                'quantity'=>form_error('quantity'),      
            );
            
        }else{
          $id = $this->input->post('id');
          $data = array(
                'item_name'=> $this->input->post('item_name'),
                'item_description'=> $this->input->post('item_description'),
                'quantity'=> $this->input->post('quantity'),
            );
                if($this->inventory->updateById($id,$data)){
                     $result['status'] = "SUCCESS";
                     $result['message'] = 'Item updated successfully';
                }
       
    	}
          echo json_encode($result);
     }

       function updateItemStatus(){
     $config = array(
             array('field' => 'status',
              'label' => 'status',
              'rules' => 'trim|required'
             )

    );  
    $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                'status'=>form_error('status'),
            );
            
        }else{
          $id = $this->input->post('id');
          $data = array(
                'status'=> '2' 
            );
                if($this->inventory->updateById($id,$data)){
                     $result['status'] = "SUCCESS";
                     $result['message'] = 'Item Deleted successfully';
                }
       
      }
          echo json_encode($result);



       }

    

    

}
?>