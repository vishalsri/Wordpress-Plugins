<?php

/*

Template Name: All Events Page

*/

?>


<?php get_header() ?>



<section class="page-title-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x small-center">
            <div class="cell">
                <h1 class="white">Events</h1>
            </div>
        </div>
    </div>
</section>



<section id="page-content">

    <div class="isotope-nav grid-container content-margin-large">
        <ul id="filters" class="grid-x grid-margin-x small-center button-group-custom">
                <?php
                    $terms = get_terms("event_category");
                    $count = count($terms);
                        echo '<li class="cell small-6 large-auto"><button title="" data-filter=".all" class="is-checked">All Events</buton></li>';
                    if ( $count > 0 ){

                        foreach ( $terms as $term ) {

                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);
                            echo '<li class="cell small-6 large-auto"><button title="" data-filter=".'.$termname.'">'.$term->name.'</button></li>';
                        }
                    }
                ?>
        </ul>
    </div>




    <div class="grid-container content-margin-large">
        <div class="grid-x grid-margin-x position-relative grid-masonary">

       <?php

       $args = array(
           'post_type' => 'event',
           'posts_per_page' => -1,
           'order' => 'ASC',
           'orderby' => 'meta_value_num',
           'meta_key' => 'date',
           'meta_query' => $meta_query
       );

//       $args = array( 'post_type' => 'event', 'posts_per_page' => -1 );
       $loop = new WP_Query( $args );
       while ( $loop->have_posts() ) : $loop->the_post();

          $terms = get_the_terms( $post->ID, 'event_category' );
          if ( $terms && ! is_wp_error( $terms ) ) :

              $links = array();

              foreach ( $terms as $term ) {
                  $links[] = $term->name;
              }

              $tax_links = join( " ", str_replace(' ', '-', $links));
              $tax = strtolower($tax_links);
          else :
          $tax = '';
          endif; ?>



            <a href="<?php the_permalink();?>" class="cell small-6 medium-4 large-3 event-preview text-center element-item content-margin all <?php echo $tax;?>">
                <div class="event-card-wrap">
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
                    </div>
                    <div class="preview-text text-center">
                        <div class="inner">
                            <h5 class="event-pre-title">AMF PRESENTS</h5>
                            <h3 class="padding-bottom"><?php the_title(); ?></h3>
                            <!-- <?php $link = get_field('events-single-book_button_link'); if( $link ): ?>
                            <div class="blackbtn">TICKETS</div>
                            <?php endif; ?> -->
                        </div>
                    </div>
                </div>
            </a>





      <?php endwhile; ?>


        </div><!-- #portfolio -->

    </div><!-- #page -->




</section>





<?php get_footer() ?>
