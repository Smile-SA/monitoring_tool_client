<?php

namespace Drupal\monitoring_tool_client\Service;

/**
 * Interface ModuleCollectorServiceInterface.
 *
 * The ModuleCollectorServiceInterface Interface.
 */
interface ModuleCollectorServiceInterface {

  /**
   * Will return list of all modules and drupal core.
   *
   * @return array
   *   List of modules and Drupal.
   */
  public function getModules();

}
