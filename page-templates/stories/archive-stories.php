<?php

 /**
  * Template Name: Stories.
  */
 ?>
  <?php get_header();
    $sticky_stories = new WP_Query(
        array(
            'post_type' => 'stories',
            'posts_per_page' => 2,
            'post__in' => get_option('sticky_posts'),
            'meta_query' => array(
                array(
                    'key' => 'pseudosticky',
                    'value' => 'on',
                    'compare' => '=',
                ),
                //more meta conditions can be added here as arrays
        ),
        )
    );
    $stories = new WP_Query(
        array(
            'post_type' => 'stories',
            'posts_per_page' => 6,
            'meta_query' => array(
                array(
                    'key' => 'pseudosticky',
                    'value' => 'off',
                    'compare' => '=',
                ),
                //more meta conditions can be added here as arrays
          ),
    )
);
  $n = 0;
  ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Youth Stories</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="featured-cause">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2 class="entry-title">Featured Stories</h2>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">

<?php while ($sticky_stories->have_posts()) : $sticky_stories->the_post(); ?>
                <div class="col-12 col-lg-6">
                    <div class="cause-wrap d-flex flex-wrap justify-content-between">
                        <figure class="m-0">
                           <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('medium'); ?></a>
                        </figure>

                        <div class="cause-content-wrap">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <h3 class="entry-title w-100 m-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                <div class="posted-date">
                                    <a href=""><?php the_date(); ?> </a>
                                </div><!-- .posted-date -->

                                <div class="cats-links">
                                    <a href="#"><?php echo get_the_author_meta('display_name', the_author()); ?></a>
                                </div><!-- .cats-links -->
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p class="m-0"><?php the_excerpt(); ?></p>
                            </div><!-- .entry-content -->

                            <div class="entry-footer mt-5">
                                <a href="<?php the_permalink(); ?>" class="btn gradient-bg mr-2">Read Story</a>
                            </div><!-- .entry-footer -->
                        </div><!-- .cause-content-wrap -->
                    </div><!-- .cause-wrap -->
                </div><!-- .col -->
<?php endwhile; wp_reset_query(); ?>
            
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .featured-cause -->

<?php while ($stories->have_posts()) : $stories->the_post(); ?>
<?php if ($n == 0) : ?>
    <div class="our-causes pt-0">
        <div class="container">
            <div class="row">    
<?php endif; ?>


                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cause-wrap">
                        <figure class="m-0">
                            <?php the_post_thumbnail(); ?>
                            <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                <a href="<?php the_permalink(); ?>" class="btn gradient-bg mr-2">Read Story</a>
                            </div><!-- .figure-overlay -->
                        </figure>

                        <div class="cause-content-wrap">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <h3 class="entry-title w-100 m-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p class="m-0"><?php the_excerpt(); ?></p>
                            </div><!-- .entry-content -->

                        </div><!-- .cause-content-wrap -->
                    </div><!-- .cause-wrap -->
                </div><!-- .col -->



<?php ++$n; ?>

<?php if ($n == 3) : ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .our-causes -->
    <div class="highlighted-cause">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <div class="section-heading">
                        <h2 class="entry-title">We Empower through personal development to incubate innovations addressing community and societal problems.</h2>
                    </div><!-- .section-heading -->

                    <div class="entry-content">
                        <p>Positive social transformation and impact (personal, comminity and sociaetal level).</p>
                    </div><!-- .entry-content -->

                    <div class="entry-footer mt-5">
                        <a href="#" class="btn gradient-bg">Contribute to our cause</a>
                    </div><!-- .entry-footer -->
                </div><!-- .col -->

                <div class="col-12 col-lg-5 order-1 order-lg-2">
                <img style="max-width:100%" src="https://smartupfactory.org/wp-content/uploads/2020/06/IMG_9793-scaled.jpg" alt="causes image">                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .highlighted-cause -->
    <div class="our-causes">
        <div class="container">
            <div class="row">
<?php endif; ?>
<?php endwhile; wp_reset_query(); ?>

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .our-causes -->

    <?php get_footer(); ?>