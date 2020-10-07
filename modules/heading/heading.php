<?php
namespace NbAdds\Modules;

class NBA_Heading extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Heading', 'nbaddons'),
            'description'   => __('Heading will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'heading/',
            'url'           => Nbaddons_Load::_get_url() . 'heading/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'heading.svg',
        ));

       
        $this->add_css('nxbb-heading', $this->url . 'css/heading.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'heading/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'heading/icon/' . $icon;
		}

		if ( file_exists( $path ) ) {
			return file_get_contents( $path );
		} else {
			return '';
		}
	}
     
    public function update($settings)
    { 
        return $settings;
    }

       
    public function delete()
    {
    
    }

    
    public function next_extra_method( $id, $settings, $module )
    {
        do_action('nbaddons/extra/method/render/css', $id, $settings, $module);
    }
}

/**
 * Register the module and its form settings.
 */

\FLBuilder::register_module('\NbAdds\Modules\NBA_Heading', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout_type' => [
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'layout_style' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Style', 'nbaddons' ),
                        'default' => 'nx-default-heading',
                        'options' => array(
                            'nx-default-heading' => __( 'Default', 'nbaddons' ),
                            'nx-default-reverse' => __( 'Reverse', 'nbaddons' ),
                        ),
                    )
                ]
            ],
            'heading_title' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'headin_title'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter title', 'nbaddons' ),
                        'default' => 'This is title',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-title',
						),
                    ),
                    'tags_title' => array(
						'type'    => 'button-group',
						'label'   => __( 'Tag', 'nbaddons' ),
						'default' => 'h2',
						'options' => array(
							'h1'     => __( 'H1', 'nbaddons' ),
							'h2' => __( 'H2', 'nbaddons' ),
							'h3' => __( 'H3', 'nbaddons' ),
							'h4' => __( 'H4', 'nbaddons' ),
							'h5' => __( 'H5', 'nbaddons' ),
							'h6' => __( 'H6', 'nbaddons' ),
							'p' => __( 'p', 'nbaddons' ),
							'div' => __( 'div', 'nbaddons' ),
                        ),
                    )
                ] 
            ],
            'heading_subtitle' => [
                'title' => __('Sub Title', 'nbaddons'),
                'fields' => [
                    'headin_subtitle'      => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter sub title', 'nbaddons' ),
                        'default' => 'This is sub title. ThemeDev is SoftWare Company. ',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-subtitle',
                        ),
                    ),
                    'tags_subtitle' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Tag', 'nbaddons' ),
                        'default' => 'p',
                        'options' => array(
                           'h3' => __( 'H3', 'nbaddons' ),
                            'h4' => __( 'H4', 'nbaddons' ),
                            'h5' => __( 'H5', 'nbaddons' ),
                            'h6' => __( 'H6', 'nbaddons' ),
                            'p' => __( 'p', 'nbaddons' ),
                            'div' => __( 'div', 'nbaddons' ),
                            'span' => __( 'span', 'nbaddons' ),
                            'i' => __( 'i', 'nbaddons' ),
                            'strong' => __( 'strong', 'nbaddons' ),
                        ),
                    )
                ] 
            ]
        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            
            'title_style' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                  
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-title',
						),
                    ),
                    'title_bg_type' => array(
                        'type'    => 'select',
                        'label'   => __( 'Background', 'nbaddons' ),
                        'default' => 'color',
                        'options' => array(
                            'color'     => _x( 'Color', 'Background type.', 'nbaddons' ),
                            'gradient'  => _x( 'Gradient', 'Background type.', 'nbaddons' ),
                           
                        ),
                        'toggle'  => array(
                            'color'     => array(
                                'fields' => array( 'title_bg_color' ),
                            ),
                            'gradient'  => array(
                                'fields' => array( 'title_bg_color', 'title_bg_gradient' ),
                            ),
                            
                        ),
                       
                    ),
                    'title_bg_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'default' => '#333',
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-title',
                            'property' => 'color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                    'title_bg_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => __( 'Gradient', 'nbaddons' ),
                       
                    ),
                    'title_spacing'             => array(
                        'type'       => 'unit',
                        'label'      => __( 'Spacing', 'nbaddons' ),
                        'responsive' => true,
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'vw',
                            '%',
                        ),
                        'slider'     => array(
                            'px' => array(
                                'min'  => 0,
                                'max'  => 1000,
                                'step' => 10,
                            ),
                        ),
                        
                    ),
                ]
            ],
            'subtitle_style' => [
                'title' => __('Sub Title', 'nbaddons'),
                'fields' => [
                  
                    'typography_subtitle' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-subtitle',
						),
                    ),
                   
                    'subtitle_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'default' => '#333',
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-heading-wrapper .nxbb-content-heading .heading-subtitle',
                            'property' => 'color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                   
                ]
            ]
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');