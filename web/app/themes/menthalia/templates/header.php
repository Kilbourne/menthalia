<?php
  $site_claim=!!get_field('claim_home','options')?get_field('claim_home','options'):get_bloginfo( 'description' );
 ?>
<header class="banner skrollable "  data-0="height:158px;"  data-80="height:118px;">
 <h1 class="site-claim"><?php echo $site_claim; ?></h1>
<div class="menu-container"><?php echo do_shortcode('[responsive_menu_pro]') ?></div>
</header>
