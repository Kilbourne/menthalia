<?php
   use Roots\Sage\Extras;
while (have_posts()) : the_post();
?>

  <article <?php post_class(); ?>>
  <?php echo Extras\back_link(); ?>
    <header>

      <?php //get_template_part('templates/entry-meta'); ?>
      <div class="entry-image bg-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full' ); ?></a></div>
      <div class="title"> <h1 class="entry-title"><?php the_title(); ?></h1></div>
        <?php   get_template_part('templates/entry-meta'); ?>
    </header>

    <div class="content">
    <div>
      <?php the_content(); ?>
    </div>

    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
