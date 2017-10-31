<?php

/**
 * Register the menu metabox
 *
 * @return void
 */
function vpmml_add_nav_menu_metabox() {
	add_meta_box(
		'vpmml',
		__( 'Menu Layout' ),
		'vpmml_nav_menu_metabox',
		'nav-menus',
		'side',
		'default'
	);
}
add_action( 'admin_head-nav-menus.php', 'vpmml_add_nav_menu_metabox' );

/**
 * Menu meta box code
 * @return void
 */
function vpmml_nav_menu_metabox( $object ) {
	global $nav_menu_selected_id;

	// Get the item types
	$types = vpmml_get_item_types();

	// Empty options array
	$options = array();

	// Build each item for the menu checklist walker
	foreach ( $types as $type => $name ) {
		$options[ $name ] = new VPMML_Item( $type, $name );
	}

	// Get the checklist walker
	$walker = new Walker_Nav_Menu_Checklist( array() );
	?>
	<div id="menu-layout" class="taxonomydiv">
		<div id="tabs-panel-menu-layout-all" class="tabs-panel tabs-panel-active">
			<ul id="menu-layoutchecklist" class="categorychecklist form-no-clear">
				<?php
				// Output the checkboxes
				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $options ),
					0,
					(object) array( 'walker' => $walker )
				);
				?>
			</ul>
		</div>

		<p class="button-controls">
			<span class="add-to-menu">
				<input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>" name="add-menu-layout-menu-item" id="submit-menu-layout" />
				<span class="spinner"></span>
			</span>
		</p>
	</div>
	<?php
}
