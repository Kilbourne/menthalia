<?php 
use Roots\Sage\Extras;
$text = wp_strip_all_tags( esc_attr( rawurlencode( get_the_title() ) ) );


if(get_the_post_thumbnail()){$image=get_the_post_thumbnail();}
elseif(get_field('immagine_in_evidenza')){
  if(is_numeric(get_field('immagine_in_evidenza'))){
    $image=wp_get_attachment_image(get_field('immagine_in_evidenza'),'full');
  }else{    
    $image='<img src="'.get_field('immagine_in_evidenza').'" alt="">';
  }
}

 ?>
<article <?php post_class('card'); ?>>
  
  	<a href="<?php the_permalink(); ?>"><?php echo $image; ?></a>
  <div class="entry-summary">
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php echo Extras\wpse_custom_wp_trim_excerpt(''); ?>
    <div class="juiz_sps_links  counters_both juiz_sps_displayed_bottom">
<p class="screen-reader-text juiz_sps_maybe_hidden_text">Share the post <?php the_title(); ?></p>

	<ul class="juiz_sps_links_list juiz_sps_hide_name"><li class="juiz_sps_item juiz_sps_link_facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank" title="Share this article on Facebook"><span class="juiz_sps_icon jsps-facebook"></span><span class="juiz_sps_network_name">Facebook</span></a></li><li class="juiz_sps_item juiz_sps_link_twitter"><a href="https://twitter.com/intent/tweet?source=webclient&amp;original_referer=<?php the_permalink(); ?>&amp;text=<?php echo $text; ?>&amp;url=<?php the_permalink(); ?>" rel="nofollow" target="_blank" title="Share this article on Twitter"><span class="juiz_sps_icon jsps-twitter"></span><span class="juiz_sps_network_name">Twitter</span></a></li></ul>
	</div>
  </div>  
</article>