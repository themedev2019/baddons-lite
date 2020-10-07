<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // content css render
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style",
            'props'    => array(
                'background-color' => $bgcolor_body,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_content', 
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table",
        ) 
    );

    // badge
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'props'    => array(
                'content' => "'$badge_text'"
            ),
        )
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'props'    => array(
                'color' => $color_badge
            ),
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'props'    => array(
                'background-color' => $bgcolor_badge,
            ),
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_badge',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'unit'		=> $padding_badge_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_badge_top', 
                'padding-right'  => 'padding_badge_right',
                'padding-bottom' => 'padding_badge_bottom',
                'padding-left' 	 => 'padding_badge_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_badge', 
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'position_top_badge',
            'selector'	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'prop'		=> 'top',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
       
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'position_left_badge',
            'selector'	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.nxadd-pricing-bridge:before",
            'prop'		=> 'right',
        )
    );

    // title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-header .pricing-title",
            'props'    => array(
                'color' => $color_heading
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_heading',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-header .pricing-title",
        ) 
    );


     // price
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price",
            'props'    => array(
                'color' => $color_price
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_currency',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price > sup",
        ) 
    );

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_price',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price",
        ) 
    );

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_currency',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-price .nxadd-price > sub",
        ) 
    );



    // items
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-content .nxadd-pricing-list li",
            'props'    => array(
                'color' => $color_items
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_items',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table .nxadd-pricing-content .nxadd-pricing-list li",
        ) 
    );


     // button

     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn",
            'props'    => array(
                'color' => $color_button
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_button',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_button', 
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn",
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn",
            'props'    => array(
                'background-color' => $bgcolor_button,
            ),
        ) 
    );


    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_button',
            'selector' 	=> ".fl-node-$id .nxbb-pricing-area .nxadd-pricing-table.colorfull-style .nxadd-pricing-action .nxadd-btn",
            'unit'		=> $padding_button_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_button_top', 
                'padding-right'   => 'padding_button_right',
                'padding-bottom'  => 'padding_button_bottom',
                'padding-left' 	 => 'padding_button_left',
            ),
        ) 
    );


} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>