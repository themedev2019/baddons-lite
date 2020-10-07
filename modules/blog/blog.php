<?php
namespace NbAdds\Modules;

class NBA_Blog extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Blog', 'nbaddons'),
            'description'   => __('Blog will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'blog/',
            'url'           => Nbaddons_Load::_get_url() . 'blog/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'blogging.svg',
        ));

        $this->add_css('nbaddons-slider-nx');
        $this->add_js('nbaddons-slider-nx');

        $this->add_css('nxbb-blog', $this->url . 'css/blog.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'blog/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'blog/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Blog', array(
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
            'query_section' => [
                'title' => __('Query Option', 'nbaddons'),
                'fields' => [
                    'query_type' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Query Type', 'nbaddons' ),
                        'default' => 'all',
                        'responsive' => true,
                        'options' => array(
                            'all'    => 'All',
                            'post'    => 'Posts',
                            'categories'  => 'Categories',
                        ),
                        
                        'toggle'  => array(
                            
                            'post' => array(
                                'fields' => array( 'all_posts'),
                            ),

                            'categories' => array(
                                'fields' => array( 'all_categories'),
                            ),

                        ),
                    ),

                    'all_posts' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select posts', 'nbaddons' ),
                        'default'       => '',
                        'options'       => \NbAdds\Apps\Features\Nbaddons_Load::instance()->get_post(),
                        'multi-select'  => true,
                        
                    ),

                    'all_categories' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Categories', 'nbaddons' ),
                        'default'       => '',
                        'options'       => \NbAdds\Apps\Features\Nbaddons_Load::instance()->get_category(),
                        'multi-select'  => true,
                        
                    ),

                    'order_by' => array(
                        'type'          => 'select',
                        'label'         => __( 'Order by', 'nbaddons' ),
                        'default'       => 'title',
                        'options'       => [
                            'date'          => esc_html__( 'Date', 'nbaddons' ),
                            'title'         => esc_html__( 'Title', 'nbaddons' ),
                            'author'        => esc_html__( 'Author', 'nbaddons' ),
                            'comment_count' => esc_html__( 'Comments', 'nbaddons' ),
                        ],
                        
                        
                    ),
                    'order' => array(
                        'type'          => 'select',
                        'label'         => __( 'Order', 'nbaddons' ),
                        'default'       => 'DESC',
                        'options'       => [
                            'ASC'  => esc_html__( 'ASC', 'next-addons' ),
                            'DESC' => esc_html__( 'DESC', 'next-addons' ),
                        ],
                        
                    ),
                    'offset' => array(
                        'type'          => 'text',
                        'label'         => __( 'Offset', 'nbaddons' ),
                        'default'       => '0',
                        
                    ),
                    'limit' => array(
                        'type'          => 'text',
                        'label'         => __( 'Limit', 'nbaddons' ),
                        'default'       => 5,
                        
                    ),
                    
                    'display_column' => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Column', 'nbaddons' ),
                        'default'       => 'nx-col-lg-4 nx-col-md-6 nx-col-sm-12',
                        'options'       => [
                            'nx-col-lg-12 nx-col-md-12 nx-col-sm-12'  => esc_html__( '1 Column', 'nbaddons' ),
                            'nx-col-lg-6 nx-col-md-6 nx-col-sm-12'  => esc_html__( '2 Columns', 'nbaddons' ),
                            'nx-col-lg-4 nx-col-md-6 nx-col-sm-12'  => esc_html__( '3 Columns', 'nbaddons' ),
                            'nx-col-lg-3 nx-col-md-6 nx-col-sm-12' => esc_html__( '4 Columns', 'nbaddons' ),
                        ],
                        
                    ),
                ]
            ],

            'display_title' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'enable_title_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                       
                    ),
                    'title_length_type' => array(
                        'type'          => 'select',
                        'label'         => __( 'Length Type', 'nbaddons' ),
                        'default'       => 'word',
                        'options'       => [
                            'word' => __('Words', 'nbaddons'),
                            'letter' => __('Letter', 'nbaddons'),
                        ],
                       
                    ),
                    'title_length' => array(
                        'type'          => 'text',
                        'label'         => __( 'Length', 'nbaddons' ),
                        'default'       => '20',
                       
                    ),
                ]
            ],

            'display_thumbnail' => [
                'title' => __('Thumbnail', 'nbaddons'),
                'fields' => [
                    'enable_thumbnil_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                       
                    ),
                    'thumbnil_blog_size' => array(
                        'type'          => 'photo-sizes',
                        'label'         => __('Photo Sizes', 'nbaddons'),
                        'default'       => 'full'
                    ),
                    
                ]
            ],

            'display_date' => [
                'title' => __('Date', 'nbaddons'),
                'fields' => [
                    'enable_date_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                       
                    ),
                    'date_format' => array(
                        'type'          => 'select',
                        'label'         => __( 'Date format', 'nbaddons' ),
                        'default'       => 'word',
                        'options'       => [
                            'd F' => '29 December',
                            'd F, Y' => '29 December, 2019',
                            'd M, Y' => '29 Dec, 2019',
                            'd M' => '29 Dec',
                            'Y, d F' => '2019, 29 December',
                            'd, M y' => '29, Dec 19',
                            'F Y' => 'December 2019',
                            'M Y' => 'Dec 2019',
                        ],
                       
                    ),
                ]
            ],

            'display_categories' => [
                'title' => __('Categories', 'nbaddons'),
                'fields' => [
                    'enable_categories_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                       
                    ),
                    'categories_format' => array(
                        'type'          => 'text',
                        'label'         => __( 'Categories seperator', 'nbaddons' ),
                        'default'       => ' - ',
                    ),
                ]
            ],
            'display_details' => [
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'enable_details_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                        
                    ),
                    'details_length_type' => array(
                        'type'          => 'select',
                        'label'         => __( 'Length Type', 'nbaddons' ),
                        'default'       => 'word',
                        'options'       => [
                            'word' => __('Words', 'nbaddons'),
                            'letter' => __('Letter', 'nbaddons'),
                        ],
                       
                    ),
                    'details_length' => array(
                        'type'          => 'text',
                        'label'         => __( 'Length', 'nbaddons' ),
                        'default'       => '20',
                       
                    ),
                  
                ]
            ],

            'blog_button' => [
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'enable_button_blog' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Show', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                    ),
                    'button_text' => array(
                        'type'          => 'text',
                        'label'         => __( 'Text', 'nbaddons' ),
                        'default'       => ' Read More ',
                    ),
                    'align_button' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-blog-post-area .nxadd-btn-wrapper',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                ]
            ]


        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'content_style' => [
                'title' => __('Content', 'nbaddons'),
                'fields' => [
                    'align_content' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap',
							'property'  => 'text-align',
							'important' => true,
						),
                    ),
                    'bgcolor_content'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap',
							'property' => 'background-color',
						),
                    ),
                    'padding_content' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap',
                            'property' => 'padding',
                        ),
                       
                    ),
                    'border_content'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap',
						),
                    ),

                ]
            ],
            'content_body' => [
                'title' => __('Body', 'nbaddons'),
                'fields' => [
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
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-post-content',
                            'property' => 'padding',
                        ),
                       
                    ),
                ]
            ],
            'title_content_style' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-post-title a',
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
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-post-title a',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'display_thumbnail_style' => [
                'title' => __('Thumbnail', 'nbaddons'),
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
                            'selector' => '{node} .nxbb-blog-post-area .thumb-img',
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
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-blog-post-area .thumb-img',
                            'property' => 'width',
                            'important' => true,
						),
                    ),
                    'border_images'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .thumb-img',
						),
					),

                    'margin_images' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Margin', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-thumbnail',
                            'property' => 'margin',
                        ),
                        
                    ),
                ]
            ],

            'date_content_style' => [
                'title' => __('Date', 'nbaddons'),
                'fields' => [
                    'typography_date' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .meta-data',
						),
                    ),
                    'color_date'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .meta-data',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'categories_content_style' => [
                'title' => __('Categories', 'nbaddons'),
                'fields' => [
                    'typography_cate' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .post-cat',
						),
                    ),
                    'color_cate'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .post-cat',
							'property' => 'color',
						),
                    ),
                ]
            ],

            'details_content_style' => [
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'typography_details' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-des .post-des',
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
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-des .post-des',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'button_style' => [
                'title' => __('Button', 'nbaddons'),
                'fields' => [
                    'typography_button' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
						),
                    ),
                    'button_details_color'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
							'property' => 'color',
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
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
                            'property' => 'padding',
                        ),
                       
                    ),
                    'button_border'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
						),
                    ),
                    'business_bg_type' => array(
                        'type'    => 'select',
                        'label'   => __( 'Background', 'nbaddons' ),
                        'default' => 'color',
                        'options' => array(
                            'transparent'      => _x( 'None', 'Background type.', 'nbaddons' ),
                            'color'     => _x( 'Color', 'Background type.', 'nbaddons' ),
                            'gradient'  => _x( 'Gradient', 'Background type.', 'nbaddons' ),
                           
                        ),
                        'toggle'  => array(
                            'color'     => array(
                                'fields' => array( 'business_bg_color' ),
                            ),
                            'gradient'  => array(
                                'fields' => array( 'business_bg_gradient' ),
                            ),
                            
                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    'business_bg_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'default' => '#2575fc',
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
                            'property' => 'background-color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                    'business_bg_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => __( 'Gradient', 'nbaddons' ),
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn',
                            'property' => 'background-image',
                        ),
                    ),
                ]
            ]
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');