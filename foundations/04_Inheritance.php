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
  private $amount;

  public function __construct($name, $age, $balance){
    // static method for accessing the parent constructor
    parent::__construct($name, $age);
    $this->balance = $balance;
  }

  public function pay($amount){
    $this->amount = $amount;
    return $this->name . ' paid $' . $this->amount;
  }

  public function getBalance(){
    $this->balance -= $this->amount;
    return $this->balance;
  }
}

$customer = new Customer('Terry', 23, 500);
echo $customer->pay(100);
echo '<br>Balance is: ' . $customer->getBalance();
// echo $customer->balance; // Error: Cannot access private property