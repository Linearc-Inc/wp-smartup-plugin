<?php

 /**
  * Template Name: single-story.
  */
 ?>
  <?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title( ); ?></h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="highlighted-cause">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <div class="entry-content mt-5">
                        <p><?php the_excerpt()?></p>
                    </div><!-- .entry-content -->
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .highlighted-cause -->

    <div class="short-content-wrap">
        <div class="container">
         <?php  the_content();?>
        </div>
    </div>
    <?php endwhile; ?>

    <?php get_footer(); ?>

