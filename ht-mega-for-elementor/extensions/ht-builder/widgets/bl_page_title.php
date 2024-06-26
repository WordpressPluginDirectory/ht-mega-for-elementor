<?php
namespace HTMega_Builder\Elementor\Widget;

// Elementor Classes
use Elementor\Plugin as Elementor;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Bl_Page_Title_ELement extends Widget_Base {

    public function get_name() {
        return 'bl-page-title';
    }

    public function get_title() {
        return __( 'Page Title', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-site-title';
    }

    public function get_categories() {
        return ['htmega_builder'];
    }
    public function get_keywords() {
        return ['page title', 'title', 'page heading', 'htmega', 'ht mega', 'addons'];
    }

    public function get_help_url() {
        return 'https://wphtmega.com/docs';
    }
    protected function register_controls() {

        // Post Title
        $this->start_controls_section(
            'title_content',
            [
                'label' => __( 'Page Title', 'htmega-addons' ),
            ]
        );
            $this->add_control(
                'title_html_tag',
                [
                    'label'   => __( 'Title HTML Tag', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => htmega_html_tag_lists(),
                    'default' => 'h1',
                ]
            );

        $this->end_controls_section();

        // Style
        $this->start_controls_section(
            'title_style_section',
            array(
                'label' => __( 'Page Title', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htpage-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'title_typography',
                    'label'     => __( 'Typography', 'htmega-addons' ),
                    'selector'  => '{{WRAPPER}} .htpage-title',
                )
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htpage-title',
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'title_border_radius',
                [
                    'label' => __( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htpage-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htpage-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htpage-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_align',
                [
                    'label'        => __( 'Alignment', 'htmega-addons' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'htmega-addons' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htmega-addons' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'htmega-addons' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],                    
                    'prefix_class' => 'elementor-align-%s',
                    'default'      => 'left',
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();

        $title_tag = htmega_validate_html_tag( $settings['title_html_tag'] );

        if( Elementor::instance()->editor->is_edit_mode() ){
            echo sprintf( '<%1$s class="htpage-title">' . esc_html__('Page Title', 'htmega-addons' ). '</%1$s>', esc_attr( $title_tag ) );
        }else{
            echo sprintf( '<%1$s class="htpage-title">%2$s</%1$s>', esc_attr( $title_tag ), wp_title( '', false )  );
        }
    }

    

}
