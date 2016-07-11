<?php 

$aree_menthalia=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'menthalia-area',
	)
	);
$team=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'team',
	)
	);
$sfondo_blog_url=get_field('immagine_sfondo_blog','options');
$video_mp4=get_field('video_mp4','options');
$video_webm=get_field('video_webm','options');
$video_ogv=get_field('video_ogv','options');
 ?> 
 <section id="intro-video">
 		<video id="video_background" preload="auto" autoplay="true" > 
 		<source src="<?php echo $video_webm; ?>" type="video/webm">
        <source src="<?php echo $video_mp4; ?>" type="video/mp4">
        <source src="<?php echo $video_ogv; ?>" type="video/ogg">
			
			 
			This browser does not support video
		</video>

		<div style="" id="video_pattern"></div>
</section>
<section id="area-links">
	<?php 
	if($aree_menthalia){
	?>	
	<ul class="aree-list list">
		
	<?php
		foreach ($aree_menthalia as $key => $value) {
			$post_id=$value->ID;
			$image=get_the_post_thumbnail( $post_id );
			$link_pagina=get_field('link_pagina',$post_id);
			$url=get_field('url_area',$post_id);
			$link=$link_pagina ? $link_pagina : $url;
			$colore=get_field('colore_area',$post_id);
			$subtitle=get_field('sottotitolo',$post_id);
			$side=$key%2===0?'left':'right';			
			?>
		<li class="aree-menthalia" style="background-color:<?php echo $colore; ?>" >
			<div class="container">
			<?php echo '<a class="area-image area-child '.$side.'" href="'. $link.'" >'.$image.'</a>'; 
				echo '<a class="area-title area-child" href="'.  $link.'" ><h3>'.get_the_title( $post_id ).'<span class="subtitle">'.$subtitle.'</span></h3></a><a class="area-content area-child" href="'. $link.'" ><p>'.$value->post_content.'</p></a>';
				
			?>
			</div>
		</li>
	<?php		
		}
		?>
	</ul>	
	<?php
	}
	 ?>
</section>		
<section id="team">
		<?php 
	if($team){
	?>
	<h2 class="section-title"><?php _e('Il Team','sage') ?></h2>
	<ul class="team-list list">
		
	<?php
		foreach ($team as $key => $value) {
			$post_id=$value->ID;
			$image=get_the_post_thumbnail( $post_id );
			$carica=get_field('carica',$post_id);
			$social=get_field('link_social',$post_id);
			
			?>
		<li class="team-member"  >
			<?php echo $image; 
				echo '<div class="team-member-content"><div class="team-member-container"><h3>'.get_the_title( $post_id ).'</h3><p>'.$carica.'</p><a class="member-social" href="'.$social.'"></a></div></div>';
				
			?>

		</li>
	<?php		
		}
		?>
	</ul>	
	<?php
	}
	 ?>
</section>
<section id="blog"><?php 
if (have_posts()) : ?>
<h2 class="section-title"><?php _e('Blog','sage') ?></h2>
<div class="blog-background" style="background-image: url(<?php 	echo $sfondo_blog_url; ?>)">	
 </div>
<div class="posts-container">
<?php 
$args=	array(
		'posts_per_page'   => 3,
	
	);
global $wp_query;
$wp_query= new WP_Query($args);
while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

</div>
<?php endif; ?>

</section> 