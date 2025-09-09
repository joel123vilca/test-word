<?php
/**
 * Plugin Name: My Case Studies Blocks
 * Description: Un plugin que registra bloques personalizados y una plantilla de página para estudios de caso.
 * Version: 1.0.0
 * Author: Tu Nombre
 * License: GPLv2 or later
 * Text Domain: my-case-studies-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 1. Registra los bloques personalizados.
function my_case_studies_register_blocks() {
    register_block_type( __DIR__ . '/blocks/case-study-hero-block' );
    register_block_type( __DIR__ . '/blocks/case-study-item-block' );
}
add_action( 'init', 'my_case_studies_register_blocks' );

// 2. Registra la plantilla de página personalizada.
function my_case_studies_register_page_template( $templates ) {
    $templates['page-case-studies.php'] = 'Case Study Page';
    return $templates;
}
add_filter( 'theme_page_templates', 'my_case_studies_register_page_template' );

// 3. Carga la plantilla de página si se ha seleccionado.
function my_case_studies_load_page_template( $template ) {
    if ( is_page_template( 'page-case-studies.php' ) ) {
        return plugin_dir_path( __FILE__ ) . 'templates/page-case-studies.php';
    }
    return $template;
}
add_filter( 'template_include', 'my_case_studies_load_page_template' );
