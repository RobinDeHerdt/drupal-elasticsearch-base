<?php

namespace Drupal\drupal_search\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides an example resource.
 *
 * @RestResource(
 *   id = "example_resource",
 *   label = @Translation("Example resource"),
 *   uri_paths = {
 *     "canonical" = "/api/example/{id}",
 *   }
 * )
 */
class ExampleResource extends ResourceBase {

  /**
   * Delete an example entity based on ID.
   *
   * @param string $id
   *   The example ID.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The resource response.
   */
  public function delete(string $id): ResourceResponse {
    return new ResourceResponse(['test123'], 200);
  }

}
