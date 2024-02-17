<?php

if (!function_exists('cardinaltheme')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cardinaltheme()
    {
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('custom-logo');
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

    }
endif;
add_action('after_setup_theme', 'cardinaltheme');


function cardinaltheme_scripts()
{
    wp_register_script('jQuery', '//code.jquery.com/jquery-3.5.1.min.js', null, null, true);
    wp_enqueue_script('jQuery');

    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.14.0/css/all.css');

    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

    wp_enqueue_style('slick-theme-css', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css');

    wp_enqueue_style('cardinal-styleheet', get_stylesheet_uri(), array(), rand(111, 9999));

    wp_register_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, null, true);
    wp_enqueue_script('slick-js');

    wp_register_script('waypoints-js', get_template_directory_uri() . '/scripts/jquery.waypoints.js', null, null, true);
    wp_enqueue_script('waypoints-js');

    wp_register_script('counter-js',  get_template_directory_uri() . '/scripts/jquery.counter.js', null, null, true);
    wp_enqueue_script('counter-js');

    wp_enqueue_script('cardinal-script', get_template_directory_uri() . '/scripts/main.js', array(), filemtime(get_template_directory() . '/scripts/main.js'), true);
}
add_action('wp_enqueue_scripts', 'cardinaltheme_scripts');


/* DYNAMIC CSS FOR ACF FIELDS IN CSS */
// add_action( 'wp_enqueue_scripts', 'theme_custom_style_script', 11 );
// function theme_custom_style_script() {
// 	wp_enqueue_style( 'dynamic-css', admin_url('admin-ajax.php').'?action=dynamic_css', '');
// }

// add_action('wp_ajax_dynamic_css', 'dynamic_css');
// add_action('wp_ajax_nopriv_dynamic_css', 'dynamic_css');
// function dynamic_css() {
// 	require( get_template_directory().'/inc/custom.css.php' );
// 	exit;
// }

function admin_theme_style()
{
  wp_enqueue_style( 'admin-theme', get_stylesheet_directory_uri() . '/css/editor-styles.css' );
}
add_action('admin_enqueue_scripts', 'admin_theme_style');
add_action('login_enqueue_scripts', 'admin_theme_style');


/* ENABLE SVG SUPPORT */
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');


/* MENUS */
function register_menus()
{
    register_nav_menus(
        array(
            'top-nav' => __('Top Nav'),
            'top-nav-patient' => __('Patient Top Nav'),
            'top-nav-partner' => __('Partner Top Nav'),
            'top-nav-broker' => __('Broker Top Nav'),
            'top-nav-talent' => __('Talent Acquision Top Nav'),
            'primary-nav' => __('Primary Nav'),
            'patient-nav' => __('Patient Nav'),
            'partners-nav' => __('Partner Nav'),
            'broker-nav' => __('Broker Nav'),
            'talent-nav' => __('Talent Acquision Nav'),
            'footer-nav' => __('Footer Nav'),
        ),
    );
}
add_action('init', 'register_menus');


/* THEME FEATURES */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/* DISABLE GUTENBERG */
add_filter('use_block_editor_for_post', '__return_false', 10);


/* PAGE TEXTAREA REMOVAL */
function remove_textarea() {
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_textarea');


/* EXCERPT LENGTH */
add_filter( 'excerpt_length', function($length) {
    return 40;
}, PHP_INT_MAX );


/* WIDGETS */
function blog_widgets_init() {
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="heading">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'blog_widgets_init');


/* ADMIN FOOTER MODIFICATION */
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Developed by <a href="http://www.cardinaldigitalmarketing.com" target="_blank">Cardinal Digital Marketing</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/* CUSTOM POST TYPES */
function custom_post_types() {

    register_post_type( 'locations',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Locations' ),
                'singular_name' => __( 'Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'patients/locations'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-store',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'patient-services',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Patient Services' ),
                'singular_name' => __( 'Patient Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'patient-services'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'partner-services',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Partner Services' ),
                'singular_name' => __( 'Partner Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'partner-services'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-groups',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'team-members',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Member' )
            ),
            'public' => true,
            'rewrite' => true,
            'has_archive' => 'about-us/team-members',
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessperson',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'resources',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Resources' ),
                'singular_name' => __( 'Resource' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'resources'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'News',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'News'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-megaphone',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );
}

add_action( 'init', 'custom_post_types' );


/* STATE TYPE TAXONOMY */
add_action( 'init', 'state_taxonomy', 0 );
 
function state_taxonomy() {
 
  $labels = array(
    'name' => _x( 'States', 'taxonomy general name' ),
    'singular_name' => _x( 'State', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search States' ),
    'all_items' => __( 'All States' ),
    'parent_item' => __( 'Parent State' ),
    'parent_item_colon' => __( 'Parent State:' ),
    'edit_item' => __( 'Edit State' ), 
    'update_item' => __( 'Update State' ),
    'add_new_item' => __( 'Add New State' ),
    'new_item_name' => __( 'New State Name' ),
    'menu_name' => __( 'Assign States' ),
  ); 	
 
  register_taxonomy('states',array('locations'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'state' ),
  ));
}


/* TEAM MEMBER TYPE TAXONOMY */
add_action( 'init', 'team_taxonomy', 0 );
 
function team_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Teams', 'taxonomy general name' ),
    'singular_name' => _x( 'Ream', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search teams' ),
    'all_items' => __( 'All Teams' ),
    'parent_item' => __( 'Parent Team' ),
    'parent_item_colon' => __( 'Parent Team:' ),
    'edit_item' => __( 'Edit Team' ), 
    'update_item' => __( 'Update Team' ),
    'add_new_item' => __( 'Add New Team' ),
    'new_item_name' => __( 'New team Name' ),
    'menu_name' => __( 'Assign Teams' ),
  ); 	
 
  register_taxonomy('teams',array('team-members'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'team' ),
  ));
}

/* THEMES OPTIONS */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
$my_excerpt = wp_strip_all_tags( get_the_excerpt(), true );

/* SEARCH FUNCTIONALITY */
function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');

/* IMAGE PATH */ 
if( !defined('THEME_IMG_PATH')){
    define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/assets' );
}

/* REMOVING AUTO P TAG IN WYSIWYG */ 
function my_acf_add_local_field_groups() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'my_acf_add_local_field_groups');


// ENQUEUE THE CUSTOM AJAX SCRIPT
function enqueue_custom_ajax_script() {
    wp_enqueue_script('custom-ajax-script', get_stylesheet_directory_uri() . '/scripts/ajax-filter.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_ajax_script');


// AJAX CALLBACK TO FILTER LOCATIONS BY STATE
function filter_locations_by_state() {
    $state = isset($_POST['state']) ? sanitize_text_field($_POST['state']) : '';

    $args = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );

    if (!empty($state)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'states',
                'field' => 'slug',
                'terms' => $state,
            ),
        );
    }

    $locations_query = new WP_Query($args);

    ob_start();

    if ($locations_query->have_posts()) {
        while ($locations_query->have_posts()) {
        $locations_query->the_post();
            
            $image = get_the_post_thumbnail();
            $permalink = get_permalink();
            $title = get_the_title();
            $phone = get_field( 'phone_number' );
            $address1 = get_field( 'address1' );
            $address2 = get_field( 'address2' );
            $hours1= get_field( 'monday_friday' );
            $hours2= get_field( 'saturday_sunday' );
        ?> 

        <div class="location">
            <div class="content">

                <div class="wrapper--image"><?php echo $image; ?></div>

                <div class="wrapper--content">
                    
                    <h3 class="title"><?php echo esc_html($title); ?></h3>
                    
                    <div class="details">
                        <div class="contact">
                            <div class="phone"><a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></div>
                            <div class="address"><?php echo esc_html($address1); ?><br /><?php echo esc_html($address2); ?></div>
                        </div>
                        
                        <div class="hours">
                            <div class="main-label">Hours:</div>    
                            <div class="wrap">
                                <div class="mf"><div class="label">Monday - Friday</div><?php echo esc_html($hours1); ?></div>
                                <div class="ss"><div class="label">Saturday & Sunday</div><?php echo esc_html($hours2); ?></div>
                            </div>
                        </div>
                    </div> 
                </div> 
                <div class="wrapper--btn">
                    <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">View Location</a>
                </div>
            
            </div>
        </div>

        <?php }
        wp_reset_postdata();
    } else {
        echo 'No locations found.';
    }

    $response = ob_get_clean();

    wp_send_json_success($response);
}
add_action('wp_ajax_filter_locations', 'filter_locations_by_state');
add_action('wp_ajax_nopriv_filter_locations', 'filter_locations_by_state');


// AJAX CALLBACK TO FILTER BLOGS BY CATEGORY
function load_filtered_blog_posts_callback() {
    $category_id = intval($_POST['category_id']);
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 5;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC', 
    );

    if ($category_id > 0) {
        $args['cat'] = $category_id;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $image = get_the_post_thumbnail();
            $permalink = get_permalink();
            $title = get_the_title();
            $date = get_the_date();
            $excerpt = get_the_excerpt();
            ?>  
            <div class="blog">
                <div class="wrapper--image"><?php echo $image; ?></div>

                <div class="wrapper--content">
                    
                    <h3 class="title"><?php echo esc_html($title); ?></h3>
                    <div class="date"><?php echo esc_html($date); ?></div>
                    <p><?php echo esc_html($excerpt); ?></p>
                

                    <div class="wrapper--btn">
                        <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Read More</a>
                    </div>

                </div> 
            </div>
        <?php } ?>
        <div class="pagination">
            <div class="prev-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
            <div class="pagination-pages">
                <!-- Pagination links will be generated here -->
                <?php
                $total_posts = wp_count_posts()->publish;
                $total_pages = ceil($total_posts / $posts_per_page);

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<span class="page-number' . ($i === 1 ? ' active' : '') . '">' . $i . '</span>';
                }
                ?>
            </div>
            <div class="next-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
        </div>
        <?php wp_reset_postdata();
    } else {
        echo '<p>No blog posts found for the selected category.</p>';
    }
    wp_die();
}
add_action('wp_ajax_load_filtered_blog_posts', 'load_filtered_blog_posts_callback');
add_action('wp_ajax_nopriv_load_filtered_blog_posts', 'load_filtered_blog_posts_callback');


// AJAX callback to get the total number of posts for a specific category
function get_total_posts_count_callback() {
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );

    if ($category) {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);
    $total_posts = $query->found_posts;

    echo $total_posts;
    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_get_total_posts_count', 'get_total_posts_count_callback');
add_action('wp_ajax_nopriv_get_total_posts_count', 'get_total_posts_count_callback');


// AJAX callback to load blog posts based on page number and category
function load_blog_posts_pagination_callback() {
    $page_number = isset($_POST['page_number']) ? intval($_POST['page_number']) : 1;
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 5;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page_number,
        'orderby' => 'date', // Order by most recently published
    );

    if ($category) {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);

      // Loop through the blog posts and display them
      if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); 
            $image = get_the_post_thumbnail();
            $permalink = get_permalink();
            $title = get_the_title();
            $date = get_the_date();
            $excerpt = get_the_excerpt();
            ?>
            <div class="blog">
                <div class="wrapper--image"><?php echo $image; ?></div>
                
                <div class="wrapper--content">
                    
                    <h3 class="title"><?php echo esc_html($title); ?></h3>
                    <div class="date"><?php echo esc_html($date); ?></div>
                    <p><?php echo esc_html($excerpt); ?></p>
                
                    <div class="wrapper--btn">
                        <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Read More</a>
                    </div>
                </div> 
            </div>
    
        <?php } ?>
        <div class="pagination">
            <div class="prev-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
            <div class="pagination-pages">
                <!-- Pagination links will be generated here -->
                <?php
                $total_posts = wp_count_posts()->publish;
                $total_pages = ceil($total_posts / $posts_per_page);

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<span class="page-number' . ($i === 1 ? ' active' : '') . '">' . $i . '</span>';
                }
                ?>
            </div>
            <div class="next-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
        </div>
        <?php wp_reset_postdata();
        } else {
            echo '<p>No blog posts found.</p>';
        }

    wp_die();
}
add_action('wp_ajax_load_blog_posts_pagination', 'load_blog_posts_pagination_callback');
add_action('wp_ajax_nopriv_load_blog_posts_pagination', 'load_blog_posts_pagination_callback');


// Function to filter events by category and generate the calendar events HTML
// function custom_event_category_filter() {
//     if ( isset( $_POST['category'] ) ) {
//         $category_slug = sanitize_text_field( $_POST['category'] );

//         // Capture the output of the calendar events
//         ob_start();
//         tribe_get_template_part( 'tribe/events/v2/month/content', 'grid', array( 'hide_upcoming' => true ) );
//         $events_html = ob_get_clean();

//         // Filter the events using the selected category
//         $filtered_events = preg_replace_callback(
//             '/<div(.*?)data-category="(.*?)"(.*?)<\/div>/s',
//             function ($match) use ($category_slug) {
//                 $event_categories = explode(' ', $match[2]);
//                 if (in_array($category_slug, $event_categories)) {
//                     return $match[0];
//                 }
//                 return '';
//             },
//             $events_html
//         );

//         wp_send_json_success( $filtered_events );
//     }

//     wp_send_json_error( 'Invalid request.' );
// }
// add_action( 'wp_ajax_custom_event_category_filter', 'custom_event_category_filter' );
// add_action( 'wp_ajax_nopriv_custom_event_category_filter', 'custom_event_category_filter' );
