<?php
/**
 * The template part for header
 *
 * @package VW Personal Trainer 
 * @subpackage vw_personal_trainer
 * @since VW Personal Trainer 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-personal-trainer'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>