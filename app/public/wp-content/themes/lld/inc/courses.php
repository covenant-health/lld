<?php
/**
 * Add the courses post type, custom taxes related to it,
 * make it work with REST, etc
 */

// Register Custom Post Type
function create_course_cpt() {

	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'covenant' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'covenant' ),
		'menu_name'             => __( 'Courses', 'covenant' ),
		'name_admin_bar'        => __( 'Course', 'covenant' ),
		'archives'              => __( 'Course Archives', 'covenant' ),
		'attributes'            => __( 'Course Attributes', 'covenant' ),
		'parent_item_colon'     => __( 'Parent Course:', 'covenant' ),
		'all_items'             => __( 'All Courses', 'covenant' ),
		'add_new_item'          => __( 'Add New Course', 'covenant' ),
		'add_new'               => __( 'Add New', 'covenant' ),
		'new_item'              => __( 'New Course', 'covenant' ),
		'edit_item'             => __( 'Edit Course', 'covenant' ),
		'update_item'           => __( 'Update Course', 'covenant' ),
		'view_item'             => __( 'View Course', 'covenant' ),
		'view_items'            => _x( 'View Courses', 'covenant' ),
		'search_items'          => __( 'Search Course', 'covenant' ),
		'not_found'             => __( 'Not found', 'covenant' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'covenant' ),
		'featured_image'        => __( 'Featured Image', 'covenant' ),
		'set_featured_image'    => __( 'Set featured image', 'covenant' ),
		'remove_featured_image' => __( 'Remove featured image', 'covenant' ),
		'use_featured_image'    => __( 'Use as featured image', 'covenant' ),
		'insert_into_item'      => __( 'Insert into course', 'covenant' ),
		'uploaded_to_this_item' => __( 'Uploaded to this course', 'covenant' ),
		'items_list'            => __( 'Courses list', 'covenant' ),
		'items_list_navigation' => __( 'Courses list navigation', 'covenant' ),
		'filter_items_list'     => __( 'Filter courses list', 'covenant' ),
	);
	$args = array(
		'label'                 => __( 'Courses', 'covenant' ),
		'description'           => __( 'This custom post type is used to create, store, and display new course listings offered by Covenant Health Learning & Leadership Development', 'covenant' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
		'taxonomies'            => array( 'location', 'instructor', 'program', 'path' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'          => true,
		'rest_base'             => 'courses',
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		//'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'course', $args );

}
add_action( 'init', 'create_course_cpt', 0 );

function create_courses_tax() {

	// Location taxonomy
	$location_labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'covenant' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'covenant' ),
		'menu_name'                  => __( 'Locations', 'covenant' ),
		'all_items'                  => __( 'All Locations', 'covenant' ),
		'parent_item'                => __( 'Parent Location', 'covenant' ),
		'parent_item_colon'          => __( 'Parent Location:', 'covenant' ),
		'new_item_name'              => __( 'New Location Name', 'covenant' ),
		'add_new_item'               => __( 'Add New Location', 'covenant' ),
		'edit_item'                  => __( 'Edit Location', 'covenant' ),
		'update_item'                => __( 'Update Location', 'covenant' ),
		'view_item'                  => __( 'View Location', 'covenant' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'covenant' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'covenant' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'covenant' ),
		'popular_items'              => __( 'Popular locations', 'covenant' ),
		'search_items'               => __( 'Search locations', 'covenant' ),
		'not_found'                  => __( 'Not Found', 'covenant' ),
		'no_terms'                   => __( 'No locations', 'covenant' ),
		'items_list'                 => __( 'Locations list', 'covenant' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'covenant' ),
	);
	$location_rewrite = array(
		'slug'                       => 'location',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$location_args = array(
		'labels'                     => $location_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'location',
		'rewrite'                    => $location_rewrite,
	);
	register_taxonomy( 'location', array( 'course' ), $location_args );

	// Instructor taxonomy
	$instructor_labels = array(
		'name'                       => _x( 'Instructors', 'Taxonomy General Name', 'covenant' ),
		'singular_name'              => _x( 'Instructor', 'Taxonomy Singular Name', 'covenant' ),
		'menu_name'                  => __( 'Instructors', 'covenant' ),
		'all_items'                  => __( 'All Instructors', 'covenant' ),
		'parent_item'                => __( 'Parent Instructor', 'covenant' ),
		'parent_item_colon'          => __( 'Parent Instructor:', 'covenant' ),
		'new_item_name'              => __( 'New Instructor Name', 'covenant' ),
		'add_new_item'               => __( 'Add New Instructor', 'covenant' ),
		'edit_item'                  => __( 'Edit Instructor', 'covenant' ),
		'update_item'                => __( 'Update Instructor', 'covenant' ),
		'view_item'                  => __( 'View Instructor', 'covenant' ),
		'separate_items_with_commas' => __( 'Separate instructors with commas', 'covenant' ),
		'add_or_remove_items'        => __( 'Add or remove instructors', 'covenant' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'covenant' ),
		'popular_items'              => __( 'Popular instructors', 'covenant' ),
		'search_items'               => __( 'Search Instructors', 'covenant' ),
		'not_found'                  => __( 'Not Found', 'covenant' ),
		'no_terms'                   => __( 'No instructors', 'covenant' ),
		'items_list'                 => __( 'Instructors list', 'covenant' ),
		'items_list_navigation'      => __( 'Instructors list navigation', 'covenant' ),
	);
	$instructor_rewrite = array(
		'slug'                       => 'instructor',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$instructor_args = array(
		'labels'                     => $instructor_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'instructor',
		'rewrite'                    => $instructor_rewrite,
	);
	register_taxonomy( 'instructor', array( 'course' ), $instructor_args );

	// Program taxonomy
	$program_labels = array(
		'name'                       => _x( 'Programs', 'Taxonomy General Name', 'covenant' ),
		'singular_name'              => _x( 'Program', 'Taxonomy Singular Name', 'covenant' ),
		'menu_name'                  => __( 'Programs', 'covenant' ),
		'all_items'                  => __( 'All Programs', 'covenant' ),
		'parent_item'                => __( 'Parent Program', 'covenant' ),
		'parent_item_colon'          => __( 'Parent Program:', 'covenant' ),
		'new_item_name'              => __( 'New Program Name', 'covenant' ),
		'add_new_item'               => __( 'Add New Program', 'covenant' ),
		'edit_item'                  => __( 'Edit Program', 'covenant' ),
		'update_item'                => __( 'Update Program', 'covenant' ),
		'view_item'                  => __( 'View Program', 'covenant' ),
		'separate_items_with_commas' => __( 'Separate programs with commas', 'covenant' ),
		'add_or_remove_items'        => __( 'Add or remove programs', 'covenant' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'covenant' ),
		'popular_items'              => __( 'Popular programs', 'covenant' ),
		'search_items'               => __( 'Search programs', 'covenant' ),
		'not_found'                  => __( 'Not Found', 'covenant' ),
		'no_terms'                   => __( 'No programs', 'covenant' ),
		'items_list'                 => __( 'Programs list', 'covenant' ),
		'items_list_navigation'      => __( 'Programs list navigation', 'covenant' ),
	);
	$program_rewrite = array(
		'slug'                       => 'program',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$program_args = array(
		'labels'                     => $program_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'program',
		'rewrite'                    => $program_rewrite,
	);
	register_taxonomy( 'program', array( 'course' ), $program_args );

	// Path taxonomy
	$path_labels = array(
		'name'                       => _x( 'Paths', 'Taxonomy General Name', 'covenant' ),
		'singular_name'              => _x( 'Path', 'Taxonomy Singular Name', 'covenant' ),
		'menu_name'                  => __( 'Paths', 'covenant' ),
		'all_items'                  => __( 'All Paths', 'covenant' ),
		'parent_item'                => __( 'Parent Path', 'covenant' ),
		'parent_item_colon'          => __( 'Parent Path:', 'covenant' ),
		'new_item_name'              => __( 'New Path Name', 'covenant' ),
		'add_new_item'               => __( 'Add New Path', 'covenant' ),
		'edit_item'                  => __( 'Edit Path', 'covenant' ),
		'update_item'                => __( 'Update Path', 'covenant' ),
		'view_item'                  => __( 'View Path', 'covenant' ),
		'separate_items_with_commas' => __( 'Separate paths with commas', 'covenant' ),
		'add_or_remove_items'        => __( 'Add or remove paths', 'covenant' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'covenant' ),
		'popular_items'              => __( 'Popular paths', 'covenant' ),
		'search_items'               => __( 'Search paths', 'covenant' ),
		'not_found'                  => __( 'Not Found', 'covenant' ),
		'no_terms'                   => __( 'No programs', 'covenant' ),
		'items_list'                 => __( 'Paths list', 'covenant' ),
		'items_list_navigation'      => __( 'Paths list navigation', 'covenant' ),
	);
	$path_rewrite = array(
		'slug'                       => 'path',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$path_args = array(
		'labels'                     => $path_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'path',
		'rewrite'                    => $path_rewrite,
	);
	register_taxonomy( 'path', array( 'course' ), $path_args );
}
add_action( 'init', 'create_courses_tax', 0);

function course_rewrite_rules() {
	add_rewrite_tag( '%course%', '([^/]+)', 'course=' );
	add_permastruct( 'courses', '/courses/%course%', false );
	add_rewrite_rule( '^courses/([^/]+)/([^/]+)/?','index.php?course=$matches[2]','top' );
}
add_action( 'init', 'course_rewrite_rules' );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	if( is_page( 'courses' ) ) {
		return 'class="btn btn-primary courses-next-page"';
	}
}

// WP-API stuff
add_action( 'rest_api_init', 'wp_rest_insert_tag_links' );
function wp_rest_insert_tag_links(){

	register_rest_field( 'course',
		'locations',
		array(
			'get_callback'    => 'wp_rest_get_location_links',
			'update_callback' => null,
			'schema'          => null,
		)
	);
	register_rest_field( 'course',
		'instructors',
		array(
			'get_callback'    => 'wp_rest_get_instructor_links',
			'update_callback' => null,
			'schema'          => null,
		)
	);
	register_rest_field( 'course',
		'programs',
		array(
			'get_callback'    => 'wp_rest_get_program_links',
			'update_callback' => null,
			'schema'          => null,
		)
	);
	register_rest_field( 'course',
		'paths',
		array(
			'get_callback'    => 'wp_rest_get_path_links',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}

function course_extra_data( $data, $post, $context ) {
	// We only want to modify the 'view' context, for reading posts
	if ( $context !== 'view' || is_wp_error( $data ) ) {
		// Here, we unset any data we don't want to see on the front end:
		unset( $data->data[ 'location' ] );
		unset( $data->data[ 'instructor' ] );
		unset( $data->data[ 'program' ] );
		unset( $data->data[ 'path' ] );
		unset( $data->data[ 'modified' ] );
		unset( $data->data[ 'modified_gmt' ] );
		unset( $data->data[ 'type' ] );
		unset( $data->data[ 'content' ] );
		unset( $data->data[ 'author' ] );
		unset( $data->data[ 'featured_media' ] );
		return $data;
	}

}
add_filter( 'rest_prepare_course', 'course_extra_data', 12, 3 );

function wp_rest_get_location_links( $post ){
	$course_locations = array();
	$locations = wp_get_post_terms( $post[ 'id' ], 'location', array( 'fields'=>'all' ) );

	foreach( $locations as $location ) {
		$term_link = get_term_link( $location );

		if( is_wp_error( $term_link ) ) {
			continue;
		}

		$course_locations[] = array( 'term_id'=>$location->term_id, 'name'=>$location->name, 'slug'=>$location->slug, 'link'=>$term_link);
	}

	return $course_locations;
}

function wp_rest_get_instructor_links( $post ){
	$course_instructors = array();
	$instructors = wp_get_post_terms( $post[ 'id' ], 'instructor', array( 'fields'=>'all' ) );

	foreach( $instructors as $instructor ) {
		$term_link = get_term_link( $instructor );

		if( is_wp_error( $term_link ) ) {
			continue;
		}

		$course_instructors[] = array( 'term_id'=>$instructor->term_id, 'name'=>$instructor->name, 'slug'=>$instructor->slug, 'link'=>$term_link);
	}

	return $course_instructors;
}

function wp_rest_get_program_links( $post ){
	$course_programs = array();
	$programs = wp_get_post_terms( $post[ 'id' ], 'program', array( 'fields'=>'all' ) );

	foreach( $programs as $program ) {
		$term_link = get_term_link( $program );

		if( is_wp_error( $term_link ) ) {
			continue;
		}

		$course_programs[] = array( 'term_id'=>$program->term_id, 'name'=>$program->name, 'slug'=> $program->slug, 'link'=>$term_link);
	}

	return $course_programs;
}

function wp_rest_get_path_links( $post ){
	$course_paths = array();
	$paths = wp_get_post_terms( $post[ 'id' ], 'path', array( 'fields'=>'all' ) );

	foreach( $paths as $path ) {
		$term_link = get_term_link( $path );

		if( is_wp_error( $term_link ) ) {
			continue;
		}

		$course_paths[] = array( 'term_id'=>$path->term_id, 'name'=>$path->name, 'slug'=> $path->slug, 'link'=>$term_link);
	}

	return $course_paths;
}

add_filter( 'rest_course_collection_params', 'change_post_per_page', 10, 1 );
function change_post_per_page( $params ) {
	if ( isset( $params['per_page'] ) ) {
		$params['per_page']['maximum'] = 500;
	}

	return $params;
}
