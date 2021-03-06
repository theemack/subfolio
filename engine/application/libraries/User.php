<?php
class User {
  var $name;
  var $fullname;
  var $password;
  var $hashed_password;
  var $admin;
  var $groups;
  
  public function __construct($name, $array) {
    $this->name     = $name;
    
    $this->fullname        = isset($array['fullname']) ? "".$array['fullname'] : $name;
    $this->password        = isset($array['password']) ? "".$array['password'] : '';
    $this->hashed_password = isset($array['hashed_password']) ? "".$array['hashed_password'] : '';
    $this->admin           = isset($array['admin']) ? $array['admin'] : false;
  }
 
  public function set_groups($groups) {
    $this->groups = $groups;
  }

  public function get_groups() {
    return $this->groups;
  }
   
}
?>