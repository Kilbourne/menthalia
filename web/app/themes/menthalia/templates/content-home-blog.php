<?php 
use Roots\Sage\Extras;
$image=false;
if(get_the_post_thumbnail()){$image=get_the_post_thumbnail();}
elseif(get_field('immagine_in_evidenza')){
  if(is_numeric(get_field('immagine_in_evidenza'))){
    $image=wp_get_attachment_image(get_field('immagine_in_evidenza'),'full');
  }else{    
    $image='<img src="'.get_field('immagine_in_evidenza').'" alt="">';
  }
}
?>
<article <?php post_class(); ?>>
  <div class="entry-summary">
  <?php if($image){ ?>
  	<div class="entry-image"><a href="<?php the_permalink(); ?>"><?php if(get_the_post_thumbnail()){the_post_thumbnail();} ?></a></div> 
  	<?php } ?>
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php echo Extras\wpse_custom_excerpts(180,get_the_ID()); ?></p>
  </div>
</article>