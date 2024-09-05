<?php
/**
 * Custom Search Form.
 */

?>

 <form role="search" method="get" class="nav-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'ViteBuilder' ); ?></span>
	<input class="form-control mr-sm-2" type="search" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ViteBuilder' ); ?>" value="<?php the_search_query(); ?>" aria-label="Search" name="s">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo esc_attr_x( 'Search', 'submit button', 'ViteBuilder' ); ?></button>
 </form>

