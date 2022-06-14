<?php
// pasword validation
// use static properties to check if password length is greater than 6

class User{
  public $name;
  public $age;
  public static $minimum_length = 6;

  public static function validate_pass($pass){
    if(strlen($pass) >= self::$minimum_length){
      return true;
    }else{
      return false;
    }
  }
}

$password = 'incapremo';

if(User::validate_pass($password)){
  echo 'Password validator using static methods';
}else{
  echo 'password is NOT valid';
}