<?php 
/**
 * Template Name: Language Selector Template
 */
?>
<?php 
$home_en = pll_get_post(4, 'en');
$home_pt = pll_get_post(143, 'pt');

$link_en = get_page_link($home_en); // WP function
$link_pt = get_page_link($home_pt); // WP function

?>
<section class="back-drop">
	<div class="modal-dialog">
		<div class="modal-content">
			<img src="<?php echo bloginfo('template_url') . '/assets/images/header-logo.jpg'; ?>" class="logo">
			<h4>Select a language</h4>
			<div class="flags">
				<a href="<?php echo $link_en; ?>">
					<img src="<?php echo bloginfo('template_url') . '/assets/images/us_round_flag.jpg'; ?>">
				</a>
				<a href="<?php echo $link_pt; ?>">
					<img src="<?php echo bloginfo('template_url') . '/assets/images/br_round_flag.jpg'; ?>">
				</a>
			</div>
		</div>
	</div>
</section>