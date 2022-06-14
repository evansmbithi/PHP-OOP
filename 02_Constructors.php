<?php
class User {
  public $name;
  public $age;

  // Create a constructor (magic method)
  // Runs when an object is created
  // we can pass in the user's name and age upon instantiation of the user object via a constructor
  public function __construct($user_name, $user_age){
    // test output upon object instantiation
    // echo 'Constructor Ran!';
    echo 'A constructor is a method that runs automatically when you instantiate an object
    <hr>';

    // magic constant __CLASS__
    // shows which class has been instantiated
    echo 'Class ' . __CLASS__ . ' instantiated: <br>';

    // make the values passed part of the class properties
    $this->name = $user_name;
    $this->age = $user_age;
  }

  public function sayHello(){
    return $this->name . ' says Hello <br>';
  }

  // deconstructor for clean up and closing connection
  // Called when no other references are made to an object
  //  this will be called for every object created
  public function __destruct(){
    // echo 'Deconstructor ran!';
    echo __CLASS__ . ' destructed! <br>'; 
  }

}

// A constructor is a method that runs automatically when you instantiate an object
// $user1 = new User('Evans', 36);
// echo $user1->name . ' is ' . $user1->age . ' years old!';

// echo '<br>';

// $user2 = new User('Terry', 23);
// echo $user2->name . ' is ' . $user2->age . ' years old!';

// echo '<br>';

$user3 = new User('Mbithi', 12);
echo $user3->sayHello();
