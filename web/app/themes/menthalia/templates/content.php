<?php 
use Roots\Sage\Extras;
?>
<article <?php post_class(); ?>>
  <div class="entry-summary">
  <?php if(get_the_post_thumbnail()){ ?>
  	<div class="entry-image <?php //if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
  	<?php } ?>
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php echo Extras\wpse_custom_excerpts(180,get_the_ID()); ?></p>
  </div>
</article>
