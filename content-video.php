<section id="video-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x content-box medium white">


            <div class="cell medium-4 small-text-center medium-text-left">
                    <h1 class=""><?php echo get_sub_field( 'title'); ?></h1>
                    <div class="content-margin"><p><?php echo get_sub_field( 'copy'); ?></p></div>
                    <?php $target = get_sub_field( 'open_link_in_new_window' ) == true ? '_blank' : ''; ?>

                    <a href="<?php echo get_sub_field( 'link'); ?>" target="<?php echo $target; ?>" class="button black large"><?php echo get_sub_field( 'callout'); ?></a>
            </div>
            <div class="cell medium-8">
                <div class="responsive-embed breakout-of-box">
                    <?php $image = get_sub_field( 'video_cover' ); ?>

                    <div class="video-cover" style="background-image:url(<?php echo $image['sizes']['large']; ?>);"></div>
                    <i class="play-icon play-icon-video fa fa-play animate"></i>
                    <iframe width="420" height="315" src="<?php echo get_sub_field( 'video_embed' ); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>


        </div>
    </div>
</section>