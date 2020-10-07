<?php
namespace NbAdds\Modules;

class NBA_Progress_Bar extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Progress Bar', 'nbaddons'),
            'description'   => __('Progress Bar will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'progress-bar/',
            'url'           => Nbaddons_Load::_get_url() . 'progress-bar/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'progress-bar.svg',
        ));

       
        $this->add_css('nxbb-progress', $this->url . 'css/progress.css', Nbaddons_Load::_version(), true);
        $this->add_js('nxbb-progress', $this->url . 'js/progress.js', array(), Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'progress-bar/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'progress-bar/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Progress_Bar', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'data_content' => [
                'title' => __('Data', 'nbaddons'), 
                'fields' => [
                    'title_text' => [
                        'type' => 'text',
                        'label'   => __( 'Title', 'nbaddons' ),
                        'default' => 'WordPress',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-single-skill-bar .skill-bar-content .skill-title',
						),
                    ],
                    'percentage_text' => [
                        'type' => 'text',
                        'label'   => __( 'Value', 'nbaddons' ),
                        'default' => '70',
                        
                    ],
                    'speed_text' => [
                        'type' => 'text',
                        'label'   => __( 'Speed', 'nbaddons' ),
                        'default' => '50',
                        
                    ],
                    'addi_text' => [
                        'type' => 'text',
                        'label'   => __( 'Extra Text', 'nbaddons' ),
                        'default' => '%',
                        
                    ],
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
							'selector' => '{node} .nxbb-single-skill-bar .skill-bar-content .skill-title',
						),
                    ),
                    'color_title'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-single-skill-bar .skill-bar-content .skill-title',
							'property' => 'color',
						),
                    ),
                    'spacing_title'             => array(
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
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-single-skill-bar .skill-bar-content',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ],
            'counter_style' => [
                'title' => __('Counter', 'nbaddons'),
                'fields' => [
                    'typography_counter' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nx-skill-bar4 .nx-skill-progress .number-percentage-wraper',
						),
                    ),
                    'color_counter'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nx-skill-bar4 .nx-skill-progress .number-percentage-wraper',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
            'backbar_style' => [
                'title' => __('Back Bar', 'nbaddons'),
                'fields' => [
                    'bgcolor_back'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4',
							'property' => 'background-color',
						),
					),
                    'border_back'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4',
						),
                    ),
                    'padding_back' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4',
                            'property' => 'padding',
                        ),
                       
                    ),

                    'height_bar'             => array(
						'type'       => 'unit',
						'label'      => __( 'Height', 'nbaddons' ),
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
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4',
                            'property' => 'height',
                            'important' => true,
						),
                    ),
                    
                ]
            ],
            'frontbar_style' => [
                'title' => __('Progress Bar', 'nbaddons'),
                'fields' => [
                    'bgcolor_front'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress',
							'property' => 'background-color',
						),
					),
                    'border_front'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress',
						),
                    ),
                    'padding_front' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress',
                            'property' => 'padding',
                        ),
                       
                    ),
                    
                ]
            ],
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');