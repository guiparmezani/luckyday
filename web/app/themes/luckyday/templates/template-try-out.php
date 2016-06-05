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
				<?php if (pll_current_language() === 'en'): ?>
					<a href="/buy-it" class="btn btn-brand">But it Now</a>
					<iframe src="/lucky-day-demo"></iframe>
					<br><br>
				<?php else: ?>
					<iframe src="/lucky-day-demo-pt"></iframe>
					<br><br>
					<a href="/compre-o-jogo" class="btn btn-brand">Compre Agora</a>
				<?php endif ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>