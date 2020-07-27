<?php
namespace WPVK\Includes;

class Admin {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register Menu Page
     * @since 1.0.0
     */
    public function admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'wp-vue-kickstart';

        $hook = add_menu_page(
            __( 'WP Vue Kickstart', 'textdomain' ),
            __( 'WP Vue Kickstart', 'textdomain' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicon-text'
        );

        if( current_user_can( $capability )  ) {
            $submenu[ $slug ][] = [ __( 'Kickstart', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/' ];
            $submenu[ $slug ][] = [ __( 'Settings', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/settings' ];
        }

        add_action( 'load-' . $hook, [ $this, 'init_hooks' ] );
    }

    /**
     * Init Hooks for Admin Pages
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action( 'admin_enqueu_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load Necessary Scripts & Styles
     * @since 1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'wpvk-admin' );
        wp_enqueue_script( 'wpvk-admin' );
    }

    /**
     * Render Admin Page
     * @since 1.0.0
     */
    public function menu_page_template() {
        echo '<div class="wrap"><div id="wpvk-admin-app"></div></div>';
    }

}