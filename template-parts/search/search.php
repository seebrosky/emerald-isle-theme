<?php
/**
 * Search Panel Template
 *
 * Renders the site search overlay panel.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<div id="site-search-panel" class="site-search-panel">
    <div class="mx-auto flex max-w-6xl items-center gap-2 px-6 py-6">

        <form
            role="search"
            method="get"
            action="<?php echo esc_url(home_url('/')); ?>"
            class="w-full pr-2.5"
        >
            <div class="relative w-full">
                <input
                    type="search"
                    name="s"
                    placeholder="<?php esc_attr_e('Search themes, plugins, docs...', 'emerald-isle'); ?>"
                    class="h-10 w-full rounded-lg border border-white/10 bg-white/5 pl-4 pr-26 text-sm text-white placeholder:text-white/35 focus:border-emerald-600 focus:outline-none"
                >

                <button
                    type="submit"
                    class="absolute right-0 top-1/2 h-10 -translate-y-1/2 rounded-r-md rounded-l-none bg-emerald-600 px-4 text-sm font-bold text-white transition hover:bg-emerald-700"
                >
                    <?php esc_html_e('Search', 'emerald-isle'); ?>
                </button>
            </div>
        </form>

        <button
            type="button"
            class="site-search-close inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-white/40 text-white/70 transition-colors duration-200 ease-out hover:border-white hover:text-white"
            aria-label="<?php esc_attr_e('Close search', 'emerald-isle'); ?>"
            aria-controls="site-search-panel"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" aria-hidden="true" focusable="false">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

    </div>
</div>
