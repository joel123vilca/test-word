<?php

$title = esc_html($attributes['title']);
$subtitle = esc_html($attributes['subtitle']);
$bg_image = esc_attr($attributes['backgroundImage']);


$style = !empty($bg_image) ? "background-image: url('{$bg_image}');" : '';

?>
<div class="hero-block" style="<?php echo $style; ?>">
    <div class="hero-content">
        <h1 class="hero-title"><?php echo $title; ?></h1>
        <p class="hero-subtitle"><?php echo $subtitle; ?></p>
    </div>
</div>