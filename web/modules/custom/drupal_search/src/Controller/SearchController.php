<?php

namespace Drupal\drupal_search\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\Plugin\DataType\EntityAdapter;
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
    // Since this is an example implementation, a search input field is not needed.
    $query->keys('php');

    // Execute search.
    $results = $query->execute();

    $teasers = [];
    foreach ($results->getResultItems() as $item_id => $item) {
      /* @var EntityAdapter $entity_adapter */
      $entity_adapter = $index->loadItem($item_id);

      /* @var EntityInterface $entity */
      $entity = $entity_adapter->getEntity();
      $entity_type_id = $entity->getEntityTypeId();

      $entity_view_builder = $this->entityTypeManager()->getViewBuilder($entity_type_id);
      $teaser = $entity_view_builder->view($entity, 'teaser', $entity->language()->getId());
      $teaser['#search_api_excerpt'] = $item->getExcerpt();
      $teasers[] = $teaser;
    }

    return $teasers;
  }

}
