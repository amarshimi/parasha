<?php
/**
 * Created by PhpStorm.
 * User: shimon
 * Date: 27/02/19
 * Time: 09:33
 */

namespace Drupal\torahportionmodule\Controller;


use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\torahportionmodule\Traits\CommonControllerTrait;

/**
 * Class MainController
 * @package Drupal\torahportionmodule\Controller
 */
class MainController extends ControllerBase {
	use CommonControllerTrait;



	private $langcode;


	public function __construct() {
		$this->langcode = \Drupal::languageManager()->getCurrentLanguage()->getId();

	}

	/**
	 * @return array
	 */
	public function render() {

		$data = $this->getHomePageData();

		return [
			'#theme' => 'homepage_articles',
			'#data'  => $data,
		];
	}

	/**
	 * @return Drupal\Core\Entity\Query\QueryInterface
	 */
	private function getHomePageData() {

		 $query = Drupal::entityQuery( 'node' )
		             ->condition( 'status', 1 )
		             ->condition( 'langcode', $this->langcode )
		             ->condition( 'type', 'article' )
		             ->sort( 'created', 'DESC' )
		             ->range( 0, 20 );

		$nids  = $query->execute();


		$nodes =  Node::loadMultiple( $nids );

		return array_map(function ($node){
			return [
				'title' => $this->getNodeField($node , 'title'),
				'img' => $this->getNodeImage($node->field_image->entity),
				'url' => $this->getNodeUrlAlias($node),
			];
		} , $nodes);

	}

}