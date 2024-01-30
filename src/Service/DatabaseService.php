<?php

namespace Drupal\monitoring_tool_client\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\update\UpdateProcessorInterface;

/**
 * Class DatabaseService.
 *
 * The DatabaseService class.
 */
class DatabaseService implements DatabaseServiceInterface {

  /**
   * Configuration manager.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Update processor.
   *
   * @var \Drupal\update\UpdateProcessorInterface
   */
  protected $updateProcessor;

  /**
   * CollectModulesService constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Configuration manager.
   * @param \Drupal\update\UpdateProcessorInterface $update_processor
   *   Update processor.
   */
  public function __construct(ConfigFactoryInterface $config_factory, UpdateProcessorInterface $update_processor) {
    $this->configFactory = $config_factory;
    $this->updateProcessor = $update_processor;
  }

  /**
   * {@inheritdoc}
   */
  public function getUpdates() {
    $updates = [];
    $settings = $this->configFactory->get('monitoring_tool_client.settings');
    $skip = $settings->get('skip_drupal_database_update');

    if (!$skip) {
      $data = $this->updateProcessor->fetchData();
      $updates = $data['projects'];
    }

    return $updates;
  }

}
