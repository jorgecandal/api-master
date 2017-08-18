<?php
namespace Bip\Controllers;

use Silex\Application;

class BaseController
{
  protected $app;

  public function __construct(Application $app) {
    $this->app = $app;
    header("Access-Control-Allow-Origin: *");
  }
}