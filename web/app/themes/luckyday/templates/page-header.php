<div class="page-header">
  <div class="main-banner" style="background: linear-gradient(-180deg, rgba(255,157,243,.5) 0%, rgba(255,0,169,.5) 100%), url(<?php if (has_post_thumbnail()){ the_post_thumbnail_url('full'); } ?>) center center no-repeat; background-size: cover;">
		<div class="container">
			<div class="banner-content-wrapper">
				<div class="banner-content">
					<span class="complementary-text"><?php the_field('upon_main_title'); ?></span>
					<h1><?php the_field('main_title'); ?></h1>
					<span class="complementary-text"><?php the_field('beneath_main_title'); ?></span>
				</div>
			</div>
		</div>
	</div>
</div>