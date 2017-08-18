<?php
namespace Bip\Entitys;

use Doctrine\ORM\Mapping AS ORM;
use Bip\Entitys\Contract\Entity;

/**
 * @ORM\Table("users")
 * @ORM\Entity
 */
class User implements Entity {
  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;
  /**
   * @ORM\Column(type="string")
   */
  private $name;
  /**
   * @ORM\Column(type="string")
   */
  private $email;
  /**
   * @ORM\Column(type="string")
   */
  private $password;
  /**
   * @ORM\Column(type="string")
   */
  private $userName;
  /**
   * @ORM\Column(type="boolean")
   */
  private $isActive;
  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;
  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  public function getName() {
    return $this->name;
  }
  public function setName($name) {
    $this->name = $name;
  }

  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = $id;
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }
  public function setPassword($password) {
    $this->password = $password;
  }

  public function getUserName() {
    return $this->userName;
  }
  public function setUserName($username) {
    $this->userName = $username;
  }

  public function getIsActive() {
    return $this->isActive;
  }
  public function setIsActive($isActive) {
    $this->isActive = $isActive;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }
  public function setUpdatedAt($updatedAt) {
    $this->updatedAt = $updatedAt;
  }
}