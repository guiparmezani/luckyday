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

	<?php if(get_field('featured_section_title')): ?>
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
	<?php endif; ?>
	
	<?php if(have_rows('gallery_items')): ?>
		<section class="photo-gallery">
			<div class="container">
				<div class="row">
			    <?php while(have_rows('gallery_items')): the_row(); $photos = get_sub_field('gallery_photos'); ?>
				    <div class="col-sm-4">
				    	<div class="gallery-card" style="background-image: url(<?php echo $photos[0]['gallery_photo']; ?>)">
				    		<?php while(have_rows('gallery_photos')): the_row(); ?>
				    			<div class="hidden gallery-photo"><?php the_sub_field('gallery_photo'); ?></div>
				    		<?php endwhile; ?>
					      <div class="gallery-card-rollover-block">
						      <h4 class="gallery-name"><?php the_sub_field('gallery_name'); ?></h4>
						      <button type="button" class="btn btn-brand launch-modal-gallery" data-toggle="modal" data-target="#gallery-modal">Launch Gallery</button>
					      </div>
				    	</div>
				    </div>
			    <?php endwhile;  ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Models -->
	<?php
	  $models = new WP_Query([
	      'posts_per_page' => 10,
	      'post_type' => 'model',
	      'post_status' => 'publish',
	    ]
	  );
	?>

	<?php if($models->have_posts()): ?>
		<section class="models-section clearfix">
			<div class="models-list">
				<div class="container">
					<div class="row">
				    <?php $models->rewind_posts(); $i=0; while ($models->have_posts()): $models->the_post(); $fields = get_fields($post->ID); ?>
					    <div class="col-sm-4">
					    	<a href="" class="model-card-wrapper">
						    	<div class="model-card">
						    		<div class="model-card-image-wrapper">
							      	<?php the_post_thumbnail(); ?>
							      	<div class="model-image-src hidden"><?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?></div>
						    		</div>
							      <div class="model-content">
								      <h4 class="model-name"><?php echo $post->post_title; ?></h4>
								      <hr class="divider center">
								      <p class="model-excerpt"><?php the_excerpt(); ?></p>
								      <p class="model-content hidden"><?php echo $post->post_content; ?></p>
							      </div>
							      <div class="model-card-rollover-block">
							      	<p>View full profile</p>
							      </div>
						    	</div>
					    	</a>
					    </div>
				    <?php $i++; endwhile;  ?>
					</div>
				</div>
			</div>
			<div class="model-full-profile section-template">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" class="model-image-src">
						</div>
						<div class="col-sm-6">
							<h3 class="model-name"><?php echo $post->post_title; ?></h3>
				      <hr class="divider">
				      <p class="model-content"><?php echo $post->post_content; ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>


<!-- Gallery Modal -->
<div class="modal fade gallery-modal" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="gallery-modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="gallery-modal-title" id="gallery-modalLabel"></h4>
      </div>
      <div class="gallery-modal-body">
      	<div id="photo-gallery-carousel" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#photo-gallery-carousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#photo-gallery-carousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>