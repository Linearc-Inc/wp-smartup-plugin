<?php  
        $slides = new WP_Query(
            array(
                'post_type' => 'slides',
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'ASC',
            )
        );

?>

<div class="swiper-container hero-slider" style="height:100vh;">
        <div class="swiper-wrapper">


        <?php while ($slides->have_posts()) : $slides->the_post(); ?>
        <div class="swiper-slide hero-content-wrap">
                <img src="<?php the_post_thumbnail() ?>" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1><?php the_title() ?></h1>
                                    <h4><?php echo get_post_meta(get_the_ID(),'_slide_sub_title_key',true) ?></h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p><?php echo get_post_meta(get_the_ID(),'_slide_text_key',true) ?></p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <a href="<?php echo get_post_meta(get_the_ID(),'_slide_btn1_link_key',true) ?>" class="btn gradient-bg mr-2"><?php echo get_post_meta(get_the_ID(),'_slide_btn1_name_key',true) ?></a>
                                    <a href="<?php echo get_post_meta(get_the_ID(),'_slide_btn2_link_key',true) ?>" class="btn orange-border"><?php echo get_post_meta(get_the_ID(),'_slide_btn2_name_key',true) ?></a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->
        <?php endwhile; ?>

        </div><!-- .swiper-wrapper -->

        <div class="pagination-wrap position-absolute w-100">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div><!-- .container -->
        </div><!-- .pagination-wrap -->

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div><!-- .hero-slider -->