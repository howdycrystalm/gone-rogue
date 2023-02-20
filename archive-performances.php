<?php
/*
* Template Name: Performances Archive
*/

get_header(); ?>
<div class="container">
    <div class="row">
        <h1 class="heading-position"><?php echo get_the_archive_title();?></h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'performances',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="col-md-4 mb-4">
                    <div class="card performance-card">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title(); ?></h2>
                            <h3><?php the_field('performers_or_group_name'); ?></h3>
                            <h4>
                                <a href="<?php the_field('venue_google_map_link'); ?>"><?php the_field('venue_name'); ?></a>
                            </h4>
                            <h4><?php the_field('ticket_price'); ?></h3>
                            <div class="dates-times">
                                <h4><?php the_field('performance_date_and_time_1'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_2'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_3'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_4'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_5'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_6'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_7'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_8'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_9'); ?></h4>
                                <h4><?php the_field('performance_date_and_time_10'); ?></h4>
                            </div>
                        </div>
                        <button class="wp-block-themeisle-blocks-button wp-block-button is-style-primary" onclick="window.location.href='<?php the_field('buy_ticket_link'); ?>'">
                        <?php the_field('button_text'); ?>
                        </button>
                    </div>
                </div>

            <?php endwhile;

            wp_reset_postdata();

        else :

            echo __( 'No performances found', 'textdomain' );

        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
