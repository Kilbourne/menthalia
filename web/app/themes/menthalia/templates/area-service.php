<?php
$active_key=0;
$display_services=[];
$display_services['list']='';
$display_services['desc']='';

$display_services['list'].='<div class="service-list-cont" style="background-color: '.get_field('background_servizi').'" ><div class="service-list-wrap"><div class="service-list-background"></div>  <ul class="services-list list" > ';
$display_services['desc'].='<div class="service-desc-cont" style="background-color: '. get_field('background_servizi_descrizioni').'" ><div class="service-desc-wrap"> <div class="linguetta" style="border-bottom-color:'. get_field('background_servizi_descrizioni').'"></div> <ul id="services-desc" class="services-desc list">';

foreach ($right_services as $key => $service){

  $id=$service->ID;
  $active=$active_key===0?'active':'';
  $active_key++;
  $image=get_the_post_thumbnail( $id );
$image = str_replace( 'class="', 'class="menthalia-effect ', $image );
$display_services['list'].='<li class="service '.$active.'"><a href="'.get_permalink( $id ).'"><h3 class="service-title">'.get_the_title( $id ).'</h3>'.$image.'</a></li>';
$display_services['desc'].='<li class="service-desc '.$active.'"><div class="service-detail-cont">  <h3 class="service-title">'.get_the_title( $id ).'</h3>'.$service->post_content.'</div></li>';


}
$display_services['list'].='</ul></div></div>';
$display_services['desc'].='</ul></div></div>';
if($right_services)echo '<section id="services">'.$display_services['list'].$display_services['desc'].'</section> ';
