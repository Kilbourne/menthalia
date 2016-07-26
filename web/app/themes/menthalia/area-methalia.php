<?php
/**
 * Template Name: Area Menthalia
 */
use \Menthalia as Menthalia;

Menthalia\service_menu_background();
if(get_field('video')){
 Menthalia\intro_video();
}elseif(get_the_post_thumbnail( )){
?>
  <section id="static-image" style="background-color: <?php
   echo get_field('background_color_immagine_area'); ?>">

   <?php if(get_field('claim')){echo get_field('claim'); }
   the_post_thumbnail('full');?></section>
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
$right_services=array_filter($services, function($service) {
    return in_array(get_the_ID(),get_field('area',$service->ID));
});
if ($right_services) include 'templates/area-service.php';
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

$right_clienti=array_filter($clienti, function($cliente) {
    return get_field('area',$cliente->ID) && get_field('area',$cliente->ID)[0]===get_the_ID();
});


if ($right_clienti) include 'templates/area-clienti.php' ;


/*
 global $wp_query;
    $old_query=$wp_query;
    $args_team=array(
   'post_type'        => 'clienti',
  'orderby'=>$orderby,
  'order'=>$order
  );

if(is_mobile()){
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
 get_template_part('repeaters', 'team');
endwhile;
echo '</ul>';
endif;
}


global $wp_query;
$original_query=$wp_query;
$wp_query= new WP_Query(array(
    'posts_per_page'   => 99,
  'post_type'        => 'clienti',
  'orderby'=>$orderby,
  'order'=>$order
  ));

if (have_posts()) include 'area-clienti.php';
$wp_query=$original_query;
*/
    if (is_page('ecm' ) ){


        $events=get_posts([
        'post_type'=>'eventi',
        'orderby'=>'meta_value',
        'order'=>'DESC',
        'meta_key'=>'data',
        'posts_per_page'=>3]);
include 'templates/area-eventi.php';
    }
