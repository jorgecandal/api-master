<?php
namespace Bip\Controllers;

use Silex\Application;

class UserController
{
  private $app;

  public function __construct(Application $app) {
    $this->app = $app;
  }

  public function index() {
    return 'User Controller';
  }
}