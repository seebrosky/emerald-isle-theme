<?php

if (!function_exists('emerald_resolve_attachment_id')) {
    function emerald_resolve_attachment_id($image): int {
        if (empty($image)) {
            return 0;
        }

        if (is_numeric($image)) {
            return (int) $image;
        }

        if (is_array($image)) {
            if (!empty($image['ID'])) {
                return (int) $image['ID'];
            }

            if (!empty($image['id'])) {
                return (int) $image['id'];
            }

            if (!empty($image['attachment_id'])) {
                return (int) $image['attachment_id'];
            }
        }

        if ($image instanceof WP_Post && $image->post_type === 'attachment') {
            return (int) $image->ID;
        }

        return 0;
    }
}

if (!function_exists('emerald_get_image_alt')) {
    function emerald_get_image_alt(int $attachment_id): string {
        if (!$attachment_id) {
            return '';
        }

        $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

        if (!empty($alt)) {
            return trim($alt);
        }

        $attachment_post = get_post($attachment_id);

        if ($attachment_post && !empty($attachment_post->post_title)) {
            return trim($attachment_post->post_title);
        }

        return '';
    }
}

if (!function_exists('emerald_build_img_attr_string')) {
    function emerald_build_img_attr_string(array $attrs): string {
        $attr_string = '';

        foreach ($attrs as $key => $value) {
            if ($value === null || $value === false) {
                continue;
            }

            if ($value === true) {
                $attr_string .= ' ' . esc_attr($key);
                continue;
            }

            $attr_string .= sprintf(
                ' %s="%s"',
                esc_attr($key),
                esc_attr((string) $value)
            );
        }

        return $attr_string;
    }
}

if (!function_exists('emerald_image')) {
    function emerald_image($image, string $size = 'full', array $attrs = []): string {
        if (empty($image)) {
            return '';
        }

        $attachment_id = emerald_resolve_attachment_id($image);

        if ($attachment_id) {
            $defaults = [
                'loading'  => 'lazy',
                'decoding' => 'async',
                'alt'      => emerald_get_image_alt($attachment_id),
            ];

            $attrs = array_merge($defaults, $attrs);

            return wp_get_attachment_image($attachment_id, $size, false, $attrs) ?: '';
        }

        if (is_array($image) && !empty($image['url'])) {
            $defaults = [
                'loading'  => 'lazy',
                'decoding' => 'async',
                'alt'      => $image['alt'] ?? '',
            ];

            $attrs = array_merge($defaults, $attrs);

            return sprintf(
                '<img src="%s"%s>',
                esc_url($image['url']),
                emerald_build_img_attr_string($attrs)
            );
        }

        if (is_string($image)) {
            $defaults = [
                'loading'  => 'lazy',
                'decoding' => 'async',
                'alt'      => '',
            ];

            $attrs = array_merge($defaults, $attrs);

            return sprintf(
                '<img src="%s"%s>',
                esc_url($image),
                emerald_build_img_attr_string($attrs)
            );
        }

        return '';
    }
}

if (!function_exists('emerald_decorative_image')) {
    function emerald_decorative_image($image, string $size = 'full', array $attrs = []): string {
        $defaults = [
            'alt'          => '',
            'aria-hidden'  => 'true',
            'role'         => 'presentation',
        ];

        return emerald_image($image, $size, array_merge($defaults, $attrs));
    }
}

if (!function_exists('emerald_custom_logo')) {
    function emerald_custom_logo(array $attrs = []): string {
        $custom_logo_id = (int) get_theme_mod('custom_logo');

        if (!$custom_logo_id) {
            return '';
        }

        $defaults = [
            'class'    => 'custom-logo',
            'loading'  => 'eager',
            'decoding' => 'async',
        ];

        $image = emerald_image($custom_logo_id, 'full', array_merge($defaults, $attrs));

        if (!$image) {
            return '';
        }

        return sprintf(
            '<a href="%s" class="custom-logo-link block" rel="home">%s</a>',
            esc_url(home_url('/')),
            $image
        );
    }
}