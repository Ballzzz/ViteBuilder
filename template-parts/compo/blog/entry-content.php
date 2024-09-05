<?php
/**
 * 
 * 
 */

?>

<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. */
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ViteBuilder' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ViteBuilder' ),
				'after'  => '</div>',
			]
		);


	} else {
		echo ViteBuilder_excerpt();
		ViteBuilder_excerpt_more();
	}

	?>
</div>