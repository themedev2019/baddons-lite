<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    //title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
            'props'    => array(
                'color' => $color_title
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
        ) 
    );

    
    

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'spacing_icon',
            'selector' 	=> ".fl-node-$id .nxbb-button-area .nxbb-single-btn a .nxadd-icon",
            'unit'		=> $spacing_icon_unit,
            'props'		=> array(
                'margin-top' 	 => 'spacing_icon_top', 
                'margin-right'   => 'spacing_icon_right',
                'margin-bottom'  => 'spacing_icon_bottom',
                'margin-left' 	 => 'spacing_icon_left',
            ),
        ) 
    );

     //button

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'button_border', 
            'selector' 	=> ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );

    //Color
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
        'enabled'  => in_array( $settings->business_bg_type, array( 'color') ),
        'props'    => array(
            'background-color' => $settings->business_bg_color,
        ),
    ) );

    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
        'enabled'  => in_array( $settings->business_bg_type, array( 'transparent' ) ),
        'props'    => array(
            'background-color' => 'transparent',
        ),
    ) );

    //Gradient
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-button-area .nxbb-single-btn a",
        'enabled'  => 'gradient' === $settings->business_bg_type,
        'props'    => array(
            'background-image' => \FLBuilderColor::gradient( $settings->business_bg_gradient ),
        ),
    ) );





} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>