<?php
/**
 * Main template file.
 *
 * @package ViteBuilder
 */
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/classes/loadMorePost.php');

get_header();

$loadmore_post =ViteBuilder\inc\Loadmore_Posts::get_instance();
?>

<div class="container">
	<h1>f;fdfd;fc</h1>
	<?php $loadmore_post -> post_script_load_more(); ?>
</div>
<?php


get_footer();