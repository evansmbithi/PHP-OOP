<?php
// Define a class
class User {
  // Properties (attributes)
  // public properties can be accessed anywhere outside the class
  public $name2;
  // property with a default value
  public $name = 'Evans';

  // Methods (functions)
  // $this to access properties within the same class
  public function sayHello(){
    return $this->name . ' says hello';
  }

  public function sayHi(){
    return $this->name2 . ' says Hi!';
  }
}

// instantiate a user object from the User class
$user1 = new User();
echo $user1->sayHello();
echo '<br>';

// Create a new user
$user2 = new User();
$user2->name2 = 'Mbithi';
echo $user2->sayHi();

// it's not good practice to access these properties openly. Rather use methods such as constructors