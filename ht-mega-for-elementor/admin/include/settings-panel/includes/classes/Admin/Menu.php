<?php
namespace HTMegaOpt\Admin;

class Menu {

    /**
     * [init]
     */
    public function init() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ], 220 );
    }

    /**
     * Register Menu
     *
     * @return void
     */
    public function admin_menu(){
        global $submenu;

        $slug        = 'htmega-addons';
        $capability  = 'manage_options';

        $hook = add_menu_page(
            esc_html__( 'HTMega Addons', 'htmega-addons' ),
            esc_html__( 'HTMega Addons', 'htmega-addons' ),
            $capability,
            $slug,
            [ $this, 'plugin_page' ],
            HTMEGA_ADDONS_PL_URL.'admin/assets/images/menu-icon.svg',
            59
        );

        if ( current_user_can( $capability ) ) {
            $submenu[ $slug ][] = array( esc_html__( 'Settings', 'htmega-addons' ), $capability, 'admin.php?page=' . $slug . '#/general' );
        }

        add_action( 'load-' . $hook, [ $this, 'init_hooks'] );

    }

    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style('htmegaopt-sweetalert2');
        wp_enqueue_style( 'htmegaopt-admin' );
        wp_enqueue_style( 'htmegaopt-style' );
        wp_enqueue_script( 'htmegaopt-admin' );

        $option_localize_script = [
            'adminUrl'      => admin_url( '/' ),
            'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
            'rootApiUrl'    => esc_url_raw( rest_url() ),
            'restNonce'     => wp_create_nonce( 'wp_rest' ),
            'verifynonce'   => wp_create_nonce( 'htmegaopt_verifynonce' ),
            'tabs'          => Options_Field::instance()->get_settings_tabs(),
            'sections'      => Options_Field::instance()->get_settings_subtabs(),
            'settings'      => Options_Field::instance()->get_registered_settings(),
            'options'       => htmegaopt_get_options( Options_Field::instance()->get_registered_settings() ),
            'labels'        => [
                'pro' => __( 'Pro', 'htmega-addons' ),
                'modal' => [
                    'title' => __( 'BUY PRO', 'htmega-addons' ),
                    'buynow' => __( 'Buy Now', 'htmega-addons' ),
                    'desc' => __( 'Our free version is great, but it doesn\'t have all our advanced features. The best way to unlock all of the features in our plugin is by purchasing the pro version.', 'htmega-addons' )
                ],
                'saveButton' => [
                    'text'   => __( 'Save Settings', 'htmega-addons' ),
                    'saving' => __( 'Saving...', 'htmega-addons' ),
                    'saved'  => __( 'Data Saved', 'htmega-addons' ),
                ],
                'enableAllButton' => [
                    'enable'   => __( 'Enable All', 'htmega-addons' ),
                    'disable'  => __( 'Disable All', 'htmega-addons' ),
                ],
                'resetButton' => [
                    'text'   => __( 'Reset All Settings', 'htmega-addons' ),
                    'reseting'  => __( 'Resetting...', 'htmega-addons' ),
                    'reseted'  => __( 'All Data Restored', 'htmega-addons' ),
                    'alert' => [
                        'one'=>[
                            'title' => __( 'Are you sure?', 'htmega-addons' ),
                            'text' => __( 'It will reset all the settings to default, and all the changes you made will be deleted.', 'htmega-addons' ),
                            'confirm' => __( 'Yes', 'htmega-addons' ),
                            'cancel' => __( 'No', 'htmega-addons' ),
                        ],
                        'two'=>[
                            'title' => __( 'Reset!', 'htmega-addons' ),
                            'text' => __( 'All settings has been reset successfully.', 'htmega-addons' ),
                            'confirm' => __( 'OK', 'htmega-addons' ),
                        ]
                    ],
                ]
            ]
        ];
        wp_localize_script( 'htmegaopt-admin', 'htmegaOptions', $option_localize_script );
    }

    /**
     * Render our admin page
     *
     * @return void
     */
    public function plugin_page() {
        ob_start();
		include_once HTMEGAOPT_INCLUDES .'/templates/settings-page.php';
		echo ob_get_clean();
    }

}
