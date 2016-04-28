<?php
/*
* Template Name: Home Template
*/
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="main-banner" style="background: linear-gradient(-180deg, rgba(255,134,0, .78) 0%, rgba(255,228,64, .78) 100%), url(<?php if (has_post_thumbnail()){ the_post_thumbnail_url('full'); } ?>) center center no-repeat; background-size: cover;">
	<div class="container">
		<div class="banner-content-wrapper">
			<div class="banner-content">
				<h1>Lucky Day</h1>
				<p><?php the_content(); ?></p>
				<div class="buttons">
					<a href="/try-the-demo" class="btn btn-brand white">Try The Demo</a>
					<a href="/buy-it-now" class="btn btn-brand white">Buy It Now!</a>
				</div>
			</div>
		</div>
		<a href="#" class="down-angle"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</div>
</div>

<div class="presentation section-template">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h2><?php the_field('first_section_title'); ?></h2>
				<hr class="divider">
				<p><?php the_field('first_section_text'); ?></p>
				<a href="/about-the-game" class="btn btn-brand">Learn More</a>
			</div>
			<div class="col-sm-7 image-container">
				<?php echo wp_get_attachment_image(get_field('first_section_image'), 'full'); ?>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>