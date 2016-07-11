<?php if (!have_posts()) { ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php } 
$old_year=null;
$old_month=null;
while (have_posts()) : the_post(); 
$year=date('Y',strtotime(get_field('data',$post->ID)));
  		$month=date('m',strtotime(get_field('data',$post->ID)));
  if($year!==$old_year || $month!==$old_month){   		
  	?>
  	<time class="mese-ecm"><?php     echo date('F',strtotime(get_field('data',$post->ID))).' '.$year; ?></time>
  	<?php
	  	$old_year=$year;
	  	$old_month=$month;  
  }

  	?>
  <?php 
  
  
  get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation();
