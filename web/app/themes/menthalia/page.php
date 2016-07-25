<?php
use \Menthalia as Menthalia;
while (have_posts()) : the_post();


	if( get_field('video') ){
    Menthalia\intro_video();

  }elseif(get_the_post_thumbnail()){
?>
  <div class="image-cont"><?php the_post_thumbnail('full') ?> </div>
<?php
  }
  //get_template_part('templates/page', 'header');
  get_template_part('templates/content', 'page');
?>
<?php endwhile; ?>
