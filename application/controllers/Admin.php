<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    // Load the user modelhello
    $this->load->model('Admin_model');
  }

  /*Function to set JSON output*/
  public function output($Return = array())
  {
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
    $this->load->view('admin/login', $data);
  }

  public function login()
  {

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($username === '') {
      $Return['error'] = "Invalid Username";
    } elseif ($password === '') {
      $Return['error'] = "Invalid Password";
    }
    if ($Return['error'] != '') {
      $this->output($Return);
    }

    $data = array(
      'username' => $username,
      'password' => $password
    );
    $retdata = $this->Admin_model->login($data);

    if ($retdata !== FALSE) {

      //$result = $this->User_model->read_user_information($username);


      $sql = 'SELECT * FROM users WHERE id = ?';
      $binds = array($retdata);
      $query = $this->db->query($sql, $binds);

      if ($query->num_rows() > 0) {
        $userdata = $query->result();
      }



      $session_data = array(
        'user_id' => $userdata[0]->id,
        'username' => $userdata[0]->uname,
        'email' => $userdata[0]->uemail,
        'user_type' => $userdata[0]->user_type,
      );

      // Add user data in session
      $this->session->set_userdata('username', $session_data);
      $this->session->set_userdata('user_id', $session_data);
      $Return['result'] = "Logged In Successfully";

      $this->output($Return);
    } else {
      $Return['error'] = "Invalid Credentials";
      $this->output($Return);
    }
  }


  public function dashboard()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $data['title'] = 'Dashboard';
    $this->load->view('admin/dashboard', $data);
  }


  public function users()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['title'] = 'User List';
    $data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/listuser', $data);
  }



  public function newuser()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['title'] = 'Add new user';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/adduser', $data);
  }


  public function adduser()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('uname') === '') {
      $Return['error'] = "Name required";
    } else if (preg_match("/^(\pL{1,}[ ]?)+$/u", $this->input->post('uname')) != 1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if ($this->input->post('email') === '') {
      $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if ($this->input->post('contactno') === '') {
      $Return['error'] = "Contact number required";;
    } else if (!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
      $Return['error'] = "Only numbers are allowed!!!";
    } else if ($this->input->post('upassword') === '') {
      $Return['error'] = "Password required";
    } else if (strlen($this->input->post('upassword')) < 6) {
      $Return['error'] = "The password must be at least 6 characters.";
    } else if ($this->input->post('upassword') !== $this->input->post('ucpassword')) {
      $Return['error'] = "The password confirmation does not match.";
    }

    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));


    $password = md5($this->input->post('upassword'));

    $data = array(


      'uname' => $username,
      'uphone' => $this->input->post('contactno'),
      'uemail' => $this->input->post('email'),
      'upassword' => $password

    );
    $result = $this->db->insert('users', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'user added successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

  public function edituser()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('id, uname,uemail,uphone');
    $this->db->where('id', $id);
    $query = $this->db->get('users');
    $users = $query->row();

    $data = array();
    if (isset($users)) {
      $data  = array('id' => $users->id, 'uname' => $users->uname, 'uemail' => $users->uemail, 'uphone' => $users->uphone);
    }

    $this->load->view('admin/edit_user', $data);
  }


  public function changepassword()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }


    $id = $this->uri->segment(3);


    if (empty($id)) {
      $id = $session['user_id'];
    }



    $this->db->select('id, uname,uemail,uphone');
    $this->db->where('id', $id);
    $query = $this->db->get('users');
    $users = $query->row();

    $data = array();
    if (isset($users)) {
      $data  = array('id' => $users->id, 'uname' => $users->uname, 'uemail' => $users->uemail, 'uphone' => $users->uphone);
    }

    $this->load->view('admin/changepassword', $data);
  }


  public function reset_pass()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('upassword') === '') {
      $Return['error'] = "Password required";
    } else if (strlen($this->input->post('upassword')) < 6) {
      $Return['error'] = "The password must be at least 6 characters.";
    } else if ($this->input->post('upassword') !== $this->input->post('ucpassword')) {
      $Return['error'] = "The password confirmation does not match.";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('userid');


    $data = array(

      'upassword' => md5($this->input->post('upassword')),

    );

    $this->db->where('id', $id);
    $result = $this->db->update('users', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'User detail updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }


  public function update_user()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('uname') === '') {
      $Return['error'] = "Name required";
    } else if (preg_match("/^(\pL{1,}[ ]?)+$/u", $this->input->post('uname')) != 1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if ($this->input->post('email') === '') {
      $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if ($this->input->post('contactno') === '') {
      $Return['error'] = "Contact number required";;
    } else if (!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
      $Return['error'] = "Only numbers are allowed!!!";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('userid');

    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));


    $data = array(

      'uname' => $username,
      'uphone' => $this->input->post('contactno'),
      'uemail' => $this->input->post('email'),

    );

    $this->db->where('id', $id);
    $result = $this->db->update('users', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'User detail updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }


  public function delete_user()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');

    $id = $this->input->post('id');
    $this->db->where('user_type', 'user');
    $this->db->where('id', $id);
    $result = $this->db->delete('users');

    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'User Deleted.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }




  public function home_banner()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['bannerdet'] = $this->db->get('home_banner')->result_array();
    $this->load->view('admin/home_banner', $data);
  }


  public function bannerstatus()
  {

    $id = $this->input->post('id');
    $val = $this->input->post('value');

    $Return = array('result' => '', 'error' => '');

    if ($val == 1) {
      $data = array('status' => 'A');
    } else {
      $data = array('status' => '');
    }


    $this->db->where('id', $id);
    $result = $this->db->update('home_banner', $data);


    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'Banner Status updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function add_bannner()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');

    $description = $this->input->post('description');
    $description1 = $this->input->post('description1');

    $feat = "";
    // $password = md5($this->input->post('password'));
    if ($description === '') {
      $Return['error'] = "Enter Banner Description";
    } else if (!file_exists($_FILES['service_image']['tmp_name']) || !is_uploaded_file($_FILES['service_image']['tmp_name'])) {
      $Return['error'] = "Display image required";
    } else {
      if (is_uploaded_file($_FILES['service_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
        $filename = $_FILES['service_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {
          $tmp_name = $_FILES["service_image"]["tmp_name"];
          $profile = "upload/images/";
          $set_img = base_url() . "upload/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["service_image"]["name"]);
          $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
          move_uploaded_file($tmp_name, $profile . $newfilename);
          $fname = $newfilename;
          if (!empty($features)) {
            $feat = implode(',', $features);
          }
          $data = array(
            'banner_desc' => $description,
            'banner_desc1' => $description1,
            'banner_img' => $fname,
          );
          $result = $this->db->insert('home_banner', $data);
          if ($result != false) {
            $Return['result'] = "Banner details added successfully";
          } else {
            $Return['error'] = "Error";
          }
          $this->output($Return);
          exit;
        } else {
          $Return['error'] = "Invalid file format";
        }
        if ($Return['error'] != '') {
          $this->output($Return);
        }
      }
    }
    if ($Return['error'] != '') {
      $this->output($Return);
    }
  }



  public function edit_banner()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('home_banner');
    $banner = $query->row();

    $data = array();
    if (isset($banner)) {
      $data  = array('id' => $banner->id, 'desc' => $banner->banner_desc, 'desc1' => $banner->banner_desc1, 'img' => $banner->banner_img);
    }



    $this->load->view('admin/edit_banner', $data);
  }




  public function update_banner()
  {

    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');

    $id = $this->input->post('id');

    $description = $this->input->post('description');
    $description1 = $this->input->post('description1');


    // $password = md5($this->input->post('password'));
    if ($description === '') {
      $Return['error'] = "Enter Banner description";
    } else if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
      //  $Return['error'] = "Display image required";


      $data = array(

        'banner_desc' => $description,
        'banner_desc1' => $description1,


      );
      $this->db->where('id', $id);
      $result = $this->db->update('home_banner', $data);

      if ($result != false) {
        $Return['result'] = "Service updated successfully";
      } else {
        $Return['error'] = "Error";
      }
      $this->output($Return);
      exit;
    } else {

      if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        //checking image type
        $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
        $filename = $_FILES['img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {
          $tmp_name = $_FILES["img"]["tmp_name"];
          $profile = "upload/images/";
          $set_img = base_url() . "upload/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["img"]["name"]);
          $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
          move_uploaded_file($tmp_name, $profile . $newfilename);
          $fname = $newfilename;
          if (!empty($features)) {
            $feat = implode(',', $features);
          }
          $data = array(

            'banner_desc' => $description,
            'banner_desc1' => $description1,

            'banner_img' => $fname,
          );
          $this->db->where('id', $id);
          $result = $this->db->update('home_banner', $data);
          if ($result != false) {
            $Return['result'] = "Banner added successfully";
          } else {
            $Return['error'] = "Error";
          }
          $this->output($Return);
          exit;
        } else {
          $Return['error'] = "Invalid file format";
        }
        if ($Return['error'] != '') {
          $this->output($Return);
        }
      }
    }
    if ($Return['error'] != '') {
      $this->output($Return);
    }
  }



  public function edit_homedetail()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }


    $this->db->select('*');

    $query = $this->db->get('home_page');
    $homedet = $query->row();

    $data = array();
    if (isset($homedet)) {
      $data  = array('id' => $homedet->id, 'description' => $homedet->description, 'servc_img1' => $homedet->servc_img1, 'servc_img2' => $homedet->servc_img2, 'servc_desc1' => $homedet->servc_desc1, 'servc_desc2' => $homedet->servc_desc2);
    }



    $this->load->view('admin/edit_homedetail', $data);
  }


  public function  update_homedetail()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');


    if ($this->input->post('description1') === '') {
      $Return['error'] = "Empty field found";
    } else if ($this->input->post('description2') === '') {
      $Return['error'] = "Empty field found";
    } else if ($this->input->post('description3') === '') {
      $Return['error'] = "Empty field found";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }

    $id = $this->input->post('id');

    $attachment  = $_FILES["img1"]['name'];
    $images = '';


    if (is_uploaded_file($_FILES['img1']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['img1']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img1"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["img1"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }

    if (is_uploaded_file($_FILES['img2']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
      $filename = $_FILES['img2']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img2"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["img2"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname2 = $newfilename;
        // $images[] =  $filename ;
      }
    }






    if (empty($fname1)) {
      $fname1 = $this->input->post('himg1');
    }

    if (empty($fname2)) {
      $fname2 = $this->input->post('himg2');
    }






    $data = array(

      'description' => $this->input->post('description3'),
      'servc_desc1' => $this->input->post('description1'),
      'servc_desc2' => $this->input->post('description2'),
      'servc_img1'  => $fname1,
      'servc_img2'  => $fname2,

    );

    $this->db->where('id', $id);
    $result = $this->db->update('home_page', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'Home detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }




  public function edit_homedet()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }




    $this->db->select('*');

    $query = $this->db->get('home_details');
    $homedet = $query->row();

    $data = array();
    if (isset($homedet)) {
      $data  = array('id' => $homedet->id, 'about1' => $homedet->about1, 'about2' => $homedet->about2, 'about3' => $homedet->about3, 'about4' => $homedet->about4, 'img1' => $homedet->img1, 'img2' => $homedet->img2);
    }



    $this->load->view('admin/edit_homedet', $data);
  }


  public function update_homedet()
  { {
      $session = $this->session->userdata('username');
      if (empty($session)) {
        redirect('admin');
      }

      $Return = array('result' => '', 'error' => '');

      /* Server side PHP input validation */
      if ($this->input->post('description1') === '') {
        $Return['error'] = "Empty field found";
      } else if ($this->input->post('description2') === '') {
        $Return['error'] = "Empty field found";
      }


      if ($Return['error'] != '') {
        $this->output($Return);
      }


      $id = $this->input->post('id');

      /* $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));*/


      $attachment  = $_FILES["img1"]['name'];
      $images = '';


      if (is_uploaded_file($_FILES['img1']['tmp_name'])) {
        $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
        $filename = $_FILES['img1']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {
          $tmp_name = $_FILES["img1"]["tmp_name"];
          $profile = "assets/images/home/";
          $set_img = base_url() . "assets/images/home/";
          $name = basename($_FILES["img1"]["name"]);
          $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
          move_uploaded_file($tmp_name, $profile . $newfilename);
          $fname1 = $newfilename;
          //$images[] =  $fname ;
        } else {
          $Return['error'] = "Invalid file format";
          $this->output($Return);
          exit;
        }
      }

      if (is_uploaded_file($_FILES['img2']['tmp_name'])) {
        $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
        $filename = $_FILES['img2']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {
          $tmp_name = $_FILES["img2"]["tmp_name"];
          $profile = "assets/images/home/";
          $set_img = base_url() . "assets/images/home/";
          $name = basename($_FILES["img2"]["name"]);
          $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
          move_uploaded_file($tmp_name, $profile . $newfilename);
          $fname2 = $newfilename;
          // $images[] =  $filename ;
        }
      }






      if (empty($fname1)) {
        $fname1 = $this->input->post('himg1');
      }

      if (empty($fname2)) {
        $fname2 = $this->input->post('himg2');
      }






      $data = array(

        'about1' => $this->input->post('description1'),
        'about2' => $this->input->post('description2'),
        'about3' => $this->input->post('description3'),
        'about4' => $this->input->post('description4'),
        'img1'  => $fname1,
        'img2'  => $fname2,

      );

      $this->db->where('id', $id);
      $result = $this->db->update('home_details', $data);
      if ($result == TRUE) {

        //get setting info 

        $Return['result'] = 'Home detail updated .';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again.';
      }
      $this->output($Return);
      exit;
    }
  }

  public function list_vacancy()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['vancancydet'] = $this->db->get('vacancies')->result_array();

    $this->load->view('admin/list_vacancies', $data);
  }
  public function new_vacancy()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['title'] = 'Add vacancy';
    $this->load->view('admin/add_vacancy');
  }


  public function add_vacancy()
  {

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('title') === '') {
      $Return['error'] = "Enter Title ";
    } else if ($this->input->post('description') === '') {
      $Return['error'] = "Enter description";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $title = $this->input->post('title');
    $description = $this->input->post('description');

    $data = array(
      'title' => $title,
      'vacancy_desc' => $description,

    );

    $result = $this->db->insert('vacancies', $data);

    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'package added successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function edit_vacancy()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);

    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('vacancies');
    $vacdet = $query->row();

    $data = array();
    if (isset($vacdet)) {
      $data  = array('id' => $vacdet->id, 'title' => $vacdet->title, 'description' => $vacdet->vacancy_desc);
    }



    $this->load->view('admin/edit_vacancy', $data);
  }

  public function update_vacancy()
  {

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('title') === '') {
      $Return['error'] = "Enter Title ";
    } else if ($this->input->post('description') === '') {
      $Return['error'] = "Enter description";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }

    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $description = $this->input->post('description');

    $data = array(
      'title' => $title,
      'vacancy_desc' => $description,

    );

    $this->db->where('id', $id);
    $result = $this->db->update('vacancies', $data);

    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'package added successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function about()
  {

    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->select('id,banner_desc,about1_desc,about1_img,about2_desc,about2_img,about3_desc,about3_img');
    $aboutdet = $this->db->get('about')->row();


    $data = array();
    if (isset($aboutdet)) {
      $data  = array('id' => $aboutdet->id, 'banner_desc' => $aboutdet->banner_desc, 'about1_desc' => $aboutdet->about1_desc, 'about1_img' => $aboutdet->about1_img, 'about2_desc' => $aboutdet->about2_desc, 'about2_img' => $aboutdet->about2_img, 'about3_desc' => $aboutdet->about3_desc, 'about3_img' => $aboutdet->about3_img);
    }


    $this->load->view('admin/about', $data);
  }



  public function abt_mission()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->select('id,about1_desc,about1_img');
    $aboutdet = $this->db->get('about')->row();


    $data = array();
    if (isset($aboutdet)) {
      $data  = array('id' => $aboutdet->id, 'about1_desc' => $aboutdet->about1_desc, 'about1_img' => $aboutdet->about1_img);
    }


    $this->load->view('admin/abt_mission', $data);
  }




  public function abt_corevalue()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->select('id,about2_desc,about2_img');
    $aboutdet = $this->db->get('about')->row();


    $data = array();
    if (isset($aboutdet)) {
      $data  = array('id' => $aboutdet->id, 'about2_desc' => $aboutdet->about2_desc, 'about2_img' => $aboutdet->about2_img);
    }


    $this->load->view('admin/abt_corevalue', $data);
  }

  public function abt_challenges()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->select('id,about3_desc,about3_img');
    $aboutdet = $this->db->get('about')->row();


    $data = array();
    if (isset($aboutdet)) {
      $data  = array('id' => $aboutdet->id, 'about3_desc' => $aboutdet->about3_desc, 'about3_img' => $aboutdet->about3_img);
    }


    $this->load->view('admin/abt_challenges', $data);
  }


  public function update_about()
  { {
      $session = $this->session->userdata('username');
      if (empty($session)) {
        redirect('admin');
      }

      $Return = array('result' => '', 'error' => '');

      if ($this->input->post('about') === '') {
        $Return['error'] = "Select about section";
      }/*elseif($this->input->post('description')==='') {
          $Return['error'] = "Description cannot be empty";
    }*/ else if ($this->input->post('about1_desc') === '') {
        $Return['error'] = "Description cannot be empty";
      } else if ($this->input->post('about2_desc') === '') {
        $Return['error'] = "Description cannot be empty";
      } else if ($this->input->post('about3_desc') === '') {
        $Return['error'] = "Description cannot be empty";
      }


      if ($Return['error'] != '') {
        $this->output($Return);
      }

      $about1_desc = $this->input->post('about1_desc');
      $about2_desc = $this->input->post('about2_desc');
      $about3_desc = $this->input->post('about3_desc');
      $id = $this->input->post('id');



      $fname1 = $this->input->post('habout1_img');
      $fname2 = $this->input->post('habout2_img');
      $fname3 = $this->input->post('habout3_img');

      if (!empty($this->input->post('about'))) {

        if (!empty(($this->input->post('about1_desc')))) {
          if (file_exists($_FILES['about1_img']['tmp_name'])) {


            if (is_uploaded_file($_FILES['about1_img']['tmp_name'])) {



              // if(is_uploaded_file($_FILES['about1_img']['tmp_name'])) {
              $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
              $filename = $_FILES['about1_img']['name'];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              if (in_array($ext, $allowed)) {
                $tmp_name = $_FILES["about1_img"]["tmp_name"];
                $profile = "assets/images/";
                $set_img = base_url() . "assets/images/";

                $name = basename($_FILES["about1_img"]["name"]);

                // echo $name ;
                $newfilename = 'ser' . round(microtime(true)) . '.' . $ext;
                move_uploaded_file($tmp_name, $profile . $newfilename);
                $fname1 = $newfilename;
                // $data["file"]=$fname;
              } else {
                $Return['error'] = "Invalid file format";
                $this->output($Return);
                exit;
              }
            }
          }
        }



        if (!empty(($this->input->post('about2_desc')))) {
          if (file_exists($_FILES['about2_img']['tmp_name'])) {

            if (is_uploaded_file($_FILES['about2_img']['tmp_name'])) {

              // if(is_uploaded_file($_FILES['about1_img']['tmp_name'])) {
              $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
              $filename = $_FILES['about2_img']['name'];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              if (in_array($ext, $allowed)) {
                $tmp_name = $_FILES["about2_img"]["tmp_name"];
                $profile = "assets/images/";
                $set_img = base_url() . "assets/images/";

                $name = basename($_FILES["about2_img"]["name"]);
                $newfilename = 'ser' . round(microtime(true)) . '.' . $ext;
                move_uploaded_file($tmp_name, $profile . $newfilename);
                $fname2 = $newfilename;
                // $data["file"]=$fname;
              } else {
                $Return['error'] = "Invalid file format";
                $this->output($Return);
                exit;
              }
            }
          }
        }




        if (!empty(($this->input->post('about3_desc')))) {
          if (file_exists($_FILES['about3_img']['tmp_name'])) {


            if (is_uploaded_file($_FILES['about3_img']['tmp_name'])) {



              // if(is_uploaded_file($_FILES['about1_img']['tmp_name'])) {
              $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
              $filename = $_FILES['about3_img']['name'];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              if (in_array($ext, $allowed)) {
                $tmp_name = $_FILES["about3_img"]["tmp_name"];
                $profile = "assets/images/";
                $set_img = base_url() . "assets/images/";

                $name = basename($_FILES["about3_img"]["name"]);
                $newfilename = 'ser' . round(microtime(true)) . '.' . $ext;
                move_uploaded_file($tmp_name, $profile . $newfilename);
                $fname3 = $newfilename;
                // $data["file"]=$fname;
              } else {
                $Return['error'] = "Invalid file format";
                $this->output($Return);
                exit;
              }
            }
          }
        }
      }



      if (empty($about1_desc)) {
        $about1_desc = $this->input->post('habout1_desc');
      }

      // if(empty($fname1 )){
      //  $fname1 = $this->input->post('habout1_img');
      // }


      if (empty($about2_desc)) {
        $about2_desc = $this->input->post('habout2_desc');
      }

      // if(empty($fname2 )){
      //  $fname2=$this->input->post('habout2_img');

      // }

      if (empty($about3_desc)) {
        $about3_desc = $this->input->post('habout3_desc');
      }

      // if(empty($fname3 )){
      //  $fname3=$this->input->post('habout3_img');

      // }


      $data = array(

        /*  'banner_desc' => $this->input->post('description'),*/
        'about1_desc' => $about1_desc,
        'about1_img'  => $fname1,
        'about2_desc' => $about2_desc,
        'about2_img'  => $fname2,
        'about3_desc' => $about3_desc,
        'about3_img'  => $fname3,
        /* 'img2'  => $fname2,*/

      );

      $this->db->where('id', $id);
      $result = $this->db->update('about', $data);
      if ($result == TRUE) {

        //get setting info 

        $Return['result'] = 'About details updated .';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again.';
      }
      $this->output($Return);
      exit;
    }
  }
  public function  edit_careerlist()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('career_acc');
    $users = $query->row();

    $data = array();
    if (isset($users)) {
      $data  = array('id' => $users->id, 'acc_title' => $users->acc_title, 'acc_title_ar' => $users->acc_title_ar, 'acc_location' => $users->acc_location, 'acc_location_ar' => $users->acc_location_ar, 'acc_desc' => $users->acc_desc, 'acc_desc_ar' => $users->acc_desc_ar, 'apply' => $users->apply, 'apply_ar' => $users->apply_ar);
    }

    $this->load->view('admin/edit_careerlist', $data);
  }
  public function update_careerlist()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');
    // $description = $this->input->post('desc');


    $feat = "";
    // $password = md5($this->input->post('password'));
    if ($this->input->post('title') === '') {
      $Return['error'] = "Enter Title";
    } else if ($this->input->post('ar_title') === '') {
      $Return['error'] = "Enter Arabic Title";
    } else if ($this->input->post('loc') === '') {
      $Return['error'] = "Enter location";
    } else if ($this->input->post('ar_loc') === '') {
      $Return['error'] = "Enter location";
    } else if ($this->input->post('content') === '') {
      $Return['error'] = "Enter Description";
    } else if ($this->input->post('ar_content') === '') {
      $Return['error'] = "Enter Arabic Description";
    } else if ($this->input->post('btn') === '') {
      $Return['error'] = "Enter button";
    } else if ($this->input->post('btn_ar') === '') {
      $Return['error'] = "Enter button arabic";
    }

    $id = $this->input->post('id');

    $data = array(
      'acc_title' => $this->input->post('title'),
      'acc_title_ar' => $this->input->post('ar_title'),
      'acc_location' => $this->input->post('loc'),
      'acc_location_ar' => $this->input->post('ar_loc'),
      'acc_desc' => $this->input->post('content'),
      'acc_desc_ar' => $this->input->post('ar_content'),
      'apply' => $this->input->post('btn'),
      'apply_ar' => $this->input->post('btn_ar'),

    );
    $this->db->where('id', $id);
    $result = $this->db->update('career_acc', $data);

    if ($result != false) {
      $Return['result'] = "acc Content updated successfully";
    } else {
      $Return['error'] = "Error";
    }
    $this->output($Return);
    exit;
  }


  public function list_contact()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['title'] = 'contact List';
    $data['userdet'] = $this->db->get('contact')->result_array();
    $this->load->view('admin/list_contact', $data);
  }

  public function list_career()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['title'] = 'career List';
    $data['userdet'] = $this->db->get('career')->result_array();
    $this->load->view('admin/list_career', $data);
  }
  public function edit_ifm()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $data['res'] = $this->db->get('facility_management')->result_array();
    $this->load->view('admin/edit_ifm', $data);
  }



  public function update_ifm()

  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('description') === '') {
      $Return['error'] = "Empty field found";
    } elseif ($this->input->post('title') === '') {
      $Return['error'] = "Enter title";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('id');


    $data = array(

      'title' => $this->input->post('title'),

      'description'  => $this->input->post('description'),


    );

    $this->db->where('id', $id);
    $result = $this->db->update('facility_management', $data);
    if ($result == TRUE) {

      $Return['result'] = 'Integrated Service detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
  public function list_softservc()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $cat = $this->input->post('category');
    $data['title'] = 'career List';
    $this->db->where('service_id', '1');
    $this->db->where('sub_category', $cat);
    $data['soft_servcdet'] = $this->db->get('service')->result_array();
    $this->load->view('admin/list_softservc', $data);
  }


  public function edit_softservc()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('service');
    $service = $query->row();

    $data = array();
    if (isset($service)) {
      $data  = array('id' => $service->id, 'desc' => $service->ser_desc, 'img' => $service->ser_img);
    }



    $this->load->view('admin/edit_softservc', $data);
  }

  public function update_softservc()

  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('description') === '') {
      $Return['error'] = "Empty field found";
    } elseif ($this->input->post('img') === '') {
      $Return['error'] = "Upload Image";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('id');



    $attachment  = $_FILES["img"]['name'];
    $images = '';


    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img"]["tmp_name"];
        $profile = "assets/images/icons/";
        $set_img = base_url() . "assets/images/icons/";
        $name = basename($_FILES["img"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }


    if (empty($fname1)) {
      $fname1 = $this->input->post('himg');
    }


    $data = array(

      'ser_desc' => $this->input->post('description'),

      'ser_img'  => $fname1,


    );

    $this->db->where('id', $id);
    $result = $this->db->update('service', $data);
    if ($result == TRUE) {

      $Return['result'] = 'Services detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }




  public function edit_workplace()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }


    $this->db->select('id, ser_desc,ser_img');
    $this->db->where('service_id', '2');
    $query = $this->db->get('service');
    $users = $query->row();

    $data = array();
    if (isset($users)) {
      $data  = array('id' => $users->id, 'wrkplace_desc' => $users->ser_desc, 'wrkplace_img' => $users->ser_img);
    }

    $this->load->view('admin/edit_workplace', $data);
  }

  public function update_wrkplace()

  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('description') === '') {
      $Return['error'] = "Empty field found";
    } elseif ($this->input->post('img') === '') {
      $Return['error'] = "Upload Image";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('id');

    /* $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));*/


    $attachment  = $_FILES["img"]['name'];
    $images = '';


    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["img"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }






    if (empty($fname1)) {
      $fname1 = $this->input->post('himg');
    }



    $data = array(

      'ser_desc' => $this->input->post('description'),

      'ser_img'  => $fname1,


    );

    $this->db->where('id', $id);
    $result = $this->db->update('service', $data);
    if ($result == TRUE) {

      $Return['result'] = 'Home detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }


  public function list_catering()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->where('service_id', '3');
    $data['cateringdet'] = $this->db->get('service')->result_array();
    $this->load->view('admin/catering', $data);
  }

  public function edit_catering()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('service');
    $catering = $query->row();

    $data = array();
    if (isset($catering)) {
      $data  = array('id' => $catering->id, 'desc' => $catering->ser_desc, 'img' => $catering->ser_img);
    }



    $this->load->view('admin/edit_catering', $data);
  }

  public function update_catering()

  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('description') === '') {
      $Return['error'] = "Empty field found";
    } elseif ($this->input->post('img') === '') {
      $Return['error'] = "Upload Image";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('id');



    $attachment  = $_FILES["img"]['name'];
    $images = '';


    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["img"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }


    if (empty($fname1)) {
      $fname1 = $this->input->post('himg');
    }


    $data = array(

      'ser_desc' => $this->input->post('description'),

      'ser_img'  => $fname1,


    );

    $this->db->where('id', $id);
    $result = $this->db->update('service', $data);
    if ($result == TRUE) {

      $Return['result'] = 'Catering services detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function banner()
  {

    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $this->load->view('admin/banner');
  }

  public function edit_ban()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $id = $this->input->post('id');
    $this->db->select('id,ban_id,image,description,description1');
    $this->db->where('ban_id', $id);
    $aboutdet = $this->db->get('banners')->row();


    $data = array();
    if (isset($aboutdet)) {
      $data  = array('id' => $aboutdet->id, 'ban_id' => $aboutdet->ban_id, 'image' => $aboutdet->image, 'description' => $aboutdet->description, 'description1' => $aboutdet->description1);
    }


    $this->load->view('admin/edit_ban', $data);
  }


  public function update_banimg()
  {


    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    /* Server side PHP input validation */
    if ($this->input->post('description') === '') {
      $Return['error'] = "Empty field found";
    }/* elseif ($this->input->post('image')==='')
    (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))  {
       $Return['error'] = "Upload Image";
    }
      */

    if ($Return['error'] != '') {
      $this->output($Return);
    }


    $id = $this->input->post('id');
    $des = $this->input->post('description');
    $des1 = $this->input->post('description1');





    if (is_uploaded_file($_FILES['image1']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['image1']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["image1"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["image1"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }


    if (empty($fname1)) {
      $fname1 = $this->input->post('himg');
    }
    if (empty($des)) {
      $des = $this->input->post('desc');
    }
    if (empty($des1)) {
      $des1 = $this->input->post('desc1');
    }


    $data = array(

      'description' => $des,
      'description1' => $des1,

      'image'  => $fname1,


    );

    $this->db->where('id', $id);
    $result = $this->db->update('banners', $data);
    if ($result == TRUE) {

      $Return['result'] = 'Banners updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function new_team_img()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $data['teamimg'] = $this->db->get('team')->result_array();
    $this->load->view('admin/team_img', $data);
  }


  public function add_team_img()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');




    // $password = md5($this->input->post('password'));
    if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
      $Return['error'] = "Display image required";
    } else {
      if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        //checking image type
        $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
        $filename = $_FILES['img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {
          $tmp_name = $_FILES["img"]["tmp_name"];
          $profile = "assets/images/home/";
          $set_img = base_url() . "assets/images/home/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["img"]["name"]);
          $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;

          move_uploaded_file($tmp_name, $profile . $newfilename);
          $fname = $newfilename;

          if (!empty($features)) {
            $feat = implode(',', $features);
          }
          $data = array(
            'image' => $fname,
          );

          $result = $this->db->insert('team', $data);
          if ($result != false) {
            $Return['result'] = "Team details added successfully";
          } else {
            $Return['error'] = "Error";
          }
          $this->output($Return);
          exit;
        } else {
          $Return['error'] = "Invalid file format";
        }
        if ($Return['error'] != '') {
          $this->output($Return);
        }
      }
    }
    if ($Return['error'] != '') {
      $this->output($Return);
    }
  }



  public function edit_team_img()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $id = $this->uri->segment(3);


    $this->db->select('*');
    $this->db->where('id', $id);
    $query = $this->db->get('team');
    $banner = $query->row();

    $data = array();
    if (isset($banner)) {
      $data  = array('id' => $banner->id, 'img' => $banner->image);
    }



    $this->load->view('admin/edit_team_img', $data);
  }




  public function update_team_img()
  {

    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $Return = array('result' => '', 'error' => '');

    $id = $this->input->post('id');



    //  $Return['error'] = "Display image required";

    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
      //checking image type
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["img"]["tmp_name"];
        $profile = "assets/images/home/";
        $set_img = base_url() . "assets/images/home/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["img"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname = $newfilename;
        if (!empty($features)) {
          $feat = implode(',', $features);
        }
        $data = array(

          'image' => $fname,
        );
        $this->db->where('id', $id);
        $result = $this->db->update('team', $data);
        if ($result != false) {
          $Return['result'] = "Banner added successfully";
        } else {
          $Return['error'] = "Error";
        }
        $this->output($Return);
        exit;
      } else {
        $Return['error'] = "Invalid file format";
      }
      if ($Return['error'] != '') {
        $this->output($Return);
      }
    }


    if ($Return['error'] != '') {

      $this->output($Return);
    }
  }



  public function commitment()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }
    $this->db->select('id,description1,description2,image');
    $commitmentdet = $this->db->get('commitment')->row();


    $data = array();
    if (isset($commitmentdet)) {

      $data  = array('id' => $commitmentdet->id, 'description1' => $commitmentdet->description1, 'description2' => $commitmentdet->description2, 'image' => $commitmentdet->image);
    }
    $this->load->view('admin/commitment', $data);
  }

  public function update_commitment()
  {
    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');


    if ($this->input->post('description1') === '') {
      $Return['error'] = "Empty field found 1";
    } else if ($this->input->post('description2') === '') {
      $Return['error'] = "Empty field found 2";
    }


    if ($Return['error'] != '') {
      $this->output($Return);
    }

    $id = $this->input->post('id');

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["image"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["image"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }

    if (empty($fname1)) {
      $fname1 = $this->input->post('himage');
    }


    $data = array(

      'description1' => $this->input->post('description1'),
      'description2' => $this->input->post('description2'),
      'image'  => $fname1,


    );

    $this->db->where('id', $id);
    $result = $this->db->update('commitment', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'Home detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

  public function career()
  {
    //$this->load->view('admin/career_why');


    $this->db->select('*');

    $query = $this->db->get('careers');
    $careerwhy = $query->row();

    $data = array();
    if (isset($careerwhy)) {
      $data  = array(
        'id' => $careerwhy->id, 'title' => $careerwhy->title, 'title_ar' => $careerwhy->title_ar, 'description' => $careerwhy->description, 'description_ar' => $careerwhy->description_ar,
        'desc_img' => $careerwhy->desc_img, 'know_more' => $careerwhy->know_more, 'know_more_ar' => $careerwhy->know_more_ar, 'upload_img' => $careerwhy->upload_img,
        'upload_title' => $careerwhy->upload_title, 'upload_title_ar' => $careerwhy->upload_title_ar, 'upload_desc' => $careerwhy->upload_desc, 'upload_desc_ar' => $careerwhy->upload_desc_ar, 'search_img' => $careerwhy->search_img,
        'search_title' => $careerwhy->search_title, 'search_title_ar' => $careerwhy->search_title_ar, 'search_desc' => $careerwhy->search_desc, 'search_desc_ar' => $careerwhy->search_desc_ar
      );
    }

    $data['sec2'] = $this->db->get('career_acc')->result_array();

    $this->load->view('admin/career_why', $data);
  }


  public function update_career()
  {

    $session = $this->session->userdata('username');
    if (empty($session)) {
      redirect('admin');
    }

    $Return = array('result' => '', 'error' => '');

    if ($Return['error'] != '') {
      $this->output($Return);
    }

    $id = $this->input->post('id');

    if (is_uploaded_file($_FILES['desc_img']['tmp_name'])) {
      $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif', 'svg');
      $filename = $_FILES['desc_img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)) {
        $tmp_name = $_FILES["desc_img"]["tmp_name"];
        $profile = "assets/images/";
        $set_img = base_url() . "assets/images/";
        $name = basename($_FILES["desc_img"]["name"]);
        $newfilename = 'ser_' . round(microtime(true)) . '.' . $ext;
        move_uploaded_file($tmp_name, $profile . $newfilename);
        $fname1 = $newfilename;
        //$images[] =  $fname ;
      } else {
        $Return['error'] = "Invalid file format";
        $this->output($Return);
        exit;
      }
    }

    if (empty($fname1)) {
      $fname1 = $this->input->post('himage');
    }


    $data = array(

      'title' => $this->input->post('title'),
      'title_ar' => $this->input->post('title_ar'),
      'description' => $this->input->post('description'),
      'description_ar' => $this->input->post('description_ar'),
      'know_more' => $this->input->post('know_more'),
      'know_more_ar' => $this->input->post('know_more_ar'),
      'upload_title' => $this->input->post('upload_title'),
      'upload_title_ar' => $this->input->post('upload_title_ar'),
      'upload_desc' => $this->input->post('upload_desc'),
      'upload_desc_ar' => $this->input->post('upload_desc_ar'),
      'search_title' => $this->input->post('search_title'),
      'search_title_ar' => $this->input->post('search_title_ar'),
      'search_desc' => $this->input->post('search_desc'),
      'search_desc_ar' => $this->input->post('search_desc_ar'),

      'desc_img'  => $fname1,
      // 'upload_img'  => $fname2,
      // 'search_img'  => $fname3,

    );

    $this->db->where('id', $id);
    $result = $this->db->update('careers', $data);
    if ($result == TRUE) {

      //get setting info 

      $Return['result'] = 'Home detail updated .';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
}
