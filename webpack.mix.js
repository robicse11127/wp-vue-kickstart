const mix = require( 'laravel-mix' );


/**
 * Setup public path to generate assets
 */
mix.setPublicPath( 'assets' );

/**
 * Autoload jQuery
 */
mix.autoload({
    jquery: [ '$', 'window.jQuery', 'jQuery' ]
});

/**
 * Compile JavaScript
 */
mix.js( 'src/admin/admin.js', 'assets/js/admin.js' ).sourceMaps( false ).extract( [ 'vue' ] );
mix.js( 'src/frontend/frontend.js', 'assets/js/frontend.js' ).sourceMaps( false );
