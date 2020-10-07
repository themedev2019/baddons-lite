<?php
namespace NbAdds\Modules;

class NBA_Team extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Team', 'nbaddons'),
            'description'   => __('Team will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'team/',
            'url'           => Nbaddons_Load::_get_url() . 'team/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'team.svg',
        ));

       
        $this->add_css('nxbb-team', $this->url . 'css/team.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'team/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'team/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Team', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
			'layout' => array(
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'layout_type' => array(
                        'type'    => 'select',
						'label'   => __( 'Select layout', 'nbaddons' ),
						'default' => 'nx-top-layout',
						'options' => array(
							'nx-top-layout' => __( 'Top', 'nbaddons' ),
							'nx-bottom-layout' => __( 'Bottom', 'nbaddons' ),
							'nx-left-layout'     => __( 'Left', 'nbaddons' ),
							'nx-right-layout'     => __( 'Right', 'nbaddons' ),
                        ),
                        'toggle'  => array(
							'nx-left-layout' => array(
                                'fields' => array( 'flex_width'),
							),
							'nx-right-layout'     => array(
                                'fields' => array( 'flex_width'),
							),
						),
                       
                    ),
                    'flex_width'             => array(
						'type'       => 'unit',
						'label'      => __( 'Width', 'nbaddons' ),
                        'responsive' => true,
                        'slider'     => true,
                        'units'      => array(
							'%',
							'vw',
							'px',
						),
						'default' => '35',
						
                    ),
                ]
            ), 
			'profile_photos' => [
                'title' => __('Profile Photo', 'nbaddons'),
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
                                'sections' => array('display_photos_style'),
							),
							'url'     => array(
                                'fields' => array( 'photo_url'),
                                'sections' => array('display_photos_style'),
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
                'title'         => __('Name', 'nbaddons'), 
                'fields' => [
                    'show_name' => array(
						'type'    => 'button-group',
						'label'   => __( 'Show', 'nbaddons' ),
						'default' => 'yes',
						'options' => array(
							'yes'     => __( 'Yes', 'nbaddons' ),
							'no' => __( 'No', 'nbaddons' ),
						),

						'toggle'  => array(
							
							'yes' => array(
                                'fields' => array( 'name_text'),
                                'sections' => array('team_name_style'),
							),

						),
						
					),
					'name_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter Name', 'nbaddons' ),
                        'default' => 'Dewey Nelson',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-content .member-title',
						),
					),
                ]
            ),
            'team_designation'       => array(
                'title'         => __('Designation', 'nbaddons'), 
                'fields' => [
                    'show_designation' => array(
						'type'    => 'button-group',
						'label'   => __( 'Show ', 'nbaddons' ),
						'default' => 'yes',
						'options' => array(
							'yes'     => __( 'Yes', 'nbaddons' ),
							'no' => __( 'No', 'nbaddons' ),
						),

						'toggle'  => array(
							
							'yes' => array(
                                'fields' => array( 'designation_text'),
                                'sections' => array('team_designation_style'),
							),

						),
						
					),
					'designation_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter designation', 'nbaddons' ),
                        'default' => 'CEO of ThemeDev',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-content .member-title',
						),
					),
                ]
            ),
            'team_social'       => array(
                'title'         => __('Social Profiles', 'nbaddons'), 
                'fields' => [
                    'show_social' => array(
						'type'    => 'button-group',
						'label'   => __( 'Show ', 'nbaddons' ),
						'default' => 'yes',
						'options' => array(
							'yes'     => __( 'Yes', 'nbaddons' ),
							'no' => __( 'No', 'nbaddons' ),
						),

						'toggle'  => array(
							
							'yes' => array(
                                'sections' => array('team_social_style'),
							),

						),
						
                    ),
                    'fb_url' => [
                        'type'    => 'text',
                        'label'   => __( 'Facebook', 'nbaddons' ),
                        'default' => 'https://www.facebook.com/themedev2019',
						'placeholder' => 'https://www.facebook.com/themedev2019',
                    ],
                    'tw_url' => [
                        'type'    => 'text',
                        'label'   => __( 'Twitter', 'nbaddons' ),
                        'default' => 'https://twitter.com/themedev2019',
						'placeholder' => 'https://twitter.com/themedev2019',
                    ],
                    'li_url' => [
                        'type'    => 'text',
                        'label'   => __( 'Linkedin', 'nbaddons' ),
                        'default' => 'https://linkedin.com/',
						'placeholder' => 'https://linkedin.com/',
                    ],
                    'in_url' => [
                        'type'    => 'text',
                        'label'   => __( 'Instagram', 'nbaddons' ),
                        'default' => 'https://www.instagram.com/themedev19/',
						'placeholder' => 'https://www.instagram.com/themedev19/',
                    ],
                ]
            ),

        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'content_style' => [
                'title' => __('Content', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-team-area .nxadd-team-member-profile',
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile',
							'property' => 'background-color',
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
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'border_content'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile',
						),
                    ),
                ]
            ],
            'display_photos_style' => [
                'title' => __('Photos', 'nbaddons'),
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
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image',
                            'property' => 'width',
                            'important' => true,
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image',
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title',
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title',
							'property' => 'color',
						),
                    ),
                    'color_name_hover'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Hover Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile:hover .nxadd-team-member-content .member-title',
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
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title',
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation',
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
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation',
							'property' => 'color',
						),
                    ),
                    'color_designation_hover'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Hover Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile:hover .nxadd-team-member-content .member-designation',
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
                            'selector' => '{node} .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'team_social_style' => array(
                'title' => __('Social', 'nbaddons'), 
                'fields' => [
                    'typography_social' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a',
						),
                    ),
                    'color_social'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a',
							'property' => 'color',
						),
                    ),
                    'color_social_hover'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Hover Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a:hover',
							'property' => 'color',
						),
                    ),
                    'spacing_social'             => array(
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
                            'selector' => '{node} .nxbb-team-area .nxadd-social > li.social-item:not(:last-child)',
                            'property' => 'margin-right',
                            'important' => true,
						),
                    ),
                ]
            ),
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');