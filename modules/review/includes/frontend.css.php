<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-review .nxbb-widget-container",
            'prop'		=> 'text-align',
        ) 
    );

    // thumbnil
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_width',
            'selector'	=> ".fl-node-$id .nxbb-review .nx-review-fig",
            'prop'		=> 'width',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_height',
            'selector'	=> ".fl-node-$id .nxbb-review .nx-review-fig",
            'prop'		=> 'height',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-review .nx-review-fig",
            'enabled'  => '' != $settings->thum_width || '' != $settings->thum_height,
            'props'    => array(
                'object-fit' => 'cover'
            ),
        ) 
    );


    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_photos', 
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-fig img",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_photos',
            'selector'	=> ".fl-node-$id .nxbb-review .nx-review-fig",
            'prop'		=> 'margin-bottom',
        ) 
    );


     //title
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-review .nx-review-body .nx-review-reviewer",
            'props'    => array(
                'color' => $color_name
            ),
        ) 
    ); 
   

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_name',
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-body .nx-review-reviewer",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_name',
            'selector'	=> ".fl-node-$id .nxbb-review .nx-review-body .nx-review-reviewer",
            'prop'		=> 'margin-bottom',
        ) 
    );

     //designation
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-review .nx-review-body .nx-review-position",
            'props'    => array(
                'color' => $color_designation
            ),
        ) 
    ); 
   
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_designation',
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-body .nx-review-position",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_designation',
            'selector'	=> ".fl-node-$id .nxbb-review .nx-review-body .nx-review-position",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //ratting
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-review .nx-review-ratting--star",
            'props'    => array(
                'color' => $color_designation,
                'display' => 'inline-block'
            ),
        ) 
    ); 
   
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_designation',
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-ratting--star",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_content_raitng', 
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-ratting--star",
        ) 
    );


    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_ratting',
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile",
            'unit'		=> $padding_ratting_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_ratting_top', 
                'padding-right'  => 'padding_ratting_right',
                'padding-bottom' => 'padding_ratting_bottom',
                'padding-left' 	 => 'padding_ratting_left',
            ),
        ) 
    );

     //details
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-review .nx-review-body .nx-review-desc p",
            'props'    => array(
                'color' => $color_designation
            ),
        ) 
    ); 
   
    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_designation',
            'selector' 	=> ".fl-node-$id .nxbb-review .nx-review-body .nx-review-desc p",
        ) 
    );


} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>