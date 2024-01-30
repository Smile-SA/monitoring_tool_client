<?php

namespace Drupal\monitoring_tool_client\Service;

/**
 * Interface ClientApiServiceInterface.
 *
 * The ClientApiServiceInterface Interface.
 */
interface ClientApiServiceInterface {

  /**
   * Send HTTP request with modules list and database updates.
   */
  public function sendRequest();

}
