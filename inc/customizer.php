<?php
/**
 * VW Personal Trainer Theme Customizer
 *
 * @package VW Personal Trainer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_personal_trainer_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_personal_trainer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-personal-trainer' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_personal_trainer_left_right', array(
    	'title'      => __( 'General Settings', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_theme_options',array(
        'default' => __('Right Sidebar','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-personal-trainer'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-personal-trainer'),
            'Right Sidebar' => __('Right Sidebar','vw-personal-trainer'),
            'One Column' => __('One Column','vw-personal-trainer'),
            'Three Columns' => __('Three Columns','vw-personal-trainer'),
            'Four Columns' => __('Four Columns','vw-personal-trainer'),
            'Grid Layout' => __('Grid Layout','vw-personal-trainer')
        ),
	) );

	$wp_customize->add_setting('vw_personal_trainer_page_layout',array(
        'default' => __('One Column','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-personal-trainer'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-personal-trainer'),
            'Right Sidebar' => __('Right Sidebar','vw-personal-trainer'),
            'One Column' => __('One Column','vw-personal-trainer')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_personal_trainer_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_call_text',array(
		'label'	=> __('Add Phone Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_call',array(
		'label'	=> __('Add Phone Number','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_email_text',array(
		'label'	=> __('Add Email Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'EMAIL', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_email',array(
		'label'	=> __('Add Email Address','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_opening_time',array(
		'label'	=> __('Add Open Timming','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm ', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_header_search',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_personal_trainer_header_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','vw-personal-trainer'),
       'section' => 'vw_personal_trainer_topbar',
    ));
    
	//Slider
	$wp_customize->add_section( 'vw_personal_trainer_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_personal_trainer_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-personal-trainer'),
       'section' => 'vw_personal_trainer_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_personal_trainer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_personal_trainer_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_personal_trainer_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-personal-trainer' ),
			'description' => __('Slider image size (1500 x 590)','vw-personal-trainer'),
			'section'  => 'vw_personal_trainer_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
    
	//Popular Courses section
	$wp_customize->add_section( 'vw_personal_trainer_best_services_section' , array(
    	'title'      => __( 'Popular Courses', 'vw-personal-trainer' ),
		'priority'   => null,
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_section_title',array(
		'label'	=> __('Add Section Title','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'POPULAR COURSES', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_best_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_personal_trainer_best_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_personal_trainer_sanitize_choices',
	));
	$wp_customize->add_control('vw_personal_trainer_best_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display courses','vw-personal-trainer'),
		'description' => __('Image Size (533 x 333)','vw-personal-trainer'),
		'section' => 'vw_personal_trainer_best_services_section',
	));

	//Content Craetion
	$wp_customize->add_section( 'vw_personal_trainer_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-personal-trainer' ),
		'priority' => null,
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new vw_personal_trainer_Content_Creation( $wp_customize, 'vw_personal_trainer_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-personal-trainer' ),
		),
		'section' => 'vw_personal_trainer_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-personal-trainer' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_personal_trainer_footer',array(
		'title'	=> __('Footer','vw-personal-trainer'),
		'panel' => 'vw_personal_trainer_panel_id',
	));	
	
	$wp_customize->add_setting('vw_personal_trainer_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_personal_trainer_footer_text',array(
		'label'	=> __('Copyright Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_personal_trainer_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_personal_trainer_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Personal_Trainer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Personal_Trainer_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Personal Trainer', 'vw-personal-trainer' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-personal-trainer' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/personal-trainer-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-personal-trainer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-personal-trainer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_personal_trainer_Customize::get_instance();