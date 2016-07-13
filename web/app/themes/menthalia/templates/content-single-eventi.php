<?php while (have_posts()) : the_post(); 
$date = DateTime::createFromFormat('d/m/Y', get_field('data'));
?>
<style  >
  main.main{background-color: <?php  echo get_field('background_color');?>;}
</style>
  <article <?php post_class(); ?>  style="background-color: <?php  echo get_field('article_background_color'); ?> ;">    
  <div class="entry-summary">
    <div class="entry-image"> <?php the_post_thumbnail(); ?></div> 
    <h2 class="entry-title" style="background-color: <?php  echo get_field('title_background_color'); ?> ;color: <?php  echo get_field('title_color'); ?>;"><?php the_title(); ?></h2>
    <h4 class="entry-subtitle" style="background-color: <?php  echo get_field('subtitle_background_color'); ?> ; color: <?php  echo get_field('subtitle_color'); ?>;"><?php echo $date->format('d F Y').(get_field('città')?', '.get_field('città'):'');   ?>  </h4>
    <div class="entry-content"><?php the_content(); ?></div>
    <div class="entry-programma"><a class="fa fa-file-pdf-o" style="color: <?php  echo get_field('title_color'); ?>;" href="<?php echo get_field('programma'); ?>">Scarica il programma del corpo</a>  </div>
  </div>
  <div class="entry-form">  
  <?php   $form_object = get_field('modulo_iscrizione');
    gravity_form_enqueue_scripts($form_object['id'], true);
    gravity_form($form_object['id'], true, true, false, '', true, 1);  ?>
  </div>    
</article>
<?php endwhile; ?>
