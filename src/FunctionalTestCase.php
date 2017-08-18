<?php
namespace Bip;

use Bip\Entitys\Event;
use Bip\Entitys\User;
use Bip\Services\EMService;
use Bip\Services\PasswordService;
use Doctrine\ORM\Tools\SchemaTool;
use GuzzleHttp\Client;

class FunctionalTestCase extends \PHPUnit\Framework\TestCase
{
  public function setUp() {
    $em = $this->getEntityManagerTest();
    $tool = new SchemaTool($em);
    $classes = $em->getMetadataFactory()->getAllMetadata();
    $tool->createSchema($classes);
    parent::setup();
  }

  public function tearDown() {
    $em = $this->getEntityManagerTest();
    $tool = new SchemaTool($em);
    $classes = $em->getMetadataFactory()->getAllMetadata();
    $tool->dropSchema($classes);
    parrent::tearDown();
  }

  public function getEntityManagerTest() {
    $entity = require __DIR__ . '/../testes/bootstrap.php';
    return $entity;
  }

  public function createUser() {
    $password = new PasswordService();
    $password = $password->setPassword('123456')->generate();

    $user = new User();
    $user->setName("Son Goku");
    $user->setEmail("goku@dbz.jp");
    $user->setPassword($password);
    $user->setUserName("goku");
    $user->setIsActive(true);
    $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

    $emService = new EMService($this->getEntityManagerTest());
    return $emService->create($user);
  }

  public function createEvent() {

    $event = new Event();
    $event->setTitle("Event Test");
    $event->setDescription("Description Event");
    $event->setContent("Content Event");
    $event->setVenue("Las Vegas");
    $event->setAddress("Address");
    $event->setStartDate("2016-10-10");
    $event->setEndDate("2016-10-10");
    $event->setStartTime("09:00");
    $event->setEndTime("22:00");
    $event->setIsActive(true);
    $event->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    $event->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

    $emService = new EMService($this->getEntityManagerTest());
    return $emService->create($event);
  }

  public function createClient() {
    $client = new Client(array('base_uri' => 'http://localhost:8000',
                               'request.options' => array('exceptions' => false)));
    return $client;
  }

}