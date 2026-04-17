<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class('bg-white text-slate-800'); ?>>

        <header class="border-b border-slate-200">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-green-600">
                    <?php bloginfo('name'); ?>
                </a>
                <p class="text-sm text-slate-500"><?php bloginfo('description'); ?></p>
            </div>
        </header>