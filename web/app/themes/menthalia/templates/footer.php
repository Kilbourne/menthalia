<footer class="content-info">
  <div id="social-section">
  	<ul class="social-list list">
  		<li class="social"><a href="" class="fb"></a></li>
  		<li class="social"><a href="" class="insta"></a></li>
  		<li class="social"><a href="" class="linkdn"></a></li>
  		<li class="social"><a href="" class="twi"></a></li>
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
