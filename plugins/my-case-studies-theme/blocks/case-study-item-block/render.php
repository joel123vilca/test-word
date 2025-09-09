<?php
$project_id = isset($attributes['projectId']) ? intval($attributes['projectId']) : 0;

if ($project_id === 0) {
    echo '<p>Por favor, seleccione un ID de proyecto válido en las opciones del bloque.</p>';
    return;
}

$api_url = 'http://word-test.local/wp-json/custom/v1/case-studies';
$response = wp_remote_get($api_url);

if (is_wp_error($response)) {
    echo '<p>Error al cargar los estudios de caso.</p>';
    return;
}

$body = wp_remote_retrieve_body($response);
$case_studies = json_decode($body, true);

$case_study = null;
foreach ($case_studies as $item) {
    if (isset($item['id']) && intval($item['id']) === $project_id) {
        $case_study = $item;
        break;
    }
}

if (empty($case_study)) {
    echo '<p>Estudio de caso no encontrado.</p>';
    return;
}

?>
<div class="case-study-item">
    <div class="case-study-image">
        <img src="<?php echo esc_url($case_study['image']); ?>" alt="<?php echo esc_attr($case_study['title']); ?>" />
    </div>
    <div class="case-study-content">
        <h3 class="case-study-title"><?php echo esc_html($case_study['title']); ?></h3>
        <p class="case-study-description"><?php echo esc_html($case_study['description']); ?></p>
        <a href="<?php echo esc_url($case_study['link']); ?>" class="case-study-link">
            Leer más →
        </a>
    </div>
</div>
