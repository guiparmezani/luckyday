<?php
/*
* Template Name: Home Template
*/
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="main-banner" style="background: linear-gradient(-180deg, rgba(255,134,0, .78) 0%, rgba(255,228,64, .78) 100%), url(<?php if (has_post_thumbnail()){ the_post_thumbnail_url('full'); } ?>) center center no-repeat; background-size: cover;">
	<div class="container">
		<div class="banner-content-wrapper">
			<div class="banner-content">
				<h1>Lucky Day</h1>
				<p><?php the_content(); ?></p>
				<div class="buttons">
					<?php if (pll_current_language() === 'en'): ?>
						<a href="/try-the-demo" class="btn btn-brand white">Try the Demo</a>
						<a href="/buy-it" class="btn btn-brand white">Buy it Now</a>
					<?php else: ?>
						<a href="/teste" class="btn btn-brand white">Free Demo</a>
						<a href="/compre-o-jogo" class="btn btn-brand white">Compre Agora</a>
					<?php endif ?>
				</div>
			</div>
		</div>
		<a href="#" class="down-angle"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</div>
</section>

<section class="presentation section-template">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h2><?php the_field('first_section_title'); ?></h2>
				<hr class="divider">
				<p><?php the_field('first_section_text'); ?></p>
				<?php if (pll_current_language() === 'en'): ?>
					<a href="/about-the-game" class="btn btn-brand pushdown">Learn More</a>
				<?php else: ?>
					<a href="/sobre-o-jogo" class="btn btn-brand pushdown">Saiba Mais</a>
				<?php endif ?>
			</div>
			<div class="col-sm-7 image-container">
				<?php echo wp_get_attachment_image(get_field('first_section_image'), 'full'); ?>
			</div>
		</div>
	</div>
</section>

<section class="models dark section-template">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="rotated-image-wrapper">
					<?php echo wp_get_attachment_image(get_field('second_section_image'), 'full', null, array('class' => 'black-white')); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<h2><?php the_field('second_section_title'); ?></h2>
				<hr class="divider">
				<p><?php the_field('second_section_text'); ?></p>
				<?php if (pll_current_language() === 'en'): ?>
					<a href="/know-the-models" class="btn btn-brand white pushdown">Know the models</a>
				<?php else: ?>
					<a href="/conheca-as-modelos" class="btn btn-brand white pushdown">Conheça as modelos</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<section class="secure-purchase section-template">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="block-wrapper">
					<?php if (pll_current_language() === 'en'): ?>
						<a href="/buy-it">
							<img src="<?php echo bloginfo('template_url') . '/assets/images/coin-icon.svg'; ?>">
							<span class="block link-label">US$<?php the_field('game_price', 'options'); ?></span>
							<p><?php the_field('price_text'); ?></p>
						</a>
					<?php else: ?>
						<a href="/compre-o-jogo">
							<img src="<?php echo bloginfo('template_url') . '/assets/images/coin-icon.svg'; ?>">
							<span class="block link-label">US$<?php the_field('game_price', 'options'); ?></span>
							<p><?php the_field('price_text'); ?></p>
						</a>
					<?php endif ?>
					
				</div>
			</div>
			<div class="col-sm-4">
				<div class="block-wrapper">
					<?php if (pll_current_language() === 'en'): ?>
						<a href="/buy-it">
							<img src="<?php echo bloginfo('template_url') . '/assets/images/lock-icon.svg'; ?>">
							<span class="block link-label">Secure Payments</span>
							<p><?php the_field('secure_payments_text'); ?></p>
						</a>
					<?php else: ?>
						<a href="/compre-o-jogo">
							<img src="<?php echo bloginfo('template_url') . '/assets/images/lock-icon.svg'; ?>">
							<span class="block link-label">Pagamentos Seguros</span>
							<p><?php the_field('secure_payments_text'); ?></p>
						</a>
					<?php endif ?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="block-wrapper">
					<?php if (pll_current_language() === 'en'): ?>
						<a href="/buy-it">
						<img src="<?php echo bloginfo('template_url') . '/assets/images/controller-icon.svg'; ?>">
						<span class="block link-label">Free short version</span>
						<p><?php the_field('free_demo_text'); ?></p>
					</a>
					<?php else: ?>
						<a href="/compre-o-jogo">
						<img src="<?php echo bloginfo('template_url') . '/assets/images/controller-icon.svg'; ?>">
						<span class="block link-label">Versão curta gratuita</span>
						<p><?php the_field('free_demo_text'); ?></p>
					</a>
					<?php endif ?>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-4 text-right">
				<img src="<?php echo bloginfo('template_url') . '/assets/images/powered-stripe.png'; ?>">
			</div>
			<div class="col-sm-4 text-center">
				<span class="text-center big"><?php if(pll_current_language() === 'en') echo 'OR'; else echo 'OU';?></span>
			</div>
			<div class="col-sm-4 text-left">
				<img src="<?php echo bloginfo('template_url') . '/assets/images/secure-paypal.png'; ?>">
			</div>
		</div>
	</div>
</section>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>