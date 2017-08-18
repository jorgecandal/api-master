<?php
namespace Bip\Services;

use Bip\Entitys\Contract\Entity;
use Doctrine\ORM\EntityManager;

class EMService
{
  /**
   * @var EntityManager
   */
  private $em;

  public function  __construct(EntityManager $em) {
    $this->em = $em;
  }

  public function create($entity) {
    if (!$entity instanceof Entity) {
      throw new \InvalidArgumentException("Parameter invalid must be a Bip\Entity\Contract\Entity instance");
    }
    $this->em->persist($entity);
    $this->em->flush();

    return $entity;
  }

  public function update($entity) {
    if (!$entity instanceof Entity) {
      throw new \InvalidArgumentException("Parameter invalid must be a Bip\Entity\Contract\Entity instance");
    }
    $this->em->merge($entity);
    $this->em->flush();

    return $entity;
  }

  public function delete($entity) {
    if (!$entity instanceof Entity) {
      throw new \InvalidArgumentException("Parameter invalid must be a Bip\Entity\Contract\Entity instance");
    }
    $this->em->remove($entity);
    $this->em->flush();

    return true;
  }

  /*
  public function addSubscription($user = null, $envet = null) {
    if (is_null($user) || is_null($event)) {
      throw new \Exception("Invalid Parameters");
    }

    $user->setEventsCollection($event);
    $user->setEventsCollection($user);

    $this->em->persist($user);
    $this->em->persist($event);

    $this->em->flush();
    return true;
  }
  */
}