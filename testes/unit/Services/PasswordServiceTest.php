<?php
namespace Bip\Services;

use Bip\UnitTestCase;
use Bip\Services\PasswordService;

class PasswordServiceTest extends \PHPUnit\Framework\TestCase 
{
  private $password;

  public function setup() {
    $this->password = new PasswordService();
  }

  public function testIfPasswordHasBeenGeneratedWithSuccess() {
    $password = "CodeExpertsApps";
    $process = $this->password->setPassword($password);
    $hash = $process->generate();
    $this->assertTrue($process->isValidPassword($password, $hash));
  }
}