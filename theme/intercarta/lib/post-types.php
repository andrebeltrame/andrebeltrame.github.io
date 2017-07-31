<?php

/**
 * Register Custom Post Type
 */
function testimonials_post_type() {

  $labels = array(
    'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'intercarta' ),
    'singular_name'         => _x( 'Depoimento', 'Post Type Singular Name', 'intercarta' ),
    'menu_name'             => __( 'Depoimentos', 'intercarta' ),
    'name_admin_bar'        => __( 'Depoimento', 'intercarta' ),
  );
  $args = array(
    'label'                 => __( 'Depoimento', 'intercarta' ),
    'description'           => __( 'Depoimentos dos clientes da INTERCARTA', 'intercarta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-admin-comments',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'rewrite'               => false,
    'capability_type'       => 'page',
  );
  register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonials_post_type', 0 );
