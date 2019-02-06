<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php do_action( 'vw_personal_trainer_before_slider' ); ?>

<?php if( get_theme_mod( 'vw_personal_trainer_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_personal_trainer_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_personal_trainer_string_limit_words( $excerpt,25 ) ); ?></p>
              <div class="more-btn">
                <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'vw-personal-trainer' ); ?><i class="fa fa-angle-right"></i></a>
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

<?php do_action( 'vw_personal_trainer_after_slider' ); ?>

<section id="serv-section">
  <div class="container">
    <?php if( get_theme_mod( 'vw_personal_trainer_section_title') != '') { ?>
      <h3><?php echo esc_html(get_theme_mod('vw_personal_trainer_section_title',''));?></h3>
      <hr>
    <?php }?>
    <div class="row">
      <?php
        $catData =  get_theme_mod('vw_personal_trainer_best_services','');
        if($catData){
        $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'vw-personal-trainer'))); ?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
        <div class="col-lg-6 col-md-6">
          <div class="serv-box">
            <div class="row">
              <div class="col-lg-4 col-md-5">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="col-lg-8 col-md-7">
                <h4><?php the_title(); ?></h4>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_personal_trainer_string_limit_words( $excerpt,10 ) ); ?></p>
                <div class="more-btn">
                  <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'vw-personal-trainer' ); ?><i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile;
        wp_reset_postdata();
      } ?>
    </div>
  </div>
</section>

<?php do_action( 'vw_personal_trainer_after_services' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>
