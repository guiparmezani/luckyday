<?php  
/**
* Template Name: Side Page Template
*/
?>

<?php if(isset($_GET['purchased'])): ?>
	<?php while(have_rows('games', 'options')): the_row(); ?>
		<?php if (sanitize_title($_GET['purchased']) === sanitize_title(get_sub_field('game_name'))): ?>
			<?php if(pll_current_language() === 'en') : ?>
				<iframe width="1" height="1" frameborder="0" src="<?php the_sub_field('game_file'); ?>"></iframe>
			<?php else: ?>
				<iframe width="1" height="1" frameborder="0" src="<?php the_sub_field('game_file_pt'); ?>"></iframe>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

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
						      <button type="button" class="btn btn-brand launch-modal-gallery" data-toggle="modal" data-target="#gallery-modal"><?php if(pll_current_language() === 'en') echo 'Launch Gallery'; else echo 'Abrir Galeria';?></button>
					      </div>
				    	</div>
				    </div>
			    <?php endwhile;  ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(have_rows('games', 'options') && get_field('show_purchase_forms')): ?>
		<section class="games-section clearfix">
			<div class="generic-items-list">
				<div class="container">
					<div class="row">
				    <?php $i=0; while(have_rows('games', 'options')): the_row(); ?>
					    <div class="col-sm-4">
					    	<a href="<?php if (get_sub_field('game_price')){echo '#buy-it-section';} else {echo '#donate-section';} ?>" class="generic-card-wrapper">
						    	<div class="generic-card" id="game-<?php echo $i; ?>">
						    		<div class="generic-card-image-wrapper">
							      	<?php echo wp_get_attachment_image(get_sub_field('game_image'), 'medium'); ?>
						    		</div>
							      <div class="generic-content">
								      <h4 class="generic-name"><?php the_sub_field('game_name'); ?></h4>
								      <hr class="divider center">
								      <p class="generic-excerpt"><?php if(pll_current_language() === 'en') the_sub_field('game_description'); else the_sub_field('game_description_pt_br');?></p>
								      <div class="game-price hidden"><?php the_sub_field('game_price') ?></div>
							      </div>
							      <div class="generic-card-rollover-block">
							      	<?php if (get_sub_field('game_price')): ?>
							      		<p>$<?php the_sub_field('game_price') ?><br><?php if(pll_current_language() === 'en') echo 'Buy it'; else echo 'Compre agora';?></p>
							      	<?php else: ?>
							      		<p><?php if(pll_current_language() === 'en') echo 'Donate/Help fund the project'; else echo 'Doe/ajude a fundar o projeto';?></p>
							      	<?php endif ?>
							      </div>
						    	</div>
					    	</a>
					    </div>
				    <?php $i++; endwhile;  ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(get_field('show_purchase_forms')): ?>
		<section class="buy-it-section section-template generic-full-profile" id="buy-it-section" style="display: none;">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="stripe-section">
							<div class="image-wrapper">
								<img src="<?php echo bloginfo('template_url') . '/assets/images/stripe-logo.png'; ?>">
							</div>
							<p class="gray"><?php if(pll_current_language() === 'en') echo 'Pay using a Credit Card through Stripe.'; else echo 'Pague com um Cartão de Crédito através do Stripe.';?></p>
							<?php $i=0; while(have_rows('games', 'options')): the_row(); ?>
								<div class="stripe-games game-<?php echo $i; ?>">
									<?php if (pll_current_language() === 'en'): ?>
										<?php echo do_shortcode( '[stripe name="Lucky Day" description="' . get_sub_field('game_name') . '" amount="' . str_replace('.', '', get_sub_field('game_price')) . '" success_redirect_url="' . untrailingslashit(get_bloginfo('url')) . '/buy-it?purchased=' . sanitize_title(get_sub_field('game_name')) . '&payment_complete=true" payment_button_label="Pay with Card"]' ); ?>
									<?php else: ?>
										<?php echo do_shortcode( '[stripe name="Lucky Day" description="' . get_sub_field('game_name') . '" amount="' . str_replace('.', '', get_sub_field('game_price')) . '" success_redirect_url="' . untrailingslashit(get_bloginfo('url')) . '/compre-o-jogo?purchased=' . sanitize_title(get_sub_field('game_name')) . '&payment_complete=true" payment_button_label="Comprar"]' ); ?>
									<?php endif; ?>
								</div>
							<?php $i++; endwhile; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="paypal-section">
							<div class="image-wrapper">
								<img src="<?php echo bloginfo('template_url') . '/assets/images/paypal-logo.png'; ?>">
							</div>
							<p class="gray"><?php if(pll_current_language() === 'en') echo 'Pay using your PayPal account.'; else echo 'Pague usando sua conta do PayPal.';?></p>
							<?php $i=0; while(have_rows('games', 'options')): the_row(); ?>
								<div class="paypal-games game-<?php echo $i; ?>">
									<?php if (pll_current_language() === 'en'): ?>
										<?php echo do_shortcode( '[wp_paypal_payment_box email="' . get_field('paypal_email_address', 'options') . '" options="Game:0.01" button_text="Pay Now" new_window="1" return="' . untrailingslashit(get_bloginfo('url')) . '/buy-it?purchased=' . sanitize_title(get_sub_field('game_name')) . '&payment_complete=true"]' ); ?>
									<?php else: ?>
										<?php echo do_shortcode( '[wp_paypal_payment_box email="' . get_field('paypal_email_address', 'options') . '" options="Game:0.01" button_text="Comprar" new_window="1" return="' . untrailingslashit(get_bloginfo('url')) . '/compre-o-jogo?purchased=' . sanitize_title(get_sub_field('game_name')) . '&payment_complete=true"]' ); ?>
									<?php endif; ?>
								</div>
							<?php $i++; endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="donate-section section-template generic-full-profile" id="donate-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="image-wrapper">
							<img src="<?php echo bloginfo('template_url') . '/assets/images/paypal-logo.png'; ?>">
						</div>
						<p><?php if(pll_current_language() === 'en') echo 'This game is under development and will be released soon. You can help funding the development by donating through paypal using the button below.'; else echo 'Esse jogo está sendo desenvolvido e será lançado em breve. Você pode ajudar com os custos de desenvolvimento doando através do Paypal usando o campo abaixo.';?></p>
						<hr class="divider center">
						<p class="gray"><?php if(pll_current_language() === 'en') echo 'Enter the amount you would like to donate:'; else echo 'Entre com o valor que você deseja doar:';?></p>
						<?php if (pll_current_language() === 'en'): ?>
							<?php echo do_shortcode( '[wp_paypal_payment_box email="' . get_field('paypal_email_address', 'options') . '" other_amount=true button_text="Donate" return="' . untrailingslashit(get_bloginfo("url")) . '/buy-it?donation=true"]' ); ?>
						<?php else: ?>
							<?php echo do_shortcode( '[wp_paypal_payment_box email="' . get_field('paypal_email_address', 'options') . '" other_amount=true button_text="Doar" return="' . untrailingslashit(get_bloginfo("url")) . '/compre-o-jogo?donation=true"]' ); ?>
						<?php endif ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Models -->
	<?php
	  $models = new WP_Query([
	      'posts_per_page' => 50,
	      'post_type' => 'model',
	      'post_status' => 'publish',
	    ]
	  );
	?>

	<?php if($models->have_posts()): ?>
		<section class="models-section clearfix">
			<div class="generic-items-list">
				<div class="container">
					<div class="row">
				    <?php $models->rewind_posts(); $i=0; while ($models->have_posts()): $models->the_post(); $fields = get_fields($post->ID); ?>
					    <div class="col-sm-4">
					    	<a href="" class="generic-card-wrapper">
						    	<div class="generic-card">
						    		<div class="generic-card-image-wrapper">
							      	<?php the_post_thumbnail(); ?>
							      	<div class="generic-image-src hidden"><?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?></div>
						    		</div>
							      <div class="generic-content">
								      <h4 class="generic-name"><?php echo $post->post_title; ?></h4>
								      <hr class="divider center">
								      <p class="generic-excerpt"><?php the_excerpt(); ?></p>
								      <p class="generic-content hidden"><?php echo $post->post_content; ?></p>
							      </div>
							      <div class="generic-card-rollover-block">
							      	<p><?php if(pll_current_language() === 'en') echo 'View Full profile'; else echo 'Ver Perfil completo';?></p>
							      </div>
						    	</div>
					    	</a>
					    </div>
				    <?php $i++; endwhile;  ?>
					</div>
				</div>
			</div>
			<div class="generic-full-profile section-template">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" class="generic-image-src">
						</div>
						<div class="col-sm-6">
							<h3 class="generic-name"><?php echo $post->post_title; ?></h3>
				      <hr class="divider">
				      <p class="generic-content"><?php echo $post->post_content; ?></p>
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