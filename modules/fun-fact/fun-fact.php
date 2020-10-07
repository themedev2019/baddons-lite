<?php
namespace NbAdds\Modules;

class NBA_Fun_Fact extends \FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Fun Fact', 'nbaddons'),
            'description'   => __('An basic example for coding new modules.', 'nbaddons'),
            'category'		=> __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'fun-fact/',
            'url'           => Nbaddons_Load::_get_url() . 'fun-fact/',
            'editor_export' => true,
            'enabled'       => true,
            'partial_refresh' => false,
            'icon'            => 'fun-facts.svg',
        ));

        // Register and enqueue your own
        $this->add_css('nxbb-funfact', $this->url . 'css/fun-fact.css', Nbaddons_Load::_version(), true);
        $this->add_js('nxbb-funfact', $this->url . 'js/fun-fact.js', array(), Nbaddons_Load::_version(), true);
    }

    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'fun-fact/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'fun-fact/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Fun_Fact', array(
    'general'       => array( // Tab General
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'fun_data' => [
                'title' => __('Data', 'nbaddons'),
                'fields' => [
                    'counter' => [
                        'type' => 'text',
                        'label'   => __( 'Enter counter value', 'nbaddons' ),
                        'default' => '165000',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-value',
						),
                    ],
                    'start_counter' => [
                        'type' => 'text',
                        'label'   => __( 'From start', 'nbaddons' ),
                        'default' => '500',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-start',
						),
                    ],
                    'step_counter' => [
                        'type' => 'text',
                        'label'   => __( 'Step', 'nbaddons' ),
                        'default' => '15',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-step',
						),
                    ],
                    'speed_counter' => [
                        'type' => 'text',
                        'label'   => __( 'Speed', 'nbaddons' ),
                        'default' => '30',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-speed',
						),
                    ],
                    'extra_data' => [
                        'type' => 'text',
                        'label'   => __( 'Addition Text', 'nbaddons' ),
                        'default' => 'M+',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-extra-data',
						),
                    ],
                    'extra_position' => array(
                        'type'    => 'select',
						'label'   => __( 'Position Text', 'nbaddons' ),
						'default' => 'after',
						'options' => array(
							'after' => __( 'After', 'nbaddons' ),
							'before' => __( 'Before', 'nbaddons' ),
                        ),

                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-extra-data-direction',
						),
                       
                    ),
                    'number_status' => array(
                        'type'    => 'select',
						'label'   => __( 'Number format', 'nbaddons' ),
						'default' => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'nbaddons' ),
							'no' => __( 'No', 'nbaddons' ),
                        ),
                        'toggle'  => array(
							'yes' => array(
                                'fields' => array( 'number_format'),
							),
							
						),
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-number-format',
						),
                       
                    ),
                    'number_format' => array(
                        'type'    => 'select',
						'label'   => __( 'Number format', 'nbaddons' ),
						'options' => [ 'en-IN' => 'en-IN', 'it_IT' => 'it-IT', 'de-DE' => 'de-DE', 'ar-EG' => 'ar-EG', 'ar-EG' => 'ar-EG'],
				        'default' => 'en-IN',
                        'preview' => array(
                            'type' => 'attribute',
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'attribute' => 'nx-fun-number-format-name',
						),
                       
                    ),
                ]
            ],
            'fun_title' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'title_text' => [
                        'type' => 'text',
                        'label'   => __( 'Enter title', 'nbaddons' ),
                        'default' => 'Support Given',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-funfact-area .funfact-title',
						),
                    ],
                ]
            ],
            'fun_icon' => [
                'title' => __('Icon', 'nbaddons'),
                'fields' => [
                    'fun_icon' => array(
                        'type'    => 'select',
                        'label'   => __( 'Choose type', 'nbaddons' ),
                        'default' => 'library',
                        'options' => array(
                            'no'     => __( 'No select', 'nbaddons' ),
                            'library'     => __( 'Library', 'nbaddons' ),
                            'class' => __( 'Paste class', 'nbaddons' ),
                        ),
                        'toggle'  => array(
                            
                            'library' => array(
                                'fields' => array( 'select_icons'),
                            ),

                            'class' => array(
                                'fields' => array( 'fun_class'),
                            ),

                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                   
                    'select_icons' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Select Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-statamic',
                        
                    ),

                    'fun_class' => array(
                        'type'    => 'text',
                        'label'   => __( 'Class name', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-statamic',
                        
                    ),
                ]
            ]
        )
    ),
    'style'       => array( // Tab Style
        'title'         => __('NX Style', 'nbaddons'), 
        'sections'      => array(
            'fun_body_style' => [
                'title' => __('Body', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-funfact-area .nxbb-single-fun-fact',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                    'bgcolor_body'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxbb-single-fun-fact',
							'property' => 'background-color',
						),
					),
                    'border_body'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxbb-single-fun-fact',
						),
                    ),
                    'padding_body' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-funfact-area .nxbb-single-fun-fact',
                            'property' => 'padding',
                        ),
                       
                    ),
                ]
            ],
            'fun_data_style' => [
                'title' => __('Data', 'nbaddons'),
                'fields' => [
                    'typography_data' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .funfact-timer > span',
						),
                    ),
                    'color_data'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .funfact-timer > span',
							'property' => 'color',
						),
                    ),
                    'spacing_data'             => array(
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
                            'selector' => '{node} .nxbb-funfact-area .funfact-timer',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ],
            'fun_title_style' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .funfact-title',
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
							'selector' => '{node} .nxbb-funfact-area .funfact-title',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
            'fun_icon_style' => [
                'title' => __('Icon', 'nbaddons'),
                'fields' => [
                    'typography_icon' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon',
						),
                    ),
                    'color_icon'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon',
							'property' => 'color',
						),
                    ),
                    'bgcolor_icon'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon',
							'property' => 'background-color',
						),
					),
                    'padding_icon' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'border_icon'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon',
						),
                    ),
                    'spacing_icon'             => array(
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
                            'selector' => '{node} .nxbb-funfact-area .nxadd-funfact-icon',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ]
        )
    ),
));

do_action('nbaddons/extra/method/render/tab');