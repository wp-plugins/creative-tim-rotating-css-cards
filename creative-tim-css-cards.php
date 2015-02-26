<?php
/*
Plugin Name: Creative Tim - Rotating CSS Cards
Plugin URI: http://www.creative-tim.com/product/rotating-css-card
Description: Enable WP Admin to setup & display Creative Tim's Rotating CSS cards with a shortcoe. 
Author: Inbound Now
Version: 1.0.1
Author URI: http://www.twitter.com/atwellpub
Text Domain: creative-tim-css-cards
Domain Path: /lang/
*/



if ( !class_exists( 'Creative_Tim_Css_Cards' ) ) {

	class Creative_Tim_Css_Cards {


		public function __construct() {
			self::define_constants();
			self::load_hooks();
		}

		/*
		* Setup plugin constants
		*
		*/
		private static function define_constants() {

			define('CREATIVE_TIM_CARDS_CURRENT_VERSION', '1.0.1' );
			define('CREATIVE_TIM_CARDS_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
			define('CREATIVE_TIM_CARDS_PATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
			define('CREATIVE_TIM_CARDS_SLUG', plugin_basename( dirname(__FILE__) ) );
			define('CREATIVE_TIM_CARDS_FILE', __FILE__ );

		}
		
		/**
		*  Load hooks and filters
		*/
		public static function load_hooks() {
		
			/* Enqueue JS */
			add_action( 'wp_enqueue_scripts', array( __CLASS__ , 'enqueue_supportive_scripts' ) );
			
			/* Add CSS Card Shortcode */
			add_shortcode( 'card', array( __CLASS__, 'render_shortcode' ) );
			
			/* loads text domain for localization */
			add_action( 'init' , array( __CLASS__ , 'load_text_domain' ) );

		}

		/**
		*  Enqueue Supportive Scripts
		*/
		public static function enqueue_supportive_scripts( ) {

			/* BootStrap CSS */
			wp_register_style( 'bootstrap' , CREATIVE_TIM_CARDS_URLPATH . 'assets/css/bootstrap.css');
			wp_enqueue_style( 'bootstrap' );
			
			/* FontAwesome CSS */
			wp_register_style( 'fontawesome' , CREATIVE_TIM_CARDS_URLPATH . 'assets/css/font-awesome.min.css');
			wp_enqueue_style( 'fontawesome' );
			
			/* Creative Tim Rotating Card CSS */
			wp_register_style( 'creative-tim-rotating-card' , CREATIVE_TIM_CARDS_URLPATH . 'assets/css/rotating-card.css');
			wp_enqueue_style( 'creative-tim-rotating-card' );

		}

		/**
		*  Render [card] shortcode
		*/
		public static function render_shortcode( $atts , $content ) {
			$atts = shortcode_atts( array(
				'col_md' => '4',
				'col_sm' => '6',
				'cover_photo' => CREATIVE_TIM_CARDS_URLPATH . 'assets/images/rotating_card_thumb.png',
				'profile_photo' => CREATIVE_TIM_CARDS_URLPATH . 'assets/images/creative_tim.jpg',
				'title' => __('Creative Tim' , 'creative-tim-css-cards' ),
				'sub_title' => __('Start designing and developing faster.' , 'creative-tim-css-cards' ),
				'address' => 'Bld Victoriei 201, Bucharest, Romania',
				'company' => 'Creative Tim',
				'show_stars' => true,
				'star_count' => 5,
				'email' => '',
				'phone' => '',
				'website' => '',
				'twitter' => '',
				'facebook' => '',
				'googleplus' => '',
				'motto' => __('Start designing and developing faster.' , 'creative-tim-css-cards' )
				
			), $atts, 'card' );
			
			if (!$content) {
				$content = __('Tim symbolizes the creative spirit inside of each and everyone of us. A designer by trade, he enjoys making the World Wide Web a more beautiful place and helping others do the same.' , 'creative-tim-css-cards');
			}
			
			$html  ='<div class="col-md-'.$atts['col_md'].' col-sm-'.$atts['col_sm'].'">';
			$html .='		 <div class="card-container">';
			$html .='			<div class="card">';
			$html .='				<div class="front">';
			$html .='					<div class="cover">';
			$html .='						<img src="'.$atts['cover_photo'].'"/>';
			$html .='					</div>';
			$html .='					<div class="user">';
			$html .='						<img class="img-circle" src="'.$atts['profile_photo'].'"/>';
			$html .='					</div>';
			$html .='					<div class="content">';
			$html .='						<div class="main">';
			$html .='							<h3 class="name">'.$atts['title'].'</h3>';
			$html .='							<p class="profession">'.$atts['sub_title'].'</p>';
			if ($atts['location']) {
				$html .='							<h5><i class="fa fa-map-marker fa-link text-muted"></i>'.$atts['location'].'</h5>';
			}
			if ($atts['company']) {
				$html .='							<h5><i class="fa fa-building-o fa-fw text-muted"></i>'.$atts['company'].'</h5>';
			}
			if ($atts['email']) {
				$html .='							<h5><i class="fa fa-envelope-o fa-fw text-muted"></i> '.$atts['email'].'</h5>';
			}
			if ($atts['phone']) {
				$html .='							<h5><i class="fa fa-phone fa-fw text-muted"></i> '.$atts['phone'].'</h5>';
			}
			$html .='						</div>';
			$html .='						<div class="footer">';
			if ($atts['show_stars']) {
				$html .='							<div class="rating">';
				for ($i=0;$i<$atts['star_count'];$i++){
					$html .='								<i class="fa fa-star"></i>';			
				}
				$html .='							</div>';
			}
			$html .='						</div>';
			$html .='					</div>';
			$html .='				</div> <!-- end front panel -->';
			$html .='				<div class="back">';
			$html .='					<div class="header">';
			$html .='						<h5 class="motto">'.$atts['motto'].'</h5>';
			$html .='					</div> ';
			$html .='					<div class="content">';
			$html .='						<div class="main">';
			$html .=' 							'.$content;
			$html .='						</div>';
			$html .='					</div>';
			$html .='					<div class="footer">';
			$html .='						<div class="social-links text-center">';
			if ($atts['facebook']) {
				$html .='							<a href="'.$atts['facebook'].'" class="facebook" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>';
			}
			if ($atts['googleplus']) {
				$html .='							<a href="'.$atts['googleplus'].'" class="google" target="_blank"><i class="fa fa-google-plus fa-fw"></i></a>';
			}
			if ($atts['twitter']) {
				$html .='							<a href="'.$atts['twitter'].'" class="twitter" target="_blank"><i class="fa fa-twitter fa-fw"></i></a>';
			}			
			if ($atts['website']) {
				$html .='							<a href="'.$atts['website'].'" class="website" target="_blank"><i class="fa fa-link fa-fw text-muted"></i></a>';
			}
			$html .='						</div>';
			$html .='					</div>';
			$html .='				</div> <!-- end back panel -->';
			$html .='			</div> <!-- end card -->';
			$html .='		</div> <!-- end card-container -->';
			$html .='	</div> <!-- end col sm 3 -->';
			
			return $html;
		
		}
		
		/**
		*	Loads the correct .mo file for this plugin
		*
		*/
		public static function load_text_domain() {
			load_plugin_textdomain( 'inbound-pro' , false , INBOUND_PRO_SLUG . '/lang/' );
		}
	}



	new Creative_Tim_Css_Cards;
	
}