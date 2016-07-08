<?php
/**
 * Template Name: Service
 */
?>
<section id="parallax">
<div class="background up"></div>
  <div class="background down"></div>
  <img class="fiammifero" src="http://192.168.1.18/menthalia/app/uploads/2016/07/3.png" alt="">
</section>
 
 <?php 
 $services=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'service',
	)
);
$active_key=0;
$display_services=[];
$display_services['list']='';
$display_services['desc']='';
if ($services){
$display_services['list'].='<div class="service-list-cont"><div class="service-list-wrap"><div class="service-list-background"></div>  <ul class="services-list list" > ';
$display_services['desc'].='<div class="service-desc-cont"><div class="service-desc-wrap"> <div class="linguetta"></div> <ul class="services-desc list">';
foreach ($services as $key => $service){
	
	if(in_array(get_the_ID(),get_field('area',$service->ID))){ 
	$id=$service->ID;
	$active=$active_key===$key?'active':'';
$display_services['list'].='<li class="service '.$active.'"><a href="'.get_permalink( $id ).'"><h3 class="service-title">'.get_the_title( $id ).'</h3>'.get_the_post_thumbnail( $id ).'</a></li>';
$display_services['desc'].='<li class="service-desc '.$active.'"><div class="service-detail-cont">	<h3 class="service-title">'.get_the_title( $id ).'</h3>'.$service->post_content.'</div></li>';

}
}
$display_services['list'].='</ul></div></div>';
$display_services['desc'].='</ul></div></div>';
echo '<section id="services">'.$display_services['list'].$display_services['desc'].'</section> ';
} ?>

 <?php 
 $clienti=get_posts(
	array(
		'posts_per_page'   => 99,
	'post_type'        => 'clienti',
	)
);
$active_key=0;
$display_clienti=[];
$display_clienti['list']='';

if ($clienti){
$display_clienti['list'].='<div class="clienti-list-wrap"> <ul class="clienti-list list" > ';
foreach ($clienti as $key => $cliente){ 
	$id=$cliente->ID;
	$active=$active_key===$key?'active':'';
	$image=get_the_post_thumbnail( $id )?get_the_post_thumbnail( $id ):'<div class="placeholder"></div>';
$display_clienti['list'].='<li class="cliente '.$active.'"><a href="'.get_permalink( $id ).'">'.$image.'</a></li>';


}

$display_clienti['list'].='</ul></div>';
echo '<section id="customer-logos"><h2 class="section-title">'. __('clienti','sage').'</h2>'.$display_clienti['list'].'</section> ';
} ?>
