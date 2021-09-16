<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller{
	 function __construct(){
        	parent::__construct();
        	$this->load->model('inventory_model','inventory');
          	$this->load->model('order_model','order');

       
    }

    public function index(){
    	 $this->session->user_id;
    	   	$this->load->view('template/header');
        	$this->load->view('adminOrder/index');
        	$this->load->view('template/footer');

    }

    public function order(){
    	 	$this->session->user_id;
    	  	$this->load->view('template/header');
        	$this->load->view('userOrder/index');
        	$this->load->view('template/footer');

    }



   function fetchAllPending(){
    $order_list = $this->order->fetchAllPending();
    	 if($order_list){
                   $result['inventory']  =  $order_list;
             }
        echo json_encode($result);

       }
     function addItem(){
    	$user_id =  $this->session->user_id;
   		$request_id = strtotime('now');
    	$status = 2;
    		$config = array(
             array('field' => 'quantity',
              'label' => 'Quantity',
              'rules' => 'trim|required',
              
             )
			);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                'quantity'=>form_error('quantity'),
            );
            
        }else{

       	$id = $this->input->post('id');// item id
       	$qty = $this->input->post('quantity');
       	$check = $this->inventory->fetchItembyId($id);
       	if($qty <=  $check['quantity']  ){

    	 $data = array(
                'user_id'=> $user_id,
                'request_id'=> $request_id,
               'item_id' => $id, 
                'status'=> $status,
               	'quantity'=> $this->input->post('quantity')
            );
            if($this->order->storeItems($data)){
               $result['status'] = "SUCCESS";
                $result['message'] ='Item Requested Successfully';
            }
       		

       	}else{
       			$result['status'] = "FAILED";
                $result['message'] ='PLEASE CHECK QUANTITY';
                 echo json_encode($result);
                 exit();
         }


       
        }
              echo json_encode($result);
	}
    function updateItemStatus(){   
		$rq_id = $this->input->post('request_id');
		$item_id = $this->input->post('item_id');
		$qty = $this->input->post('quantity');
		$check = $this->inventory->fetchItembyId($item_id);
     		if($qty <=  $check['quantity']  ){

     			$test = $check['quantity'] - $qty;
     			$data = array('req_id' => $rq_id,
     			'item_id' => $item_id,
     			"nqty"=> $test);
     			echo $this->inventory->updateInventory($data);
			exit();
       		}



     }


}