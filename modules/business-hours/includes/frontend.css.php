<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title h3",
            'props'    => array(
                'color' => $color_heading_hours
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_heading_hour',
            'selector' 	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title h3",
        ) 
    );

    //Color
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
        'enabled'  => in_array( $settings->business_bg_type, array( 'color') ),
        'props'    => array(
            'background-color' => $settings->business_bg_color,
        ),
    ) );

    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
        'enabled'  => in_array( $settings->business_bg_type, array( 'transparent' ) ),
        'props'    => array(
            'background-color' => 'transparent',
        ),
    ) );

    //Gradient
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
        'enabled'  => 'gradient' === $settings->business_bg_type,
        'props'    => array(
            'background-image' => \FLBuilderColor::gradient( $settings->business_bg_gradient ),
        ),
    ) );

     // Border
     \FLBuilderCSS::border_field_rule( array(
        'settings'     => $settings,
        'setting_name' => 'business_border',
        'selector'     => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
    ) );

    // padding
    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'business_padding',
            'selector' 	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
            'unit'		=> $business_padding_unit,
            'props'		=> array(
                'padding-top' 	 => 'business_padding_top', 
                'padding-right'   => 'business_padding_right',
                'padding-bottom'  => 'business_padding_bottom',
                'padding-left' 	 => 'business_padding_left',
            ),
        ) 
    );

    // box shadow
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
            'props'    => array(
                'box-shadow' => \FLBuilderColor::shadow( $settings->business_shadow )
            ),
        )
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'business_spacing',
            'selector'	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-title",
            'prop'		=> 'margin-bottom',
        ) 
    );

    // items
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item span",
            'props'    => array(
                'color' => $color_item_hours
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_item_hour',
            'selector' 	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item span",
        ) 
    );

    //bg Color
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
        'enabled'  => in_array( $settings->business_bgitem_type, array( 'color') ),
        'props'    => array(
            'background-color' => $settings->business_bgitem_color,
        ),
    ) );

    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
        'enabled'  => in_array( $settings->business_bgitem_type, array( 'transparent' ) ),
        'props'    => array(
            'background-color' => 'transparent',
        ),
    ) );

    //Gradient
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
        'enabled'  => 'gradient' === $settings->business_bgitem_type,
        'props'    => array(
            'background-image' => \FLBuilderColor::gradient( $settings->business_bgitem_gradient ),
        ),
    ) );

     // Border
     \FLBuilderCSS::border_field_rule( array(
        'settings'     => $settings,
        'setting_name' => 'business_item_border',
        'selector'     => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
    ) );

    // padding
    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'business_item_padding',
            'selector' 	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
            'unit'		=> $business_item_padding_unit,
            'props'		=> array(
                'padding-top' 	 => 'business_item_padding_top', 
                'padding-right'   => 'business_item_padding_right',
                'padding-bottom'  => 'business_item_padding_bottom',
                'padding-left' 	 => 'business_item_padding_left',
            ),
        ) 
    );

    // box shadow
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
            'props'    => array(
                'box-shadow' => \FLBuilderColor::shadow( $settings->business_item_shadow )
            ),
        )
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'business_item_spacing',
            'selector'	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item",
            'prop'		=> 'margin-bottom',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner .nxadd-business-hour-single-item.nx-business-close span",
            'props'    => array(
                'color' => $color_close_hours
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_close_hour',
            'selector' 	=> ".fl-node-$id .nxbb-business-hours-wrapper .nxadd-business-hours-inner li.nxadd-business-hour-single-item.nx-business-close span",
        ) 
    );

} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>