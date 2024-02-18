<?php
/**
 * Template for displaying search forms in Buffet
 *
 * @package WordPress
 * @subpackage Buffet
 * @since Buffet 1.0
 */
?>

<section class="johny-search-form clearfix">
     <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix">
    	<label class="screen-reader-text" for="s"><?php esc_html_e('Search',  'bufet') ?></label>
     	<input type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type to search here...', 'bufet'); ?>" />
     	<button type="submit" id="searchsubmit"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/search-icon.png" alt="search-icon"></button>
     </form>
</section>
