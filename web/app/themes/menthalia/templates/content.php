<article <?php post_class(); ?>>
  <div class="entry-summary">
  	<div class="entry-image <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
  </div>
</article>
