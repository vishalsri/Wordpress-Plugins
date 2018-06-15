<?php

/*

Template Name: Festivals Page

*/

?>


<?php get_header() ?>



<section class="page-title-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x small-center">
            <div class="cell">
                <h1 class="white"><?php wp_title(); ?></h1>
            </div>
        </div>
    </div>
</section>





<section id="page-content">

        <div class="isotope-nav grid-container content-margin-xlarge">
          <ul id="filters" class="grid-x grid-margin-x small-center button-group-custom">

            <?php if ( have_posts() ) : while ( have_posts() ) :
            the_post(); ?>


            <li class="festival cell small-12 medium-auto"><a href="#<?php
            // Lets get the page slug
            global $post;
            $post_slug=$post->post_name;
            // For display the data we need to echo it
            echo $post_slug;?>"><?php the_title();?></a></li>
                        <?php endwhile; else: ?>
            <?php _e(''); ?>
            <?php endif; ?>


          </ul>
        </div>





    <?php if ( have_posts() ) : while ( have_posts() ) :
        the_post(); ?>
        <?php $class= (++$j % 2 == 0) ? 'even' : 'odd'; ?>



    <section class="grid-container small-padding">
        <div class="grid-x grid-padding-x">
            <a name="<?php
            // Lets get the page slug
            global $post;
            $post_slug=$post->post_name;
            // For display the data we need to echo it
            echo $post_slug;?>"></a>


           <div class="cell medium-6 <?php echo $class; ?>-order1 festival-wrap">
            <a href="<?php echo get_permalink();?>">
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <div class="festival-image">
                  <img src="<?php echo $backgroundImg[0]; ?>">
                </div>
              </a>
            </div>

            <div class="cell medium-6 <?php echo $class; ?>-order2 festival-content">
                <p class="large"><?php the_field('festival_large_content');?></p>
                <p><?php the_field('event_single_content') ?></p>
                <div style="padding-top: 40px;">
                <?php
                $linktkt = get_field('festival_first_button_link');
                if( $linktkt ): ?>
                  <a href="<?php echo $linktkt; ?>" target="_blank" class="fest-button"><?php the_field('festival_first_button_text');?></a>
                <?php endif; ?>
                 <?php
                 $linksite = get_field('festival_second_button_link');
				 echo '<pre>';print_r($linksite);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
                if( $linksite ): ?>
                  <a href="<?php echo $linksite; ?>" target="_blank" class="fest-button"><?php the_field('festival_second_button_text');?></a> <?php endif; ?>
                  <?php if ( get_field( 'festival_gallery' )  ): ?>
                  <a class="fest-button ps-trigger">GALLERY</a>
                  <?php endif; ?>


                    <ul class="hide gallery" id="gallery-<?php echo $num_locations; ?>" data-index="<?php echo $num_locations; ?>">
                        <?php $images = get_field( 'festival_gallery' ); ?>
                        <?php $size = 'large'; ?>

                        <?php $i = 0; ?>
                        <?php foreach( $images as $image ) : ?>

                            <?php $width        = $image['sizes'][$size . '-width']; ?>
                            <?php $height       = $image['sizes'][$size . '-height']; ?>
                            <?php $dimensions   = $width . 'x' . $height; ?>

                            <li class="item">
                                <a class="image" href="<?php echo $image['sizes']['large'] ?>" itemprop="contentUrl" data-width="<?php echo $image['sizes']['large-width']; ?>" data-height="<?php echo $image['sizes']['large-height']; ?>" data-index="<?php echo $i; ?>">
                                    <!-- <img src="<?php echo $image['sizes']['thumbnail']; ?>" itemprop="thumbnail" alt="<?php echo $image['alt']; ?>"> -->
                                </a>
                            </li>

                            <?php ++$i; ?>
                        <?php endforeach; ?>
                    </ul>





                </div>
            </div>


        </div>
    </section>


    <?php endwhile; else: ?>
    <?php _e(''); ?>
    <?php endif; ?>




</section>







<?php get_footer() ?>
