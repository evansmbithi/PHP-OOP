<?php
// getters and setters
class User {
  // private modifiers can only be accessed inside a class
  // protected properties can be accessed within a class and within any class that extends it
  private $name;
  private $age;

  public function __construct($name, $age){
    $this->name = $name;
    $this->age = $age;
  }

  // Getter
  public function getName(){
    return $this->name;
  }

  // Setter
  public function setName($name){
   return $this->name = $name;
  }

  // __get MAGIC METHOD
  
  public function __get($property){
    if(property_exists($this, $property)){
      return $this->$property;
    }
  }

  // __set MAGIC METHOD
  // takes in a property you want to set and the value you want to set it to
  public function __set($property, $value){
    if(property_exists($this, $property)){
      $this->$property = $value;
    }
    return $this;
  }
}

$user1 = new User('John', 40);

// trying to access these properties raises an error because these can only be accessed from within the class itself: Cannot access private property User::$name
// echo $user1->name;

// Getters and setters allow access to private properties
// originally 'John' but now set to 'Mbithy'
$user1->setName('Mbithy');
echo $user1->getName();


// magic methods are useful when there's a bunch of properties that can be difficult to access via the getName and setName functions
// setter
// set age to 22
$user1->__set('age', 22);
// getter
echo $user1->__get('age');
