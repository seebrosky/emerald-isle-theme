<?php
/**
 * Register Emerald Isle Style Guide admin page
 */
add_action('admin_menu', function () {
    add_submenu_page(
        'themes.php',
        'Emerald Isle Style Guide',
        'Emerald Isle Style Guide',
        'manage_options',
        'emerald-isle-styleguide',
        'emerald_isle_render_styleguide_page'
    );
});

/**
 * Load main.css for the style guide page.
 *
 * Enqueue normally, but also inject a <link> in admin_head
 * because VIP/admin fails to print enqueued theme styles on this screen.
 */
add_action('admin_enqueue_scripts', function ($hook) {

    if ( $hook !== 'appearance_page_emerald-isle-styleguide' ) {
        return;
    }

    $css_rel  = '/assets/css/main.css';
    $css_path = get_template_directory() . $css_rel;
    $css_url  = get_template_directory_uri() . $css_rel;

    $ver = file_exists($css_path) ? filemtime($css_path) : null;

    // Normal enqueue
    wp_enqueue_style('emerald-isle-styleguide-main-css', $css_url, [], $ver);

    // Stash values for admin_head injection
    $GLOBALS['emerald_isle_styleguide_main_css_href'] = $ver ? add_query_arg('ver', $ver, $css_url) : $css_url;
});

/**
 * Guaranteed <link> output for the style guide page.
 */
add_action('admin_head', function () {

    if ( empty($_GET['page']) || $_GET['page'] !== 'emerald-isle-styleguide' ) {
        return;
    }

    $href = $GLOBALS['emerald_isle_styleguide_main_css_href'] ?? null;

    if ( empty($href) ) {
        // Fallback if enqueue hook didn't run
        $href = get_template_directory_uri() . '/assets/css/main.css';
    }

    echo '<link rel="stylesheet" id="emerald-isle-styleguide-main-css-direct" href="' . esc_url($href) . '">' . "\n";
}, 1);

function emerald_isle_render_styleguide_page() {

    if ( ! current_user_can('manage_options') ) {
        wp_die('Unauthorized');
    }

    ?>
    <div class="wrap">
        <div class="max-w-7xl mx-auto mt-6">

            <h1 class="!text-4xl font-black !mb-2">Emerald Isle Style Guide</h1>

            <div class="grid gap-10">

                <!-- Color Palette -->
                <section class="p-6 rounded-md border border-neutral-300 bg-white">
                    <h2 class="!text-2xl font-black !mb-4 !mt-0">Color Palette</h2>

                    <?php
                        $palette_tile  = 'p-4 rounded-md border border-neutral-250 bg-white';
                        $palette_code  = 'block w-full px-2 py-1 rounded bg-neutral-100 border border-neutral-250 text-neutral-700 text-[12px] font-mono break-words cursor-pointer hover:bg-neutral-250 transition-colors focus:outline-none';
                        $palette_label = 'text-sm font-semibold mb-2';
                        $palette_hex = 'text-[11px] text-site-text-muted font-mono';

                        /**
                         * Palette entries:
                         * - 'css' references a CSS variable (design token), e.g. --color-emerald-900
                         * - Swatches are rendered using that variable via inline style
                         * - 'token' is the source of truth (copied + displayed in UI)
                         *
                         * Note:
                         * Tailwind utility swatches (e.g. bg-*) are supported but not used here.
                         */
                        $colors = [
                            // Emerald (dark → light)
                            ['label' => 'Emerald 900', 'css' => '--color-emerald-900', 'token' => '--color-emerald-900'],
                            ['label' => 'Emerald 700', 'css' => '--color-emerald-700', 'token' => '--color-emerald-700'],
                            ['label' => 'Emerald 600', 'css' => '--color-emerald-600', 'token' => '--color-emerald-600'],
                            ['label' => 'Emerald 500', 'css' => '--color-emerald-500', 'token' => '--color-emerald-500'],
                            ['label' => 'Emerald 100', 'css' => '--color-emerald-100', 'token' => '--color-emerald-100'],

                            // Tan
                            ['label' => 'Tan 100', 'css' => '--color-neutral-tan-100', 'token' => '--color-neutral-tan-100'],
                            ['label' => 'Tan 200', 'css' => '--color-neutral-tan-200', 'token' => '--color-neutral-tan-200'],
                            ['label' => 'Tan 300', 'css' => '--color-neutral-tan-300', 'token' => '--color-neutral-tan-300'],
                            ['label' => 'Tan 400', 'css' => '--color-neutral-tan-400', 'token' => '--color-neutral-tan-400'],

                            // Neutrals
                            ['label' => 'Neutral 900', 'css' => '--color-neutral-900', 'token' => '--color-neutral-900'],
                            ['label' => 'Neutral 600', 'css' => '--color-neutral-600', 'token' => '--color-neutral-600'],
                            ['label' => 'Neutral 100', 'css' => '--color-neutral-100', 'token' => '--color-neutral-100'],

                            // Base
                            ['label' => 'White', 'css' => '--color-white', 'token' => '--color-white'],
                        ];
                    ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">

                        <?php foreach ($colors as $color): ?>
                        <?php
                            $swatch_class = 'h-20 rounded-md border border-neutral-300 js-swatch';
                            $swatch_style = '';

                            // Tailwind utility swatch (e.g., bg-amber-500)
                            if ( ! empty($color['tw']) ) {
                            $swatch_class .= ' ' . $color['tw'];
                            }

                            // CSS variable swatch (e.g., --color-neutral-900)
                            if ( ! empty($color['css']) ) {
                            $swatch_style = 'background-color: var(' . $color['css'] . ');';
                            }

                            $token = $color['token'];
                        ?>

                        <div class="dkcc-palette-tile <?php echo esc_attr($palette_tile); ?>">

                            <!-- Swatch (token-driven) -->
                            <div
                            class="<?php echo esc_attr($swatch_class); ?>"
                            style="<?php echo esc_attr($swatch_style); ?>"
                            data-token="<?php echo esc_attr($token); ?>"
                            title="<?php echo esc_attr($token); ?>"
                            ></div>

                            <!-- Label -->
                            <div class="<?php echo esc_attr($palette_label); ?>">
                            <?php echo esc_html($color['label']); ?>
                            </div>

                            <!-- Token (copyable) -->
                            <code
                            class="<?php echo esc_attr($palette_code); ?>"
                            role="button"
                            tabindex="0"
                            title="Click to copy token"
                            onclick="navigator.clipboard.writeText(this.dataset.copy)"
                            onkeydown="if(event.key==='Enter' || event.key===' '){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                            data-copy="<?php echo esc_attr($token); ?>"
                            >
                            <?php echo esc_html($token); ?>
                            </code>

                            <!-- HEX (auto-filled by JS, copyable) -->
                            <div
                            class="js-hex mt-2 ml-1 cursor-pointer <?php echo esc_attr($palette_hex); ?>"
                            role="button"
                            tabindex="0"
                            title="Click to copy hex"
                            data-copy=""
                            onclick="if(this.dataset.copy){ navigator.clipboard.writeText(this.dataset.copy); }"
                            onkeydown="if((event.key==='Enter' || event.key===' ') && this.dataset.copy){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                            >
                            —
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>                
                </section>

                <!-- Semantic Colors -->
                <section class="p-6 rounded-md border border-neutral-300 bg-white">
                    <h2 class="!text-2xl font-black !mb-4 !mt-0">Semantic Colors</h2>

                    <?php
                        $semantic_colors = [
                            ['label' => 'Primary', 'css' => '--color-primary', 'token' => '--color-primary', 'use' => 'Primary buttons, links, brand accents'],
                            ['label' => 'Primary Hover', 'css' => '--color-primary-hover', 'token' => '--color-primary-hover', 'use' => 'Button hover states'],
                            ['label' => 'Primary Muted', 'css' => '--color-primary-muted', 'token' => '--color-primary-muted', 'use' => 'Secondary green accents'],
                            ['label' => 'Primary Subtle', 'css' => '--color-primary-subtle', 'token' => '--color-primary-subtle', 'use' => 'Soft hover backgrounds'],

                            ['label' => 'Text', 'css' => '--color-text', 'token' => '--color-text', 'use' => 'Main body text'],
                            ['label' => 'Text Muted', 'css' => '--color-text-muted', 'token' => '--color-text-muted', 'use' => 'Secondary text, descriptions'],
                            ['label' => 'Text on Dark', 'css' => '--color-text-dark-bg', 'token' => '--color-text-dark-bg', 'use' => 'Text on dark green sections'],

                            ['label' => 'Background', 'css' => '--color-background', 'token' => '--color-background', 'use' => 'Default page background'],
                            ['label' => 'Background Soft', 'css' => '--color-background-soft', 'token' => '--color-background-soft', 'use' => 'Soft section backgrounds'],

                            ['label' => 'Surface 1', 'css' => '--color-surface-1', 'token' => '--color-surface-1', 'use' => 'Light panels / cards'],
                            ['label' => 'Surface 2', 'css' => '--color-surface-2', 'token' => '--color-surface-2', 'use' => 'Light green sections'],
                            ['label' => 'Surface 3', 'css' => '--color-surface-3', 'token' => '--color-surface-3', 'use' => 'Tan section contrast'],

                            ['label' => 'Border Light', 'css' => '--color-border-light', 'token' => '--color-border-light', 'use' => 'Cards, dividers, subtle outlines'],

                            ['label' => 'Accent', 'css' => '--color-accent', 'token' => '--color-accent', 'use' => 'Warm accent / contrast color'],
                            ['label' => 'Accent Hover', 'css' => '--color-accent-hover', 'token' => '--color-accent-hover', 'use' => 'Accent hover states'],
                        ];
                    ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
                        <?php foreach ($semantic_colors as $color): ?>
                            <?php
                                $swatch_style = 'background-color: var(' . $color['css'] . ');';
                                $token = $color['token'];
                            ?>

                            <div class="dkcc-palette-tile <?php echo esc_attr($palette_tile); ?>">
                                <div
                                    class="h-20 rounded-md border border-neutral-300 js-swatch"
                                    style="<?php echo esc_attr($swatch_style); ?>"
                                    data-token="<?php echo esc_attr($token); ?>"
                                    title="<?php echo esc_attr($token); ?>"
                                ></div>

                                <div class="<?php echo esc_attr($palette_label); ?>">
                                    <?php echo esc_html($color['label']); ?>
                                </div>

                                <p class="mb-2 text-[12px] leading-5 text-site-text-muted">
                                    <?php echo esc_html($color['use']); ?>
                                </p>

                                <code
                                    class="<?php echo esc_attr($palette_code); ?>"
                                    role="button"
                                    tabindex="0"
                                    title="Click to copy token"
                                    onclick="navigator.clipboard.writeText(this.dataset.copy)"
                                    onkeydown="if(event.key==='Enter' || event.key===' '){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                                    data-copy="<?php echo esc_attr($token); ?>"
                                >
                                    <?php echo esc_html($token); ?>
                                </code>

                                <div
                                    class="js-hex mt-2 ml-1 cursor-pointer <?php echo esc_attr($palette_hex); ?>"
                                    role="button"
                                    tabindex="0"
                                    title="Click to copy hex"
                                    data-copy=""
                                    onclick="if(this.dataset.copy){ navigator.clipboard.writeText(this.dataset.copy); }"
                                    onkeydown="if((event.key==='Enter' || event.key===' ') && this.dataset.copy){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                                >
                                    —
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>                

                <!-- Light Section -->
                <section class="btn-section p-6 rounded-md border border-neutral-300 bg-white min-h-[140px]">
                    <h2 class="!text-2xl font-black !mb-4 !mt-0">Buttons (Light)</h2>

                    <?php
                        $light_tile = 'p-4 rounded-md border border-neutral-300 bg-white';
                        $light_code = 'block w-full px-2 py-1 rounded bg-neutral-100 border border-neutral-300 text-neutral-900 text-[12px] font-mono break-words cursor-pointer hover:bg-neutral-tan-200 transition-colors focus:outline-none';
                        $light_text = 'text-[12px] text-neutral-600';
                        $light_btn_wrap = 'flex justify-center';
                        $light_code_wrap = 'mt-3 text-center ' . $light_text;

                        $render_light_tile = function( $control_html, $class_string ) use ( $light_tile, $light_btn_wrap, $light_code_wrap, $light_code ) {
                        ?>
                        <div class="<?php echo esc_attr($light_tile); ?>">
                            <div class="<?php echo esc_attr($light_btn_wrap); ?>">
                                <?php echo $control_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>

                            <div class="<?php echo esc_attr($light_code_wrap); ?>">
                                <code
                                    class="<?php echo esc_attr($light_code); ?>"
                                    role="button"
                                    tabindex="0"
                                    title="Click to copy"
                                    onclick="navigator.clipboard.writeText(this.dataset.copy)"
                                    onkeydown="if(event.key==='Enter' || event.key===' '){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                                    data-copy="<?php echo esc_attr(trim($class_string)); ?>"
                                ><?php echo esc_html($class_string); ?></code>
                            </div>
                        </div>
                        <?php
                        };
                    ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
                        <?php
                        $render_light_tile(
                            '<button type="button" class="btn btn-primary">Primary</button>',
                            'btn btn-primary'
                        );

                        $render_light_tile(
                            '<a class="btn btn-primary" href="#">Primary Link</a>',
                            'btn btn-primary'
                        );

                        $render_light_tile(
                            '<button type="button" class="btn btn-outline">Outline</button>',
                            'btn btn-outline'
                        );

                        $render_light_tile(
                            '<a class="btn btn-outline" href="#">Outline Link</a>',
                            'btn btn-outline'
                        );

                        $render_light_tile(
                            '<button type="button" class="btn btn-outline-dark">Outline Dark</button>',
                            'btn btn-outline-dark'
                        );

                        $render_light_tile(
                            '<button type="button" class="btn btn-soft">Soft</button>',
                            'btn btn-soft'
                        );

                        $render_light_tile(
                            '<button type="button" class="btn btn-text">Text Button</button>',
                            'btn btn-text'
                        );
                        ?>
                    </div>
                </section>

                <!-- Dark Section -->
                <section class="btn-section darkmode p-6 rounded-md border border-neutral-300 brand-gradient">
                    <h2 class="!text-2xl font-black !text-white !mb-4 !mt-0">Buttons (Dark)</h2>

                    <?php
                        $dark_tile = 'p-4 rounded-md border border-white/20 bg-white/10 min-h-[140px]';
                        $dark_code = 'block w-full px-2 py-1 rounded bg-black/20 border border-white/20 text-white text-[12px] font-mono break-words cursor-pointer hover:bg-black/30 transition-colors focus:outline-none';
                        $dark_text = 'text-[12px] text-white/75';
                        $dark_btn_wrap = 'flex justify-center';
                        $dark_code_wrap = 'mt-3 text-center ' . $dark_text;

                        $render_dark_tile = function( $control_html, $class_string ) use ( $dark_tile, $dark_btn_wrap, $dark_code_wrap, $dark_code ) {
                        ?>
                        <div class="<?php echo esc_attr($dark_tile); ?>">
                            <div class="<?php echo esc_attr($dark_btn_wrap); ?>">
                                <?php echo $control_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>

                            <div class="<?php echo esc_attr($dark_code_wrap); ?>">
                                <code
                                    class="<?php echo esc_attr($dark_code); ?>"
                                    role="button"
                                    tabindex="0"
                                    title="Click to copy"
                                    onclick="navigator.clipboard.writeText(this.dataset.copy)"
                                    onkeydown="if(event.key==='Enter' || event.key===' '){ event.preventDefault(); navigator.clipboard.writeText(this.dataset.copy); }"
                                    data-copy="<?php echo esc_attr(trim($class_string)); ?>"
                                ><?php echo esc_html($class_string); ?></code>
                            </div>
                        </div>
                        <?php
                        };
                    ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
                        <?php
                        $render_dark_tile(
                            '<button type="button" class="btn btn-light">Light</button>',
                            'btn btn-light'
                        );

                        $render_dark_tile(
                            '<a class="btn btn-light" href="#">Light Link</a>',
                            'btn btn-light'
                        );

                        $render_dark_tile(
                            '<button type="button" class="btn btn-outline-light">Outline Light</button>',
                            'btn btn-outline-light'
                        );

                        $render_dark_tile(
                            '<a class="btn btn-outline-light" href="#">Outline Light Link</a>',
                            'btn btn-outline-light'
                        );

                        $render_dark_tile(
                            '<button type="button" class="btn btn-primary">Primary</button>',
                            'btn btn-primary'
                        );

                        $render_dark_tile(
                            '<button type="button" class="btn btn-text text-white hover:text-brand-tertiary">Text Button</button>',
                            'btn btn-text text-white hover:text-brand-tertiary'
                        );
                        ?>
                    </div>
                </section>
 

                <!--
                Style Guide Utility: Auto-generate HEX values for color swatches.

                This script reads the computed background color of each swatch
                (whether driven by CSS variables or Tailwind utility classes),
                converts the RGB value to HEX, and injects the HEX into the
                corresponding .js-hex element.

                Purpose:
                - Keeps swatches driven by a single source of truth (design tokens in tailwind.css)
                - Avoids maintaining HEX values in PHP
                - Ensures the displayed HEX always matches the actual rendered color
                -->
                <script>
                    (function () {
                    function rgbToHex(rgb) {
                        var match = rgb.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/i);
                        if (!match) return null;
                        var r = parseInt(match[1], 10);
                        var g = parseInt(match[2], 10);
                        var b = parseInt(match[3], 10);
                        return (
                        "#" +
                        [r, g, b].map(function (v) {
                            var h = v.toString(16);
                            return h.length === 1 ? "0" + h : h;
                        }).join("")
                        ).toLowerCase();
                    }

                    function isTransparent(bg) {
                        return !bg || bg === "transparent" || bg === "rgba(0, 0, 0, 0)";
                    }

                    function fillHexes() {
                        var swatches = document.querySelectorAll(".js-swatch");
                        swatches.forEach(function (swatch) {
                        var tile = swatch.closest(".dkcc-palette-tile");
                        if (!tile) return;

                        var hexEl = tile.querySelector(".js-hex");
                        if (!hexEl) return;

                        // Get swatch bg first
                        var bg = window.getComputedStyle(swatch).backgroundColor;

                        // If somehow transparent, try tile bg (fallback)
                        if (isTransparent(bg)) {
                            bg = window.getComputedStyle(tile).backgroundColor;
                        }

                        var hex = rgbToHex(bg);
                        if (!hex) {
                            hexEl.textContent = "—";
                            hexEl.dataset.copy = "";
                            return;
                        }

                        hexEl.textContent = hex;
                        hexEl.dataset.copy = hex;
                        });
                    }

                    // Run after load to ensure CSS is applied
                    window.addEventListener("load", fillHexes);
                    })();
                </script>

                <!-- Prevent # anchor scroll inside button sections -->
                <script>
                    document.addEventListener('click', function (e) {
                        var link = e.target.closest('.btn-section a[href="#"]');
                        if (link) e.preventDefault();
                    });
                </script>

            </div>
        </div>
    </div>
<?php
}