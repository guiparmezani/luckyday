<header class="banner">
  <div class="container">
    <a class="brand" href="<?= get_page_link(pll_get_post(4, pll_current_language())); ?>"><img src="<?php echo bloginfo('template_url') . '/assets/images/header-logo.jpg'; ?>"></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
