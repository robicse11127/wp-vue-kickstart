<?php
namespace WPVK\Includes;

class Frontend {

    public function __construct() {
        add_shortcode( 'wpvk-app', [ $this, 'render_frontend' ] );
    }

    /**
     * Render Frontend
     * @since 1.0.0
     */
    public function render_frontend( $atts, $content = '' ) {
        wp_enqueue_style( 'wpvk-frontend' );
        wp_enqueue_script( 'wpvk-frontend' );

        $content .= '<div id="wpvk-frontend-app"></div>';

        return $content;
    }

}