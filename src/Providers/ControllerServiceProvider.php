<?php
namespace Bip\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Bip\Controllers\UserController;
use Bip\Controllers\EventController;

class ControllerServiceProvider implements ServiceProviderInterface
{
  public function register(Container $app) {

    $app['user'] = function(Container $app) {
      return new UserController($app);
    };

    $app['event'] = function(Container $app) {
      return new EventController($app);
    };

  }
}