<?php

namespace Drupal\drupal_search\Controller;

use Drupal\search_api\Entity\Index;
use Drupal\Core\Controller\ControllerBase;

/**
 * @class SearchController
 */
class SearchController extends ControllerBase {

  /**
   * Custom search page callback.
   */
  public function searchPage() {
    $index = Index::load('default');
    $query = $index->query();

    // Search for the 'php' keyword within elasticsearch documents.
    $query->keys('php');

    // Execute search.
    $results = $query->execute();

    return [
      '#markup' => var_dump(array_keys($results->getResultItems())),
    ];
  }

}
