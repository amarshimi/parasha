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
			'#data'  => $this->staticData(),
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

		return \Drupal::entityTypeManager()
		              ->getStorage( 'taxonomy_term' )
		              ->loadTree( self::PARASHOT_VID );
	}

	private function staticData() {
		return [
			'0.0.0' => [ 'name' => 'בראשית', ],
			'0.5.8' => [ 'name' => 'נח', ],
			'0.11.0' => [ 'name' => 'לך לך', ],
			'0.17.0' => [ 'name' => 'וירא', ],
			'0.22.0'  =>
				[
					'name' => 'חיי שרה',
				],
			'0.24.18' =>
				[
					'name' => 'תולדות',
				],
			'0.27.9'  =>
				[
					'name' => 'ויצא',
				],
			'0.31.3'  =>
				[
					'name' => 'וישלח',
				],
			'0.36.0'  =>
				[
					'name' => 'וישב',
				],
			'0.40.0'  =>
				[
					'name' => 'מקץ',
				],
			'0.43.17' =>
				[
					'name' => 'ויגש',
				],
			'0.46.27' =>
				[
					'name' => 'ויחי',
				],
			'1.0.0'   =>
				[
					'name' => 'שמות',
				],
			'1.5.1'   =>
				[
					'name' => 'וארא',
				],
			'1.9.0'   =>
				[
					'name' => 'בא',
				],
			'1.12.16' =>
				[
					'name' => 'בשלח',
				],
			'1.17.0'  =>
				[
					'name' => 'יתרו',
				],
			'1.20.0'  =>
				[
					'name' => 'משפטים',
				],
			'1.24.0'  =>
				[
					'name' => 'תרומה',
				],
			'1.26.19' =>
				[
					'name' => 'תצוה',
				],
			'1.29.10' =>
				[
					'name' => 'כי תשא',
				],
			'1.34.0'  =>
				[
					'name' => 'ויקהל - פקודי',
				],
			'1.37.20' =>
				[
					'name' => 'פקודי',
				],
			'2.0.0'   =>
				[
					'name' => 'ויקרא',
				],
			'2.5.0'   =>
				[
					'name' => 'צו',
				],
			'2.8.0'   =>
				[
					'name' => 'שמיני',
				],
			'2.11.0'  =>
				[
					'name' => 'תזריע-מצורע',
				],
			'2.13.0'  =>
				[
					'name' => 'מצורע',
				],
			'2.15.0'  =>
				[
					'name' => 'אחרי מות-קדושים',
				],
			'2.18.0'  =>
				[
					'name' => 'קדושים',
				],
			'2.20.0'  =>
				[
					'name' => 'אמור',
				],
			'2.24.0'  =>
				[
					'name' => 'בהר-בחוקותי',
				],
			'2.25.2'  =>
				[
					'name' => 'בחוקותי',
				],
			'3.0.0'   =>
				[
					'name' => 'במדבר',
				],
			'3.3.20'  =>
				[
					'name' => 'נשא',
				],
			'3.7.0'   =>
				[
					'name' => 'בהעלותך',
				],
			'3.12.0'  =>
				[
					'name' => 'שלח לך',
				],
			'3.15.0'  =>
				[
					'name' => 'קרח',
				],
			'3.18.0'  =>
				[
					'name' => 'חקת',
				],
			'3.21.0'  =>
				[
					'name' => 'בלק',
				],
			'3.24.9'  =>
				[
					'name' => 'פינחס',
				],
			'3.29.1'  =>
				[
					'name' => 'מטות-מסעי',
				],
			'3.32.0'  =>
				[
					'name' => 'מסעי',
				],
			'4.0.0'   =>
				[
					'name' => 'דברים',
				],
			'4.2.22'  =>
				[
					'name' => 'ואתחנן',
				],
			'4.6.11'  =>
				[
					'name' => 'עקב',
				],
			'4.10.25' =>
				[
					'name' => 'ראה',
				],
			'4.15.17' =>
				[
					'name' => 'שופטים',
				],
			'4.20.9'  =>
				[
					'name' => 'כי תצא',
				],
			'4.25.0'  =>
				[
					'name' => 'כי תבוא',
				],
			'4.28.8'  =>
				[
					'name' => 'נצבים-וילך',
				],
			'4.30.0'  =>
				[
					'name' => 'וילך',
				],
			'4.31.0'  =>
				[
					'name' => 'האזינו',
				],
			'4.32.0'  =>
				[
					'name' => 'וזאת הברכה',
				],
		];
	}
}
