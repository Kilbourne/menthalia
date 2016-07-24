<section id="ecm-event-list" class="archivio-eventi">
 <?php
if ($events) { ?>

    <h3 class="ecm-event-list-title"><?php _e('I nostri Eventi','sage') ?></h3>

  <?php
foreach ($events as $key => $event){
$id=$event->ID;
$date=DateTime::createFromFormat('Ymd',get_field('data',$id));

 ?>
<article class="<?php  echo join( ' ', get_post_class('',$id) ); ?>">

    <div class="entry-image"><a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_post_thumbnail($id); ?></a></div>
    <div class="entry-summary">
    <date class="data" ><?php   echo $date->format('d / m');  ?></date>
    <a class="entry-title" href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a>

  </div>
</article>
<?php } ?>
<a class="archivio-link" href="<?php echo get_post_type_archive_link( 'eventi' ); ?>"><?php _e('Consulta l\'archivio degli eventi passati.', 'sage'); ?></a>
<?php   } ?>
</section>
