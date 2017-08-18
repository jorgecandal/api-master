<?php
namespace Bip\Services;

use Bip\UnitTestCase;
use Bip\Entitys\User;
use Bip\Entitys\Event;
use Bip\Services\PasswordService;

class EMServiceTest extends UnitTestCase
{
  private $erUser;
  private $erEvent;

  public function setUp()
  {
    $this->erUser = $this->getDoctrineEntityRepositoryMock();
  
    $this->erUser->expects($this->any())
                 ->method('getRepository')
                 ->will($this->returnValue($this->erUser));
  
    $this->erUser->expects($this->any())
                 ->method('find')
                 ->will($this->returnValue(new User()));

    $this->erEvent = $this->getDoctrineEntityRepositoryMock();
    
    $this->erEvent->expects($this->any())
                  ->method('getRepository')
                  ->will($this->returnValue($this->erEvent));
  
    $this->erEvent->expects($this->any())
                  ->method('find')
                  ->will($this->returnValue(new Event()));
  }

  public function testInsertANewUser()
  {
    $password = new PasswordService();
    $password = $password->setPassword('123456')->generate();

    $user = new User();

    $user->setName("Son Goku");
    $user->setEmail("goku@dbz.jp");
    $user->setUserName("goku");
    $user->setPassword($password);
    $user->setIsActive(true);
    $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $userService->create($user);

    $this->assertInstanceOf("Bip\Entitys\User", $insert);
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidUserCreate()
  {
    $user = (object) [];
    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $userService->create($user);
  }

  public function testUpdateANewUser()
  {
    $password = new PasswordService();
    $password = $password->setPassword('123456')->generate();

    $user = $this->erUser->getRepository('Bip\Entitys\User')->find(1);

    $user->setName("Son Goku Edited");
    $user->setEmail("goku@dbz.jp");
    $user->setUserName("goku");
    $user->setPassword($password);
    $user->setIsActive(true);
    $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
    $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $update      = $userService->update($user);

    $this->assertInstanceOf("Bip\Entitys\User", $update);
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidUserUpdate() {
    $user = (object) [];
    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $userService->update($user);
  }
  
  public function testIfDeleteUserHasBeenSuccess() {
    $user = $this->erUser->getRepository("Bip\Entitys\User")->find(1);
    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $this->assertTrue($userService->delete($user));
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidUserDelete() {
    $user = (object) [];
    $userService = new EMService($this->getDoctrineEntityManagerMock());
    $this->assertTrue($userService->delete($user));
  }  

  public function testInsertANewEvent()
  {
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
    
    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $eventService->create($event);

    $this->assertInstanceOf("Bip\Entitys\Event", $insert);
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidEventCreate()
  {
    $event = (object) [];
    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $eventService->create($event);
  }

  public function testUpdateANewEvent()
  {
    $event = $this->erEvent->getRepository('Bip\Entitys\Event')->find(1);

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

    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $update       = $eventService->update($event);

    $this->assertInstanceOf("Bip\Entitys\Event", $update);
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidEventUpdate() {
    $event = (object) [];
    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $insert = $eventService->update($event);
  }
  
  public function testIfDeleteEventHasBeenSuccess() {
    $event = $this->erEvent->getRepository("Bip\Entitys\Event")->find(1);
    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $this->assertTrue($eventService->delete($event));
  }

  /**
   * @expectedException InvalidArgumentException
   * @expectedExceptionMessage Parameter invalid must be a Bip\Entity\Contract\Entity instance
   */
  public function testInvalidEventDelete() {
    $event = (object) [];
    $eventService = new EMService($this->getDoctrineEntityManagerMock());
    $this->assertTrue($eventService->delete($event));
  }  

}