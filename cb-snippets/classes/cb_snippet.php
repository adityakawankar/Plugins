<?php

class CB_Snippet {
	private $dir;
	private $file;
	private $shortcode_name;
	private $template_directory_name;
	private $template_directory_path;
	private $snippet_extension;
	
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
		$this->version = '1.0';
		
		$this->shortcode_name = 'snippet';
		$this->snippet_extension = '.snippet.php';
		$this->template_directory_name = 'snippets';

		$this->template_directory_path = get_template_directory() . '/' . $this->template_directory_name;

		$this->addHooks();
	}


	/**
	 * Register various hooks
	 * 
	 * @access private
	 * @return void
	 */
	private function addHooks(){
		add_shortcode( $this->shortcode_name, array( &$this, 'processShortCode' ) );
	}

	/**
	 * Process ShortCode
	 *
	 * @access public
	 * @return void
	 */
	public function processShortCode( $_atts, $shortcode_content ){

		//fetches the file from the shortcode and then attaches '/' if necessary and assigns the extension to the file
		$_file_name = $this->template_directory_path . '/' . str_replace('.', '/', array_shift( $_atts ) ) . $this->snippet_extension;

		if( file_exists( $_file_name ) ){
			extract( $_atts );

			ob_start();
			require $_file_name;
			return ob_get_clean();
		}
		
		return '';
	}

}
?>