<?php 
namespace NbAdds\Apps\Features;

defined( 'ABSPATH' ) || exit;

Class Nbaddons_Advance{
    private static $instance;

    public function _init() {         
        
        if(current_user_can('manage_options')){
            add_action('nbaddons/extra/method/render/tab', [ $this, '_add_custom_advance']);

            // render css global
            //add_filter( 'fl_builder_register_settings_form', [ $this, '_settings_form'], 10, 2 );

            add_filter('fl_builder_row_attributes', [ $this, '_add_attr_module'], 10, 2 );
        }
        
        add_action('nbaddons/extra/method/render/css', [ $this, '_add_custom_css'], 99, 3);
    }

    public function _add_attr_module( $attrs, $row ){
       $attrs['nxbb-id'] = 'nx-row';
       return $attrs;
    }

    public function _add_custom_css( $id, $settings, $module ){

        if ( class_exists( '\FLBuilderCSS' ) && isset( $settings) ) {
           
            //Color
            \FLBuilderCSS::rule( array(
                'selector' => ".fl-node-$id > .fl-module-content",
                'enabled'  => in_array( $settings->nxbb_bg_type, array( 'color', 'photo', 'video' ) ),
                'props'    => array(
                    'background-color' => $settings->nxbb_bg_color,
                ),
            ) );

            //Gradient
            \FLBuilderCSS::rule( array(
                'selector' => ".fl-node-$id > .fl-module-content",
                'enabled'  => 'gradient' === $settings->nxbb_bg_type,
                'props'    => array(
                    'background-image' => \FLBuilderColor::gradient( $settings->nxbb_bg_gradient ),
                ),
            ) );

             //Overlay
             \FLBuilderCSS::rule( array(
                'selector' => ".fl-node-$id > .fl-module-content > div:after",
                'enabled'  => 'none' !== $settings->nxbb_bg_overlay_type && in_array( $settings->nxbb_bg_type, array( 'photo', 'video' ) ),
                'props'    => array(
                    'content' => "''",
                    'background-color' => 'color' === $settings->nxbb_bg_overlay_type ? $settings->nxbb_bg_overlay_color : '',
                    'background-image' => 'gradient' === $settings->nxbb_bg_overlay_type ? \FLBuilderColor::gradient( $settings->nxbb_bg_overlay_gradient ) : '',
                    'left' => 0,
                    'top' => 0,
                    'position' => 'absolute',
                    'height' => '100%',
                    'width' => '100%',
                    'opacity' => '.5',
                    'backface-visibility' => 'hidden',
                    'z-index' => '0',

                ),
            ) );

            \FLBuilderCSS::rule( array(
                'selector' => ".fl-node-$id > .fl-module-content",
                'enabled'  => 'none' !== $settings->nxbb_bg_overlay_type,
                'props'    => array(
                    'position' => 'relative',
                ),
            ) );
            \FLBuilderCSS::rule( array(
                'selector' => ".fl-node-$id > .fl-module-content > div > *",
                'enabled'  => 'none' !== $settings->nxbb_bg_overlay_type,
                'props'    => array(
                    'z-index' => 1,
                    'position' => 'relative',
                ),
            ) );
           
            // Border
            \FLBuilderCSS::border_field_rule( array(
                'settings'     => $settings,
                'setting_name' => 'nxbb_border',
                'selector'     => ".fl-node-$id > .fl-module-content",
            ) );

            \FLBuilderCSS::border_field_rule( array(
                'settings'     => $settings,
                'setting_name' => 'nxbb_border',
                'enabled'  => 'none' !== $settings->nxbb_bg_overlay_type,
                'selector'     => ".fl-node-$id > .fl-module-content > div:after",
            ) );
            
            // padding
            \FLBuilderCSS::dimension_field_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name' 	=> 'nxbb_padding',
                    'selector' 	=> ".fl-node-$id > .fl-module-content",
                    'unit'		=> $settings->nxbb_padding_unit,
                    'props'		=> array(
                        'padding-top' 	 => 'nxbb_padding_top', 
                        'padding-right'   => 'nxbb_padding_right',
                        'padding-bottom'  => 'nxbb_padding_bottom',
                        'padding-left' 	 => 'nxbb_padding_left',
                    ),
                ) 
            );

      

            // photos destop

            if ( 'photo' == $settings->nxbb_bg_type ) :
                $row_nxbb_bg_image_lg = '';

                if ( 'library' == $settings->nxbb_bg_image_source ) {
                    $row_nxbb_bg_image_lg = $settings->nxbb_bg_image_src;
                } elseif ( 'url' == $settings->nxbb_bg_image_source && ! empty( $settings->nxbb_bg_image_url ) ) {
                    if ( 'array' == gettype( $settings->nxbb_bg_image_url ) ) {
                        $row_nxbb_bg_image_lg = do_shortcode( $settings->nxbb_bg_image_url['url'] );
                    } else {
                        $row_nxbb_bg_image_lg = (string) do_shortcode( $settings->nxbb_bg_image_url );
                    }
                }
                if ( 'custom_pos' == $settings->nxbb_bg_position ) {
                    $row_nxbb_bg_position_lg  = empty( $settings->nxbb_bg_x_position ) ? '0' : $settings->nxbb_bg_x_position;
                    $row_nxbb_bg_position_lg .= $settings->nxbb_bg_x_position_unit;
                    $row_nxbb_bg_position_lg .= ' ';
                    $row_nxbb_bg_position_lg .= empty( $settings->nxbb_bg_y_position ) ? '0' : $settings->nxbb_bg_y_position;
                    $row_nxbb_bg_position_lg .= $settings->nxbb_bg_y_position_unit;

                } else {
                    $row_nxbb_bg_position_lg = $settings->nxbb_bg_position;
                }

                \FLBuilderCSS::rule( 
                    array(
                        'selector' => ".fl-node-$id > .fl-module-content",
                        'enabled'  => 'photo' === $settings->nxbb_bg_type,
                        'props'    => array(
                            'background-image'      => $row_nxbb_bg_image_lg,
                            'background-repeat'     => $settings->nxbb_bg_repeat,
                            'background-position'   => $row_nxbb_bg_position_lg,
                            'background-attachment' => $settings->nxbb_bg_attachment,
                            'background-size'       => $settings->nxbb_bg_size,
                        ),
                    ) 
                );
            endif;


            // Background Photo - Medium
            if ( 'photo' == $settings->nxbb_bg_type ) :
                $row_nxbb_bg_image_md = '';

                if ( 'library' == $settings->nxbb_bg_image_source ) {
                    $row_nxbb_bg_image_md = $settings->nxbb_bg_image_medium_src;
                } elseif ( 'url' == $settings->nxbb_bg_image_source && ! empty( $settings->nxbb_bg_image_url ) ) {
                    $row_nxbb_bg_image_md = $row_nxbb_bg_image_lg;
                }
                if ( 'custom_pos' == $settings->nxbb_bg_position_medium ) {
                    $row_nxbb_bg_position_md  = empty( $settings->nxbb_bg_x_position_medium ) ? '0' : $settings->nxbb_bg_x_position_medium;
                    $row_nxbb_bg_position_md .= $settings->nxbb_bg_x_position_medium_unit;
                    $row_nxbb_bg_position_md .= ' ';
                    $row_nxbb_bg_position_md .= empty( $settings->nxbb_bg_y_position_medium ) ? '0' : $settings->nxbb_bg_y_position_medium;
                    $row_nxbb_bg_position_md .= $settings->nxbb_bg_y_position_medium_unit;

                } else {
                    $row_nxbb_bg_position_md = $settings->nxbb_bg_position_medium;
                }

                \FLBuilderCSS::rule( 
                    array(
                        'media'    => 'medium',
                        'selector' => ".fl-node-$id > .fl-module-content",
                        'enabled'  => 'photo' === $settings->nxbb_bg_type,
                        'props'    => array(
                            'background-image'      => $row_nxbb_bg_image_md,
                            'background-repeat'     => $settings->nxbb_bg_repeat_medium,
                            'background-position'   => $row_nxbb_bg_position_md,
                            'background-attachment' => $settings->nxbb_bg_attachment_medium,
                            'background-size'       => $settings->nxbb_bg_size_medium,
                        ),
                    ) 
                );

            endif;

            // Background Photo - Responsive
            if ( 'photo' == $settings->nxbb_bg_type ) :
                $row_nxbb_bg_image_sm = '';

                if ( 'library' == $settings->nxbb_bg_image_source ) {
                    $row_nxbb_bg_image_sm = $settings->nxbb_bg_image_responsive_src;
                } elseif ( 'url' == $settings->nxbb_bg_image_source && ! empty( $settings->nxbb_bg_image_url ) ) {
                    $row_nxbb_bg_image_sm = $row_nxbb_bg_image_lg;
                }

                if ( 'custom_pos' == $settings->nxbb_bg_position_responsive ) {
                    $row_nxbb_bg_position_sm  = empty( $settings->nxbb_bg_x_position_responsive ) ? '0' : $settings->nxbb_bg_x_position_responsive;
                    $row_nxbb_bg_position_sm .= $settings->nxbb_bg_x_position_responsive_unit;
                    $row_nxbb_bg_position_sm .= ' ';
                    $row_nxbb_bg_position_sm .= empty( $settings->nxbb_bg_y_position_responsive ) ? '0' : $settings->nxbb_bg_y_position_responsive;
                    $row_nxbb_bg_position_sm .= $settings->nxbb_bg_y_position_responsive_unit;

                } else {
                    $row_nxbb_bg_position_sm = $settings->nxbb_bg_position_responsive;
                }

                \FLBuilderCSS::rule( array(
                    'media'    => 'responsive',
                    'selector' => ".fl-node-$id > .fl-module-content",
                    'enabled'  => 'photo' === $settings->nxbb_bg_type,
                    'props'    => array(
                        'background-image'      => $row_nxbb_bg_image_sm,
                        'background-repeat'     => $settings->nxbb_bg_repeat_responsive,
                        'background-position'   => $row_nxbb_bg_position_sm,
                        'background-attachment' => $settings->nxbb_bg_attachment_responsive,
                        'background-size'       => $settings->nxbb_bg_size_responsive,
                    ),
                ) );
            endif;


            // position
            \FLBuilderCSS::rule( 
                array(
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'full_width' == $settings->nx_width_type,
                    'props'    => array(
                        'width' => '100%',
                        'max-width' => '100%',
                    ),
                )
            );

            \FLBuilderCSS::rule( 
               
                array(
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'inline' == $settings->nx_width_type,
                    'props'    => array(
                        'width' => 'auto',
                        'max-width' => 'auto',
                    ),
                )
               
            );

            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_customwidth_txt',
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'custom' == $settings->nx_width_type,
                    'prop'		=> 'width',
                ) 
            );

            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_vertical_width',
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'default' !== $settings->nx_width_type && 'relative' == $settings->nx_position_type,
                    'prop'		=> 'align-self',
                ) 
            );
            
            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nx_position_type',
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'relative' !== $settings->nx_position_type,
                    'prop'		=> 'position',
                ) 
            );

            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_horizontal_offset',
                    'selector'	=> "body:not(.rtl) .fl-node-$id",
                    'enabled'  => 'relative' !== $settings->nx_position_type,
                    'prop'		=> $settings->nxbb_horizontal_posi,
                ) 
            );

            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_vertical_offset',
                    'selector'	=> "body:not(.rtl) .fl-node-$id",
                    'enabled'  => 'relative' !== $settings->nx_position_type,
                    'prop'		=> $settings->nxbb_vertical_posi,
                ) 
            );

            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_vertical_zindex',
                    'selector'	=> ".fl-node-$id",
                    'enabled'  => 'relative' !== $settings->nx_position_type,
                    'prop'		=> 'z-index',
                ) 
            );


            // align content
            \FLBuilderCSS::responsive_rule( 
                array(
                    'settings'	=> $settings,
                    'setting_name'	=> 'nxbb_align_content',
                    'selector'	=> ".fl-node-$id > .fl-module-content",
                    'prop'		=> 'text-align',
                ) 
            );

        }

    }

    public function _add_custom_advance(){
       
        $global_settings = \FLBuilderModel::get_global_settings();

        \FLBuilder::register_settings_form('module_advanced', array(
            'title'    => __( 'NX Advanced', 'nbaddons' ),
            'sections' => array(
                'nxbb_content_render' => [
                    'title'  => __( 'NX Content', 'nbaddons' ),
					'fields' => array(
                        'nxbb_align_content' => array(
                            'type'       => 'align',
                            'label'      => __( 'Align', 'nbaddons' ),
                            'default'    => 'left',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.fl-module-content',
                                'property'  => 'text-align',
                                'important' => true,
                            ),
                        ),
                    )
                ],
                'nxglobal_bg'   => array(
					'title'  => __( 'NX Background', 'nbaddons' ),
					'fields' => array(
						'nxbb_bg_type' => array(
							'type'    => 'select',
							'label'   => __( 'Type', 'nbaddons' ),
							'default' => 'none',
							'options' => array(
								'none'      => _x( 'None', 'Background type.', 'nbaddons' ),
								'color'     => _x( 'Color', 'Background type.', 'nbaddons' ),
								'gradient'  => _x( 'Gradient', 'Background type.', 'nbaddons' ),
								'photo'     => _x( 'Photo', 'Background type.', 'nbaddons' ),
								
							),
							'toggle'  => array(
								'color'     => array(
									'sections' => array( 'nxbb_bg_color' ),
								),
								'gradient'  => array(
									'sections' => array( 'nxbb_bg_gradient' ),
								),
								'photo'     => array(
									'sections' => array( 'nxbb_bg_color', 'nxbb_bg_photo', 'nxbb_bg_overlay' ),
									'fields'   => array( 'nxbb_bg_x_position', 'nxbb_bg_y_position' ),
								),
								
							),
							'preview' => array(
								'type' => 'none',
							),
						),
					),
                ),
                'nxbb_bg_photo'     => array(
					'title'  => __( 'NX Background Photo', 'nbaddons' ),
					'fields' => array(
						'nxbb_bg_image_source' => array(
							'type'    => 'select',
							'label'   => __( 'Photo Source', 'nbaddons' ),
							'default' => 'library',
							'options' => array(
								'library' => __( 'Media Library', 'nbaddons' ),
								'url'     => __( 'URL', 'nbaddons' ),
							),
							'toggle'  => array(
								'library' => array(
									'fields' => array( 'nxbb_bg_image' ),
								),
								'url'     => array(
									'fields' => array( 'nxbb_bg_image_url', 'caption' ),
								),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'nxbb_bg_image_url'    => array(
							'type'        => 'text',
							'label'       => __( 'Photo URL', 'nbaddons' ),
							'placeholder' => __( 'https://www.example.com/my-photo.jpg', 'nbaddons' ),
							'connections' => array( 'photo' ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-image',
							),
						),
						'nxbb_bg_image'        => array(
							'type'        => 'photo',
							'show_remove' => true,
							'label'       => __( 'Photo', 'nbaddons' ),
							'responsive'  => true,
							'connections' => array( 'photo' ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-image',
							),
						),
						'nxbb_bg_repeat'       => array(
							'type'       => 'select',
							'label'      => __( 'Repeat', 'nbaddons' ),
							'default'    => 'none',
							'responsive' => true,
							'options'    => array(
								'no-repeat' => _x( 'None', 'Background repeat.', 'nbaddons' ),
								'repeat'    => _x( 'Tile', 'Background repeat.', 'nbaddons' ),
								'repeat-x'  => _x( 'Horizontal', 'Background repeat.', 'nbaddons' ),
								'repeat-y'  => _x( 'Vertical', 'Background repeat.', 'nbaddons' ),
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-repeat',
							),
						),
						'nxbb_bg_position'     => array(
							'type'       => 'select',
							'label'      => __( 'Position', 'nbaddons' ),
							'default'    => 'center center',
							'responsive' => true,
							'options'    => array(
								'left top'      => __( 'Left Top', 'nbaddons' ),
								'left center'   => __( 'Left Center', 'nbaddons' ),
								'left bottom'   => __( 'Left Bottom', 'nbaddons' ),
								'right top'     => __( 'Right Top', 'nbaddons' ),
								'right center'  => __( 'Right Center', 'nbaddons' ),
								'right bottom'  => __( 'Right Bottom', 'nbaddons' ),
								'center top'    => __( 'Center Top', 'nbaddons' ),
								'center center' => __( 'Center', 'nbaddons' ),
								'center bottom' => __( 'Center Bottom', 'nbaddons' ),
								'custom_pos'    => __( 'Custom Position', 'nbaddons' ),
							),
							'toggle'     => array(
								'custom_pos' => array(
									'fields' => array( 'nxbb_bg_x_position', 'nxbb_bg_y_position' ),
								),
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-position',
							),
						),
						'nxbb_bg_x_position'   => array(
							'type'         => 'unit',
							'label'        => __( 'X Position', 'nbaddons' ),
							'units'        => array( 'px', '%' ),
							'default_unit' => '%',
							'responsive'   => true,
							'slider'       => array(
								'min'  => 0,
								'max'  => 1000,
								'step' => 10,
							),
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-position-x',
							),
						),
						'nxbb_bg_y_position'   => array(
							'type'         => 'unit',
							'label'        => __( 'Y Position', 'nbaddons' ),
							'units'        => array( 'px', '%' ),
							'default_unit' => '%',
							'responsive'   => true,
							'slider'       => array(
								'min'  => 0,
								'max'  => 1000,
								'step' => 10,
							),
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-position-y',
							),
						),
						'nxbb_bg_attachment'   => array(
							'type'       => 'select',
							'label'      => __( 'Attachment', 'nbaddons' ),
							'default'    => 'scroll',
							'responsive' => true,
							'options'    => array(
								'scroll' => __( 'Scroll', 'nbaddons' ),
								'fixed'  => __( 'Fixed', 'nbaddons' ),
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-attachment',
							),
						),
						'nxbb_bg_size'         => array(
							'type'       => 'select',
							'label'      => __( 'Scale', 'nbaddons' ),
							'default'    => 'cover',
							'responsive' => true,
							'options'    => array(
								'auto'    => _x( 'None', 'Background scale.', 'nbaddons' ),
								'contain' => __( 'Fit', 'nbaddons' ),
								'cover'   => __( 'Fill', 'nbaddons' ),
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-size',
							),
						),
					),
				),
				'nxbb_bg_overlay'   => array(
					'title'  => __( 'NX Background Overlay', 'nbaddons' ),
					'fields' => array(
						'nxbb_bg_overlay_type'     => array(
							'type'    => 'select',
							'label'   => __( 'Overlay Type', 'nbaddons' ),
							'default' => 'color',
							'options' => array(
								'none'     => __( 'None', 'nbaddons' ),
								'color'    => __( 'Color', 'nbaddons' ),
								'gradient' => __( 'Gradient', 'nbaddons' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array( 'nxbb_bg_overlay_color', 'nxbb_bg_x_position', 'nxbb_bg_y_position' ),
								),
								'gradient' => array(
									'fields' => array( 'nxbb_bg_overlay_gradient', 'nxbb_bg_x_position', 'nxbb_bg_y_position' ),
								),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'nxbb_bg_overlay_color'    => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Overlay Color', 'nbaddons' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'nxbb_bg_overlay_gradient' => array(
							'type'    => 'gradient',
							'label'   => __( 'Overlay Gradient', 'nbaddons' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-module-content:after',
								'property' => 'background-image',
							),
						),
					),
				),
				'nxbb_bg_color'     => array(
					'title'  => __( 'NX Background Color', 'nbaddons' ),
					'fields' => array(
						'nxbb_bg_color' => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'nbaddons' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-color',
							),
							'connections' => array( 'color' ),
						),
					),
				),
				'nxbb_bg_gradient'  => array(
					'title'  => __( 'NX Gradient', 'nbaddons' ),
					'fields' => array(
						'nxbb_bg_gradient' => array(
							'type'    => 'gradient',
							'label'   => __( 'Gradient', 'nbaddons' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'background-image',
							),
						),
					),
				),
				'nxbb_border_se'       => array(
					'title'  => __( 'NX Border', 'nbaddons' ),
					'fields' => array(
						'nxbb_border' => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'nbaddons' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
							),
						),
					),
                ),
                'nxbb_padding_se'       => array(
                    'title'  => __( 'NX Padding', 'nbaddons' ),
                    'fields' => array(
                        'nxbb_padding' => array(
                            'type'       => 'dimension',
                            'label'      => __( 'Padding', 'nbaddons' ),
                            'slider'     => true,
                            'units'      => array(
                                'px',
                                '%',
                            ),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.fl-module-content',
                                'property' => 'padding',
                            ),
                            
                        ),
                    ),
                ),
               
                'nx_position' => array(
                    'title'  => __( 'NX Position', 'nbaddons' ),
                    'fields' => array(
                        'nx_width_type' => array(
							'type'    => 'select',
							'label'   => __( 'Width', 'nbaddons' ),
                            'default' => 'default',
                            'responsive' => true,
							'options' => array(
								'default'      => _x( 'Default', 'Width type.', 'nbaddons' ),
								'full_width'     => _x( 'Full Width 100%', 'Width type.', 'nbaddons' ),
								'inline'  => _x( 'Inline (auto)', 'Width type.', 'nbaddons' ),
								'custom'     => _x( 'Custom', 'Width type.', 'nbaddons' ),
								
                            ),

                            'toggle'  => array(
                                'full_width'     => array(
									'fields' => array( 'nxbb_vertical_width' ),
								),
                                'custom'     => array(
									'fields' => array( 'nxbb_customwidth_txt', 'nxbb_vertical_width'),
                                ),
                                'inline'     => array(
									'fields' => array( 'nxbb_vertical_width' ),
								),
								
							),
                            
                        ),
                        'nxbb_customwidth_txt'             => array(
                            'type'       => 'unit',
                            'label'      => __( 'Custom Width', 'nbaddons' ),
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
                                    'max'  => 2000,
                                    'step' => 10,
                                ),
                            ),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.fl-module-content',
                                'property' => 'width',
                                'important' => true,
                            ),
                        ),

                        'nxbb_vertical_width' => array(
                            'type'    => 'button-group',
                            'label'   => __( 'Vertical Align', 'nbaddons' ),
                            'default' => 'flex-end',
                            'responsive' => true,
                            'options' => array(
                                'flex-start'    => 'Start',
                                'center'    => 'Center',
                                'flex-end'  => 'End',
                            ),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.fl-module-content',
                                'property' => 'align-self',
                                'important' => true,
                            ),
                        ),

                        'nx_position_type' => array(
							'type'    => 'select',
							'label'   => __( 'Positon', 'nbaddons' ),
                            'default' => 'relative',
                            'responsive' => true,
							'options' => array(
								'relative'      => _x( 'Default', 'Position type.', 'nbaddons' ),
								'absolute'     => _x( 'Absolute', 'Position type.', 'nbaddons' ),
								'fixed'  => _x( 'Fixed', 'Position type.', 'nbaddons' ),
								
                            ),

                            'toggle'  => array(
                                'absolute'     => array(
									'fields' => array( 'nxbb_horizontal_posi', 'nxbb_vertical_posi', 'nxbb_horizontal_offset', 'nxbb_vertical_offset', 'nxbb_vertical_zindex'),
								),
                                'fixed'     => array(
									'fields' => array( 'nxbb_horizontal_posi', 'nxbb_vertical_posi', 'nxbb_horizontal_offset', 'nxbb_vertical_offset', 'nxbb_vertical_zindex'),
                                )
							),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.fl-module-content',
                                'property' => 'position',
                                'important' => true,
                            ),
                        ),
                        'nxbb_horizontal_posi' => array(
                            'type'    => 'button-group',
                            'label'   => __( 'Horizontal Orientation', 'nbaddons' ),
                            'default' => 'left',
                            'responsive' => true,
                            'options' => array(
                                'left'    => 'Left',
                                'right'    => 'Right',
                            ),
                            'preview'    => array(
                                'type'     => 'none',
                            ),
                        ),
                        'nxbb_horizontal_offset'   => array(
                            'type'       => 'unit',
                            'label'      => __( 'Offset', 'nbaddons' ),
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
                                'selector' => 'body:not(.rtl) .fl-module-content',
                                'property' => 'left',
                                'important' => true,
                            ),
                        ),
                        'nxbb_vertical_posi' => array(
                            'type'    => 'button-group',
                            'label'   => __( 'Vertical Orientation', 'nbaddons' ),
                            'default' => 'top',
                            'responsive' => true,
                            'options' => array(
                                'top'    => 'Top',
                                'bottom'    => 'Bottom',
                            ),
                            'preview'    => array(
                                'type'     => 'none',
                            ),
                        ),
                        'nxbb_vertical_offset'   => array(
                            'type'       => 'unit',
                            'label'      => __( 'Offset', 'nbaddons' ),
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
                                'selector' => 'body:not(.rtl) .fl-module-content {node}',
                                'property' => 'top',
                                'important' => true,
                            ),
                        ),
                        'nxbb_vertical_zindex'   => array(
                            'type'       => 'unit',
                            'label'      => __( 'Z-index', 'nbaddons' ),
                            'responsive' => true,
                            'slider'     => true,
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => 'body:not(.rtl) .fl-module-content {node}',
                                'property' => 'z-index',
                                'important' => true,
                            ),
                        ),
                    )
                ),
               

                'margins'       => array(
                    'title'  => __( 'Spacing', 'nbaddons' ),
                    'fields' => array(
                        'margin' => array(
                            'type'       => 'dimension',
                            'label'      => __( 'Margins', 'nbaddons' ),
                            'slider'     => true,
                            'units'      => array(
                                'px',
                                '%',
                            ),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.fl-module-content',
                                'property' => 'margin',
                            ),
                            'responsive' => array(
                                'default_unit' => array(
                                    'default'    => $global_settings->module_margins_unit,
                                    'medium'     => $global_settings->module_margins_medium_unit,
                                    'responsive' => $global_settings->module_margins_responsive_unit,
                                ),
                                'placeholder'  => array(
                                    'default'    => empty( $global_settings->module_margins ) ? '0' : $global_settings->module_margins,
                                    'medium'     => empty( $global_settings->module_margins_medium ) ? '0' : $global_settings->module_margins_medium,
                                    'responsive' => empty( $global_settings->module_margins_responsive ) ? '0' : $global_settings->module_margins_responsive,
                                ),
                            ),
                        ),
                    ),
                ),
                'visibility'    => array(
                    'title'  => __( 'Visibility', 'nbaddons' ),
                    'fields' => array(
                        'responsive_display'         => array(
                            'type'    => 'select',
                            'label'   => __( 'Breakpoint', 'nbaddons' ),
                            'options' => array(
                                ''               => __( 'Always', 'nbaddons' ),
                                'desktop'        => __( 'Large Devices Only', 'nbaddons' ),
                                'desktop-medium' => __( 'Large &amp; Medium Devices Only', 'nbaddons' ),
                                'medium'         => __( 'Medium Devices Only', 'nbaddons' ),
                                'medium-mobile'  => __( 'Medium &amp; Small Devices Only', 'nbaddons' ),
                                'mobile'         => __( 'Small Devices Only', 'nbaddons' ),
                            ),
                            'preview' => array(
                                'type' => 'none',
                            ),
                        ),
                        'visibility_display'         => array(
                            'type'    => 'select',
                            'label'   => __( 'Display', 'nbaddons' ),
                            'options' => array(
                                ''           => __( 'Always', 'nbaddons' ),
                                'logged_out' => __( 'Logged Out User', 'nbaddons' ),
                                'logged_in'  => __( 'Logged In User', 'nbaddons' ),
                                '0'          => __( 'Never', 'nbaddons' ),
                            ),
                            'toggle'  => array(
                                'logged_in' => array(
                                    'fields' => array( 'visibility_user_capability' ),
                                ),
                            ),
                            'preview' => array(
                                'type' => 'none',
                            ),
                        ),
                        'visibility_user_capability' => array(
                            'type'        => 'text',
                            'label'       => __( 'User Capability', 'nbaddons' ),
                            /* translators: %s: wporg docs link */
                            'description' => sprintf( __( 'Optional. Set the <a%s>capability</a> required for users to view this module.', 'nbaddons' ), ' href="http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table" target="_blank"' ),
                            'preview'     => array(
                                'type' => 'none',
                            ),
                        ),
                    ),
                ),
                'animation'     => array(
                    'title'  => __( 'Animation', 'nbaddons' ),
                    'fields' => array(
                        'animation' => array(
                            'type'    => 'animation',
                            'label'   => __( 'Animation', 'nbaddons' ),
                            'preview' => array(
                                'type'     => 'animation',
                                'selector' => '{node}',
                            ),
                        ),
                    ),
                ),
                'css_selectors' => array(
                    'title'  => __( 'HTML Element', 'nbaddons' ),
                    'fields' => array(
                        'container_element' => array(
                            'type'    => 'select',
                            'label'   => __( 'Container Element', 'nbaddons' ),
                            'default' => 'div',
                           
                            'options' => apply_filters( 'fl_builder_node_container_element_options', array(
                                'div'     => '&lt;div&gt;',
                                'section' => '&lt;section&gt;',
                                'article' => '&lt;article&gt;',
                                'aside'   => '&lt;aside&gt;',
                                'header'  => '&lt;header&gt;',
                                'footer'  => '&lt;footer&gt;',
                            ) ),
                            'help'    => __( 'Optional. Choose an appropriate HTML5 content sectioning element to use for this module to improve accessibility and machine-readability.', 'nbaddons' ),
                            'preview' => array(
                                'type' => 'none',
                            ),
                        ),
                        'id'                => array(
                            'type'    => 'text',
                            'label'   => __( 'ID', 'nbaddons' ),
                            'help'    => __( "A unique ID that will be applied to this module's HTML. Must start with a letter and only contain dashes, underscores, letters or numbers. No spaces.", 'nbaddons' ),
                            'preview' => array(
                                'type' => 'none',
                            ),
                        ),
                        'class'             => array(
                            'type'    => 'text',
                            'label'   => __( 'Class', 'nbaddons' ),
                            'help'    => __( "A class that will be applied to this module's HTML. Must start with a letter and only contain dashes, underscores, letters or numbers. Separate multiple classes with spaces.", 'nbaddons' ),
                            'preview' => array(
                                'type' => 'none',
                            ),
                        ),
                    ),
                ),
                'export_import' => array(
                    'title'  => __( 'Export/Import', 'nbaddons' ),
                    'fields' => array(
                        'export' => array(
                            'type'    => 'raw',
                            'label'   => __( 'Export', 'nbaddons' ),
                            'preview' => 'none',
                            'content' => '<button style="margin-right:10px" class="fl-builder-button fl-builder-button-small module-export-all" title="Copy Settings">Copy Settings</button><button class="fl-builder-button fl-builder-button-small module-export-style" title="Copy Styles">Copy Styles</button>',
                        ),
                        'import' => array(
                            'type'    => 'raw',
                            'label'   => __( 'Import', 'nbaddons' ),
                            'preview' => 'none',
                            'content' => '<div class="module-import-wrap"><input type="text" class="module-import-input" placeholder="Paste settings or styles here..." /><button class="fl-builder-button fl-builder-button-small module-import-apply">Import</button></div><div class="module-import-error"></div>',
                        ),
                    ),
                ),
            ),
        ));
  
    }

    public function _settings_form( $form, $id ) {
  
        if ( 'row' == $id ) {
            
        } elseif ( 'button' == $id ) {
          
        } elseif( 'advanced' == $id ){
          
        }
       
        return $form;
    }
    
    public static function instance(){
		if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
	}
}
