<?php
/**
 * Template Name: Case Study Page
 */

get_header(); // Carga el encabezado del tema (incluye el menú, logo, etc.)
?>

<div class="case-study-container">
    <main id="primary" class="site-main">

        <?php
        // Inicia el bucle de WordPress para obtener el contenido de la página
        while ( have_posts() ) :
            the_post();

            // Muestra el título de la página
            the_title( '<h1 class="entry-title">', '</h1>' );

            // Muestra todo el contenido del editor, incluyendo tus bloques de Gutenberg
            the_content();

        endwhile; // Fin del bucle
        ?>

    </main><!-- #main -->
</div>

<?php
get_footer(); // Carga el pie de página del tema
