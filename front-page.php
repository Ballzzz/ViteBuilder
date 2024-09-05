<?php

/**
 *  font-page tempage
 * 
 * @package ViteBuilder
 */
?>
<?php 
get_header();

?>
<?php
if(is_home()){
    ?>
    <header class="mb-5">
        <h1 class="page-title screen-reader-text">
            <?php single_post_title();?>
        </h1>
    </header>
    <?php
}

?>
<div id="primary">
		<main id="main" class="site-main mt-5" role="main">
			<div class="home-page-wrap w-100">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-page');

					endwhile;
					?>

				<?php

				else :

					get_template_part( 'template-parts/content-none' );

				endif;
				get_template_part( 'template-parts/posts' );
				
				?>
			</div>
		</main>
	</div>
<?php
get_footer();