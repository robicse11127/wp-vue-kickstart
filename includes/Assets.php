<?php
namespace WPVK\Includes;

class Assets {

    public function __construct() {
        if( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
        }else {
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
        }
    }

    /**
     * Regsiter Scripts & Styles
     * @since 1.0.0
     */
    public function register() {
        $this->register_scripts( $this->get_scripts() );
        $this->register_styles( $this->get_styles() );
    }

    /**
     * Register Scritps
     * @since 1.0.0
     */
    public function register_scripts( $scripts ) {
        foreach( $scripts as $handle => $script ) {
            $deps      = isset( $script[ 'deps' ] ) ? $script[ 'deps' ] : false;
            $in_footer = isset( $script[ 'in_footer' ] ) ? $script[ 'in_footer' ] : false;
            $version   = isset( $script[ 'version' ] ) ? $script[ 'version' ] : WPVK_VERSION;

            wp_register_script( $handle, $script[ 'src' ], $deps, $version, $in_footer );
        }
    }

    /**
     * Regsiter Styles
     * @since 1.0.0
     */
    public function register_styles( $styles ) {
        foreach( $styles as $handle => $style ) {
            $deps = isset( $style[ 'deps' ] ) ? $style[ 'deps' ] : false;

            wp_register_style( $handle, $style[ 'src' ], $deps, WPVK_VERSION );
        }
    }

    /**
     * Get All Registered Scripts
     * @since 1.0.0
     */
    public function get_scripts() {
        $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

        $scripts = [
            'wpvk-manifest' => [
                'src'       => WPVK_PLUGIN_URL . '/assets/js/manifest.js',
                'deps'      => [],
                'version'   => \filemtime( WPVK_PLUGIN_PATH . '/assets/js/manifest.js' ),
                'in_footer' => true
            ],
            'wpvk-vendor' => [
                'src'       => WPVK_PLUGIN_URL . '/assets/js/vendor.js',
                'deps'      => [ 'wpvk-manifest' ],
                'version'   => \filemtime( WPVK_PLUGIN_PATH . '/assets/js/vendor.js' ),
                'in_footer' => true
            ],
            'wpvk-admin' => [
                'src'       => WPVK_PLUGIN_URL . '/assets/js/admin.js',
                'deps'      => [ 'wpvk-vender' ],
                'version'   => \filemtime( WPVK_PLUGIN_PATH . '/assets/js/admin.js' ),
                'in_footer' => true
            ],
            'wpvk-frontend' => [
                'src'       => WPVK_PLUGIN_URL . '/assets/js/frontend.js',
                'deps'      => [ 'jquery', 'wpvk-vender' ],
                'version'   => \filemtime( WPVK_PLUGIN_PATH . '/assets/js/frontend.js' ),
                'in_footer' => true
            ],
        ];

        return $scripts;
    }

    /**
     * Get All Register Styles
     * @since 1.0.0
     */
    public function get_styles() {
        $styles = [
            'wpvk-style' => [
                'src' => WPVK_PLUGIN_URL . '/assets/css/style.css'
            ],
            'wpvk-admin' => [
                'src' => WPVK_PLUGIN_URL . '/assets/css/admin.css'
            ],
            'wpvk-frontend' => [
                'src' => WPVK_PLUGIN_URL . '/assets/css/frontend.css'
            ],
        ];

        return $styles;
    }

}