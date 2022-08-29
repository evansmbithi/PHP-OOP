<?php
class User{
  protected $name = 'Evans';
  protected $age;

  public function __construct($name, $age){
    $this->name = $name;
    $this->age = $age;
  }
}

class Customer extends User{
  private $balance;

  public function __construct($name, $age, $balance){
    // static method for accessing the parent constructor
    parent::__construct($name, $age);
    $this->balance = $balance;
  }

  public function pay($amount){
    return $this->name . ' paid $' . $amount;
  }

  public function getBalance(){
    return $this->balance;
  }
}

$customer = new Customer('Terry', 23, 500);
echo $customer->pay(100);
echo '<br>Balance is: ' . $customer->getBalance();
echo $customer->balance; // Error: Cannot access private property