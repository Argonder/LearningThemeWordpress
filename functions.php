<?php function csm_enqueue_style() {
	wp_enqueue_style ( 'csmnormalize',get_template_directory_uri().'/assets/css/normalize.css',false );


	wp_enqueue_style('csmcss',get_stylesheet_uri(),false);

	wp_enqueue_style('fontawesome-cdn',"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",array(),'4.7.0' );

	wp_enqueue_style('latofont','https://fonts.googleapis.com/css?family=Lato',false );
}
function csm_enqueue_script(){
	wp_enqueue_script( 'my-js','filename.js',false);
}
add_action ('wp_enqueue_scripts','csm_enqueue_style');
add_action('wp_enqueue_scripts' , 'csm_enqueue_script');


//////////////////////////////////////////////////////////////////////////

add_theme_support( 'custom-logo' , array (

		'height'      => 50,
        'width'       => 200,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array( 'site-title', 'site-description' )
    ));



function register_csm_menu() {
  register_nav_menu('csm-menu', 'menu du haut' );
}
add_action( 'init', 'register_csm_menu' );

add_theme_support( 'custom-header', $args );


$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/img/bandeau.jpg',
	'upload' => true,);

 register_default_headers( array (
	'bandeauDuHaut' => array (
		'url' => '%s/assets/img/bandeauDuHaut.jpg',
		'thumbnail_url' => '%/assets/img/bandeauDuHaut.jpg',
		'description' => _(' isen ' )
		),
	'bandeauCsm' => array (
		'url' => '%s/assets/img/bandeau.jpg',
		'thumbnail_url' => '%/assets/img/bandeau.jpg',
		'description' => _('csm')
		),
	));



add_action('init','create_post_type');
add_theme_support('post-thumbnails');
add_image_size('accueil-size',500,310,true);

 add_action('init','create_post_type');
 function create_post_type() {
 	register_post_type('accueil-news', array(
 		'labels' => array ( 
 			'name' => __('accueil News'),
 			'singular_name' => __ ('accueil News'),

 			),
 		
 		'public' => true,
 		'has_archive' => false,
 		'supports' => array ( 'title' , 'editor','thumbnail')
 		));
 }

 add_action( 'widgets_init', 'csm_widgets_init' );
function csm_widgets_init() {
    register_sidebar( array(
        'name'          =>  'Pied de Page 1',
        'id'            =>  'csm-footer-1',
        'description'   =>  'Widget pour le placement de la Google Map',
        'before_widget' => '<div id="%1$s" class="gmap %2$s">',
        'after_widget'  => '</div>',   
        'before_title'  => '<h3>',   
        'after_title'  => '</h3>'   
    ));

    register_sidebar( array(
        'name'          =>  'Pied de Page 2',
        'id'            =>  'csm-footer-2',
        'description'   =>  'Widget pour le placement de la Newsletter',
        'before_widget' => '<div id="%1$s" class="newsletter %2$s">',
        'after_widget'  => '</div>',   
        'before_title'  => '<h3>',   
        'after_title'  => '</h3>'   
    ));

    register_sidebar( array(
        'name'          =>  'Pied de Page 3',
        'id'            =>  'csm-footer-3',
        'description'   =>  'Widget pour le placement des Coordonnées de Contact',
        'before_widget' => '<div id="%1$s" class="contact %2$s">',
        'after_widget'  => '</div>',   
        'before_title'  => '<h3>',   
        'after_title'  => '</h3>'   
    ));
}

	

