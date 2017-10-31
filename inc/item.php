<?php
/**
 * Skeleton class for showing VPMML items in the menu editor
 *
 * @access public
 */

class VPMML_Item {
	public $object;
	public $object_id;
	public $title;
	public $url;
	public $db_id            = 0;
	public $menu_item_parent = 0;
	public $type             = 'custom';
	public $target           = '';
	public $attr_title       = '';
	public $classes          = array();
	public $xfn              = '';

	/**
	 * Set up some default values
	 *
	 * @param $type string
	 * @param $name string
	 * @return void
	 */
	public function __construct( $type, $name ) {
		$this->object    = esc_attr( 'vpmml-' . $type );
		$this->object_id = esc_attr( 'vpmml-' . $type );
		$this->title     = esc_attr( $name );
		$this->url       = esc_attr( '#vpmml-' . $type . '#' );
	}
}
