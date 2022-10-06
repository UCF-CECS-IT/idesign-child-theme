<?php get_header(); the_post();

display_breadcrumb();

$pdf = get_field( 'project_pdf' );
$benefits = get_field( 'project_benefits' );
$purpose = get_field( 'project_purpose' );
$results = get_field( 'project_results' );
$accomplishments = get_field( 'project_accomplishments' );
$focusAreas = get_field( 'project_focus' );
$type = get_field( 'project_type' );
$image = get_field( 'project_image' );
$sponsorName = get_field( 'project_sponsor_name' );
$sponsorLogo = get_field( 'project_sponsor_logo' );
$sponsorLink = get_field( 'project_sponsor_link' );

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<div class="row">
			<!-- Project Info -->
			<div class="col-lg-7">
				<?php if ( $benefits ): ?>
					<h5 class="heading-underline text-transform-none">Benefits</h5>
					<div class="mb-5">
						<?php echo $benefits; ?>
					</div>
				<?php endif; ?>

				<?php if ( $purpose ): ?>
					<h5 class="heading-underline text-transform-none">Purpose & Objectives</h5>
					<div class="mb-5">
						<?php echo $purpose; ?>
					</div>
				<?php endif; ?>

				<?php if ( $results ): ?>
					<h5 class="heading-underline text-transform-none">Test Results</h5>
					<div class="mb-5">
						<?php echo $results; ?>
					</div>
				<?php endif; ?>

				<?php if ( $accomplishments ): ?>
					<h5 class="heading-underline text-transform-none">Accomplishments</h5>
					<div class="mb-5">
						<?php echo $accomplishments; ?>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-lg-6">
						<h6>Focus Area:</h6>

					</div>

					<div class="col-lg-6">
						<h6>Project Type:</h6>

					</div>
				</div>
			</div>

			<!-- Files and Sponsor -->
			<div class="col-lg-5">
				<?php if ( $pdf ): ?>
					<div class="card bg-faded mb-3">
						<div class="card-block text-center">
							<div class="font-size-lg">Full Project (PDF):</div>
							<a href="<?php echo $pdf['url']; ?>">
								<?php echo $pdf['filename']; ?>
							</a>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $image ): ?>
					<div class="mb-3">
						<img class="img-fluid" src="<?php echo $image; ?>">
					</div>
				<?php endif; ?>

				<?php if ( $sponsorName || $sponsorLogo || $sponsorLink ): ?>
					<div class="card mb-3">
						<div class="card-block text-center">
							<div class="font-size-lg mb-1">Sponsor:</div>
							<?php if ( $sponsorLogo ): ?>
								<div class="mb-1">
									<img class="w-50" src="<?php echo $sponsorLogo; ?>">
								</div>
							<?php endif; ?>
							<?php if ( $sponsorName ): ?>
								<div class="font-weight-bold mb-1"><?php echo $sponsorName; ?></div>
							<?php endif; ?>
							<?php if ( $sponsorLink ): ?>
								<a href="<?php echo $sponsorLink; ?>"><?php echo $sponsorLink; ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
