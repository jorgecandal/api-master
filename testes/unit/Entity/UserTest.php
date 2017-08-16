<?php
namespace Bip\Entitys;

use Bip\Entitys\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
  public function assertPreConditions() {
    $this->assertTrue(class_exists($class = 'Bip\Entitys\User'), 'Class not found: '.$class);
  }

  public function testIfGettersAndSettersHasWorking() {
    $user = new User();

    $user->setName("Name Test");
    $user->setEmail("email@email.com");
    $user->setPassword("123456");
    $user->setIsActive(true);
    $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    
  }
}