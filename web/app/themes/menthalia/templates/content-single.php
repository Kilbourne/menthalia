<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('intro-effect-sliced'); ?>>
    <header>
      
      <?php //get_template_part('templates/entry-meta'); ?>
      <div class="entry-image bg-img <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
      <div class="title"> <h1 class="entry-title"><?php the_title(); ?></h1></div>
      <div class="entry-image bg-img <?php if(!get_the_post_thumbnail()) echo 'demo';?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div> 
    </header>   
    <button class="trigger" data-info="Click to see the header effect"><span>Trigger</span></button> 
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
