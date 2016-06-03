<?php 
$home_en = pll_get_post(4, 'en');
$home_pt = pll_get_post(143, 'pt');

$link_en = get_page_link($home_en); // WP function
$link_pt = get_page_link($home_pt); // WP function

?>

<header class="banner">
  <div class="container">
    <a class="brand" href="<?php if(pll_current_language() === 'en') echo $link_en; else echo $link_pt;?>"><img src="<?php echo bloginfo('template_url') . '/assets/images/header-logo.jpg'; ?>"></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
