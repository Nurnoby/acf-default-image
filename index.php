<!-- Adds a default image option to ACF image fields using the built in default value #ACF functionality -->

<?php //ignore - for gist formatting

// add default image setting to acf image field
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
	acf_render_field_setting( $field, array(
		'label'			=> 'Default Image',
		'instructions'		=> 'Appears when creating a new post',
		'type'			=> 'image',
		'name'			=> 'default_value',
	));
}

// show the default image
add_filter('acf/load_value/type=image', 'reset_default_image', 10, 3);
function reset_default_image($value, $post_id, $field) {
	if (!$value) {
		$value = $field['default_value'];
	}
	return $value;
}