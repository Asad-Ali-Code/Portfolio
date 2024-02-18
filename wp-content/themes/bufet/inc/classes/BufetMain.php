<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BufetMain{

	/**
	 *
	 * Posts loop with essential markup
	 *
	 */
	public function thePostLoop( $template, $grid, $fullpage = false )
	{
		// Set the grid layout is fullpage or else

		if( $fullpage == true ) {
			$this->postLoop( $grid );
		} else {

			echo 	'<div class="'. $template .' post_col">
						<div class="row posts-row">';

	                    	$this->postLoop( $grid );

	        echo   		'</div><div class="row">';

	        				$this->pagination();

	        echo     	'</div>
	               </div>';
		}
	}


	/**
	 *
	 * Scorn Post Loop
	 * @param   $template || string || accepts template column grid
	 *
	 */
	public function postLoop( $grid )
	{
	    if( have_posts() ) :

	        while( have_posts() ) : the_post();

	            get_template_part('templates/' . $grid );

	        endwhile;

	    else:
	        get_template_part('templates/no-posts');
	    endif;
	}


	public function getPulledSidebar($col_class)
	{
		echo '<div class="'. $col_class .'">';
			get_sidebar();
		echo '</div>';
	}


	/**
	 * Excert data from the content
	 */
	public function postExcerpt($limit, $content = null) {
		if($content) {
			$post = $content;
		} else {
			$post = get_the_content();
		}

		$post_content = explode(' ', $post);
		$sliced_content = array_slice($post_content, 0, $limit);
		$return_content = implode(' ', $sliced_content);

		if( count( $post_content ) > $limit ) {
			return $return_content  . '... ' ;
		} else {
			return $return_content ;
		}

	}

	/**
	 *
	 * The WordPress pagination
	 *
	 */
	public function pagination()
	{

		echo '<div class="bufet-pagination">';
		the_posts_pagination( array(
	            'prev_text' => esc_html__('prev', 'bufet'),
	            'next_text' =>  esc_html__('next', 'bufet'),
	            'screen_reader_text' => ' ',
	        ) );
		echo '</div>';
	}


	public function theContentWithComment()
	{
		echo '<div class="page-content">';

			// The content
			the_content();

		echo '</div>';


		// Wrapper for the comment
		echo '<div class="page-comments">';
			// If comments is open
		    if( comments_open() ) {
		        comments_template();
		    }
	    echo '</div>';
	}





	/**
	 *
	 * Get posts
	 *
	 */
	public static function getPosts( $args )
	{


	    $posts = new WP_Query(
	        array(
	            'post_type' => $args['post_type'],
	            'posts_per_page'   => $args['posts_per_page'],
		        'orderby'   => $args['orderby'],
		        'order'   => $args['order'],
	        )
	    );

	    return $posts;

	}




	public function bufet_breadcrumb_bridge()
	{
		global $bufet;

	    	if( isset($bufet['breadcrumb_on']) ) :
	            if( $bufet['breadcrumb_on'] == true ) :
	            	echo  $this->bufet_get_the_breadcrumbs();
	            endif;
            else:
	            echo  $this->bufet_get_the_breadcrumbs();
            endif;

	}




	/**
	 *
	 * Breadcrumb
	 * @return breadcrumb
	 */
	public function bufet_get_the_breadcrumbs()
	{


		$title = $this->generateBreadCrumbTitle();

		$output = '<section class="blog-full-page-area breadcrumb-area">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-12">
		        <div class="blog-page-content-table">
		          <div class="blog-table-cell">';

					  if( $title !== '' ) {
					  	$output .= 	'<h2 class="breadcrumb_title">'.  $title  .'</h2>';
					  }

					  $output .= $this->bufet_breadcrumbs() . '

		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>';

		return $output;
	}

	public function generateBreadCrumbTitle()
	{
		global $bufet;

	    $title = '';

		if (is_home() || is_front_page()) {
			$title = isset( $bufet['bp_title'] ) ? $bufet['bp_title'] : 'Blog';
		} elseif( is_page() ) {
			$title = get_the_title();
		} elseif( is_archive() ) {
			$title = get_the_archive_title();
		} elseif( is_search() ) {
			$title = esc_html__('Search results for: ', 'bufet') . get_search_query();
		}

	    return $title;
	}



	public function bufet_breadcrumbs() {

        $bufet = get_option( 'bufet' );

		$sepOpt = ( isset( $bufet['breadcrumb_sep'] ) ? $bufet['breadcrumb_sep'] : '/' );

		/* === OPTIONS === */
		$text['home']     = esc_html__('Home', 'bufet'); // text for the 'Home' link
		$text['category'] = esc_html__('Archive by Category "%s"', 'bufet'); // text for a category page
		$text['search']   = esc_html__('Search Results for "%s" Query', 'bufet'); // text for a search results page
		$text['tag']      = esc_html__('Posts Tagged "%s"', 'bufet'); // text for a tag page
		$text['author']   = esc_html__('Articles Posted by %s', 'bufet'); // text for an author page
		$text['404']      = esc_html__('Error 404', 'bufet'); // text for the 404 page
		$text['page']     = esc_html__('Page %s', 'bufet'); // text 'Page N'
		$text['cpage']    = esc_html__('Comment Page %s', 'bufet'); // text 'Comment Page N'

		$wrap_before    = '<div class="breadcrumbs">'; // the opening wrapper tag
		$wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
		$sep            = $sepOpt; // separator between crumbs
		$sep_before     = '<span class="sep">'; // tag before separator
		$sep_after      = '</span>'; // tag after separator
		$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_current   = 1; // 1 - show current page title, 0 - don't show
		$before         = '<span class="current">'; // tag before the current crumb
		$after          = '</span>'; // tag after the current crumb
		$output 		= '';
		/* === END OF OPTIONS === */

		global $post;
		$home_url       = esc_url( home_url('/') );
		$link_before    = '<span >';
		$link_after     = '</span>';
		$link_attr      = '';
		$link_in_before = '<span>';
		$link_in_after  = '</span>';
		$link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
		$frontpage_id   = get_option('page_on_front');

		if(  is_page() ) {
			$parent_id      = $post->post_parent;
		}
		$sep            = ' ' . $sep_before . $sep . $sep_after . ' ';
		$home_link      = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

		if (is_home() || is_front_page()) {

			if ($show_on_home) $output .= $wrap_before . $home_link . $wrap_after;

		} else {

			$output .= $wrap_before;
			if ($show_home_link) $output .= $home_link;

			if ( is_category() ) {
				$cat = get_category(get_query_var('cat'), false);
				if ($cat->parent != 0) {
					$cats = get_category_parents($cat->parent, TRUE, $sep);
					$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					if ($show_home_link) $output .= $sep;
					$output .= $cats;
				}
				if ( get_query_var('paged') ) {
					$cat = $cat->cat_ID;
					$output .= $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) $output .= $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
				}

			} elseif ( is_search() ) {
				if (have_posts()) {
					if ($show_home_link && $show_current) $output .= $sep;
					if ($show_current) $output .= $before . sprintf($text['search'], get_search_query()) . $after;
				} else {
					if ($show_home_link) $output .= $sep;
					$output .= $before . sprintf($text['search'], get_search_query()) . $after;
				}

			} elseif ( is_day() ) {
				if ($show_home_link) $output .= $sep;
				$output .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
				$output .= sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
				if ($show_current) $output .= $sep . $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				if ($show_home_link) $output .= $sep;
				$output .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
				if ($show_current) $output .= $sep . $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				if ($show_home_link && $show_current) $output .= $sep;
				if ($show_current) $output .= $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ($show_home_link) $output .= $sep;
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					if ($show_current) $output .=  $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $sep);
					if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					$output .= $cats;
					if ( get_query_var('cpage') ) {
						$output .= $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
					} else {
						if ($show_current) $output .= $before . get_the_title() . $after;
					}
				}

			// custom post type
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				if ( get_query_var('paged') ) {
					$output .= $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) $output .= $sep . $before . $post_type->label . $after;
				}

			} elseif ( is_attachment() ) {
				if ($show_home_link) $output .= $sep;
				$parent = get_post($parent_id);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				if ($cat) {
					$cats = get_category_parents($cat, TRUE, $sep);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					$output .= $cats;
				}
				printf($link, get_permalink($parent), $parent->post_title);
				if ($show_current) $output .= $sep . $before . get_the_title() . $after;

			} elseif ( is_page() && !$parent_id ) {
				if ($show_current) $output .= $sep . $before . get_the_title() . $after;

			} elseif ( is_page() && $parent_id ) {
				if ($show_home_link) $output .= $sep;
				if ($parent_id != $frontpage_id) {
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						if ($parent_id != $frontpage_id) {
							$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						$output .= $breadcrumbs[$i];
						if ($i != count($breadcrumbs)-1) $output .= $sep;
					}
				}
				if ($show_current) $output .= $sep . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				if ( get_query_var('paged') ) {
					$tag_id = get_queried_object_id();
					$tag = get_tag($tag_id);
					$output .= $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) $output .= $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
				}

			} elseif ( is_author() ) {
				global $author;
				$author = get_userdata($author);
				if ( get_query_var('paged') ) {
					if ($show_home_link) $output .= $sep;
					$output .= sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_home_link && $show_current) $output .= $sep;
					if ($show_current) $output .= $before . sprintf($text['author'], $author->display_name) . $after;
				}

			} elseif ( is_404() ) {
				if ($show_home_link && $show_current) $output .= $sep;
				if ($show_current) $output .= $before . $text['404'] . $after;

			} elseif ( has_post_format() && !is_singular() ) {
				if ($show_home_link) $output .= $sep;
				$output .= get_post_format_string( get_post_format() );
			}

			$output .= $wrap_after;

			return $output;

		}

	}
}

$bufetObj = new BufetMain;
