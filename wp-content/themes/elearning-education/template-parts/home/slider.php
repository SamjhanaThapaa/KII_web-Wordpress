<?php
/**
 * Template part for displaying slider section
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

?>

<?php if( get_theme_mod( 'elearning_education_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $elearning_education_slide_pages = array();
      for ( $elearning_education_count = 1; $elearning_education_count <= 4; $elearning_education_count++ ) {
        $elearning_education_mod = intval( get_theme_mod( 'elearning_education_slider_page' . $elearning_education_count ));
        if ( 'page-none-selected' != $elearning_education_mod ) {
          $elearning_education_slide_pages[] = $elearning_education_mod;
        }
      }
      if( !empty($elearning_education_slide_pages) ) :
        $elearning_education_args = array(
          'post_type' => 'page',
          'post__in' => $elearning_education_slide_pages,
          'orderby' => 'post__in'
        );
        $elearning_education_query = new WP_Query( $elearning_education_args );
        if ( $elearning_education_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $elearning_education_query->have_posts() ) : $elearning_education_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $elearning_education_excerpt = get_the_excerpt();echo esc_html( elearning_education_string_limit_words( $elearning_education_excerpt,18 ) ); ?></p>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READY TO GETSTARTED','elearning-education'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
