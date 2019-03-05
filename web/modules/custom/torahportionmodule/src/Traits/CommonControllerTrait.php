<?php

namespace Drupal\torahportionmodule\Traits;
use Drupal\Core\Url;

/**
 * Functions added to this trait are used in the controllers.
 */
trait CommonControllerTrait
{

	/**
	 * @param $node
	 * @param $field
	 *
	 * @return null
	 */
	private function getNodeField($node, $field)
    {
        return $node->{$field} ? $node->get($field)->getString() : null;
    }


	/**
	 * @param $entity
	 *
	 * @return null|string
	 */
	private function getNodeImage($entity)
    {
        return isset($entity) ? file_create_url($entity->getFileUri()) : null;
    }

	/**
	 * @param $node
	 *
	 * @return \Drupal\Core\GeneratedUrl|string
	 */
	private function getNodeUrlAlias($node){
	    return Url::fromRoute('entity.node.canonical', ['node' => $node->id()])->toString();
    }
}
