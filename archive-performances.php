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
<?php get_sidebar(); ?>

<!-- Desktop -->
<div class="container post-archive-wrapper card-flex-wrap">
    <div class="row card-flex-wrap">
        <?php
        $args = array(
            'post_type' => 'performances',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'paged' => $paged
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="col-md-4 mb-4">
                    <div class="card performance-card">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <div class="card-body card-body-wrapper">
                            <h2 class="card-title"><?php the_title(); ?></h2>
                            <h2><?php the_field('dates'); ?></h2>
                            <h3 class="performer-name"><?php the_field('performers_or_group_name'); ?></h3>
                            <h4>
                                <a href="<?php the_field('venue_google_map_link'); ?>" target="_blank"><?php the_field('venue_name'); ?></a>
                            </h4>
                            <h4><?php the_field('ticket_price'); ?></h3>
                            <div class="event-dates">
                                <ul class="event-dates-list">
                                    <li><?php the_field('performance_date_and_time_1'); ?></li>
                                    <li><?php the_field('performance_date_and_time_2'); ?></li>
                                    <li><?php the_field('performance_date_and_time_3'); ?></li>
                                    <li><?php the_field('performance_date_and_time_4'); ?></li>
                                    <li><?php the_field('performance_date_and_time_5'); ?></li>
                                    <li><?php the_field('performance_date_and_time_6'); ?></li>
                                    <li><?php the_field('performance_date_and_time_7'); ?></li>
                                    <li><?php the_field('performance_date_and_time_8'); ?></li>
                                    <li><?php the_field('performance_date_and_time_9'); ?></li>
                                    <li><?php the_field('performance_date_and_time_10'); ?><li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-wrapper">
                            <button class="wp-block-themeisle-blocks-button wp-block-button is-style-primary" onclick="window.location.href='<?php the_field('buy_ticket_link'); ?>'"><?php the_field('button_text'); ?></button>
                        </div>
                    </div>
                </div>

            <?php endwhile;

            wp_reset_postdata();

        else :

            echo __( 'No performances found', 'textdomain' );

        endif;
        ?>
        <?php
        // Pagination
        global $wp_query;
        $total_pages = $wp_query->max_num_pages;
        if ($total_pages > 1) {
            $current_page = max(1, get_query_var('paged'));
            echo '<div class="container"><div class="row"><div class="pagination" style="margin:0 auto;">';
            echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            ));
            echo '</div></div></div>';
        }
        ?>

    </div>
</div>

<!-- Mobile -->


<?php get_footer(); ?>
