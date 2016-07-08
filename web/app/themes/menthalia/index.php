<?php //get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) { ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php }else{ ?>

<?php 
$use_page=$paged?$paged-1:0;
 
$offset=$use_page*20;
 echo do_shortcode('[ajax_load_more preloaded="true" offset="'.$offset.'" preloaded_amount="10" post_type="post"  max_pages="2" posts_per_page="5"  transition="fade" destroy_after="2" images_loaded="true"  pause="true"
pause_override="true" transition_container="false" ]' );  ?>

<?php the_posts_navigation(array(
            'prev_text'          => '<< '.__( 'Older posts' ),
            'next_text'          => __( 'Newer posts' ).' >>',
            'screen_reader_text' => __( 'Posts navigation' ),
        ) ); } ?>
