<?php 
use Roots\Sage\Extras;

while (have_posts()) : the_post(); ?>
  <?php //get_template_part('templates/page', 'header'); 
	if(get_field('video')){ 
$filename=explode(substr(strrchr(get_field('video'),'.'),0),get_field('video'))[0];
		?>
<div class="video-cont" > 		

<video id="video" preload="auto" autoplay="true" >
<?php if(Extras\get_attachment_id($filename.'.webm')){ ?> 		<source src="<?php echo $filename.'.webm'; ?>" type="video/webm"><?php } ?>
<?php if(Extras\get_attachment_id($filename.'.mp4')){ ?> 
<source src="<?php echo $filename.'.mp4'; ?>" type="video/mp4">	
<?php } ?>
<?php if(Extras\get_attachment_id($filename.'.ogv')){ ?> 	
  
        <source src="<?php echo $filename.'.ogv'; ?>" type="video/ogg">
<?php } ?>
      


			This browser does not support video
		</video>
 
		<div id="video_pattern" style="<?php if(get_field('pattern')){ echo 'background-image:url('.wp_get_attachment_url( get_field("pattern"),"full").');' ;}?>
"></div>
<?php if(get_field('claim')){echo get_field('claim'); }?>

		</div>
	<?php }    
  	elseif(get_the_post_thumbnail()){
  		
  	
  ?>
  <div class="image-cont"><?php the_post_thumbnail('full') ?> </div> 
  <?php } get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
