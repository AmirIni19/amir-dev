<?php
// [blog_posts]
function shortcode_latest_from_blog($atts, $content = null, $tag = '' ) {

	$defined_atts = $atts;

	extract($atts = shortcode_atts(array(
		"_id" => 'row-'.rand(),
		'style' => '',
		'class' => '',
		'visibility' => '',

		// Layout
		"columns" => '4',
		"columns__sm" => '1',
		"columns__md" => '',
		'col_spacing' => '',
		"type" => 'slider', // slider, row, masonery, grid
		'width' => '',
		'grid' => '1',
		'grid_height' => '600px',
		'grid_height__md' => '500px',
		'grid_height__sm' => '400px',
		'slider_nav_style' => 'reveal',
		'slider_nav_position' => '',
		'slider_nav_color' => '',
		'slider_bullets' => 'false',
	 	'slider_arrows' => 'true',
		'auto_slide' => 'false',
		'infinitive' => 'true',
		'depth' => '',
   		'depth_hover' => '',
		// Relay
		'relay' => '',
		'relay_control_result_count' => 'true',
		'relay_control_position' => 'bottom',
		'relay_control_align' => 'center',
		'relay_id' => '',
		'relay_class' => '',
		// posts
		'posts' => '8',
		'ids' => '', // Custom IDs
		'cat' => '',
		'category' => '', // Added for Flatsome v2 fallback
		'excerpt' => 'visible',
		'excerpt_length' => 15,
		'offset' => '',
		'orderby' => 'date',
		'order' => 'DESC',
		'tags' => '',
		'page_number' => '1',

		// Read more
		'readmore' => '',
		'readmore_color' => '',
		'readmore_style' => 'outline',
		'readmore_size' => 'small',

		// div meta
		'post_icon' => 'true',
		'comments' => 'true',
		'show_date' => 'badge', // badge, text
		'badge_style' => '',
		'show_category' => 'false',

		//Title
		'title_size' => 'large',
		'title_style' => '',

		// Box styles
		'animate' => '',
		'text_pos' => 'bottom',
	  	'text_padding' => '',
	  	'text_bg' => '',
	  	'text_size' => '',
	 	'text_color' => '',
	 	'text_hover' => '',
	 	'text_align' => 'center',
	 	'image_size' => 'medium',
	 	'image_width' => '',
	 	'image_radius' => '',
	 	'image_height' => '56%',
	    'image_hover' => '',
	    'image_hover_alt' => '',
	    'image_overlay' => '',
	    'image_depth' => '',
	    'image_depth_hover' => '',

	), $atts));

	// Stop if visibility is hidden
  if($visibility == 'hidden') return;

	ob_start();

	$classes_box = array();
	$classes_image = array();
	$classes_text = array();

	// Fix overlay color
    if($style == 'text-overlay'){
      $image_hover = 'zoom';
    }
    $style = str_replace('text-', '', $style);

	// Fix grids
	if($type == 'grid'){
	  if(!$text_pos) $text_pos = 'center';
	  $columns = 0;
	  $current_grid = 0;
	  $grid = flatsome_get_grid($grid);
	  $grid_total = count($grid);
	}

	// Fix overlay
	if($style == 'overlay' && !$image_overlay) $image_overlay = 'rgba(0,0,0,.25)';

	// Set box style
	if($style) $classes_box[] = 'box-'.$style;
	if($style == 'overlay') $classes_box[] = 'dark';
	if($style == 'shade') $classes_box[] = 'dark';
	if($style == 'badge') $classes_box[] = 'hover-dark';
	if($text_pos) $classes_box[] = 'box-text-'.$text_pos;

	if($image_hover)  $classes_image[] = 'image-'.$image_hover;
	if($image_hover_alt)  $classes_image[] = 'image-'.$image_hover_alt;
	if($image_height) $classes_image[] = 'image-cover';

	// Text classes
	if($text_hover) $classes_text[] = 'show-on-hover hover-'.$text_hover;
	if($text_align) $classes_text[] = 'text-'.$text_align;
	if($text_size) $classes_text[] = 'is-'.$text_size;
	if($text_color == 'dark') $classes_text[] = 'dark';

	$css_args_img = array(
	  array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => '%' ),
	  array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
	);

	$css_image_height = array(
      array( 'attribute' => 'padding-top', 'value' => $image_height),
  	);

	$css_args = array(
      array( 'attribute' => 'background-color', 'value' => $text_bg ),
      array( 'attribute' => 'padding', 'value' => $text_padding ),
  	);

    // Add Animations
	if($animate) {$animate = 'data-animate="' . esc_attr( $animate ) . '"';}

	$classes_text = implode(' ', $classes_text);
	$classes_image = implode(' ', $classes_image);
	$classes_box = implode(' ', $classes_box);

	// Repeater styles
	$repeater['id'] = $_id;
	$repeater['tag'] = $tag;
	$repeater['type'] = $type;
	$repeater['class'] = $class;
	$repeater['visibility'] = $visibility;
	$repeater['style'] = $style;
	$repeater['slider_style'] = $slider_nav_style;
	$repeater['slider_nav_position'] = $slider_nav_position;
	$repeater['slider_nav_color'] = $slider_nav_color;
	$repeater['slider_bullets'] = $slider_bullets;
    $repeater['auto_slide'] = $auto_slide;
	$repeater['infinitive'] = $infinitive;
	$repeater['row_spacing'] = $col_spacing;
	$repeater['row_width'] = $width;
	$repeater['columns'] = $columns;
	$repeater['columns__md'] = $columns__md;
	$repeater['columns__sm'] = $columns__sm;
	$repeater['depth'] = $depth;
	$repeater['depth_hover'] = $depth_hover;

	if ( ! empty( $offset ) ) {
		$found_posts_filter_callback = function ( $found_posts, $query ) use ( $offset ) {
			return $found_posts - (int) $offset;
		};

		add_filter( 'found_posts', $found_posts_filter_callback, 1, 2 );
	}

	$offset = (int) $page_number > 1
		? (int) $offset + ( (int) $page_number - 1 ) * (int) $posts
		: $offset;

	$args = array(
		'post_status' => 'publish',
		'post_type' => 'post',
		'offset' => $offset,
		'cat' => $cat,
		'tag__in' => $tags ? array_filter( array_map( 'trim', explode( ',', $tags ) ) ) : '',
		'posts_per_page' => $posts,
		'paged' => $page_number,
		'ignore_sticky_posts' => true,
		'orderby'             => $orderby,
		'order'               => $order,
	);

	// Added for Flatsome v2 fallback
	if ( get_theme_mod('flatsome_fallback', 0) && $category ) {
		$args['category_name'] = $category;
	}

	// If custom ids
	if ( !empty( $ids ) ) {
		$ids = explode( ',', $ids );
		$ids = array_map( 'trim', $ids );

		$args = array(
			'post__in' => $ids,
            'post_type' => array(
                'post',
                'featured_item', // Include for its tag archive listing.
            ),
			'numberposts' => -1,
			'orderby' => 'post__in',
			'posts_per_page' => 9999,
			'ignore_sticky_posts' => true,
		);

		// Include for search archive listing.
		if ( is_search() ) {
			$args['post_type'][] = 'page';
		}
	}

$recentPosts = new WP_Query( $args );

	if ( isset( $found_posts_filter_callback ) ) {
		remove_filter( 'found_posts', $found_posts_filter_callback, 1 );
	}

	Flatsome_Relay::render_container_open( $recentPosts, $tag, $defined_atts, $atts );

	if ( $type == 'grid' ) {
		flatsome_get_grid_height( $grid_height, $_id );
	}

get_flatsome_repeater_start($repeater);

while ( $recentPosts->have_posts() ) : $recentPosts->the_post();

			$col_class    = array( 'post-item' );
			$show_excerpt = $excerpt;

			if(get_post_format() == 'video') $col_class[] = 'has-post-icon';

			if($type == 'grid'){
	        if($grid_total > $current_grid) $current_grid++;
	        $current = $current_grid-1;

	        $col_class[] = 'grid-col';
	        if($grid[$current]['height']) $col_class[] = 'grid-col-'.$grid[$current]['height'];

	        if($grid[$current]['span']) $col_class[] = 'large-'.$grid[$current]['span'];
	        if($grid[$current]['md']) $col_class[] = 'medium-'.$grid[$current]['md'];

	        // Set image size
	        if($grid[$current]['size']) $image_size = $grid[$current]['size'];

	        // Hide excerpt for small sizes
	        if($grid[$current]['size'] == 'thumbnail') $show_excerpt = 'false';
	    }

		?><div class="col <?php echo esc_attr( implode( ' ', $col_class ) ); ?>" <?php echo $animate;?>>
			<div class="col-inner">
				<div class="box <?php echo esc_attr( $classes_box ); ?> box-blog-post has-hover">
          <?php if(has_post_thumbnail()) { ?>
  					<div class="box-image" <?php echo get_shortcode_inline_css($css_args_img); ?>>
  						<div class="<?php echo esc_attr( $classes_image ); ?>" <?php echo get_shortcode_inline_css($css_image_height); ?>>
							<a href="<?php the_permalink(); ?>" class="plain" aria-label="<?php echo esc_attr( the_title() ); ?>">
								<?php the_post_thumbnail( $image_size ); ?>
							</a>
  							<?php if($image_overlay){ ?><div class="overlay" style="background-color: <?php echo esc_attr( $image_overlay ); ?>"></div><?php } ?>
  							<?php if($style == 'shade'){ ?><div class="shade"></div><?php } ?>
  						</div>
  						<?php if($post_icon && get_post_format()) { ?>
  							<div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50">
  				            	<div class="overlay-icon">
  				                    <i class="icon-play"></i>
  				                </div>
  				            </div>
  						<?php } ?>
  					</div>
          <?php } ?>
					<div class="box-text <?php echo esc_attr( $classes_text ); ?>" <?php echo get_shortcode_inline_css($css_args); ?>>
					<div class="box-text-inner blog-post-inner">

					<?php do_action('flatsome_blog_post_before'); ?>

					<?php if($show_category !== 'false') { ?>
						<p class="cat-label <?php if($show_category == 'label') echo 'tag-label'; ?> is-xxsmall op-7 uppercase">
					<?php
						foreach((get_the_category()) as $cat) {
						echo wp_kses_post( $cat->cat_name ) . ' ';
					}
					?>
					</p>
					<?php } ?>
					<h5 class="post-title is-<?php echo esc_attr( $title_size ); ?> <?php echo esc_attr( $title_style );?>">
						<a href="<?php the_permalink() ?>" class="plain"><?php the_title(); ?></a>
					</h5>
					<?php if((!has_post_thumbnail() && $show_date !== 'false') || $show_date == 'text') {?><div class="post-meta is-small op-8"><?php echo get_the_date(); ?></div><?php } ?>
					<div class="is-divider"></div>
					<?php if($show_excerpt !== 'false') { ?>
					<p class="from_the_blog_excerpt <?php if($show_excerpt !== 'visible'){ echo 'show-on-hover hover-'. esc_attr( $show_excerpt ); } ?>">
						<?php echo flatsome_get_the_excerpt( $excerpt_length ); ?>
					</p>
					<?php } ?>
                    <?php if ( $comments == 'true' && comments_open() && '0' != get_comments_number() ) { ?>
                        <p class="from_the_blog_comments uppercase is-xsmall">
                            <?php
                                $comments_number = get_comments_number( get_the_ID() );
                            	/* translators: %s: Comment count */
                                printf( _n( '%s دیدگاه', '%s دیدگاه', $comments_number, 'flatsome' ),
                                    number_format_i18n( $comments_number ) )
                            ?>
                        </p>
                    <?php } ?>

					<?php if($readmore) { ?>
						<a href="<?php the_permalink(); ?>" class="button <?php echo esc_attr( $readmore_color ); ?> is-<?php echo esc_attr( $readmore_style ); ?> is-<?php echo esc_attr( $readmore_size ); ?> mb-0">
							<?php echo wp_kses_post( $readmore ); ?>
						</a>
					<?php } ?>

					<?php do_action('flatsome_blog_post_after'); ?>

					</div>
					</div>
					<?php if(has_post_thumbnail() && ($show_date == 'badge' || $show_date == 'true')) {?>
					<?php if(!$badge_style) $badge_style = get_theme_mod('blog_badge_style', 'outline'); ?>
						<div class="badge absolute top post-date badge-<?php echo esc_attr( $badge_style ); ?>">
							<div class="badge-inner">
								<span class="post-date-day"><?php echo get_the_time('d', get_the_ID()); ?></span><br>
								<span class="post-date-month is-xsmall"><?php echo get_the_time('M', get_the_ID()); ?></span>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div><?php endwhile;
wp_reset_query();

// Get repeater end.
get_flatsome_repeater_end($atts);

	Flatsome_Relay::render_container_close();

$content = ob_get_contents();
ob_end_clean();
return $content;
}

add_shortcode("blog_posts", "shortcode_latest_from_blog");
