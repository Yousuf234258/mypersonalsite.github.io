<?php
/**
 * The template part for top header
 *
 * @package VW Personal Trainer 
 * @subpackage vw_personal_trainer
 * @since VW Personal Trainer 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <?php if( get_theme_mod( 'vw_personal_trainer_opening_time') != '') { ?>
          <i class="far fa-clock"></i><span><?php echo esc_html(get_theme_mod('vw_personal_trainer_opening_time',''));?></span>
        <?php }?>
      </div>
      <div class="<?php if( get_theme_mod( 'vw_personal_trainer_header_search') != '') { ?>col-lg-5 col-md-5"<?php } else { ?>col-lg-6 col-md-6"<?php } ?>">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
      <?php if( get_theme_mod( 'vw_personal_trainer_header_search') != '') { ?>
        <div class="col-lg-1 col-md-1">
          <div class="search-box">
            <span><i class="fas fa-search"></i></span>
          </div>
        </div>
      <?php }?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><i class="far fa-window-close"></i></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>