<?php
namespace NbAdds\Modules;

class NBA_Review extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Review', 'nbaddons'),
            'description'   => __('Review will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'review/',
            'url'           => Nbaddons_Load::_get_url() . 'review/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'rating.svg',
        ));

       
        $this->add_css('nxbb-review', $this->url . 'css/review.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'review/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'review/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Review', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout' => array(
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'layout_type' => array(
                        'type'    => 'select',
						'label'   => __( 'Select layout', 'nbaddons' ),
						'default' => 'nx-review-top',
						'options' => array(
							'nx-review-top' => __( 'Top', 'nbaddons' ),
							'nx-review-left' => __( 'Left', 'nbaddons' ),
							'nx-review-right' => __( 'Right', 'nbaddons' ),
                        ),
                       
                    ),
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-review .nxbb-widget-container',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                ] 
            ),
            'profile_photos' => [
                'title' => __('Photo', 'nbaddons'),
                'fields' => [
                    'photo_source' => array(
						'type'    => 'select',
						'label'   => __( 'Source', 'nbaddons' ),
						'default' => 'url',
						'options' => array(
							'no' => __( 'No image', 'nbaddons' ),
							'library' => __( 'Media Library', 'nbaddons' ),
							'url'     => __( 'URL', 'nbaddons' ),
						),
						'toggle'  => array(
							'library' => array(
                                'fields' => array( 'photo'),
                                'sections' => array('card_image_style'),
							),
							'url'     => array(
                                'fields' => array( 'photo_url'),
                                'sections' => array('card_image_style'),
							),
						),
						
                    ),
                    'photo'        => array(
						'type'        => 'photo',
						'label'       => __( 'Photo', 'nbaddons' ),
						'connections' => array( 'photo' ),
						'show_remove' => true,
						'default' => Nbaddons_Load::_get_url() . 'team/includes/team_1.jpg'
					),
					'photo_url'    => array(
						'type'        => 'text',
						'label'       => __( 'Photo URL', 'nbaddons' ),
						'placeholder' => __( 'http://www.example.com/my-photo.jpg', 'nbaddons' ),
						'default' => Nbaddons_Load::_get_url() . 'team/includes/team_1.jpg'
					),
                ],

            ],
            'team_name'       => array(
                'title'         => __('Info', 'nbaddons'), 
                'fields' => [
                   
					'name_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter Name', 'nbaddons' ),
                        'default' => 'Dewey Nelson',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-review .nx-review-body .nx-review-reviewer',
						),
                    ),

                    'designation_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter designation', 'nbaddons' ),
                        'default' => 'CEO of ThemeDev',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-review .nx-review-body .nx-review-position',
						),
                    ),
                    'ratting_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Rating', 'nbaddons' ),
                        'default' => '5',
						
                    ),
                    'ratting_type'      => array(
						'type'    => 'button-group',
                        'label'   => __( 'Rating type', 'nbaddons' ),
                        'default' => 'default',
						'options' => [
                            'default' => 'Default',
                            'rating' => 'Rating',
                        ]
                    ),
                    'details_text'      => array(
						'type'    => 'textarea',
                        'label'   => __( 'Enter details', 'nbaddons' ),
                        'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-review .nx-review-body .nx-review-desc p',
						),
                    ),
                ]
            ),
            
        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'photos_style' => [
                'title' => __('Photo', 'nbaddons'),
                'fields' => [
                    'thum_width'             => array(
                        'type'       => 'unit',
                        'label'      => __( 'Width', 'nbaddons' ),
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
                    'thum_height'             => array(
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
                        
                    ),
                    
                    'border_photos'             => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-review .nx-review-fig img',
                        ),
                    ),
                    'spacing_photos'             => array(
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
            'team_name_style' => array(
                'title' => __('Name', 'nbaddons'), 
                'fields' => [
                    'typography_name' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-reviewer',
						),
                    ),
                    'color_name'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-reviewer',
							'property' => 'color',
						),
                    ),
                   
                    'spacing_name'             => array(
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
                            'selector' => '{node} .nxbb-review .nx-review-body .nx-review-reviewer',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'team_designation_style' => array(
                'title' => __('Designation', 'nbaddons'), 
                'fields' => [
                    'typography_designation' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-position',
						),
                    ),
                    'color_designation'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-position',
							'property' => 'color',
						),
                    ),
                   
                    'spacing_designation'             => array(
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
                            'selector' => '{node} .nxbb-review .nx-review-body .nx-review-position',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'team_rating_style' => array(
                'title' => __('Rating', 'nbaddons'), 
                'fields' => [
                    'typography_rating' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-ratting--star',
						),
                    ),
                    'color_rating'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-ratting--star',
							'property' => 'color',
						),
                    ),
                    'border_content_raitng'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-ratting--star',
						),
                    ),

                    'padding_ratting' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-review .nx-review-ratting--star',
                            'property' => 'padding',
                        ),
                        
                    ),
                    
                ]
            ),
            'team_details_style' => array(
                'title' => __('Details', 'nbaddons'), 
                'fields' => [
                    'typography_details' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-desc p',
						),
                    ),
                    'color_details'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-review .nx-review-body .nx-review-desc p',
							'property' => 'color',
						),
                    ),
                   
                    
                ]
            ),
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');