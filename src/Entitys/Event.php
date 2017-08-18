<?php
namespace Bip\Entitys;

use Doctrine\ORM\Mapping AS ORM;
use Bip\Entitys\Contract\Entity;

/**
 * @ORM\Table("events")
 * @ORM\Entity
 */
class Event implements Entity {
  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;
  /**
   * @ORM\Column(type="string")
   */
  private $title;
  /**
   * @ORM\Column(type="string")
   */
  private $description;
  /**
   * @ORM\Column(type="text")
   */
  private $content;
  /**
   * @ORM\Column(type="string")
   */
  private $venue;
  /**
   * @ORM\Column(type="string")
   */
  private $address;
  /**
   * @ORM\Column(type="string")
   */
  private $startDate;
  /**
   * @ORM\Column(type="string")
   */
  private $endDate;
  /**
   * @ORM\Column(type="string")
   */
  private $startTime;
  /**
   * @ORM\Column(type="string")
   */
  private $endTime;
  /**
   * @ORM\Column(type="boolean")
   */
  private $isActive;
  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;
  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  public function getTitle() {
    return $this->title;
  }
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = $id;
  }

  public function getDescription() {
    return $this->description;
  }
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getContent() {
    return $this->content;
  }
  public function setContent($content) {
    $this->content = $content;
  }

  public function getVenue() {
    return $this->venue;
  }
  public function setVenue($venue) {
    $this->venue = $venue;
  }

  public function getAddress() {
    return $this->address;
  }
  public function setAddress($address) {
    $this->address = $address;
  }

  public function getStartDate() {
    return $this->startDate;
  }
  public function setStartDate($startDate) {
    $this->startDate = $startDate;
  }

  public function getEndDate() {
    return $this->endDate;
  }
  public function setEndDate($endDate) {
    $this->endDate = $endDate;
  }
  
  public function getStartTime() {
    return $this->startTime;
  }
  public function setStartTime($startTime) {
    $this->startTime = $startTime;
  }

  public function getEndTime() {
    return $this->endTime;
  }
  public function setEndTime($endTime) {
    $this->endTime = $endTime;
  }
  
  public function getIsActive() {
    return $this->isActive;
  }
  public function setIsActive($isActive) {
    $this->isActive = $isActive;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }
  public function setUpdatedAt($updatedAt) {
    $this->updatedAt = $updatedAt;
  }
}