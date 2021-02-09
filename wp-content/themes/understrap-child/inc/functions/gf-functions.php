<?php
// populate ACF select field options with Gravity Forms
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=select_gf_form_id', 'acf_populate_gf_forms_ids' );

// populate gravity form select field chapter posts
function chapter_posts( $form ) {
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'chapter_posts' ) === false ) {
            continue;
        }
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'post_type=chapter&numberposts=-1&post_status=publish' );
        $choices = array();
        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Chapter';
        $field->choices = $choices;
    }
    return $form;
}
add_filter( 'gform_pre_render_1', 'chapter_posts' );
add_filter( 'gform_pre_validation_1', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_1', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_1', 'chapter_posts' );
add_filter( 'gform_pre_render_4', 'chapter_posts' );
add_filter( 'gform_pre_validation_4', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_4', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_4', 'chapter_posts' );
add_filter( 'gform_pre_render_9', 'chapter_posts' );
add_filter( 'gform_pre_validation_9', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_9', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_9', 'chapter_posts' );
add_filter( 'gform_pre_render_13', 'chapter_posts' );
add_filter( 'gform_pre_validation_13', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_13', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_13', 'chapter_posts' );
add_filter( 'gform_pre_render_14', 'chapter_posts' );
add_filter( 'gform_pre_validation_14', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_14', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_14', 'chapter_posts' );
add_filter( 'gform_pre_render_16', 'chapter_posts' );
add_filter( 'gform_pre_validation_16', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_16', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_16', 'chapter_posts' );

function set_column( $input_info, $field, $column, $value, $form_id ) {
    return array( 'type' => 'select', 'choices' => 'Select Status,Depledged,Initiated,Neophyte' );
}
add_filter( 'gform_column_input_15_14_4', 'set_column', 10, 5 );