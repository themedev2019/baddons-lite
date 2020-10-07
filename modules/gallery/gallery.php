<?php
namespace NbAdds\Modules;

class NBA_Gallery extends \FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Gallery', 'nbaddons'),
            'description'   => __('Gallery will make your life easier.', 'nbaddons'),
            'category'		=>  __( Nbaddons_Load::cate()['nx-basic'], 'nbaddons'),
            'dir'           => Nbaddons_Load::_get_dir() . 'gallery/',
            'url'           => Nbaddons_Load::_get_url() . 'gallery/',
            'editor_export' => true,
            'enabled'       => true,
            'icon'            => 'gallery.svg',
        ));

        $this->add_css('nbaddons-grid-nx');
        $this->add_css('nbaddons-popup-nx');

        $this->add_js('nbaddons-popup-nx');
        $this->add_js('nbaddons-play-nx');

        $this->add_css('nxbb-gallery', $this->url . 'css/gallery.css', Nbaddons_Load::_version(), true);
        $this->add_js('nxbb-gallery', $this->url . 'js/gallery.js', array(), Nbaddons_Load::_version(), true);
    }


    public function get_icon( $icon = '' ) {
        if ( '' != $icon && file_exists( Nbaddons_Load::_get_dir() . 'gallery/icon/' . $icon ) ) {
			$path = Nbaddons_Load::_get_dir() . 'gallery/icon/' . $icon;
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

\FLBuilder::register_module('\NbAdds\Modules\NBA_Gallery', array(
    'general'       => array( // Tab
        'title'         => __('Content', 'nbaddons'), 
        'sections'      => array(
            'layout' => [
                'title' => __('Layout', 'nbaddons'),
                'fields' => [
                    'gallery_type' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Style', 'nbaddons' ),
                        'default' => 'grid',
                        'responsive' => true,
                        'options' => array(
                            'grid'    => 'Grid',
                            'masonry'    => 'Masonry',
                            'list'    => 'List',
                        ),
                        
                        'toggle'  => array(
                            
                            'grid' => array(
                                'fields' => array( 'grid_width', 'grid_height'),
                            ),

                            'masonry' => array(
                                'fields' => array( 'masonry_column', 'column_gap'),
                            ),

                        ),
                    ),

                    'masonry_column' => array(
                        'type'    => 'select',
                        'label'   => __( 'Column', 'nbaddons' ),
                        'default' => '3',
                        'options' => array_combine( range( 1, 12 ), range( 1, 12 ) ),
                        'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-gallery-area .masonary-coloum-style',
                            'property' => 'column-count',
                            'important' => true,
						),

                    ),
                    'column_gap' => array(
                        'type'    => 'unit',
                        'label'   => __( 'Column Gap', 'nbaddons' ),
                        'default' => '10',
                        'slider'     => true,
                        'units'      => array(
							'px',
						),
						
						'preview'    => array(
							'type'     => 'css',
                            'selector' => '{node} .nxbb-gallery-area .masonary-coloum-style',
                            'property' => 'column-gap',
                            'important' => true,
						),
                    ),

                    'grid_width' => array(
                        'type'    => 'unit',
                        'label'   => __( 'Column Width', 'nbaddons' ),
                        'default' => '30',
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
                            'selector' => '{node} .nxbb-gallery-area .grid-style .nxadd-single-gallery-item',
                            'property' => 'width',
                            'important' => true,
						),
                    ),
                    'grid_height' => array(
                        'type'    => 'unit',
                        'label'   => __( 'Column Height', 'nbaddons' ),
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
                            'selector' => '{node} .nxbb-gallery-area .grid-style .nxadd-single-gallery-item',
                            'property' => 'height',
                            'important' => true,
						),
                    ),
                    'open_popup' => array(
                        'type'    => 'button-group',
                        'label'   => __( 'Popup', 'nbaddons' ),
                        'default' => 'yes',
                        'responsive' => true,
                        'options' => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                       
                    ),

                ]
            ],
            'data_photos' => [
                'title' => __('Photos', 'nbaddons'),
                'fields' => [
                    'photos_data' => array(
                        'type'          => 'multiple-photos',
                        'label'         => __( 'Choose Photos', 'nbaddons' )
                    ),
                    'photos_size' => array(
                        'type'          => 'photo-sizes',
                        'label'         => __('Photo Sizes', 'nbaddons'),
                        'default'       => 'medium'
                    ),

                    'content_position' => array(
                        'type'          => 'button-group',
                        'label'         => __('Show Content', 'nbaddons'),
                        'default'       => 'no',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                    'show_title' => array(
                        'type'          => 'button-group',
                        'label'         => __('Show Title', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                    'show_alt' => array(
                        'type'          => 'button-group',
                        'label'         => __('Show Alt', 'nbaddons'),
                        'default'       => 'yes',
                        'options' => [
                            'yes' => __('Yes', 'nbaddons'),
                            'no' => __('No', 'nbaddons'),
                        ]
                    ),
                   
                ]
            ],

        )
    ),
    'style' => array(
        'title'         => __('NX Style', 'nbaddons'),
        'sections' => [
            'photos_style' => [
                'border_photo'             => array(
                    'type'       => 'border',
                    'label'      => __( 'Border', 'nbaddons' ),
                    'responsive' => true,
                    'preview'    => array(
                        'type'     => 'css',
                        'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item',
                    ),
                ),
                
                'padding_photo'             => array(
                    'type'       => 'dimension',
                    'label'      => __( 'Padding', 'nbaddons' ),
                    'slider'     => true,
                    'units'      => array(
                        'px',
                        '%',
                    ),
                    'preview'    => array(
                        'type'     => 'css',
                        'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item',
                        'property' => 'padding',
                    ),
                ),
            ],
            'title_style' => [
                'title' => __('Title', 'nbaddons'),
                'fields' => [
                    'typography_title' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-gallery-title',
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
							'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-gallery-title',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
            'details_style' => [
                'title' => __('Details', 'nbaddons'),
                'fields' => [
                    'typography_details' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'nbaddons' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-des',
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
							'selector' => '{node} .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-des',
							'property' => 'color',
						),
                    ),
                    
                ]
            ],
        ]
    )
));

do_action('nbaddons/extra/method/render/tab');