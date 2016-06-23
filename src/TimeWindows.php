<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

class TimeWindows extends DelivAPI {
  public $id = '04eac8c3-05cf-4d5b-80e3-6121b4229a2e';
  public $starts_at = '2014-01-29T05:00:00Z';
  public $ends_at = '2014-01-29T05:00:00Z';
  public $expires_at = '2014-01-29T05:00:00Z';

  /**
   * TimeWindows constructor.
   *
   * @param string $id
   * @param string $starts_at can be null
   * @param string $ends_at
   * @param string $expires_at
   */
  public function __construct($id = '04eac8c3-05cf-4d5b-80e3-6121b4229a2e', $starts_at = NULL, $ends_at = '2014-01-29T05:00:00Z', $expires_at = '2014-01-29T05:00:00Z') {
    $this->id = $id;
    $this->starts_at = $starts_at;
    $this->ends_at = $ends_at;
    $this->expires_at = $expires_at;
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return null|string
   */
  public function getStartsAt() {
    return $this->starts_at;
  }

  /**
   * @param null|string $starts_at
   */
  public function setStartsAt($starts_at) {
    $this->starts_at = $starts_at;
  }

  /**
   * @return string
   */
  public function getEndsAt() {
    return $this->ends_at;
  }

  /**
   * @param string $ends_at
   */
  public function setEndsAt($ends_at) {
    $this->ends_at = $ends_at;
  }

  /**
   * @return string
   */
  public function getExpiresAt() {
    return $this->expires_at;
  }

  /**
   * @param string $expires_at
   */
  public function setExpiresAt($expires_at) {
    $this->expires_at = $expires_at;
  }

}