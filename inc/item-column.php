<?php

/**
 * Register admin CSS for this field
 *
 * @return void
 */
function vpmml_column__admin_css() {
?>
<style>
.menu-item-vpmml-column .field-url,
.menu-item-vpmml-column .field-url + p.description,
.menu-item-vpmml-column .nmi-div,
.menu-item-vpmml-column .is-submenu,
.menu-item-vpmml-column .item-type {
	display: none !important;
}
</style>
<?php
}

add_action( 'admin_footer', 'vpmml_column__admin_css' );
