<?php
use Roots\Sage\Extras;
use \Menthalia as Menthalia;
global $post;

$old_year=Menthalia\Data::get_old_year();
$old_month=Menthalia\Data::get_old_month();

   $date=DateTime::createFromFormat('Ymd',get_field('data',$post->ID));
    $year=$date->format('Y');
    $month=$date->format('m');
    if($year!==$old_year || $month!==$old_month){
?>
    <time class="mese-ecm"><?php echo date_i18n('F',strtotime(get_field('data',$post->ID))).' '.$year; ?></time>
<?php
      Menthalia\Data::set_old_year($year);
      Menthalia\Data::set_old_month($month);
    }
 ?>
<article <?php post_class(); ?>>
  <date class="data" ><?php   echo $date->format('d / m');  ?></date>
  <div class="entry-summary">
    <div class="entry-image <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-content"><?php echo Extras\wpse_custom_wp_trim_excerpt('',false); ?></div>
  </div>
</article>
