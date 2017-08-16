<?php
namespace Bip\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RouterServiceProvider implements ServiceProviderInterface
{
  public function register(Container $app) {
    $app->get('/users/', 'user:index');
  }

}