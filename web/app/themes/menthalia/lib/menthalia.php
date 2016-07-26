<?php
namespace Menthalia;
use Roots\Sage\Extras;
add_action('pre_get_posts', __NAMESPACE__ . '\\custom_menthalia_loop');

Class Data{
   private static $old_month = '';
private static $old_year = '';
  public static function set_old_month($name) {
    self::$old_month = $name;
  }

  public static function get_old_month() {
    return self::$old_month;
  }


  public static function set_old_year($name) {
    self::$old_year = $name;
  }

  public static function get_old_year() {
    return self::$old_year;
  }
}

function custom_menthalia_loop($query) {

if (!is_admin() && isset($query->query['post_type']) && $query->query['post_type'] === 'eventi' ) {
      
        
        $query->set('meta_key','data');
        $query->set('order','DESC');
        $query->set('orderby','meta_value');
    }
}

function video_source(){
  $video=get_field('video');
  $filename=explode(substr(strrchr($video,'.'),0),$video)[0];
  $display='';
  foreach (['webm','mp4','ogv'] as $format) {
    if(Extras\get_attachment_id($filename.'.'.$format))
      $display.= '<source src="'.$filename.'.'.$format.'" type="video/'.($format==='ogv'?'ogg':$format ).'" >';
  }
  return $display;
}

function service_menu_background(){
  $color=get_field('background_servizi');
  if($color){
  echo '<style>
    #responsive_menu_pro .responsive_menu_pro_menu li.current_page_item > a{background-color:'.$color.' !important;}
  </style>';
  }
}

function intro_video(){

    $video_pattern= get_field('pattern',get_the_id());
    $claim=get_field('claim',get_the_id());

echo'<div class="video-cont" >
  <video id="video" preload="auto" autoplay="true" >
    '.video_source().'
    This browser does not support video
  </video>
  <div id="video_pattern" style="
  '.($video_pattern?'background-image:url('.wp_get_attachment_url( $video_pattern,"full").');':'').'
 "></div>
  '.($claim?$claim:'').
  '</div>';
}
function ajax_load_more($repeater,$preloaded=10,$per_pages="5",$max_pages="2"){

  global $ajax_load_more;
  global $paged;
  $pagination=$max_pages===null?0:$max_pages;
  $preload=$preloaded===null?"false":"true";
  $post_type=$repeater==='blog'?'post':$repeater;
  $use_page=$paged?$paged-1:0;
  $offset=$use_page*($preloaded+($per_pages*$pagination));

 echo $ajax_load_more->alm_shortcode(["post_type"=>$post_type,"repeater"=>$repeater,"preloaded"=>$preload,"offset"=>$offset,"preloaded_amount"=>$preloaded,   "max_pages"=>$max_pages, "posts_per_page"=>$per_pages,"destroy_after"=>$max_pages,  "transition"=>"fade",  "images_loaded"=>"true",  "pause"=>"true",  "pause_override"=>"true"  ] );
}
