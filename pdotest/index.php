<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'pdotest';

  // set DSN
  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

  // create PDO instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // set default fetch mode instead of having to call PDO::FETCH_OBJ everytime

  $name = 'Humble Anthony';
  $email = 'humbleanthony@gmail.com';
  $status = 'guest';
  $data = [
    'name' => $name,
    'email' => $email,
    'status' => $status
  ]; // database [ label => values ]

  $sql = 'INSERT INTO users(name, email, status) VALUES(:name, :email, :status)';
  $stmt = $pdo->prepare($sql);
  // $stmt->execute($data);
  echo 'User Added successfully <br/>';

  $status = 'admin';
  $sql = 'SELECT * FROM users';
  // $sql = 'SELECT * FROM users WHERE status= :status';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  // $stmt->execute(['status' => $status]); // associate the :status placeholder with the value of $status
  $users = $stmt->fetchAll();
  // $users = $stmt->fetchAll(PDO::FETCH_OBJ); // we don't need this since it's already set by default.

  foreach($users as $user){
    // echo $user['name'] . '<br/>';
    echo $user->name . '<br/>';
  }