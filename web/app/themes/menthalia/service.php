<?php
/**
 * Template Name: Service
 */
use Roots\Sage\Extras;
if(get_field('background_servizi')){
	echo '<style>
		#responsive_menu_pro .responsive_menu_pro_menu li.current_page_item > a{background-color:'.get_field('background_servizi').' !important;}
	</style>';
}
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
 <?php if(get_field('claim')){echo get_field('claim'); }echo wp_get_attachment_image( get_field('immagine_area'),'full');?>

		<div id="video_pattern" style="<?php if(get_field('pattern')){ echo 'background-image:url('.wp_get_attachment_url( get_field("pattern"),"full").');' ;}?>
"></div>
		</div>
	<?php }  
  	elseif(get_field('immagine_area')){
?>
	<section id="static-image" style="background-color: <?php
	 echo get_field('background_color_immagine_area'); ?>">

	 <?php if(get_field('claim')){echo get_field('claim'); }echo wp_get_attachment_image( get_field('immagine_area'),'full');?></section> 
<?php
}else{
?>
<section id="parallax">
<img class="background up" src="http://192.168.1.18/menthalia/app/uploads/2016/07/1-5.png"
 alt="">
<img class="background down" src="http://192.168.1.18/menthalia/app/uploads/2016/07/2-5.png" alt="">


  <img class="fiammifero " src="http://192.168.1.18/menthalia/app/uploads/2016/07/3.png" alt="">
</section>
<?php
}
 $services=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'service',
	'order'=>'ASC'

	)
);
$active_key=0;
$display_services=[];
$display_services['list']='';
$display_services['desc']='';
$right_services=[];
foreach ($services as $key => $service){
	if(in_array(get_the_ID(),get_field('area',$service->ID))){
		$right_services[]=$service;
	}
}
if ($right_services){
$display_services['list'].='<div class="service-list-cont" style="background-color: '.get_field('background_servizi').'" ><div class="service-list-wrap"><div class="service-list-background"></div>  <ul class="services-list list" > ';
$display_services['desc'].='<div class="service-desc-cont" style="background-color: '. get_field('background_servizi_descrizioni').'" ><div class="service-desc-wrap"> <div class="linguetta" style="border-bottom-color:'. get_field('background_servizi_descrizioni').'"></div> <ul class="services-desc list">';
foreach ($right_services as $key => $service){


	$id=$service->ID;
	$active=$active_key===$key?'active':'';

$display_services['list'].='<li class="service '.$active.'"><a href="'.get_permalink( $id ).'"><h3 class="service-title">'.get_the_title( $id ).'</h3>'.get_the_post_thumbnail( $id ).'</a></li>';
$display_services['desc'].='<li class="service-desc '.$active.'"><div class="service-detail-cont">	<h3 class="service-title">'.get_the_title( $id ).'</h3>'.$service->post_content.'</div></li>';


}
$display_services['list'].='</ul></div></div>';
$display_services['desc'].='</ul></div></div>';
echo '<section id="services">'.$display_services['list'].$display_services['desc'].'</section> ';
} ?>

 <?php
 $orderby=is_page('medical-agency')?'title':'date';
 $order=is_page('medical-agency')?'ASC':'DESC';
 $clienti=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'clienti',
	'orderby'=>$orderby,
	'order'=>$order
	)
);
$active_key=0;
$right_clienti=[];
$display_clienti=[];
$display_clienti['list']='';

foreach ($clienti as $key => $cliente){
	if(get_field('area',$cliente->ID) && get_field('area',$cliente->ID)[0]===get_the_ID()){
		$right_clienti[]=$cliente;
	}
}

if ($right_clienti){
$display_clienti['list'].='<div class="clienti-list-wrap"> <ul class="clienti-list list" > ';
foreach ($right_clienti as $key => $cliente){
	
	$id=$cliente->ID;
	$active=$active_key===$key?'active':'';
	$image=get_the_post_thumbnail( $id )?get_the_post_thumbnail( $id ):'<div class="placeholder"></div>';
	$link=get_field('link_cliente',$id);
$display_clienti['list'].='<li class="cliente '.$active.'">';
if($link)$display_clienti['list'].='<a href="'.$link.'">';
$display_clienti['list'].=$image;
if($link)$display_clienti['list'].='</a></li>';

}

$display_clienti['list'].='</ul></div>';
echo '<section id="customer-logos"><h2 class="section-title">'. __('clienti','sage').'</h2>'.$display_clienti['list'].'</section> ';
}
    if (is_page('ecm' ) ){
      $today = date('Ymd');
        global $wp_query;
        $wp_query=new WP_Query([
        'post_type'=>'eventi',
        'order'=>'data',
        'order'=>'DESC',
        'posts_per_page'=>3]);?>
        <section id="ecm-event-list" class="archivio-eventi">
 <?php    
if (!have_posts()) { ?>
  <div class="alert alert-warning">
    <?php _e('Non ci sono nuovi eventi in programma.', 'sage'); ?>
    </div>
<?php } ?>
    
    <h3 class="ecm-event-list-title"><?php _e('I nostri Eventi','sage') ?></h3>

  <?php
while (have_posts()) : the_post();
$date=DateTime::createFromFormat('Ymd',get_field('data',$post->ID));
  	?>
  	
  	
  <?php

	

$date = strtotime(get_field('data',$post->ID));
 ?>
<article <?php post_class(); ?>>  
  
  	<div class="entry-image <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
  	<div class="entry-summary">
  	<date class="data" ><?php 	echo date('d / m',$date);  ?></date>
  	<a class="entry-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    		 
  </div>
</article> 
<?php endwhile; ?>
<a class="archivio-link" href="<?php echo get_post_type_archive_link( 'eventi' ); ?>"><?php _e('Consulta l\'archivio degli eventi passati.', 'sage'); ?></a>
    
<?php 	  
    }
 ?>
</section>