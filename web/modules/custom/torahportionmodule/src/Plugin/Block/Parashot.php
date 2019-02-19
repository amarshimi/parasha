<?php

namespace Drupal\torahportionmodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\taxonomy\Entity\Term;

/**
 * Provides a 'Parashot' block.
 *
 * @Block(
 *  id = "parashot",
 *  admin_label = @Translation("Parashot"),
 * )
 */
class Parashot extends BlockBase {

	const PARASHOT_VID = 'parashot';
	/**
	 * {@inheritdoc}
	 */
	public function defaultConfiguration() {
		return [
		       ] + parent::defaultConfiguration();
	}


	/**
	 * {@inheritdoc}
	 */
	public function build() {

		return [
			'#theme' => 'parashot_hp',
			'#title' => $this->t( 'Parashot' ),
			'#data'  => $this->getParashot(),
		];
	}


	private function createParashot() {

		$p = $this->getParashot();
		foreach ( $p as $value ) {
			Term::create( [
				'name' => $value,
				'vid'  => 'parashot',
			] )->save();
		}

	}

	private function getParashot() {

		return  \Drupal::entityTypeManager()
		                     ->getStorage('taxonomy_term')
		                     ->loadTree(self::PARASHOT_VID);
	}
}
