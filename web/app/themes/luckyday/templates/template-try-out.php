<?php  
/**
* Template Name: Try Out Template
*/
?>

<?php while(have_posts()): the_post(); ?>
	<?php get_template_part('templates/page-header'); ?>
	<section class="section-template intro-text">
		<div class="container">
			<div class="intro-text-content">
				<?php the_content(); ?>
				<hr class="divider center">
			</div>
		</div>
	</section>

	<section class="try-out-section section-template">
		<div class="container">
			<div class="game-block">
				<iframe src="/lucky-day-demo"></iframe>
				<br><br>
				<a href="/buy-it" class="btn btn-brand">Buy it now</a>
			</div>
		</div>
	</section>
<?php endwhile; ?>