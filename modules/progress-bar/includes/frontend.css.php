<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-single-skill-bar .skill-bar-content .skill-title",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-single-skill-bar .skill-bar-content .skill-title",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_title',
            'selector'	=> ".fl-node-$id .nxbb-single-skill-bar .skill-bar-content",
            'prop'		=> 'margin-bottom',
        ) 
    );


    // counter
    // title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nx-skill-bar4 .nx-skill-progress .number-percentage-wraper",
            'props'    => array(
                'color' => $color_counter
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_counter',
            'selector' 	=> ".fl-node-$id .nx-skill-bar4 .nx-skill-progress .number-percentage-wraper",
        ) 
    );


    // back bar
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4",
            'props'    => array(
                'background-color' => $bgcolor_back,
            ),
        ) 
    );


    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_back',
            'selector' 	=> ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4",
            'unit'		=> $padding_back_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_back_top', 
                'padding-right'  => 'padding_back_right',
                'padding-bottom' => 'padding_back_bottom',
                'padding-left' 	 => 'padding_back_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_back', 
            'selector' 	=> ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'height_bar',
            'selector'	=> ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4",
            'prop'		=> 'height',
        ) 
    );

    // front bar

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress",
            'props'    => array(
                'background-color' => $bgcolor_front,
            ),
        ) 
    );


    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_front',
            'selector' 	=> ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress",
            'unit'		=> $padding_front_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_front_top', 
                'padding-right'  => 'padding_front_right',
                'padding-bottom' => 'padding_front_bottom',
                'padding-left' 	 => 'padding_front_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_front', 
            'selector' 	=> ".fl-node-$id .nxbb-single-skill-bar .nx-skill-bar4 .nx-skill-progress",
        ) 
    );

} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>