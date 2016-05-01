<?php  
/**
* Template Name: Side Page Template
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

	<section class="slider-section">
		<?php if(have_rows('carousel_items')): ?>
			<div id="side-page-carousel" class="side-page-carousel carousel slide" data-ride="carousel" data-interval="false">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
					<?php $i=0; while(have_rows('carousel_items')): the_row(); ?>
					  <li data-target="#side-page-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i===0) {echo 'active';} ?>"></li>
					<?php $i++; endwhile; ?>
				</ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<?php $i=0; while(have_rows('carousel_items')): the_row(); ?>
				    <div class="item <?php if($i===0) {echo 'active';} ?>" style="background-image: linear-gradient(to right, rgba(0,0,0,.6) 0%, rgba(0,0,0,0) 70%), url(<?php the_sub_field('background_image'); ?>)">
				      <div class="container">
				      	<div class="row">
				      		<div class="col-sm-5">
				      			<h2><?php the_sub_field('title'); ?></h2>
				      			<hr class="divider">
				      			<p><?php the_sub_field('text'); ?></p>
				      		</div>
				      	</div>
				      </div>
				    </div>
					<?php $i++; endwhile; ?>
			  </div>
			</div>
		<?php endif; ?>
	</section>

	<section class="featured-section section-template">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="round-mask">
						<?php echo wp_get_attachment_image(get_field('featured_section_image'), 'full'); ?>
					</div>
				</div>
				<div class="col-sm-8">
					<h3><?php the_field('featured_section_title'); ?></h3>
					<hr class="divider">
					<p><?php the_field('featured_section_text'); ?></p>
				</div>
			</div>
		</div>
	</section>

<?php endwhile; ?>