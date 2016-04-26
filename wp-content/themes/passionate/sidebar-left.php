<?php
/**
 * The sidebar containing the left widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passionate
 */

if ( ! is_active_sidebar( 'dt-left-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area dt-sidebar" role="complementary">
    <?php dynamic_sidebar( 'dt-left-sidebar' ); ?>
</aside><!-- #secondary -->
