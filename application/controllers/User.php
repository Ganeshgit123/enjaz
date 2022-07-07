<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

 

class User extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user modelhello
        $this->load->model('User_model');
    }

  /*Function to set JSON output*/
  public function output($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
  }


  public function index()
  {   
    $data['title'] = 'enjaz';

$this->db->where('status','A');    
$data['banner']=$this->db->get('home_banner')->result_array();

   
   /*  $data['details']=$this->db->get('home_details')->result_array();
      $data['vacancies']=$this->db->get('vacancies')->result_array();

      $this->db->where('status','A');   
      $data['team']=$this->db->get('team')->result_array();*/
      $data['homepg']=$this->db->get('home_page')->result_array();
    $this->load->view('user/index',$data);
  }


 public function add_homecontact()
  {
    
    
    $Return = array('result'=>'', 'error'=>'');   

    if($this->input->post('name')=== '')
    {
      $Return['error'] = "Invalid Name";
    }else if($this->input->post('email')=== '')
    {
      $Return['error'] = "Invalid email";
    }else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if($this->input->post('phone')=== '')
    {
      $Return['error'] = "Invalid Phone";
    }else if($this->input->post('message')=== '')
    {
      $Return['error'] = "Invalid Message";
    }else if($this->input->post('subject')=== '')
    {
      $Return['error'] = "Invalid Message";
    }

    if($Return['error']!='')
    {
          $this->output($Return);
        }

        $data =array
        (
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'message' => $this->input->post('message'),
           'subject' => $this->input->post('subject'),
             'date'=>date('Y-m-d'),
        );

                $this->email->set_mailtype("html");
            
                /*$subject = "Message Received";*/

                $name=$this->input->post("name");
                $email=$this->input->post("email");
                $phone=$this->input->post("phone");
                 $subject=$this->input->post("subject");
                $smessage1=$this->input->post("message");
                              
                $message = " ".$name. " \r\n ".$email." \r\n ".$phone." \r\n".$smessage1." ";
             
                


                $this->email->from('noreplyliaorg@gmail.com', "Enjaz");
                $this->email->to('info@enjaz-company.com.sa');
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();



        $result = $this->db->insert('contact',$data);

        if($result == TRUE )
    {
        $Return['result'] = 'Message Sent.';
    }
    else
    {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }

    $this->output($Return);
    exit;


  }

  
  public function about()
  {   
    $data['title'] = 'enjaz';
       
    
    $data['aboutdet']= $this->db->get('about')->result_array();
    $this->db->where('ban_id',1);
     $data['bandet']= $this->db->get('banners')->row(); 

    $this->load->view('user/about',$data);
  }
  public function careers()
  {   
    $data['title'] = 'enjaz';
       
    $data['description'] ='est daffa' ;
        $this->load->view('user/careers',$data);
  }
  public function career()
  {   
    // $data['title'] = 'enjaz';
  
  
   

      $session = $this->session->userdata('language');
      if(empty($session))
      {
          $this->session->set_userdata('language','en');
          $session = $this->session->userdata('language');
          
      }
   

      $this->db->select('*');
    $query = $this->db->get('careers');
        $users = $query->row() ;
        $data = array();
        if (isset($users))
        {
          if($session == 'en' || $session == 'english'){
            
          $data = array( 
  
            'title' => $users->title,
        
  
          );
  
          }else if($session == 'ar'){
  
          $data = array(
  
            'title' => $users->title,
        
          ) ;
  
          }
        }
        $this->db->where('ban_id',4);
        $data['bandet']= $this->db->get('banners')->row();
        $data['sec2'] = $this->db->get('career_acc')->result_array();
        $this->load->view('user/career',$data);

  }

   public function add_career()
  {
    
    
    $Return = array('result'=>'', 'error'=>'');   

    if($this->input->post('name')=== '')
    {
      $Return['error'] = "Invalid Name";
    }else if($this->input->post('email')=== '')
    {
      $Return['error'] = "Invalid email";
    }else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if($this->input->post('phone')=== '')
    {
      $Return['error'] = "Invalid Phone";
    }else if($this->input->post('message')=== '')
    {
      $Return['error'] = "Invalid Message";
    }else if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
          $Return['error'] = "upload Resume";
      }

    if($Return['error']!='')
    {
          $this->output($Return);
        }


        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','svg','doc', 'docx');
        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["file"]["tmp_name"];
          $profile = "upload/files/";
          $set_img = base_url()."upload/files/";
         
          $name = basename($_FILES["file"]["name"]);
          $newfilename = 'resume_'.round(microtime(true)).'.'.$ext;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $fname = $newfilename;
          // $data["file"]=$fname;
            }
          }



       

        $data =array
        (
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'message' => $this->input->post('message'),
          'resume' =>$fname,
         // 'job'=>$this->input->post('job'),
          'date'=>date('Y-m-d'),
        );


          $this->email->set_mailtype("html");
            
                $subject = "Message Received";

                $name=$this->input->post("name");
                $email=$this->input->post("email");
                $phone=$this->input->post("phone");
                $smessage1=$this->input->post("message");
                $resume = $fname;
                              
                $message = " ".$name. " \r\n ".$email." \r\n ".$phone." \r\n".$smessage1." \r\n ".$resume."";
             
                


                $this->email->from('noreplyliaorg@gmail.com', "Enjaz");
                $this->email->to('career@enjaz-company.com.sa');
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();





        $result = $this->db->insert('career',$data);

        if($result == TRUE )
    {
        $Return['result'] = 'Details updated.';
    }
    else
    {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }

    $this->output($Return);
    exit;
  }

   public function catering()
  {   
    $data['title'] = 'enjaz';
    $this->db->where('service_id','3');
    $data['cateringdet']= $this->db->get('service')->result_array();

   $this->db->where('ban_id',6);
     $data['bandet']= $this->db->get('banners')->row();

    $this->load->view('user/catering',$data);
  }
  public function contact()
  {   
   $data['title'] = 'enjaz';
      $this->db->where('ban_id',3);
     $data['bandet']= $this->db->get('banners')->row(); 
    $this->load->view('user/contact',$data);
  }

   public function add_contact()
  {
    
    
    $Return = array('result'=>'', 'error'=>'');   

    if($this->input->post('name')=== '')
    {
      $Return['error'] = "Invalid Name";
    }else if($this->input->post('email')=== '')
    {
      $Return['error'] = "Invalid email";
    }else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if($this->input->post('phone')=== '')
    {
      $Return['error'] = "Invalid Phone";
    }else if($this->input->post('message')=== '')
    {
      $Return['error'] = "Invalid Message";
    }

    if($Return['error']!='')
    {
          $this->output($Return);
        }


       

        $data =array
        (
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'message' => $this->input->post('message'),
           'date'=>date('Y-m-d'),
        );




                $this->email->set_mailtype("html");
            
                $subject = "Message Received";

                $name=$this->input->post("name");
                $email=$this->input->post("email");
                $phone=$this->input->post("phone");
                $smessage1=$this->input->post("message");
                              
                $message = " ".$name. " \r\n ".$email." \r\n ".$phone." \r\n".$smessage1." ";
             
                


                $this->email->from('noreplyliaorg@gmail.com', "Enjaz");
                $this->email->to('info@enjaz-company.com.sa');
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();



        $result = $this->db->insert('contact',$data);

        if($result == TRUE )
    {
        $Return['result'] = 'Message Sent.';
    }
    else
    {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }

    $this->output($Return);
    exit;


  }



  public function qhse()
  {   
      $data['title'] = 'enjaz';

       $data['qhsedet']=$this->db->get('commitment')->result_array();
            $this->db->where('ban_id',7);
     $data['bandet']= $this->db->get('banners')->row(); 

    $this->load->view('user/qhse',$data);
  }
   public function services()
  {   
            $data['title'] = 'enjaz';
            $this->db->where('sub_category','1');
            $data['softdet']=$this->db->get('service')->result_array();
             $this->db->where('sub_category','2');
            $data['harddet']=$this->db->get('service')->result_array();
             $this->db->where('sub_category','3');
            $data['minordet']=$this->db->get('service')->result_array();


            $this->db->where('ban_id',2);
     $data['bandet']= $this->db->get('banners')->row(); 
    
      $this->load->view('user/services',$data);
  }
   public function workplace_solution()
  {   
    $data['title'] = 'enjaz';
    $this->db->where('service_id','2');
    $data['servicedet']=$this->db->get('service')->result_array();

      $this->db->where('ban_id',5);
     $data['bandet']= $this->db->get('banners')->row(); 

    $this->load->view('user/workplace_solution',$data);
  }
   
}