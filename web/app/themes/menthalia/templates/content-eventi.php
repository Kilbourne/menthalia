<?php 	
$date = strtotime(get_field('data',$post->ID));
 ?>
<article <?php post_class(); ?>>
  <date class="data" ><?php 	echo date('d / m');  ?></date>		 
  <div class="entry-summary">
  	<div class="entry-image <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-content"><?php echo get_the_excerpt(); ?></div>
  </div>
</article>