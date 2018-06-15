<?php

/*

Template Name: Single Artist Page

*/

?>


<?php get_header() ?>


<?php if ( have_posts() ) : while ( have_posts() ) :
            the_post(); $do_not_repeat = $post->ID;?>
<section class="page-title-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x small-center">
           <h1 class="white"><?php the_title(); ?></h1>
        </div>
    </div>
</section>


<section id="about-first-content-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-9 large-8">
                <?php if( get_field('artist_banner_image') ): ?>
                <div class="general-cover-img artist-featured-image" style="background-image:url(<?php the_field('artist_banner_image'); ?>)">
                    <div class="show-for-small-only">
                            <img src="<?php the_field('artist_banner_image'); ?>">
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="cell medium-3 large-4 content-box white">
                <?php if( get_field('artist_hometown') ): ?>
                <div class="artist-schedule">
                    <p><strong>Hometown</strong></p>
                    <h3><?php the_field('artist_hometown') ?></h3>
                </div>
                <?php endif;?>
                <?php if( get_field('artist_upcomming_appearance') ): ?>
                <div class="artist-schedule">
                    <p><strong>Upcomming Appearance</strong></p>
                    <h3><?php the_field('artist_upcomming_appearance') ?></h3>
                </div>
                <?php endif;?>
                <?php if( get_field('artis_basic_style') ): ?>
                <div class="artist-schedule">
                    <p><strong>Basic Style</strong></p>
                    <h3><?php the_field('artis_basic_style') ?></h3>
                </div>
                <?php endif;?>
                <div class="artist-schedule">
                    <?php $artistinsta = get_field('artist_instagram'); if( $artistinsta ): ?>
                    <a target="_blank" href="<?php echo $artistinsta; ?>"><i class="artist-fa fa fa-instagram"></i>
                    </a><?php endif; ?>
                    <?php $artistface = get_field('artist_facebook'); if( $artistface ): ?>
                    <a target="_blank" href="<?php echo $artistface; ?>"><i class="artist-fa fa fa-facebook"></i>
                    </a><?php endif; ?>
                    <?php $artisttwit = get_field('artist_twitter'); if( $artisttwit ): ?>
                    <a target="_blank" href="<?php echo $artisttwit; ?>"><i class="artist-fa fa fa-twitter"></i>
                     </a><?php endif; ?>
                    <?php $artistyou = get_field('artist_youtube'); if( $artistyou ): ?>
                    <a target="_blank" href="<?php echo $artistyou; ?>"><i class="artist-fa fa fa-youtube"></i>
                     </a><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; else: ?>
<?php _e(''); ?>
<?php endif; ?>





<section id="about-first-content-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center">
            <div class="cell medium-8 medium-offset-2">
                <p class="large white">
                    <?php the_field('artist_content_section') ?>
                </p>
            </div>

        </div>
    </div>
</section>





<section id="news-social-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-8 medium-offset-2">
               <p class="large sharetext">Share the hype on
                <a class="sharetext fb-share" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook.">
                <strong>Facebook</strong>
                </a>
                or
                <a class="fb-share" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"   title="Tweet this!">
                <strong>Twitter</strong>
                </a>
            </p>
            </div>

        </div>
    </div>
</section>





<section class="artist-radios-section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x text-center align-center">
            <h1 class="white content-margin-large">Check out these Artists</h1>
        </div>
    </div >


        <div class="grid-container">
            <?php
            $args = array(
              'post_type'       => 'artist',
              'post_status'     => 'publish',
              'posts_per_page'  =>4

             );

            $events = new WP_Query( $args );
            if( $events->have_posts() ) :
            ?>
               <div class="grid-x grid-padding-x align-center">
                <?php
                  while( $events->have_posts() ) :
                    $events->the_post(); if( $post->ID == $do_not_repeat ) continue;
                    ?>
                        <div class="cell small-6 medium-3 element-item ecommerce " data-category="transition">
                          <a href="<?php the_permalink();?>" class="post-preview post-artist text-center content-margin">
                            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                <div class="image"style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
                                </div>
                                <div class="preview-text text-center">
                                    <div class="inner">
                                        <h5><?php the_title();?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
              </div>
            <?php
            else :
              esc_html_e( '' );
            endif;
            ?>

        </div>
    </div>
</section>




<?php get_footer() ?>
