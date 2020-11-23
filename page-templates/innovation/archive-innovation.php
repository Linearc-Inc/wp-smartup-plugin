<?php

/*
 * Template Name: Good to Be Bad
 * Description: A Page Template with a darker design.
 */
 ?>

<?php get_header();

$classes = array(
'col-12 col-md-6 col-lg-4 portfolio-item',
'col-12 col-md-6 col-lg-3 portfolio-item',
'col-12 col-md-6 col-lg-5 portfolio-item',
'col-12 col-md-6 col-lg-5 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-48 portfolio-item',
'col-12 col-md-6 col-lg-4 mt-48 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-72 portfolio-item',
'col-12 col-md-6 col-lg-6 mt-72 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-72 portfolio-item',
'col-12 col-md-6 col-lg-4 portfolio-item',
'col-12 col-md-6 col-lg-3 portfolio-item',
'col-12 col-md-6 col-lg-5 portfolio-item',
'col-12 col-md-6 col-lg-5 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-48 portfolio-item',
'col-12 col-md-6 col-lg-4 mt-48 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-72 portfolio-item',
'col-12 col-md-6 col-lg-6 mt-72 portfolio-item',
'col-12 col-md-6 col-lg-3 mt-72 portfolio-item',
);

$innovations = new WP_Query(
    array(
        'post_type' => 'innovations',
        'posts_per_page' => 18,
        'orderby' => 'date',
        'order' => 'DESC',
    )
);
$n = 0;

?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Innovations</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="portfolio-wrap">
        <div class="container">
            <div class="row portfolio-container">
<?php while ($innovations->have_posts()) : $innovations->the_post(); ?>
            <div class="<?php echo $classes[$n]; ?>">
                    <div class="portfolio-cont">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(0, 400)); ?></a>

                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                        <h4><?php echo get_the_date('Y'); ?> Innovations</h4>
                    </div>
                </div>
            <?php  ++$n; ?>
<?php endwhile; wp_reset_query(); ?>
            <!-- <div class="row">
                <div class="col-12 d-flex justify-content-center mt-72">
                    <a href="#" class="btn gradient-bg load-more-btn">Load More</a>
                </div>
            </div> -->
        </div> <!-- row portfolio-container -->
    </div> <!-- container -->
    </div> <!-- portfolio-wrap -->

    <?php get_footer(); ?>