<?php
/**
 * Template Name: Contact Page
 *
 * Custom contact page template for the Emerald Isle theme.
 *
 * Loads modular contact page template parts including:
 * - Hero section
 * - Contact form section
 * - Contact CTA section
 *
 * @package Emerald_Isle
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php get_template_part('template-parts/contact/contact-hero'); ?>

    <?php get_template_part('template-parts/contact/contact-form'); ?>

    <?php get_template_part('template-parts/contact/contact-cta'); ?>

</main>

<?php
get_footer();