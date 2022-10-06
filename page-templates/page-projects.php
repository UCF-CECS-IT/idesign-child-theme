<?php

/* Template Name: Project  */

get_header(); the_post();

display_breadcrumb();

$projectType = $_POST['project_type'] ?? false;
$projectFocus = $_POST['project_focus'] ?? false;

$args = [
    'post_type'=> 'project',
    'order'    => 'ASC',
	'posts_per_page' => -1,
    // 'paged' => $_GET['page_number'] ?? 1
];

/**
 * If filters are set, add one or both
 */
if ( $projectType || $projectFocus ) {
	$args['meta_query']['relation'] = 'AND';

	if ( $projectType ) {
		$args['meta_query'][] = array(
			'key' => 'project_type',
			'value' => "$projectType",
			'compare' => 'LIKE',
		);
	}

	if ( $projectFocus ) {
		$args['meta_query'][] = array(
			'key' => 'project_focus',
			'value' => "$projectFocus",
			'compare' => 'LIKE',
		);
	}

	var_dump($projectFocus, $projectType);
}

$query = new WP_Query( $args );


?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<?php the_content(); ?>

		<!-- project selector -->
		<div class="mt-5">
			<h2 class="heading-underline text-transform-none">Select a Project</h2>

			<form method="POST" action="">
				<div class="row">
					<div class="form-group col-lg-3">
						<label class="font-weight-bold font-size-sm">Project Type</label>
						<select class="form-control form-control-sm" name="project_type">
							<option></option>
							<option value="Advanced Development">Advanced Development</option>
							<option value="Manufacturing">Manufacturing</option>
							<option value="Product Development">Product Development</option>
							<option value="Research">Research</option>
							<option value="Sales and Distribution">Sales and Distribution</option>
						</select>
					</div>

					<div class="form-group col-lg-4">
						<label class="font-weight-bold font-size-sm">Focus Area</label>
						<select class="form-control form-control-sm" name="project_focus">
							<option></option>
							<option value="Health / Wellness & Assistive Technologies">Health / Wellness & Assistive Technologies</option>
							<option value="Manufacturing, Automation, and Control">Manufacturing, Automation, and Control</option>
							<option value="Product Development">Product Development</option>
							<option value="Reliability and Test Systems">Reliability and Test Systems</option>
							<option value="Energy and the Environment">Energy and the Environment</option>
						</select>
					</div>

					<div class="form-group col-lg-3 d-flex flex-row align-items-end">
						<button class="btn btn-primary btn-sm rounded mr-2" type="submit">Apply Filters</button>
						<a class="btn btn-default btn-sm rounded" href="">Reset</a>
					</div>
				</div>
			</form>

			<?php foreach( $query->posts as $post ):
				$image = get_field( 'project_image', $post->ID );
				$link = get_the_permalink( $post );
				?>
				<div class="card box-shadow rounded mb-3">
					<div class="card-block">
						<div class="row">
							<div class="col-lg-3">
								<?php if ( $image ): ?>
									<a href="<?php echo $link; ?>">
										<img class="img-fluid" src="<?php echo $image; ?>">
									</a>
								<?php endif; ?>
							</div>
							<div class="col-lg-9">
								<h5><?php echo $post->post_title; ?></h5>
							</div>
						</div>
					</div>

				</div>
			<?php endforeach; ?>
			<?php if (count($query->posts) == 0): ?>
				<div class="card box-shadow rounded mb-3">
					<div class="card-block">No results found.</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>

<?php get_footer(); ?>
