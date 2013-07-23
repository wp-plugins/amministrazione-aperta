<ul>
    <?php
        $args = array(
          'post_type' => 'attachment',
          'post_mime_type' => 'application/pdf,application/msword',
          'numberposts' => -1,
          'post_status' => null,
          'post_parent' => $post->ID,
          'orderby' => 'menu_order',
          'order' => 'desc'
          );
        $attachments = get_posts($args);
        if ($attachments) {
          foreach ($attachments as $attachment) {
	    $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
            echo '<h2><li class="' . $class . '"><a href="'.wp_get_attachment_url($attachment->ID).'">';
            echo $attachment->post_title;
            echo '</a> (';
	    echo _format_bytes(filesize( get_attached_file( $attachment->ID ) ));
	    echo ')</li></h2>';
          }
        }
    ?>
    </ul>