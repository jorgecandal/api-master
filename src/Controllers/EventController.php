<?php
namespace Bip\Controllers;

use Bip\Entity\Event;
use Bip\Service\EMService;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends BaseController
{
  public function index() {

    $events = $this->app['orm.em']
      ->getRepository('Bip\Entity\Event')
      ->findAll();

    $build = SerializerBuilder::create()->build();

    return new Response($build->serialize($events, 
                                          'json', 
                                          SerializationContext::create()
                                           ->setGroups(array('list'))), 200);
  }

  public function get($id) {
    
    $id = (int) $id;

    $event = $this->app['orm.em']
      ->getRepository('Bip\Entitys\Event')
      ->find($id);

    $build = SerializerBuilder::create()->build();

    return new Response($build->serialize($event,
                                          'json',
                                          SerializationContext::create()
                                            ->setGroups(array('list'))), 200);
  }

  public function save(Request $request) {

    $data = $request->request->all();

    $event = new Event();
    $event->setTitle($data['title']);
    $event->setDescription($data['description']);
    $event->setContext($data['context']);
    $event->setAddress($data['address']);
    $event->setStartDate($data['start_date']);
    $event->setEndDate($data['end_date']);
    $event->setStartTime($data['start_time']);
    $event->setEndTime($data['end_time']);
    $user->setIsActive(true);
    $user->setCreatedAt(new \DateTime('now', new \DateTimeZone("America/Sao_Paulo")));
    $user->setUpdatedAt(new \DateTime('now', new \DateTimeZone("America/Sao_Paulo")));

    $em = new EMService($this->app['orm.em']);

    if (!$em->create($event)) {
      return $this->app->json(['msg' => 'Error to created a new event'], 401);
    }
    return $this->app->json(['msg' => 'Event created with success'], 200);
  }

  public function update(Request $request) {

    $data = $request->request->all();

    $event = $this->app['orm.em']
      ->getRepository('Bip\Entitys\Event')
      ->find($data['id']);

    foreach ($data as $key => $value) {
      $set = "set" . ucfirst($key);
      $user->$set($value);
    }

    $em = new EMService($this->app['orm.em']);

    if (!$em->update($event)) {
      return $this->app->json(['msg' => 'Error to update event'], 401);
    }
    return $this->app->json(['msg' => 'Event updated with success'], 200);
  }

  public function delete($id) {

    $id = (int) $id;

    $user = $this->app['orm.em']
      ->getRepository('Bip\Entitys\Event')
      ->find($id);

    $em = new EMService($this->app['orm.em']);

    if (!$em->delete($event)) {
      return $this->app->json(['msg' => 'Error to delete event'], 401);
    }
    return $this->app->json(['msg' => 'Event deleted with success'], 200);
  }
}
