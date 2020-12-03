<?php
class Users extends Controller
{
  public function __construct()
  {
  }
  public function register()
  {
    // check for Post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Proccess the Data 

      // Sanitize the Data 
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init the Data 
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'passowrd' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];
      // Validate the Email 
      if (empty($data['email'])) {
        $data['email_err'] = 'Please Enter Email';
      }
      // Validate name 
      if (empty($data['name'])) {
        $data['name_err'] = 'Please Enter Name';
      }
      // Valid Passowrd 
      if (empty($data['password'])) {
        $data['password_err'] = 'Please Enter Password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = ' Password must be atleast 6 words';
      }
      // Confirm Passord 
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password';
      } else {
        if ($data['password'] !== $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords not Match';
        }
      }
      // Make sure Error are Empty 
      if (empty($data['email_err'] && $data['name_err'] && $data['password_err'] && $data['confirm_password_err'])) {
        die('Success!');
      } else {
        // Load view with errors 
        $this->view('users/register', $data);
      }
      // End of isset function 

    } else {
      // Init Data
      $data = [
        'name' => '',
        'email' => '',
        'passowrd' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];
      // Load the view 
      $this->view('users/register', $data);
      echo 'load form';
    }
  }
  public function login()
  {
    // check for Post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Proccess The form 

    } else {
      // Init Data
      $data = [
        'email' => '',
        'passowrd' => '',
        'email_err' => '',
        'password_err' => '',

      ];
      // Load the view 
      $this->view('users/login', $data);
    }
  }
}
