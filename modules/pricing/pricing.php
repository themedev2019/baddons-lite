<?php
namespace NbAdds\Modules;

class NBA_Pricing extends \FLBuilderModule {

   
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Pricing', 'nbaddons'),
            'description'   => __('Pricing will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'pricing/',
            'url'           => Nbaddons_Load::_get_url() . 'pricing/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'pricing.svg',
        ));

        $this->add_css('nxbb-pricing', $this->url . 'css/pricing.css', Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'pricing/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'pricing/icon/' . $icon;
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

    public function _price( $symbol_name){
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'rupee' => '&#8360;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
    }
    
    public function next_extra_method( $id, $settings, $module )
    {
        do_action('nbaddons/extra/method/render/css', $id, $settings, $module);
    }
}

/**
 * Register the module and its form settings.
 */

\FLBuilder::register_module('\NbAdds\Modules\NBA_Pricing', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'badge' => [
                'title' => __('Badge', 'nbaddons'),
                'fields' => [
                    'badge_text' => [
                        'type' => 'text',
                        'label' =>  __('Badge', 'nbaddons'),
                        'default' => 'Popular',
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
                            'property' => 'content',
                        ),
                        
                    ],
                   
                ]
            ],
            'heading' => [
                'title' => __('Heading', 'nbaddons'),
                'fields' => [
                    'heading_text' => [
                        'type' => 'text',
                        'label' =>  __('Title', 'nbaddons'),
                        'default' => 'BUSINESS',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-header .pricing-title',
						),
                    ],
                   
                ]
            ],
            'price_section' => [
                'title' => __('Price', 'nbaddons'),
                'fields' => [
                    'currency' => [
                        'type' => 'select',
                        'label' =>  __('Currency', 'nbaddons'),
                        'default' => 'dollar',
                        'options' => [
                            '' => __( 'None', 'nbaddons' ),
                            'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'nbaddons' ),
                            'bdt' => '&#2547; ' . _x( 'BD Taka', 'Currency Symbol', 'nbaddons' ),
                            'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'nbaddons' ),
                            'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'nbaddons' ),
                            'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'nbaddons' ),
                            'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'nbaddons' ),
                            'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'nbaddons' ),
                            'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'nbaddons' ),
                            'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'nbaddons' ),
                            'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'nbaddons' ),
                            'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'nbaddons' ),
                            'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'nbaddons' ),
                            'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'nbaddons' ),
                            'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'nbaddons' ),
                            'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'nbaddons' ),
                            'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'nbaddons' ),
                            'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'nbaddons' ),
                            'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'nbaddons' ),
                            
                            'custom' => __( 'Custom', 'nbaddons' ),
                        ],
                        'toggle' => [
                            'custom' => [
                                'fields' => ['custom_currency']
                            ]
                        ]
                    ],
                    'custom_currency' => [
                        'type' => 'text',
                        'label' =>  __('Custom Currency', 'nbaddons'),
                        'default' => '$',
                        
                    ],
                    'price_data' => [
                        'type' => 'text',
                        'label' =>  __('Price', 'nbaddons'),
                        'default' => '60',
                        
                    ],
                    'package_name' => [
                        'type' => 'text',
                        'label' =>  __('Package', 'nbaddons'),
                        'default' => 'monthly',
                        
                    ],
                ]
            ],
            'items_names' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'items_title' => [
                        'type' => 'text',
                        'label' =>  __('Title', 'nbaddons'),
                        'default' => [
                            '15 Email Account',
                            '100 GB Space',
                            '1 Domain Name',
                            '300GB Bandwidth',
                        ],
                        'multiple'      => true,
                    ],
                    
                ]
            ],
            'button_style' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'button_text' => [
                        'type' => 'text',
                        'label' =>  __('Button Text', 'nbaddons'),
                        'default' => 'Buy now',
                    ],
                    'link_url'  => array(
						'type'          => 'link',
						'label'         => __( 'Link URL', 'nbaddons' ),
						'show_target'   => true,
						'show_nofollow' => true,
						'preview'       => array(
							'type' => 'none',
						),
						'connections'   => array( 'url' ),
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
                    'align_body' => array(
                        'type'       => 'align',
                        'label'      => __( 'Align', 'nbaddons' ),
                        'default'    => 'center',
                        'responsive' => true,
                        'preview'    => array(
                            'type'      => 'css',
                            'selector'  => '{node} .nxbb-pricing-area .nxadd-pricing-table',
                            'property'  => 'text-align',
                            'important' => true,
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
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'border_content'             => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table',
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
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style',
							'property' => 'background-color',
						),
					),
                ]
            ],
            'badge_style' => [
                'title' => __('Badge', 'nbaddons'),
                'fields' => [
                    'color_badge'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
							'property' => 'color',
						),
					),
                    'padding_badge' => array(
                        'type'       => 'dimension',
                        'label'      => __( 'Padding', 'nbaddons' ),
                        'slider'     => true,
                        'units'      => array(
                            'px',
                            '%',
                        ),
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
                            'property' => 'padding',
                        ),
                        
                    ),
                    'border_badge'             => array(
                        'type'       => 'border',
                        'label'      => __( 'Border', 'nbaddons' ),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
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
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
							'property' => 'background-color',
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
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
                            'property' => 'top',
                            'important' => true,
						),
                    ),
                    'position_left_badge'             => array(
						'type'       => 'unit',
						'label'      => __( 'Right', 'nbaddons' ),
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
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before',
                            'property' => 'right',
                            'important' => true,
						),
                    ),
                ]
            ],
            'heading_style' => [
                'title' => __('Heading', 'nbaddons'),
                'fields' => [
                    'typography_heading' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-header .pricing-title',
						),
                    ),
                    'color_heading'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-header .pricing-title',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'price_style' => [
                'title' => __('Price', 'nbaddons'),
                'fields' => [
                    'typography_currency' => array(
						'type'       => 'typography',
						'label'      => __( 'Currency Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price > sup',
						),
                    ),
                    'typography_price' => array(
						'type'       => 'typography',
						'label'      => __( 'Price Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price',
						),
                    ),
                    'typography_package' => array(
						'type'       => 'typography',
						'label'      => __( 'Package Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price > sub',
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
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'items_style' => [
                'title' => __('Items', 'nbaddons'),
                'fields' => [
                    'typography_items' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-content .nxadd-pricing-list li',
						),
                    ),
                    'color_items'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Color', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-content .nxadd-pricing-list li',
							'property' => 'color',
						),
                    ),
                ]
            ],
            'button_style' => array(
                'title' => __('Button', 'nbaddons'), 
                'fields' => [
                    'typography_button' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn',
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
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn',
							'property' => 'color',
						),
                    ),
                    'bgcolor_button'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'label'       => __( 'Background', 'nbaddons' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'preview'     => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn',
							'property' => 'background-color',
						),
					),

                    'border_button'             => array(
						'type'       => 'border',
						'label'      => __( 'Border', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn',
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
                            'selector' => '{node} .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn',
                            'property' => 'padding',
                        ),
                    ),
                ]
            ),
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');