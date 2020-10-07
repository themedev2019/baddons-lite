<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box",
            'prop'		=> 'text-align',
        ) 
    );

    //icon
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_icon_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
        ) 
    );

    
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
            'props'    => array(
                'color' => $color_icon_info,
            ),
        ) 
    );
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
            'props'    => array(
                'background-color' => $bgcolor_icon_info
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_icon_info', 
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_icon_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
            'unit'		=> $padding_icon_info_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_icon_info_top', 
                'padding-right'  => 'padding_icon_info_right',
                'padding-bottom' => 'padding_icon_info_bottom',
                'padding-left' 	 => 'padding_icon_info_left',
            ),
        ) 
    );
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_icon_info',
            'selector'	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-icon .nxbb-icon",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //title info 
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title",
        ) 
    );

    
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title",
            'props'    => array(
                'color' => $color_title_info,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_title_info',
            'selector'	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-title",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //details info 
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des",
        ) 
    );

    
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des",
            'props'    => array(
                'color' => $color_details_info,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_details_info',
            'selector'	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nxadd-des",
            'prop'		=> 'margin-bottom',
        ) 
    );

    // button info
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_button_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon",
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon",
            'props'    => array(
                'color' => $color_button_info
            ),
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon",
            'props'    => array(
                'background-color' => $bgcolor_button_info
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_button_info', 
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_button_info',
            'selector' 	=> ".fl-node-$id .nxbb-info-box-wrapper .nxadd-info-box .nx-info-body .nx-link-icon",
            'unit'		=> $padding_button_info_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_button_info_top', 
                'padding-right'  => 'padding_button_info_right',
                'padding-bottom' => 'padding_button_info_bottom',
                'padding-left' 	 => 'padding_button_info_left',
            ),
        ) 
    );





} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>