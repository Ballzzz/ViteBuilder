<?php
/**
 * Content template
 *
 * @package ViteBuilder
 */


$container_classes = !empty( $args['container_classes'] ) ? $args['container_classes'] : 'mb-5';

?>

<article id="post-<?php the_ID(); ?>" >
	<?php
	get_template_part( 'template-parts/compo/blog/entry-header' );
	get_template_part( 'template-parts/compo/blog/entry-meta' );
	get_template_part( 'template-parts/compo/blog/entry-content' );
	get_template_part( 'template-parts/compo/blog/entry-footer' );
	?>
</article>