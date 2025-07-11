<?php

/**
 * miyoshi_kasei_kougyo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since miyoshi_kasei_kougyo 1.0
 */

// if (! function_exists('miyoshi_kasei_kougyo_editor_style')) :
// 	/**
// 	 * Enqueues editor-style.css in the editors.
// 	 *
// 	 * @since miyoshi_kasei_kougyo 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function miyoshi_kasei_kougyo_editor_style()
// 	{
// 		add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));
// 	}
// endif;
// add_action('after_setup_theme', 'miyoshi_kasei_kougyo_editor_style');

if (! function_exists('miyoshi_kasei_kougyo_enqueue_styles')) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since miyoshi_kasei_kougyo 1.0
	 *
	 * @return void
	 */
	function miyoshi_kasei_kougyo_enqueue_styles()
	{
		wp_enqueue_style(
			'miyoshi_kasei_kougyo-style',
			get_parent_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'miyoshi_kasei_kougyo_enqueue_styles');


if (! function_exists('miyoshi_kasei_kougyo_enqueue_block_styles')) :
	/**
	 * Enqueues block styles for the blocks that need them.
	 *
	 * @since miyoshi_kasei_kougyo 1.0
	 *
	 * @return void
	 */
	function miyoshi_kasei_kougyo_enqueue_block_styles()
	{
		// Add the block name (with namespace) for each style.
		$blocks = array(
			'core/navigation',
			'core/button',
		);

		// Loop through each block and enqueue its styles.
		foreach ($blocks as $block) {

			// Replace slash with hyphen for filename.
			$slug = str_replace('/', '-', $block);

			wp_enqueue_block_style($block, array(
				'handle' => "miyoshi_kasei_kougyo-block-{$slug}",
				'src'    => get_theme_file_uri("assets/blocks/{$slug}.css"),
				'path'   => get_theme_file_path("assets/blocks/{$slug}.css")
			));
		}
	}
endif;

add_action('init', 'miyoshi_kasei_kougyo_enqueue_block_styles');
