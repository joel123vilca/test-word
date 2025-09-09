<?php
/**
 * Plugin Name: Case Study Blocks
 * Description: Custom Gutenberg blocks for the Case Study Page
 * Version: 1.0
 * Author: Joel
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function csb_register_blocks() {
    // Automatically load dependencies and version
    $asset_file = include(plugin_dir_path(__FILE__) . 'build/index.asset.php');

    wp_register_script(
        'case-study-blocks-js',
        plugins_url('build/index.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    wp_register_style(
        'case-study-blocks-css',
        plugins_url('src/style.css', __FILE__),
        [],
        filemtime(plugin_dir_path(__FILE__) . 'src/style.css')
    );

    register_block_type('csb/hero-block', [
        'editor_script' => 'case-study-blocks-js',
        'style' => 'case-study-blocks-css',
    ]);

    register_block_type('csb/case-study-item-block', [
        'editor_script' => 'case-study-blocks-js',
        'style' => 'case-study-blocks-css',
    ]);
}
add_action('init', 'csb_register_blocks');
