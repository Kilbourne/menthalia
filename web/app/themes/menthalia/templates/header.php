<?php
  $site_claim=!!get_field('claim_home','options')?get_field('claim_home','options'):get_bloginfo( 'description' );
  $image_header=wp_get_attachment_image(get_field('image_header','options'),'full');
  $header=$image_header?$image_header:('<h1 class="site-claim">'.$site_claim.'</h1>');
  if( is_front_page())$header='<h1 class="site-claim">'.$site_claim.'</h1>';
 ?>
<header class="banner skrollable "  data-0="height:158px;"  data-80="height:118px;">
 <a href="<?php echo esc_url( home_url() ); ?>"><?php 	echo $header; ?></a>
<div class="menu-container"><?php echo do_shortcode('[responsive_menu_pro]') ?></div>
</header>
