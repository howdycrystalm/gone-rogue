<?php
/*
* Template Name: Performances Archive
*/

get_header(); ?>

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
                            <h3 class="card-title"><?php the_title(); ?></h2>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <!-- <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e( 'Read more', 'textdomain' ); ?></a> -->
                            <!-- <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e( 'Read more', 'textdomain' ); ?></a> -->
                            <a href="<?php the_field('buy_ticket_link'); ?>" class="btn btn-primary"><?php _e( 'Buy tickets', 'textdomain' ); ?></a>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo get_post_meta( get_the_ID(), 'performance_date', true ); ?></li>
                        </ul> -->
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
