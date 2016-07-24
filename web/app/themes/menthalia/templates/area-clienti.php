<?php
$orderby=is_page('medical-agency')?'title':'date';
$order=is_page('medical-agency')?'ASC':'DESC';
$active_key=0;

$display_clienti=[];
$display_clienti['list']='';

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
