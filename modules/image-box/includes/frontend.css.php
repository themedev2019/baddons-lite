<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box",
            'prop'		=> 'text-align',
        ) 
    );
    //title data
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title_data',
            'selector' 	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title",
        ) 
    );

    
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title",
            'props'    => array(
                'color' => $color_title_data,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_title_data',
            'selector'	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nxadd-image-box-title",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //details data
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details_data',
            'selector' 	=> ".fl-node-$id .nxbb-image-box .nxadd-des",
        ) 
    );

    
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-box .nxadd-des",
            'props'    => array(
                'color' => $color_Details_data,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_details_data',
            'selector'	=> ".fl-node-$id .nxbb-image-box .nxadd-des",
            'prop'		=> 'margin-bottom',
        ) 
    );
    //button
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_button',
            'selector' 	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon",
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon",
            'props'    => array(
                'color' => $color_button
            ),
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon",
            'props'    => array(
                'background-color' => $bgcolor_button
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_button', 
            'selector' 	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_button',
            'selector' 	=> ".fl-node-$id .nxbb-image-box .nxadd-image-box .nxadd-box-body .nx-link-icon",
            'unit'		=> $padding_button_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_button_top', 
                'padding-right'  => 'padding_button_right',
                'padding-bottom' => 'padding_button_bottom',
                'padding-left' 	 => 'padding_button_left',
            ),
        ) 
    );





} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>