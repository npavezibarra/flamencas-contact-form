<?php
/**
 * Plugin Name: Flamencas Contact Form
 * Description: Formulario de contacto para el sitio Flamencas, versión desktop y móvil.
 * Version: 1.0
 * Author: Nicolás Pavez
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'FLAMENCAS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Cargar estilos
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'flamencas-form-style', FLAMENCAS_PLUGIN_URL . 'css/style.css', array(), '1.1' );
});

// Shortcode
add_shortcode( 'flamencas_contact_form', function() {
    ob_start();
    include plugin_dir_path( __FILE__ ) . 'templates/form.php';
    return ob_get_clean();
});

add_action('init', function() {
    if (isset($_POST['flamencas_form_submitted'])) {
        $nombre = sanitize_text_field($_POST['nombre_contacto']);
        $email = sanitize_email($_POST['email']);
        $organizacion = sanitize_text_field($_POST['organizacion']);
        $celular = sanitize_text_field($_POST['celular']);

        $fecha_evento = sanitize_text_field($_POST['fecha_evento']);
        $personas = sanitize_text_field($_POST['numero_personas']);
        $comuna = sanitize_text_field($_POST['comuna_evento']);
        $tipo = sanitize_text_field($_POST['tipo_evento']);
        $duracion = sanitize_text_field($_POST['duracion']);
        $mensaje_usuario = sanitize_textarea_field($_POST['mensaje']);

        $servicios_array = isset($_POST['servicios']) && is_array($_POST['servicios']) 
            ? array_map('sanitize_text_field', $_POST['servicios']) 
            : ['Performance'];
        if (!in_array('Performance', $servicios_array)) {
            array_unshift($servicios_array, 'Performance');
        }
        $servicios = implode(', ', $servicios_array);

        $to = get_option('flamencas_email', get_option('admin_email'));
        $subject = 'Nueva solicitud de cotización - Flamencas';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $message = "
            <h2>Solicitud de Cotización</h2>
            <strong>Nombre:</strong> $nombre<br>
            <strong>Email:</strong> $email<br>
            <strong>Organización:</strong> $organizacion<br>
            <strong>Celular:</strong> $celular<br><br>

            <strong>Fecha del Evento:</strong> $fecha_evento<br>
            <strong>Número de Personas:</strong> $personas<br>
            <strong>Comuna:</strong> $comuna<br>
            <strong>Tipo de Evento:</strong> $tipo<br>
            <strong>Servicios:</strong> $servicios<br>
            <strong>Duración:</strong> $duracion
            <br><strong>Mensaje:</strong><br>$mensaje_usuario
        ";
        

        wp_mail($to, $subject, $message, $headers);

        // Redirigir para mostrar mensaje y evitar reenvío accidental
        wp_redirect(add_query_arg('enviado', '1', $_SERVER['REQUEST_URI']) . '#flamencas-contacto');
        exit;
    }
});


/* ADMIN PAGE */

// Crear menú en el admin
add_action('admin_menu', function() {
    add_menu_page(
        'Flamencas',
        'Flamencas',
        'manage_options',
        'flamencas-settings',
        'flamencas_settings_page',
        'dashicons-universal-access-alt', // Ícono de bailarina
        30
    );
});

// Registrar el campo
add_action('admin_init', function() {
    register_setting('flamencas_settings_group', 'flamencas_email');
});

function flamencas_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configuración de Formulario Flamencas</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('flamencas_settings_group');
            do_settings_sections('flamencas_settings_group');
            $email = get_option('flamencas_email');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Correo destino para cotizaciones:</th>
                    <td>
                        <input type="email" name="flamencas_email" value="<?php echo esc_attr($email); ?>" style="width: 400px;" required />
                    </td>
                </tr>
            </table>
            <?php submit_button('Guardar correo'); ?>
        </form>
    </div>
    <?php
}
