<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
    }


// Read data using username and password
    public function login($data) {
        $sql = 'SELECT * FROM users WHERE uname = ? AND ustatus = ? ';
            $binds = array($data['username'],'A');
            $query = $this->db->query($sql, $binds);
        
       
        $password_hash = md5($data['password']) ;
        if ($query->num_rows() > 0) {
            $rw_password = $query->result();
            // print_r($rw_password);
// echo $rw_password[0]->upassword ;
// echo md5($data['password']) ;
           // echo json_encode($rw_password);
            if($password_hash==$rw_password[0]->upassword){
               $userid =  $rw_password[0]->id ;
                return $userid;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

      public function clean_post($post_name) {
       $name = trim($post_name);
       $Evalue = array('-','alert','<script>','</script>','</php>','<php>','<p>','\r\n','\n','\r','=',"'",'/','cmd','!',"('","')", '|');
       $post_name = str_replace($Evalue, '', $name); 
       $post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
      // $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");
       
       return $post_name;
    }

}
