
<?php if (!have_posts()) { ?>
  <div class="alert alert-warning">
    <?php _e('Non ci sono nuovi eventi in programma.', 'sage'); ?>
  </div>  
<?php } 
$old_year=null;
$old_month=null;
while (have_posts()) : the_post(); 
$date=DateTime::createFromFormat('Ymd',get_field('data',$post->ID));
$year=$date->format('Y');
  		$month=$date->format('m');
  if($year!==$old_year || $month!==$old_month){   		
  	?>
  	<time class="mese-ecm"><?php     echo date_i18n('F',strtotime(get_field('data',$post->ID))).' '.$year; ?></time>
  	<?php
	  	$old_year=$year;
	  	$old_month=$month;  
  }

  	?>
  <?php 
  
  
  get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation();
