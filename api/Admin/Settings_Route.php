<?php
namespace WPVK\Api\Admin;

use WP_REST_Controller;

class Settings_Route extends WP_REST_Controller  {

    protected $namespace;
    protected $rest_base;

    public function __construct() {
        $this->namespace = 'wpvk/v1';
        $this->rest_base = 'settings';
    }

    /**
     * Register Routes
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_items' ],
                    'permission_callback' => [ $this, 'get_items_permission_check' ],
                    'args'                => $this->get_collection_params()
                ],
                [
                    'methods'             => \WP_REST_Server::CREATABLE,
                    'callback'            => [ $this, 'create_items' ],
                    'permission_callback' => [ $this, 'create_items_permission_check' ],
                    'args'                => $this->get_endpoint_args_for_item_schema(true )
                ]
            ]
        );
    }

    /**
     * Get items response
     */
    public function get_items( $request ) {
        $items = [
            'foo' => 'bar'
        ];

        $response = rest_ensure_response( $items );

        return $response;
    }

    /**
     * Get items permission check
     */
    public function get_items_permission_check( $request ) {
        // if( current_user_can( 'administrator' ) ) {
        //     return true;
        // }
        return true;
    }

    /**
     * Create item response
     */
    public function create_items( $request ) {
        $response = [
            'textfield' => $request[ 'textfield' ],
        ];

        $response = rest_ensure_response( $response );

        return $response;
    }

    /**
     * Create item permission check
     */
    public function create_items_permission_check( $request ) {
        return true;
    }

    /**
     * Retrives the query parameters for the items collection
     */
    public function get_collection_params() {
        return [];
    }

}