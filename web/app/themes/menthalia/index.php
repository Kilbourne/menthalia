<?php //get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) { ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php // get_search_form(); ?>
<?php }else{

get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

// ### Change post type in navigation text

 the_posts_navigation(array(
            'prev_text'          => '<< '.__( 'Older posts' ),
            'next_text'          => __( 'Newer posts' ).' >>',
            'screen_reader_text' => __( 'Posts navigation' ),
        ) );
} ?>
