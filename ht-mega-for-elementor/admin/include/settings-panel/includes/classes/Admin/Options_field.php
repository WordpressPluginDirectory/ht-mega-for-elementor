<?php
namespace HTMegaOpt\Admin;

class Options_Field {

    /**
     * [$_instance]
     * @var null
     */
    private static $_instance = null;

    /**
     * [instance] Initializes a singleton instance
     * @return [Admin]
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get_settings_tabs(){
        $tabs = array(
            'general' => [
                'id'    => 'htmega_pro_vs_free_tabs',
                'title' => esc_html__( 'General', 'htmega-addons' ),
                'icon'  => 'htmega htmega-settings',
                'content' => [
                    'header' => false,
                    'footer' => false,
                    'title' => __( 'Free VS Pro', 'htmega-addons' ),
                    'desc'  => __( 'Freely use these elements to create your site. You can enable which you are not using, and, all associated assets will be disable to improve your site loading speed.', 'htmega-addons' ),
                ],
            ],
            'elements' => [
                'id'    => 'htmega_element_tabs',
                'title' => esc_html__( 'Elements', 'htmega-addons' ),
                'icon'  => 'htmega htmega-element',
                'content' => [
                    'column' => 3,
                    'title' => __( 'Widget List', 'htmega-addons' ),
                    'desc'  => __( 'Freely use these elements to create your site. You can enable which you are not using, and, all associated assets will be disable to improve your site loading speed.', 'htmega-addons' ),
                ],
            ],
            'gutenberg' => [
                'id'    => 'htmega_gutenberg_tabs',
                'title' => esc_html__( 'Gutenberg', 'htmega-addons' ),
                'icon'  => 'htmega htmega-element',
                'content' => [
                    'column' => 3,
                    'title' => __( 'Gutenberg Blocks List', 'htmega-addons' ),
                    'desc'  => __( 'Freely use these Gutenberg Blocks to create your site. You can disable which you are not using, and, all associated assets will be disable to improve your site loading speed.', 'htmega-addons' ),
                ],
            ],
            'thirdparty' => array(
                'id'    => 'htmega_thirdparty_element_tabs',
                'title' => esc_html__( 'Third Party', 'htmega-addons' ),
                'icon'  => 'htmega htmega-extension',
                'content' => [
                    'column' => 3,
                    'title' => __( 'Third Party Widget List', 'htmega-addons' ),
                    'desc'  => __( 'Freely use these elements to create your site. You can enable which you are not using, and, all associated assets will be disable to improve your site loading speed.', 'htmega-addons' ),
                ],
            ),
            'others' => array(
                'id'    => 'htmega_general_tabs',
                'title' => esc_html__( 'Integrations', 'htmega-addons' ),
                'icon'  => 'htmega htmega-others',
                'content' => [
                    'enableall' => false,
                    'title' => __( 'Integrations', 'htmega-addons' ),
                    'desc'  => __( 'Set the fields value to use these features', 'htmega-addons' ),
                ],
            ),
            'advance' => array(
                'id'    => 'htmega_advance_element_tabs',
                'title' => esc_html__( 'Modules', 'htmega-addons' ),
                'icon'  => 'htmega htmega-advance',
                'content' => [
                    'column' => 3,
                    'title' => __( 'Module List', 'htmega-addons' ),
                    'desc'  => __( 'Freely use these elements to create your site. You can enable which you are not using, and, all associated assets will be disable to improve your site loading speed.', 'htmega-addons' ),
                ],
            )
        );

        return apply_filters( 'htmega_admin_fields_sections', $tabs );

    }

    public function get_settings_subtabs(){

        $subtabs = array();

        return apply_filters( 'htmega_admin_fields_sub_sections', $subtabs );
    }

    public function get_registered_settings(){
        $settings = array(
            'htmega_pro_vs_free_tabs' => array(
                
                array(
                    'id'   => 'htmega_pro_vs_free_html',
                    'desc' => __( 'Enter Your ocupation','htmega-addons' ),
                    'type' => 'html',
                    'html' => $this->pro_vs_free_html_tabs()
                ),
                
            ),

            'htmega_element_tabs' => array(

                array(
                    'id'  => 'accordion',
                    'name'  => __( 'Accordion', 'htmega-addons' ),
                    'type'  => 'element',
                    'default' => 'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'animatesectiontitle',
                    'name'  => __( 'Animate Heading', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'addbanner',
                    'name'  => __( 'Ads Banner', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'specialadsbanner',
                    'name'  => __( 'Special Day Offer', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'blockquote',
                    'name'  => __( 'Blockquote', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'brandlogo',
                    'name'  => __( 'Brands', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'businesshours',
                    'name'  => __( 'Business Hours', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'button',
                    'name'  => __( 'Button', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'calltoaction',
                    'name'  => __( 'Call To Action', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'carousel',
                    'name'  => __( 'Carousel', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'countdown',
                    'name'  => __( 'Countdown', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'counter',
                    'name'  => __( 'Counter', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'customevent',
                    'name'  => __( 'Custom Event', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'dualbutton',
                    'name'  => __( 'Double Button', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'dropcaps',
                    'name'  => __( 'Dropcaps', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'flipbox',
                    'name'  => __( 'Flip Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'galleryjustify',
                    'name'  => __( 'Gallery Justify', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'googlemap',
                    'name'  => __( 'Google Map', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'imagecomparison',
                    'name'  => __( 'Image Comparison', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'imagegrid',
                    'name'  => __( 'Image Grid', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'imagemagnifier',
                    'name'  => __( 'Image Magnifier', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'imagemarker',
                    'name'  => __( 'Image Marker', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'imagemasonry',
                    'name'  => __( 'Image Masonry', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'inlinemenu',
                    'name'  => __( 'Inline Navigation', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'instagram',
                    'name'  => __( 'Instagram', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'lightbox',
                    'name'  => __( 'Light Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'modal',
                    'name'  => __( 'Modal', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'newtsicker',
                    'name'  => __( 'News Ticker', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'notify',
                    'name'  => __( 'Notify', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'offcanvas',
                    'name'  => __( 'Offcanvas', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'panelslider',
                    'name'  => __( 'Panel Slider', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'popover',
                    'name'  => __( 'Popover', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'postcarousel',
                    'name'  => __( 'Post carousel', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'postgrid',
                    'name'  => __( 'Post Grid', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'postgridtab',
                    'name'  => __( 'Post Grid Tab', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'postslider',
                    'name'  => __( 'Post Slider', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'pricinglistview',
                    'name'  => __( 'Pricing List View', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'pricingtable',
                    'name'  => __( 'Pricing Table', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'progressbar',
                    'name'  => __( 'Progress Bar', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'scrollimage',
                    'name'  => __( 'Scroll Image', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'scrollnavigation',
                    'name'  => __( 'Scroll Navigation', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'search',
                    'name'  => __( 'Search', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'sectiontitle',
                    'name'  => __( 'Section Title', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'service',
                    'name'  => __( 'Service', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'singlepost',
                    'name'  => __( 'Single Post', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'thumbgallery',
                    'name'  => __( 'Slider Thumbnail Gallery', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'socialshere',
                    'name'  => __( 'Social Share', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'switcher',
                    'name'  => __( 'Switcher', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'tabs',
                    'name'  => __( 'Tabs', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'datatable',
                    'name'  => __( 'Data Table', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'teammember',
                    'name'  => __( 'Team Member', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'testimonial',
                    'name'  => __( 'Testimonial', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'testimonialgrid',
                    'name'  => __( 'Testimonial Grid', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'toggle',
                    'name'  => __( 'Toggle', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'tooltip',
                    'name'  => __( 'Tooltip', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'twitterfeed',
                    'name'  => __( 'Twitter Feed', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'userloginform',
                    'name'  => __( 'User Login Form', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'userregisterform',
                    'name'  => __( 'User Register Form', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'verticletimeline',
                    'name'  => __( 'Verticle Timeline', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'videoplayer',
                    'name'  => __( 'Video Player', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'workingprocess',
                    'name'  => __( 'Working Process', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'errorcontent',
                    'name'  => __( '404 Content', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'template_selector',
                    'name'  => __( 'Remote Template', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'weather',
                    'name'  => __( 'Weather', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'on',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'audio_player',
                    'name'  => __( 'Audio Player', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=> 'off',
                ),
                array(
                    'id'  => 'calendly',
                    'name'  => __( 'Calendly', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=> 'on',
                ),

                // pro addon list
                array(
                    'id'  => 'info_boxp',
                    'name'  => __( 'Info Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'lottiep',
                    'name'  => __( 'Lottie', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'event_calendarp',
                    'name'  => __( 'Event Calendar', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'category_listp',
                    'name'  => __( 'Category List', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'pricing_menup',
                    'name'  => __( 'Pricing Menu', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'feature_listp',
                    'name'  => __( 'Feature List', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'social_network_iconsp',
                    'name'  => __( 'Social Network Icons', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'taxonomy_termsp',
                    'name'  => __( 'Taxonomy Terms', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'background_switcherp',
                    'name'  => __( 'Background Switcher', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'breadcrumbsp',
                    'name'  => __( 'Breadcrumbs', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'page_listp',
                    'name'  => __( 'Page List', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'icon_boxp',
                    'name'  => __( 'Icon Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'team_carouselp',
                    'name'  => __( 'Team Carousel', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'interactive_promop',
                    'name'  => __( 'Interactive Promo', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'facebook_reviewp',
                    'name'  => __( 'Facebook Review', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'whatsapp_chatp',
                    'name'  => __( 'WhatsApp Chat', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'filterable_galleryp',
                    'name'  => __( 'Filterable Gallery', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'event_boxp',
                    'name'  => __( 'Event Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'chartp',
                    'name'  => __( 'Chart', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'post_timelinep',
                    'name'  => __( 'Post Timeline', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'post_masonryp',
                    'name'  => __( 'Post Masonry', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'source_codep',
                    'name'  => __( 'Source Code', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'threesixty_rotationp',
                    'name'  => __( '360 Rotation', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'pricing_table_flip_boxp',
                    'name'  => __( 'Pricing Table Flip Box', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'flip_switcher_pricing_tablep',
                    'name'  => __( 'Flip Switcher Pricing Table', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'dynamic_galleryp',
                    'name'  => __( 'Dynamic Gallery', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'advanced_sliderp',
                    'name'  => __( 'Advanced Slider', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'flip_carouselp',
                    'name'  => __( 'Flip Carousel', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'interactive_circle_infographicp',
                    'name'  => __( 'Interactive Circle Infographic', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'copy_coupon_codep',
                    'name'  => __( 'Copy Coupon Code', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=>'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'video_galleryp',
                    'name'  => __( 'Video Gallery', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=> 'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'video_playlistp',
                    'name'  => __( 'Video Palylist', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=> 'off',
                    'is_pro' => true,
                ),
                array(
                    'id'  => 'blob_shapep',
                    'name'  => __( 'Blob Shape', 'htmega-addons' ),
                    'type'  => 'element',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'default'=> 'off',
                    'is_pro' => true,
                ),
            ),

            'htmega_gutenberg_tabs' => [
                'blocks' => [
                    [
                        'id'  => 'accordion',
                        'name'  => __( 'Accordion', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'brand',
                        'name'  => __( 'Brand', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'buttons',
                        'name'  => __( 'Buttons', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'cta',
                        'name'  => __( 'Call To Action', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'image-grid',
                        'name'  => __( 'Image Grid', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'info-box',
                        'name'  => __( 'Info Box', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'section-title',
                        'name'  => __( 'Section Title', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'tab',
                        'name'  => __( 'Tabs', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'team',
                        'name'  => __( 'Team', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                    [
                        'id'  => 'testimonial',
                        'name'  => __( 'Testimonial', 'htmega-addons' ),
                        'type'  => 'element',
                        'label_on' => __( 'On', 'htmega-addons' ),
                        'label_off' => __( 'Off', 'htmega-addons' ),
                        'default'=>'off',
                        'is_pro' => false,
                    ],
                ]
            ],

            'htmega_general_tabs' => array(
                array(
                    'id'  => 'google_map_api_key',
                    'name' => __( 'Google Map API Key', 'htmega-addons' ),
                    'desc'  => __( 'Go to <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">https://developers.google.com</a> and generate the API key.', 'htmega-addons' ),
                    'placeholder' => __( 'Google Map API key', 'htmega-addons' ),
                    'type' => 'text',
                ),

                array(
                    'id'  => 'weather_map_api_key',
                    'name' => __( 'Weather Map API Key', 'htmega-addons' ),
                    'desc'  => __( 'Please enter a OpenWeatherMaps API key. OpenWeather is a weather provider service which is capable of delivering all the necessary weather information for any location on the globe.To create API key, go to this link <a href="https://openweathermap.org/appid" target="_blank">OpenWeather</a>.', 'htmega-addons' ),
                    'placeholder' => __( 'Weather Map API key', 'htmega-addons' ),
                    'type' => 'text',
                ),

                array(
                    'id'    => 'errorpage',
                    'name'   => __( 'Select 404 Page.', 'htmega-addons' ),
                    'desc'    => __( 'You can select 404 page from here.', 'htmega-addons' ),
                    'type'    => 'select',
                    'default' => '0',
                    'options' => htmega_post_name( 'page', -1 )
                ),

                array(
                    'id'  => 'loadpostlimit',
                    'name' => __( 'Load Post in Elementor Addons', 'htmega-addons' ),
                    'desc'  => wp_kses_post( 'Load Post in Elementor Addons' ),
                    'min'               => 1,
                    'max'               => 1000,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '20',
                    'sanitize_callback' => 'floatval',
                ),

            ),

            'htmega_advance_element_tabs' => array(
                array(
                    'id'  => 'themebuilder',
                    'name'  => __( 'Theme Builder', 'htmega-addons' ),
                    'type'  => 'module',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'section'  => 'htmega_themebuilder_module_settings',
                    'setting_fields' => array(
                        array(
                            'id'  => 'themebuilder_enable',
                            'name' => esc_html__( 'Enable / Disable' ),
                            'desc'  => esc_html__( 'You can enable / disable Theme Builder from  here.', 'htmega-addons' ),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => esc_html__( 'On', 'htmega-addons' ),
                            'label_off' => esc_html__( 'Off', 'htmega-addons' ),
                        ),
                        array(
                            'id'    => 'single_blog_page',
                            'name'   => __( 'Single Blog Template.', 'htmega-addons' ),
                            'desc' => __( 'You can select a single blog page from here. Or create a ', 'htmega-addons' ) . ' <a href="' . esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ) ) . '">' . esc_html__( 'new one', 'htmega-addons' ) . '</a>',
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'archive_blog_page',
                            'name'   => __( 'Blog Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select blog page from here. Or create a ', 'htmega-addons' ) . ' <a href="' . esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ) ) . '">' . esc_html__( 'new one', 'htmega-addons' ) . '</a>',
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'header_page',
                            'name'   => __( 'Header Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select header template from here. Or create a ', 'htmega-addons' ) . ' <a href="' . esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ) ) . '">' . esc_html__( 'new one', 'htmega-addons' ) . '</a>',
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'footer_page',
                            'name'   => __( 'Footer Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select footer template from here. Or create a ', 'htmega-addons' ) . ' <a href="' . esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ) ) . '">' . esc_html__( 'new one', 'htmega-addons' ) . '</a>',
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'search_pagep',
                            'name'   => __( 'Search Page Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select search page from here.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'is_pro' => true,
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'error_pagep',
                            'name'   => __( '404 Page Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select 404 page from here.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'is_pro' => true,
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                        array(
                            'id'    => 'coming_soon_pagep',
                            'name'   => __( 'Coming Soon Page Template.', 'htmega-addons' ),
                            'desc'    => __( 'You can select coming soon page from here.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => '0',
                            'options' => htmega_elementor_template(),
                            'is_pro' => true,
                            'condition' => [ ['condition_key' => 'themebuilder_enable', 'condition_value' => 'on'] ]
                        ),
                    ),
                ),
                array(
                    'id'  => 'salenotification',
                    'name'  => __( 'Sales Notification', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),

                array(
                    'id'  => 'megamenubuilder',
                    'name'  => __( 'Menu Builder', 'htmega-addons' ),
                    'type'  => 'module',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'section'  => 'htmega_megamenu_module_settings',
                    'setting_fields' => array(
                        array(
                            'id'  => 'megamenubuilder_enable',
                            'name' => esc_html__( 'Enable / Disable' ),
                            'desc'  => esc_html__( 'You can enable / disable Menu Builder from  here.', 'htmega-addons' ),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => esc_html__( 'On', 'htmega-addons' ),
                            'label_off' => esc_html__( 'Off', 'htmega-addons' ),
                        ),

                        array(
                            'id'    => 'menu_items_color',
                            'name'   => __( 'Menu Items Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Menu Items Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'    => 'menu_items_hover_color',
                            'name'   => __( 'Menu Items Hover Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Menu Items Hover Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'  => 'sub_menu_width',
                            'name' => __( 'Sub Menu Width', 'htmega-addons' ),
                            'desc'  => __( 'Specify the width of the Sub Menu (px).', 'htmega-addons' ),
                            'min'               => 0,
                            'max'               => 1000,
                            'step'              => '1',
                            'type'              => 'number',
                            'default'           => '200',
                            'sanitize_callback' => 'floatval',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'    => 'sub_menu_bg_color',
                            'name'   => __( 'Sub Menu Background Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Sub Menu Background Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'    => 'sub_menu_items_color',
                            'name'   => __( 'Sub Menu Items Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Sub Menu Items Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'    => 'sub_menu_items_hover_color',
                            'name'   => __( 'Sub Menu Items Hover Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Sub Menu Items Hover Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'  => 'mega_menu_width',
                            'name' => __( 'Mega Menu Width', 'htmega-addons' ),
                            'desc'  => __( 'Specify the Mega Menu Width (px)', 'htmega-addons' ),
                            'min'               => 0,
                            'max'               => 2000,
                            'step'              => '1',
                            'type'              => 'number',
                            'default'           => '',
                            'sanitize_callback' => 'floatval',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        ),
                        array(
                            'id'    => 'mega_menu_bg_color',
                            'name'   => __( 'Mega Menu Background Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the Mega Menu Background Color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '',
                            'condition' => [['condition_key' => 'megamenubuilder_enable', 'condition_value' => 'on']]
                        )
                    ),
                ),

                array(
                    'id'  => 'postduplicator',
                    'name'  => __( 'Post Duplicator', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'wrapperlink',
                    'name'  => __( 'Wrapper Link', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'floating_effects',
                    'name'  => __( 'Floating Effects', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                
                array(
                    'id'  => 'htmega_rpbar',
                    'name'  => __( 'Reading Progress Bar', 'htmega-addons' ),
                    'type'  => 'module',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'section'  => 'htmega_rpbar_module_settings',
                    'setting_fields' => array(
                        array(
                            'id'  => 'rpbar_enable',
                            'name' => __( 'Enable/Disable', 'htmega-addons' ),
                            'desc'  => __( 'You can enable/disable the Reading Progress Bar from here.', 'htmega-addons' ),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => __( 'On', 'htmega-addons' ),
                            'label_off' => __( 'Off', 'htmega-addons' ),
                        ),
                        array(
                            'id'  => 'rpbar_globalp',
                            'name' => __( 'Enable/Disable Global', 'htmega-addons' ),
                            'desc'  => __( 'Enable Reading Progress Bar Globally.' , 'htmega-addons'),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => __( 'On', 'htmega-addons' ),
                            'label_off' => __( 'Off', 'htmega-addons' ),
                            'is_pro' => true,
                        ),
                        array(
                            'id'    => 'rpbar_background_color',
                            'name'   => __( 'Background Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the reading progress bar background color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#000000',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'rpbar_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'rpbar_globalp', 'condition_value' => 'on']
                            ]
        
                        ),
                        array(
                            'id'    => 'rpbar_fill_color',
                            'name'   => __( 'Fill Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the fill color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#D43A6B',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'rpbar_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'rpbar_globalp', 'condition_value' => 'on']
                            ]
        
                        ),
                        array(
                            'id'    => 'rpbar_select_to_show_pages',
                            'name'   => __( 'Select Pages', 'htmega-addons' ),
                            'desc'    => __( 'Select the option where you want to display it.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => 'all',
                            'is_pro' => true,
                            'options' => [
                                'posts' => __('All Posts', 'htmega-addons'),
                                'pages' => __('All Pages', 'htmega-addons'),
                                'all' => __('All Posts & Pages', 'htmega-addons'),
                            ],
                            'condition' => [
                                ['condition_key' => 'rpbar_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'rpbar_globalp', 'condition_value' => 'on']
                            ]
        
                        ),
                        array(
                            'id'  => 'rpbar_loading_height',
                            'name' => __( 'Loading Progress Bar Height', 'htmega-addons' ),
                            'desc'  => __( 'Specify the height of the loading progress bar.', 'htmega-addons' ),
                            'min'               => 1,
                            'max'               => 100,
                            'step'              => '1',
                            'type'              => 'number',
                            'default'           => '5',
                            'is_pro' => true,
                            'sanitize_callback' => 'floatval',
                            'condition' => [
                                ['condition_key' => 'rpbar_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'rpbar_globalp', 'condition_value' => 'on']
                            ]
                        ),
                        array(
                            'id'    => 'rpbar_position',
                            'name'   => __( 'Position', 'htmega-addons' ),
                            'desc'    => __( 'Choose the loading bar position to display the progress bar at the top or bottom.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => 'top',
                            'is_pro' => true,
                            'options' => [
                                'top' => __('Top', 'htmega-addons'),
                                'bottom' => __('Bottom', 'htmega-addons'),
                            ],
                            'condition' => [
                                ['condition_key' => 'rpbar_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'rpbar_globalp', 'condition_value' => 'on']
                            ]
        
                        ),
    
                    )
                ),
                array(
                    'id'  => 'htmega_stt',
                    'name'  => __( 'Scroll To Top', 'htmega-addons' ),
                    'type'  => 'module',
                    'default'=>'off',
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                    'section'  => 'htmega_stt_module_settings',
                    'setting_fields' => array(
                        array(
                            'id'  => 'stt_enable',
                            'name' => __( 'Enable/Disable', 'htmega-addons' ),
                            'desc'  => __( 'You can enable/disable Scroll To Top from here.', 'htmega-addons' ),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => __( 'On', 'htmega-addons' ),
                            'label_off' => __( 'Off', 'htmega-addons' ),
                        ),
                        array(
                            'id'  => 'stt_globalp',
                            'name' => __( 'Enable/Disable Global', 'htmega-addons' ),
                            'desc'  => __( 'Enable Scroll To Top Globally.', 'htmega-addons' ),
                            'type'  => 'checkbox',
                            'default' => 'off',
                            'class' => 'htmega-action-field-left',
                            'label_on' => __( 'On', 'htmega-addons' ),
                            'label_off' => __( 'Off', 'htmega-addons' ),
                            'is_pro' => true,
                        ),
                        array(
                            'id'    => 'stt_select_to_show_pages',
                            'name'   => __( 'Select Pages', 'htmega-addons' ),
                            'desc'    => __( 'Select the option where you would like to display it.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => 'all',
                            'is_pro' => true,
                            'options' => [
                                'posts' => __('All Posts', 'htmega-addons'),
                                'pages' => __('All Pages', 'htmega-addons'),
                                'all' => __('All Posts & Pages', 'htmega-addons'),
                            ],
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                            
                        ),
                        array(
                            'id'    => 'stt_position',
                            'name'   => __( 'Position', 'htmega-addons' ),
                            'desc'    => __( 'Choose the position to display the Scroll To Top button on the left or right.', 'htmega-addons' ),
                            'type'    => 'select',
                            'default' => 'right',
                            'options' => [
                                'left' => __('Bottom Left', 'htmega-addons'),
                                'right' => __('Bottom Right', 'htmega-addons'),
                            ],
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                        ),
                        array(
                            'id'  => 'stt_bottom_space',
                            'name' => __( 'Bottom Space', 'htmega-addons' ),
                            'desc'  => __( 'Specify the bottom spacing for the Scroll To Top button.', 'htmega-addons' ),
                            'step'              => '1',
                            'type'              => 'number',
                            'default'           => '30',
                            'sanitize_callback' => 'floatval',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                        ),
                        array(
                            'id'    => 'stt_color',
                            'name'   => __( 'Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the button icon/text color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                        ),
                        array(
                            'id'    => 'stt_bg_color',
                            'name'   => __( 'Background Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the button background color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#000000',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
        
                        ),
                        array(
                            'id'    => 'stt_color_hover',
                            'name'   => __( 'Hover Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the button icon/text hover color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                        ),
                        array(
                            'id'    => 'stt_bg_color_hover',
                            'name'   => __( 'Hover Background Color', 'htmega-addons' ),
                            'desc'    => __( 'Set the button hover background color.', 'htmega-addons' ),
                            'class' => 'htmega-action-field-left',
                            'type'    => 'color',
                            'default' => '#000000',
                            'is_pro' => true,
                            'condition' => [
                                ['condition_key' => 'stt_enable', 'condition_value' => 'on'],
                                ['condition_key' => 'stt_globalp', 'condition_value' => 'on']
                            ]
                        )
                    )
                ),
               
                array(
                    'id'  => 'crossdomaincpp',
                    'name'  => __( 'Cross Domain Copy Paste', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'parallax_modulep',
                    'name'  => __( 'Parallax', 'htmega-addons' ),
                    'type'  => 'element',
                    'default' => 'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'particles_modulep',
                    'name'  => __( 'Particles', 'htmega-addons' ),
                    'type'  => 'element',
                    'default' => 'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'd_conditional_modulep',
                    'name'  => __( 'Conditional Display', 'htmega-addons' ),
                    'type'  => 'element',
                    'default' => 'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'advanced_sticky_modulep',
                    'name'  => __( 'Advanced Sticky', 'htmega-addons' ),
                    'type'  => 'element',
                    'default' => 'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
                array(
                    'id'  => 'custom_css_modulep',
                    'name'  => __( 'Custom CSS', 'htmega-addons' ),
                    'type'  => 'element',
                    'default'=>'off',
                    'is_pro' => true,
                    'label_on' => __( 'On', 'htmega-addons' ),
                    'label_off' => __( 'Off', 'htmega-addons' ),
                ),
            ),

        );

        $settings['htmega_themebuilder_element_tabs'] = array(

            array(
                'id'  => 'bl_post_title',
                'name'  => __( 'Post Title', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_featured_image',
                'name'  => __( 'Post Featured Image', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_meta_info',
                'name'  => __( 'Post Meta Info', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_excerpt',
                'name'  => __( 'Post Excerpt', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_content',
                'name'  => __( 'Post Content', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_comments',
                'name'  => __( 'Post Comments', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_search_form',
                'name'  => __( 'Post Search Form', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_archive',
                'name'  => __( 'Archive Posts', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_archive_title',
                'name'  => __( 'Archive Title', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),
            
            array(
                'id'  => 'bl_page_title',
                'name'  => __( 'Page Title', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_site_title',
                'name'  => __( 'Site Title', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_site_logo',
                'name'  => __( 'Site Logo', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_nav_menu',
                'name'  => __( 'Nav Menu', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_author_info',
                'name'  => __( 'Author Info', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'on',
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_social_sharep',
                'name'  => __( 'Social Share', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_print_pagep',
                'name'  => __( 'Print Page', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_view_counterp',
                'name'  => __( 'View Counter', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_post_navigationp',
                'name'  => __( 'Post Navigation', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_related_postp',
                'name'  => __( 'Related Post', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),

            array(
                'id'  => 'bl_popular_postp',
                'name'  => __( 'Popular Post', 'htmega-addons' ),
                'type'    => 'element',
                'default' => 'off',
                'is_pro' => true,
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ),


        );

        // Post Duplicator Condition
        if( htmega_get_option( 'postduplicator', 'htmega_advance_element_tabs', 'off' ) === 'on' ){
            $post_types = htmega_get_post_types( array('defaultadd'=>'all') );
            if ( did_action( 'elementor/loaded' ) && defined( 'ELEMENTOR_VERSION' ) ) {
                $post_types['elementor_library'] = esc_html__( 'Templates', 'htmega-addons' );
            }
            $settings['htmega_general_tabs'][] = [
                'id'    => 'postduplicate_condition',
                'name'   => __( 'Post Duplicator Condition', 'htmega-addons' ),
                'desc'    => __( 'You can enable duplicator for individual post.', 'htmega-addons' ),
                'type'    => 'multiselect',
                'default' => '',
                'options' => $post_types,
            ];
        }

        $third_party_element = array();
        // Third Party Addons
        if( is_plugin_active('bbpress/bbpress.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'bbpress',
                'name'    => __( 'bbPress', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('booked/booked.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'bookedcalender',
                'name'    => __( 'Booked Calender', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('buddypress/bp-loader.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'buddypress',
                'name'    => __( 'BuddyPress', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('caldera-forms/caldera-core.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'calderaform',
                'name'    => __( 'Caldera Form', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'contactform',
                'name'    => __( 'Contact form 7', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('download-monitor/download-monitor.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'downloadmonitor',
                'name'    => __( 'Download Monitor', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('easy-digital-downloads/easy-digital-downloads.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'easydigitaldownload',
                'name'    => __( 'Easy Digital Downloads', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('gravityforms/gravityforms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'gravityforms',
                'name'    => __( 'Gravity Forms', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('instagram-feed/instagram-feed.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'instragramfeed',
                'name'    => __( 'Instragram Feed', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('wp-job-manager/wp-job-manager.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'jobmanager',
                'name'    => __( 'Job Manager', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('LayerSlider/layerslider.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'layerslider',
                'name'    => __( 'Job Manager', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('mailchimp-for-wp/mailchimp-for-wp.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'mailchimpwp',
                'name'    => __( 'Mailchimp for wp', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('ninja-forms/ninja-forms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'ninjaform',
                'name'    => __( 'Ninja Form', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('quform/quform.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'quforms',
                'name'    => __( 'QU Form', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('wpforms-lite/wpforms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'wpforms',
                'name'    => __( 'WP Form', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('revslider/revslider.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'revolution',
                'name'    => __( 'Revolution Slider', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }

        if( is_plugin_active('tablepress/tablepress.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'tablepress',
                'name'    => __( 'TablePress', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];
        }
    
        if( is_plugin_active('woocommerce/woocommerce.php') ) {
           
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'wcaddtocart',
                'name'    => __( 'WC : Add To cart', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];

            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'categories',
                'name'    => __( 'WC : Categories', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];

            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'wcpages',
                'name'    => __( 'WC : Pages', 'htmega-addons' ),
                'type'    => 'element',
                'default' => "on",
                'label_on' => __( 'On', 'htmega-addons' ),
                'label_off' => __( 'Off', 'htmega-addons' ),
            ];

        }

        if( empty( $third_party_element ) ){
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'id'    => 'noelement',
                'html'    => __( 'No Element Found', 'htmega-addons' ),
                'type'    => 'html',
            ];
        }

        $allFields = array_merge( $settings, $third_party_element );
        return apply_filters( 'htmega_admin_fields', $allFields );

    }

    // General tab
    public function pro_vs_free_html_tabs(){
        ob_start();
        include_once HTMEGAOPT_INCLUDES .'/templates/dashboard-general.php';
        return ob_get_clean();
    }

}