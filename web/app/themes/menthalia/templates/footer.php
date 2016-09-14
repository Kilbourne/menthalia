<?php   
$facebook=get_field('facebook','options');
$twitter=get_field('twitter','options');
$instagram=get_field('instagram','options');
$linkdn=get_field('linkdn','options');
 ?>
<footer class="content-info">
  <div id="social-section">
  	<ul class="social-list list">
    <?php   
  		if($facebook) echo '<li class="social"><a href="'.$facebook.'"  target="_blank" class="fb"></a></li>';
  		 if($instagram) echo '<li class="social"><a href="'.$instagram.'"  target="_blank" class="insta"></a></li>';
  		if($linkdn) echo '<li class="social"><a href="'.$linkdn.'"  target="_blank" class="linkdn"></a></li>';
  		if($twitter) echo '<li class="social"><a href="'.$twitter.'"  target="_blank" class="twi"></a></li>';
       ?>
  	</ul> 
  </div> 
  <div class="info">

  	<p class="copyr">© 2016 Menthalia | Comunicazione in movimento P.IVA: 06980851213 </p>
  	    <nav class="nav-footer">
      <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav list']);
      endif;
      ?>
    </nav>
  </div> 
</footer>
