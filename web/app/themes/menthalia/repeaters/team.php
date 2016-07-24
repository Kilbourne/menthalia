<?php         $post_id=get_the_id();
      $image=get_the_post_thumbnail( $post_id );
      $carica=get_field('carica',$post_id);
      $social=get_field('link_social',$post_id);

      ?>
    <li class="team-member"  >
      <?php echo $image;
        echo '<div class="team-member-content"><div class="team-member-container"><h3>'.get_the_title( $post_id ).'</h3><p>'.$carica.'</p><a class="member-social" href="'.$social.'"></a></div></div>';

      ?>

    </li>
