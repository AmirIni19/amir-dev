<?php

namespace UxBuilder\Ajax;

class Posts {

  public function get_posts () {
    $post_id = array_key_exists( 'id', $_GET ) ? intval( $_GET['id'] ) : array();
    $post_ids = array_key_exists( 'values', $_GET ) ? flatsome_clean( $_GET['values'] ) : array();
    $option = array_key_exists( 'option', $_GET ) ? flatsome_clean( $_GET['option'] ) : array();

    // Return an error if nonce is invalid.
    check_ajax_referer( 'ux-builder-' . $post_id, 'security' );

    if ( empty( $post_ids ) ) {
      return wp_send_json_success( array() );
    }

    $posts = get_posts( array(
      'numberposts' => -1,
      'post__in' => is_array( $post_ids ) ? $post_ids : array( $post_ids ),
      'orderby' => 'post__in',
      'ignore_sticky_posts' => true,
      'post_type' => isset( $option['post_type'] ) ? $option['post_type'] : get_post_types(),
      'suppress_filters' => false
    ) );

    $items = array_map( function ( $post ) {
      return array(
        'id' => $post->ID,
        'title' => $post->post_title,
      );
    }, $posts );

    wp_send_json_success( $items );
  }

  public function search_posts() {
    $post_id = array_key_exists( 'id', $_GET ) ? intval( $_GET['id'] ) : array();
    $query = array_key_exists( 'query', $_GET ) ? sanitize_text_field( $_GET['query'] ) : array();
    $option = array_key_exists( 'option', $_GET ) ? $_GET['option'] : array();

    // Return an error if nonce is invalid.
    check_ajax_referer( 'ux-builder-' . $post_id, 'security' );

    $posts = get_posts( apply_filters( 'ux_builder_ajax_posts_search_posts_get_posts_args', array(
      's' => $query,
      'numberposts' => 25,
      'ignore_sticky_posts' => true,
      'post_type' => isset( $option['post_type'] ) ? flatsome_clean( $option['post_type'] ) : null,
      'suppress_filters' => false
	) ) );

      // Get relative url's for all found posts.
      foreach ( $posts as &$post) {
        $link = parse_url( get_permalink( $post ) );
        $post->permalink = $link['path'];
      }

      $items = array_map( function ( $post ) {
        return array(
          'id' => $post->ID,
          'title' => $post->post_title
        );
      }, $posts );

      wp_send_json_success( $items );
    }
  }
