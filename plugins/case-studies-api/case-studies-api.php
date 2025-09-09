<?php
/**
 * Plugin Name: Case Studies JSON API
 * Description: Expone case-studies.json como endpoint REST.
 * Version: 1.0
 */

add_action('rest_api_init', function () {
  register_rest_route('custom/v1', '/case-studies', array(
    'methods' => 'GET',
    'callback' => 'cs_get_case_studies',
    'permission_callback' => '__return_true',
  ));
});

function cs_get_case_studies() {
  // Pon el JSON dentro del plugin o en el tema, ajústalo según prefieras:
  $file = plugin_dir_path(__FILE__) . 'case-studies.json'; 
  if (!file_exists($file)) {
    return new WP_Error('no_file', 'No se encontró case-studies.json', array('status' => 404));
  }
  $data = json_decode(file_get_contents($file), true);
  return rest_ensure_response($data);
}
