<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    
  //  function __construct(){
    //    parent::__construct();
     //    $this->load->model('user_model','user');
   // }
    public function index(){
        $this->load->view('template/header');
        $this->load->view('register/index');
        $this->load->view('template/footer');
    }
     function showAll(){
        $this->load->model('user_model','user');
       $query=  $this->user->showAll();
             if($query){
                   $result['users']  = $this->user->showAll();
             }
        echo json_encode($result);
    }
     function addUser(){
        $this->load->model('user_model','user');
		$config = array(
        array('field' => 'firstname',
              'label' => 'Firstname',
              'rules' => 'trim|required'
             ),
             array('field' => 'lastname',
              'label' => 'Lastname',
              'rules' => 'trim|required'
             ),
             array('field' => 'birthday',
              'label' => 'Birthday',
              'rules' => 'trim|required'
             ),
             array('field' => 'email',
              'label' => 'Email',
              'rules' => 'trim|required'
             ),
               array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim|required'
               ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
        ),
        array(
                'field' => 'usertype',
                'label' => 'usertype',
                'rules' => 'trim|required'
        )

);
$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                'firstname'=>form_error('firstname'),
                'lastname'=>form_error('lastname'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'password'=>form_error('password'),
                 'usertype'=>form_error('usertype'),
                
            );
            
        }else{
                $data = array(
                'firstname'=> $this->input->post('firstname'),
                'lastname'=> $this->input->post('lastname'),
                'birthday'=> $this->input->post('birthday'),
                'email'=> $this->input->post('email'),
                'contact'=> $this->input->post('contact'),
                'password'=> $this->input->post('password'),
                  'usertype'=> $this->input->post('usertype'),
                
                
            );
            if($this->user->addUser($data)){
               $result['status'] = "SUCCESS";
                $result['message'] ='User Created Successfully';
            }
            
        }
        echo json_encode($result);
    }

     function updateUser(){		
        $this->load->model('user_model','user');
         $config = array(
        array('field' => 'firstname',
              'label' => 'Firstname',
              'rules' => 'trim|required'
             ),
             array('field' => 'lastname',
              'label' => 'Lastname',
              'rules' => 'trim|required'
             ),
             array('field' => 'birthday',
              'label' => 'Birthday',
              'rules' => 'trim|required'
             ),
             array('field' => 'email',
              'label' => 'Email',
              'rules' => 'trim|required'
             ),
               array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim|required'
               ),   
                array(
                'field' => 'usertype',
                'label' => 'usertype',
                'rules' => 'trim|required'
        )

);
$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'FAILED';
            $result['message'] = array(
                 'firstname'=>form_error('firstname'),
                'lastname'=>form_error('lastname'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'usertype'=>form_error('usertype')
                
            );
            
        }else{
          $id = $this->input->post('id');
          $data = array(
                'firstname'=> $this->input->post('firstname'),
                'lastname'=> $this->input->post('lastname'),
                'birthday'=> $this->input->post('birthday'),
                'email'=> $this->input->post('email'),
                'contact'=> $this->input->post('contact'),
                   'usertype'=>$this->input->post('usertype')
            );
                if($this->user->updateUser($id,$data)){
                     $result['status'] = "SUCCESS";
                     $result['message'] = 'User updated successfully';
                }
       
    }
          echo json_encode($result);
     }
    function deleteUser(){
        $this->load->model('user_model','user');
         $id = $this->input->post('id');
        if($this->user->deleteUser($id)){
             $result['status'] = "SUCCESS";
            $result['message'] = 'User deleted successfully';
        }else{
              $result['status'] = "FAILED";
        }
        echo json_encode($result);
         
    }
    function loginUser(){
        $this->load->model('user_model','user');
        $this->load->helper('url'); 
        $config = array(
        array('field' => 'email',
              'label' => 'Email',
              'rules' => 'trim|required'
             ),
             array('field' => 'password',
              'label' => 'Password',
              'rules' => 'trim|required'
             )
         );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = true;
            $result['message'] = array(
                'email'=>form_error('email'),
                'password'=>form_error('password')
                
            );

        }else{

        $data = array( 
            '           email'=>$this->input->post('email'),
                    'password'=> $this->input->post('password')
                   
            );
            $login =$this->user->loginUser($data);
           
            if($login){
                $session = array(
                                'user_id' => $login['id'],
                                'username' => $login['username'],
                                'type' => $login['type'],
                                'logged_in' => TRUE);
                $this->session->set_userdata($session);

                $result['status'] = "SUCCESS";
                $result['message'] = "SUCCESSFULLY LOGIN";
                if($login['type'] == 1){
                    $result['redirect'] = base_url()."manage";
                }else{
                    $result['redirect'] = base_url()."UserOrder";
            }
            }else{
                 $result['status'] = "FAILED";
                $result['message'] = "FAILED";

            }
            echo json_encode($result);  
        }

    }
    function manageUser(){
        $this->load->model('user_model','user');
        if(($this->session->username)&&($this->session->logged_in)){
             $this->load->view('template/header');
             $this->load->view('users/index');
            $this->load->view('template/footer');
        }else{

            redirect('/');
        }
    }
    public function logout() {
            $this->session->sess_destroy();
            redirect('register/index');
        }
    

}
    
