<?php

function display_breadcrumb() {
	global $post;

	// reverse the ancestor array
	$ancestors = array_reverse( get_post_ancestors( $post ) );

	// the Projects home page must be named "Projects" for this search to work
	if ( $post->post_type == 'project' ) {
		$args = array(
			'name'        => 'projects',
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1
		);

		$parent = get_posts($args);

		// avoids error if Projects page not properly named
		if ($parent[0] ?? false) {
			$ancestors = [$parent[0]->ID];
		}


	}

	?>
	<div class="container bg-faded my-3 py-2">
		<ul class="breadcrumb mb-0">
			<li>
				<a href="<?php echo get_site_url(); ?>">Home</a>
			</li>
			<?php foreach($ancestors as $ancestor): ?>
				<li>
					<a href="<?php echo get_permalink( $ancestor ); ?>">
						<?php echo get_the_title( $ancestor ); ?>
					</a>
				</li>
			<?php endforeach; ?>
			<li><?php echo $post->post_title; ?></li>
		</ul>
	</div>
	<?php
}
