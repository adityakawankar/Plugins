<?php

class CB_AfterMarket {
	private $dir;
	private $assets_dir;
	private $assets_url;
	private $token;
	private $file;

	/**
	 * Constructor function.
	 * 
	 * @access public
	 * @since 2.0
	 * @return void
	 */
	public function __construct( $file ) {
		$this->dir = dirname( $file );
		$this->file = $file;
		$this->version = '3.0';
		$this->views_dir = trailingslashit( $this->dir ) . 'views';
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $file ) ) );
		$this->token = 'cb_aftermarket';

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
	 * Meta Box: Newsevent Meta
	 * 
	 *
	 * @access public
	 * @return void
	 */
	public function metaBoxAftermarketMeta($post, $args){
		$options = $this->getOptions();
		extract($options);

		$data = wp_parse_args(get_post_meta( $post->ID, $this->token, true), array(
			'date' => '',
			'location' => '',
			'url' => '',
			'other' => ''
		) );

		extract($data);

		include $this->views_dir.'/metabox.php';
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

		add_action('the_post', array(&$this, 'hookThePost'));

		if ( is_admin() ) {

			add_action('admin_menu', array(&$this, 'hookAdminMenu'), 20);
			add_action('admin_print_styles', array(&$this, 'hookAdminPrintStyles'), 10);
			add_action('admin_notices', array(&$this, 'hookAdminNotices'));

			// Add Metaboxes to Post Types
			//add_action('add_meta_boxes', array(&$this, 'hookMetaBoxes'));

			// Post Save
			add_action('save_post', array(&$this, 'hookSavePost'), 1, 2);

			add_filter('enter_title_here', array(&$this, 'hookEnterTitleHere'));
		}

	}

	/**
	 * Hook: the_post
	 *
	 * @access public
	 * @return void
	 */
	public function hookThePost(&$post){
		if($post->post_type != 'cb_aftermarket') return;

		$post->{$this->token} = wp_parse_args(get_post_meta( $post->ID, $this->token, true), array(
			'date' => '',
			'location' => '',
			'url' => '',
			'other' => ''
		) );

	}

	/**
	 * Hook: save_post
	 *
	 * @access public
	 * @return void
	 */
	public function hookSavePost($post_id, $post = NULL){

		if(empty($post_id) || empty($post)) return;
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if(is_int(wp_is_post_revision($post))) return;
		if(is_int(wp_is_post_autosave($post))) return;
		if(!current_user_can('edit_post', $post_id)) return;

		$data = isset($_POST[$this->token]) ? $_POST[$this->token] : array();
		if( empty($data) ) return;

		remove_action('save_post', array(&$this, 'hookSavePost'));

		unset($data['metabox']);

		$data = array_filter($data);

		update_post_meta($post_id, $this->token, $data);

		add_action('save_post', array(&$this, 'hookSavePost'));
	}

	/**
	 * Hook: add_meta_boxes
	 *
	 * @access public
	 * @return void
	 */
	public function hookMetaBoxes(){
		add_meta_box(
			'Aftermarket-meta',
			'News & Event Meta',
			array(&$this, 'metaBoxAftermarketMeta'),
			'cb_aftermarket',
			'normal',
			'default',
			array()
		);
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
			'name' => 'Aftermarket products',
			'singular_name' => 'Aftermarket products',
			'menu_name' => 'Aftermarket products',
			'add_new' => 'Add New Aftermarket products',
			'add_new_item' => 'Add New Aftermarket products',
			'edit' => 'Edit',
			'edit_item' => 'Edit Aftermarket products',
			'new_item' => 'New Aftermarket products',
			'view' => 'View Aftermarket products',
			'view_item' => 'View Aftermarket products',
			'search_items' => 'Search Aftermarket products',
			'not_found' => 'No Aftermarket products Found',
			'not_found_in_trash' => 'No Aftermarket products found in Trash'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'aftermarkets',
				'with_front' => true
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => true,
			'supports' => array(
				'title',
				'thumbnail',
			),
			'menu_position' => 58,
		);

		/*
		 * Register Post type
		 */
		register_post_type('cb_aftermarket', $args);

		/*
		 * Register Taxonomy
		 */
		register_taxonomy(
			'aftermarket_type',
			'cb_aftermarket',
			array(
				'label' => 'Types',
				'rewrite' => array('slug' => 'aftermarket'),
				'hierarchical' => true,
				'public' => false,
				'show_ui' => true
			)
		);
	}

	/**
	 * Hook: init
	 * 
	 * register post type
	 *
	 * @access public
	 * @return void
	 */
	public function hookEnterTitleHere($title){
		$screen = get_current_screen();

		if( 'cb_aftermarket' == $screen->post_type ) {
			$title = 'Enter Name';
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

	/**
	 * Hook: admin_notices
	 * 
	 * @access public
	 * @return void
	 */
	public function hookAdminNotices(){
		
	}

}

?>