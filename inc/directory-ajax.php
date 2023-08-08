<?php

//scripts for  directory page
function directory_ajax_filter_scripts()
{
    wp_enqueue_script('directory_ajax_filter', get_stylesheet_directory_uri() . '/js/directory-ajax.js', array(), '1.0', true);
    wp_localize_script('directory_ajax_filter', 'ajax_url', admin_url('admin-ajax.php'));

}

add_shortcode('directory_ajax_filter', 'directory_ajax_filter_shortcode');
function directory_ajax_filter_shortcode()
{
    directory_ajax_filter_scripts();
    ob_start(); 
    return ob_get_clean();
}

//Ajax init for directory template
add_action('wp_ajax_directory_ajax_filter', 'directory_ajax_filter_callback');
add_action('wp_ajax_nopriv_directory_ajax_filter', 'directory_ajax_filter_callback');

//filter  for only based on title
function title_filter($where, &$wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('title_filter')) {
        $search_term = $wpdb->esc_like($search_term); //instead of esc_sql()
        $search_term = ' \'%' . $search_term . '%\'';
        $title_filter_relation = (strtoupper($wp_query->get('title_filter_relation')) == 'OR' ? 'OR' : 'AND');
        $where .= ' ' . $title_filter_relation . ' ' . $wpdb->posts . '.post_title LIKE ' . $search_term;
    }
    return $where;
}


//ajax callback function
function directory_ajax_filter_callback()
{

    header("Content-Type: application/json");

    if (isset($_GET['search'])) {
        $search =   sanitize_text_field($_GET['search']);
        $paged =  $_GET['paged'] ? $_GET['paged'] : 1;
        $term_name = get_term($campus_id)->name;
        $posts_per_page = 10;
        
        $search_query  = new WP_Query(array(
            'post_type' => 'person',
            'order'      => 'ASC',
            'post_status' => 'publish',
            'title_filter' =>  $search,
            's' => $search,
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged
        ));
    }else{
        $search =   sanitize_text_field($_GET['search']);
        $paged =  $_GET['paged'] ? $_GET['paged'] : 1;
        $term_name = get_term($campus_id)->name;
        $posts_per_page = 10;
        
        $search_query  = new WP_Query(array(
            'post_type' => 'person',
            'order'      => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged
        ));
    }

    add_filter('posts_where', 'title_filter', 10, 2);

    remove_filter('posts_where', 'title_filter', 10, 2);

    if ($search_query->have_posts()) {

        $result = array();

        while ($search_query->have_posts()) {
            $search_query->the_post();
            //print_r(get_field('is_hidden'));
            //image
            $image = wp_get_attachment_image_src(
                get_post_thumbnail_id($post->ID),
                'thumbnail-size'
            );

            if(empty($image) ):
                $image[0] = "/wp-content/uploads/2022/09/silhouette.png";
            endif;    

            //link
            $link = get_field('link');
            $link_target = $link ? $link['target'] ? $link['target'] : '_self' : "";
            $link_data = [
                'link_url' => $link['url'],
                'link_title' => $link['title'],
                'link_target' => $link_target
            ];


            $link = get_field('link');
            $caption = wp_trim_words(get_field('caption'), 15, '...');
            //$bio = wp_trim_words(get_field('short_bio'), 15, '...');
            $bio=get_field('short_bio');
            $email =  get_field('email');
            $phone = get_field('phone');

            $result[] = array(
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "content" => get_the_content(),
                "permalink" => get_permalink(),
                "image" => $image[0],
                "link" => $link_data,
                "bio" => $bio,
                "caption" => $caption,
                "email" => $email,
                "phone" => $phone,
                'total_posts' => $search_query->found_posts,
                'total_pages' => $search_query->max_num_pages,
                'current_page' =>  $paged,
                'posts_per_page' => $posts_per_page,
                
            );
        }
        wp_reset_query();

        echo json_encode($result);
    } else {
        echo json_encode('no_result');
    }
    wp_die();
}
