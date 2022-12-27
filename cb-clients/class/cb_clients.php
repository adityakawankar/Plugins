<?php

class CB_CLIENTS {
	private $dir;
	private $assets_dir;
	private $assets_url;
	private $token;
	private $file;

	/**
	 * Constructor function.
	 * 
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function __construct( $file ) {
		$this->dir = dirname( $file );
		$this->file = $file;
		$this->version = '1.1';
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $file ) ) );
		$this->token = 'cb_clients';

		$this->addHooks();

	}

	/**
	 * Default options
	 * 
	 * @access private
	 * @return array
	 */
	private function getDefaultOptions(){
		return array();
	}

	/**
	 * Get Options
	 * 
	 * @access private
	 * @return array
	 */
	private function getOptions(){
		return get_option($this->token, $this->getDefaultOptions());
	}

	/**
	 * Convert item options to string
	 * 
	 * @access private
	 * @return string
	 */
	private function itemsOptionsToString($options){
		return implode(', ', $options);
	}


	/**
	 * Register various hooks
	 * 
	 * @access private
	 * @return void
	 */
	private function addHooks(){
		
		//Plugin Activation
		register_activation_hook($this->file, array(&$this, 'hookActivation'));
		
		//Plugin Deactivation
		register_deactivation_hook($this->file, array(&$this, 'hookDeactivation'));

		//WP Init
		add_action('init', array(&$this, 'hookRegisterPostType'));

		if ( is_admin() ) {

			add_action('admin_menu', array(&$this, 'hookAdminMenu'), 20);
			add_action('admin_print_styles', array(&$this, 'hookAdminPrintStyles'), 10);

			add_filter('enter_title_here', array(&$this, 'hookEnterTitleHere'));

		}

	}

	/**
	 * Hook: init
	 * 
	 * register post type
	 *
	 * @access public
	 * @return void
	 */
	public function hookRegisterPostType(){

		$labels = array(
			'name' => 'Clients',
			'singular_name' => 'Clients',
			'add_new' => 'Add New Clients',
			'add_new_item' => 'Add New Clients',
			'edit_item' => 'Edit Clients',
			'new_item' => 'New Clients',
			'all_items' => 'All Clients',
			'view_item' => 'View Clients',
			'search_items' => 'Search Clients',
			'not_found' =>  'No Clients found',
			'not_found_in_trash' => 'No Clients found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'Clients'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'client' ),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => true,
			'supports' => array('title', 'page-attributes', 'editor', 'thumbnail'),
			'menu_position' => 45,
		);

		register_post_type('cb_clients', $args);
		register_taxonomy(
			'clients_category',
			'cb_clients',
			array(
				'label' => 'Add New Clients Categories',
				'rewrite' => array('slug' => 'clients-category'),
				'hierarchical' => true,
				'public' => false,
				'show_ui' => true
			)
		);
		// register_taxonomy(
		// 	'clients_industry',
		// 	'cb_clients',
		// 	array(
		// 		'label' => 'Add New Industry',
		// 		'rewrite' => array('slug' => 'clients-industry'),
		// 		'hierarchical' => true,
		// 		'public' => false,
		// 		'show_ui' => true
		// 	)
		// );
	}

	/**
	 * Hook: enter_title_here
	 * 
	 * register post type
	 *
	 * @access public
	 * @return void
	 */
	public function hookEnterTitleHere($title){
		$screen = get_current_screen();

		if( 'cb_clients' == $screen->post_type ) {
			$title = 'Enter Our Eco System Name Here';
		}

		return $title;
	}

	/**
	 * Hook: admin_print_styles
	 * 
	 * @access public
	 * @return void
	 */
	public function hookAdminPrintStyles(){
		wp_register_style($this->token.'-admin', $this->assets_url.'/css/admin.css', array(), $this->version);
		wp_enqueue_style($this->token.'-admin');
	}

	/**
	 * Hook: admin_menu
	 * 
	 * @access public
	 * @return void
	 */
	public function hookAdminMenu(){
	}

	/**
	 * Hook: register_activation_hook
	 * 
	 * @access public
	 * @return void
	 */
	public function hookActivation(){
		update_option($this->token, $this->getDefaultOptions());
	}

	/**
	 * Hook: register_deactivation_hook
	 * 
	 * @access public
	 * @return void
	 */
	public function hookDeactivation(){
		delete_option($this->token);
	}

}

?>