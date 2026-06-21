<?php
/**
 * Blog Post Grid
 *
 * Displays the blog archive post listing.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="mt-10 space-y-4">

    <?php for ( $i = 1; $i <= 6; $i++ ) : ?>

        <article class="group cursor-pointer overflow-hidden rounded-lg border border-slate-200 bg-white">
            <div class="grid grid-cols-[96px_1fr] sm:grid-cols-[140px_1fr] md:grid-cols-[180px_1fr]">

                <div class="h-full overflow-hidden">
                    <img
                        src="https://placehold.co/400x400"
                        alt=""
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                </div>

                <div class="p-4 sm:p-5">
                    <p class="mb-1 text-[10px] font-bold uppercase tracking-wider text-brand-primary sm:mb-1.5 sm:text-xs">
                        WordPress
                    </p>

                    <h3 class="mb-1.5 text-base font-bold leading-tight text-site-text sm:text-xl md:text-2xl">
                        <span class="bg-gradient-to-r from-current to-current bg-[length:0%_2px] bg-left-bottom bg-no-repeat transition-all duration-300 group-hover:bg-[length:100%_2px]">
                            Building Faster WordPress Themes
                        </span>
                    </h3>

                    <p class="mb-2 text-[10px] font-bold uppercase tracking-wide text-site-text-muted sm:mb-3 sm:text-xs">
                        June 4, 2026 <span class="mx-1.5 sm:mx-2">•</span> 5 min read
                    </p>

                    <p class="line-clamp-1 text-xs leading-5 text-site-text-muted sm:line-clamp-2 sm:text-sm sm:leading-6">
                        Streamline your workflow with reusable components and better performance.
                    </p>
                </div>

            </div>
        </article>

    <?php endfor; ?>

</div>