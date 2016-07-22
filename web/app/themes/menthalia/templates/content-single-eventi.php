<?php while (have_posts()) : the_post();
$date=DateTime::createFromFormat('Ymd',get_field('data',$post->ID));
?>
<style  >
  main.main{background-color: <?php  echo get_field('background_color');?>;}
</style>
  <article <?php post_class(); ?>  style="background-color: <?php  echo get_field('article_background_color'); ?> ;">
  <div class="entry-summary">
    <div class="entry-image"> <?php the_post_thumbnail(); ?></div>
    <h2 class="entry-title" style="background-color: <?php  echo get_field('title_background_color'); ?> ;color: <?php  echo get_field('title_color'); ?>;"><?php the_title(); ?></h2>
    <h4 class="entry-subtitle" style="background-color: <?php  echo get_field('subtitle_background_color'); ?> ; color: <?php  echo get_field('subtitle_color'); ?>;"><?php echo date_i18n('d F Y',strtotime(get_field('data',$post->ID))).(get_field('città')?', '.get_field('città'):'');   ?>  </h4>
    <div class="entry-content"><?php the_content(); ?></div>
    <div class="entry-programma"><a class="fa fa-file-pdf-o" style="color: <?php  echo get_field('title_background_color'); ?> ; background-color: <?php  echo get_field('title_color'); ?>;" href="<?php echo get_field('programma'); ?>"><?php _e('Scarica il programma del corso', 'sage'); ?></a>  </div>
  </div>
  <?php if(get_field('show_form')){ ?>
  <div class="entry-form">
  <?php   $form_object = get_field('modulo_iscrizione');
    gravity_form_enqueue_scripts($form_object['id'], true);
    gravity_form($form_object['id'], true, true, false, '', true, 1);  ?>
  </div>
  <?php } ?>
</article>
<?php endwhile; ?>
