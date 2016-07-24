
<?php
$aree_menthalia=get_pages(array(
  'meta_key' => '_wp_page_template',
  'meta_value' => 'area-methalia.php'
));
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
			$image=get_field('icona_home',$post_id);

			$url=get_field('link_esterno',$post_id);
			$link=$url ? $url : get_permalink($post_id) ;
			$colore=get_field('colore_area',$post_id);
			$subtitle=get_field('sottotitolo',$post_id);
			$side=$key%2===0?'left':'right';
			?>
		<li class="aree-menthalia" style="background-color:<?php echo $colore; ?>" >
			<div class="container">
			<?php echo '<a class="area-image area-child '.$side.'" href="'. $link.'" >'.wp_get_attachment_image( $image ,'full').'</a>';
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
    global $wp_query;
    $old_query=$wp_query;
    $args_team=array(
  'post_type'        => 'team',
  );
$detect = new Mobile_Detect;
if($detect->is_mobile()){
  $team_post_per_page=6;
  $args_team['posts_per_page']=$team_post_per_page;
  $wp_query=new WP_Query($args_team );
  echo '<h2 class="section-title">'.__('Il Team','sage').'</h2>
    <ul class="team-list list">';
Menthalia\ajax_load_more('team','6',$team_post_per_page,null);
echo '</ul>';
}else{
$args_team['posts_per_page']=99;
  $wp_query=new WP_Query($args_team );
if(have_posts()):
  echo '<h2 class="section-title">'.__('Il Team','sage').'</h2>
    <ul class="team-list list">';
while (have_posts()) : the_post();
 get_template_part('repeaters/team');
endwhile;
echo '</ul>';
endif;
}

		?>
</section>
<?php


$wp_query= new WP_Query(array(
    'posts_per_page'   => 3,

  ));

if(have_posts()):?>
<section id="blog">
<h2 class="section-title"><?php _e('Blog','sage') ?></h2>
<div class="blog-background" style="background-image: url(<?php 	echo $sfondo_blog_url; ?>)">
 </div>
<div class="posts-container">
<?php
while (have_posts()) : the_post();
  get_template_part('repeaters/blog');
endwhile;
 ?>
</div>
</section>
<?php endif; ?>
