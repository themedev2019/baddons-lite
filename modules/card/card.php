<?php
namespace NbAdds\Modules;

class NBA_Card extends \FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Card', 'nbaddons'),
            'description'   => __('An basic example for coding new modules.', 'nbaddons'),
            'category'		=> __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'card/',
            'url'           => Nbaddons_Load::_get_url() . 'card/',
            'editor_export' => true,
            'enabled'       => true,
            'partial_refresh' => false,
            'icon'          => 'card.svg',
        ));

        //$this->add_css('nbaddons-slider-nx');
        //$this->add_js('nbaddons-slider-nx');
        
        // Register and enqueue your own
        $this->add_css('nxbb-card', $this->url . 'css/card.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'card/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'card/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Card', array(
    'general'       => array( // Tab General
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
            'badge' => array(
                'title' => __('Badge', 'nbaddons'),
                'fields' => array(
                    'badge_text' =>[
                        'type' => 'text',
                        'label'   => __( 'Enter badge name', 'nbaddons' ),
                        'default' => 'New',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-card-badge',
						),
                    ]
                )
            ),
            'card_image'       => array( 
                'title'         => __('Image', 'nbaddons'), 
                'fields' => [
                    'photo_source' => array(
						'type'    => 'select',
						'label'   => __( 'Source', 'nbaddons' ),
						'default' => 'library',
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
						
					),
					'photo_url'    => array(
						'type'        => 'text',
						'label'       => __( 'Photo URL', 'nbaddons' ),
						'placeholder' => 'http://www.example.com/my-photo.jpg',
						
					),
					
                ],
                
            ),
            'card_title'       => array(
                'title'         => __('Title', 'nbaddons'), 
                'fields' => [
                    'show_title' => array(
						'type'    => 'select',
						'label'   => __( 'Show Title', 'nbaddons' ),
						'default' => 'yes',
						'options' => array(
							'yes'     => __( 'Yes', 'nbaddons' ),
							'no' => __( 'No', 'nbaddons' ),
						),

						'toggle'  => array(
							
							'yes' => array(
                                'fields' => array( 'title_text'),
                                'sections' => array('card_title_style'),
							),

						),
						'preview' => array(
							'type' => 'none',
						),
					),
					'title_text'      => array(
						'type'    => 'text',
                        'label'   => __( 'Enter Title', 'nbaddons' ),
                        'default' => 'This title here',
						'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-card-title',
						),
					),
                ]
            ),
            'card_price'       => array(
                'title'         => __('Price', 'nbaddons'), 
                'fields' => [
                    'show_price' => array(
                        'type'    => 'select',
                        'label'   => __( 'Show Price', 'nbaddons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes'     => __( 'Yes', 'nbaddons' ),
                            'no' => __( 'No', 'nbaddons' ),
                        ),

                        'toggle'  => array(
                            
                            'yes' => array(
                                'fields' => array( 'price_text'),
                                'sections' => array('card_price_style'),
                            ),

                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    'price_text'      => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter Price', 'nbaddons' ),
                        'default' => '$40',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-product-price',
						),
                    ),
                ]
            ),
            'card_details'       => array(
                'title'         => __('Details', 'nbaddons'), 
                'fields' => [
                    'details_text'      => array(
                        'type'    => 'textarea',
                        'label'   => '',
                        'default' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradise',
                        'rows'        => 3,
						'wpautop'     => false,
						'connections' => array( 'string' ),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .card-des',
						),
                    ),
                ]
            ),
            'buy_now' => array(
                'title' => __('Button', 'nbaddons'), 
                'fields' => [
                    'button_text' => [
                        'type' => 'text',
                        'label' => __( 'Text', 'nbaddons' ),
                        'default' => 'Buy Now',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxadd-card-area .nxadd-btn span',
						),
                    ],
                    'button_icon' => array(
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
                                'fields' => array( 'select_icons', 'icons_position'),
                            ),

                            'class' => array(
                                'fields' => array( 'button_class', 'icons_position' ),
                            ),

                        ),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                    
                    'select_icons' => array(
                        'type'     => 'icon',
                        'label'    => __( 'Select Icon', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-cart-plus',
                       
                    ),

                    'button_class' => array(
                        'type'    => 'text',
                        'label'   => __( 'Class name', 'nbaddons' ),
                        'default' => 'nx-icon nx-icon-cart-plus',
                        
                    ),

                    'icons_position' => array(
                        'type'    => 'select',
                        'label'   => __( 'Icon Position', 'nbaddons' ),
                        'default' => 'left',
                        'options' => [
                            'left'  => __( 'Left', 'nbaddons' ),
                            'right' => __( 'Right', 'nbaddons' ),
                        ],
                       
                    ),
                    'link_url'  => array(
						'type'          => 'link',
						'label'         => __( 'Link URL', 'nbaddons' ),
						'show_target'   => true,
						'show_nofollow' => true,
						
						'connections'   => array( 'url' ),
					),
                ]
            ),


        )
    ),
    'style'       => array( // Tab Style
        'title'         => __('NX Style', 'nbaddons'), 
        'sections'      => array(
            'body_style' => array(
                'title' => __('Body', 'nbaddons'),
                'fields' => [
                    'align_body' => array(
						'type'       => 'align',
						'label'      => __( 'Align', 'nbaddons' ),
						'default'    => 'center',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node} .nxadd-card-box .nxadd-card-body',
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
							'selector' => '{node} .nxadd-card-box .nxadd-card-body',
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
                            'selector' => '{node} .nxadd-card-box .nxadd-card-body',
                            'property' => 'padding',
                        ),
                        
                    ),
                    
                ]
            ),
            'badge_style' => array(
                'title' => __('Badge', 'nbaddons'),
                'fields' => [
                    'typography_badge' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
						),
                    ),
                    'color_badge'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
							'property' => 'color',
						),
                    ),
                    
                    'border_badge'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
						),
                    ),
                    
                    'padding_badge' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            'em',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'position_top_badge'             => array(
						'type'       => 'unit',
						'label'      => __( 'Top', 'nbaddons' ),
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
                            'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
                            'property' => 'top',
                            'important' => true,
						),
                    ),
                    'position_left_badge'             => array(
						'type'       => 'unit',
						'label'      => __( 'Left', 'nbaddons' ),
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
                            'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
                            'property' => 'left',
                            'important' => true,
						),
                    ),
                    'bgcolor_badge'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxadd-card-box .nxadd-card-badge',
							'property' => 'background-color',
						),
                    ),
                ]
            ),
            'card_image_style' => array( 
                'title'         => __('Image', 'nbaddons'), 
                'fields' => [
                    'width_images'              => array(
						'type'       => 'unit',
						'label'      => __( 'Width', 'nbaddons' ),
						'responsive' => true,
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
							'type'      => 'css',
							'selector'  => '{node} .nxadd-card-box img.nxcardbox',
							'property'  => 'width',
							'important' => true,
						),
					),
					
					'border_images'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxadd-card-box img.nxcardbox',
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
                            'selector' => '{node} .nxadd-card-box .nxadd-card-header',
                            'property' => 'margin',
                        ),
                        
                    ),
                ]
            ),
            'card_title_style' => array(
                'title' => __('Title', 'nbaddons'), 
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title',
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
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title',
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
                            'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'card_price_style' => array(
                'title' => __('Price', 'nbaddons'), 
                'fields' => [
                    'typography_price' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-product-price',
						),
                    ),
                    'color_price'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-product-price',
							'property' => 'color',
						),
                    ),
                    'spacing_price'             => array(
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
                            'selector' => '{node} .nxbb-card-area .nxadd-product-price',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'card_details_style' => array(
                'title' => __('Details', 'nbaddons'), 
                'fields' => [
                    'typography_details' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des',
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
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des',
							'property' => 'color',
						),
                    ),
                    'spacing_details'             => array(
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
                            'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des',
                            'property' => 'margin-bottom',
                            'important' => true,
						),
                    ),
                ]
            ),
            'buy_now_style' => array(
                'title' => __('Button', 'nbaddons'), 
                'fields' => [
                    'typography_button' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > *',
						),
                    ),
                    'color_button'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > *',
							'property' => 'color',
						),
                    ),
                    'spacing_button'             => array(
						'type'       => 'dimension',
                        'label'      => __( 'Spacing', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > span',
                            'property' => 'margin',
                        ),
                    ),

                    'border_button'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn',
						),
                    ),
                    
                    'padding_button'             => array(
						'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn',
                            'property' => 'padding',
                        ),
                    ),
                    'bg_color' => array(
                        'type'        => 'color',
                        'label'       => __( 'Bg Color', 'nbaddons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                        'preview' => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn',
                            'property' => 'background-color',
                        ),
                        'connections' => array( 'color' ),
                    ),
                ]
            ),
        )
    ),
));

do_action('nbaddons/extra/method/render/tab');