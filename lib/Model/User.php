<?php

namespace MyApp\Model;

class User extends \MyApp\Model {
  public function create($values){
    $stmt = $this->db->prepare("insert into users (name, email, password, lawyer, created, modified) values (:name, :email, :password, :lawyer, now(), now())");
    $res = $stmt->execute([
      ':name' => $values['name'],
      ':email' => $values['email'],
      ':password' => password_hash($values['password'], PASSWORD_DEFAULT),
      ':lawyer' => $values['lawyer']
    ]);
    if ($res === false){
      throw new \MyApp\Exception\DuplicateEmail();
    }
  }

  public function login($values){
    $stmt = $this->db->prepare("select * from users where email = :email");
    $res = $stmt->execute([
      ':email' => $values['email'],
    ]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch();

    if(empty($user)){
      throw new \MyApp\Exception\UnmatchEmailOrPassword();
    }

    if(!password_verify($values['password'], $user->password)){
      throw new \MyApp\Exception\UnmatchEmailOrPassword();
    }

    return $user;
  }

  public function findAll(){
    $stmt = $this->db->query("select * from users where condition_flag = 1 order by id");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

  public function online($values){
    $stmt = $this->db->prepare("update users set condition_flag = 1 where email = :email");
    $stmt->execute([
      ':email' => $values['email']
    ]);
  }

  public function offline($values){
    $stmt = $this->db->prepare("update users set condition_flag = 0  where email =:email");
    $stmt->execute([
      ':email' => $values['email']
    ]);
  }

}
