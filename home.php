<?php
/**
 * Blog Archive Template
 *
 * Renders the main blog posts page.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

get_header();
?>

<main id="primary">

    <?php get_template_part( 'template-parts/blog/blog-hero' ); ?>

    <?php get_template_part( 'template-parts/blog/blog-content' ); ?>

</main>

<?php get_footer(); ?>