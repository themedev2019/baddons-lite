<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {


    // layoutn

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'flex_width',
            'selector'	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap.nx-left-layout .nxadd-blog-post-thumbnail, .fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap.nx-right-layout .nxadd-blog-post-thumbnail",
            'prop'		=> 'flex-basis',
        ) 
    );

    // content 
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_content',
            'selector'	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap",
            'props'    => array(
                'background-color' => $bgcolor_content,
            ),
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_content',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap",
            'unit'		=> $padding_content_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_content_top', 
                'padding-right'  => 'padding_content_right',
                'padding-bottom' => 'padding_content_bottom',
                'padding-left' 	 => 'padding_content_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_content', 
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap",
        ) 
    );

    // body
    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-post-content",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );


    //title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-post-title a",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-post-title a",
        ) 
    );
    
    // thumbnil
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_width',
            'selector'	=> ".fl-node-$id .nxbb-blog-post-area .thumb-img",
            'prop'		=> 'width',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_height',
            'selector'	=> ".fl-node-$id .nxbb-blog-post-area .thumb-img",
            'prop'		=> 'height',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .thumb-img",
            'enabled'  => '' != $settings->thum_width || '' != $settings->thum_height,
            'props'    => array(
                'object-fit' => 'cover'
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_images', 
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .thumb-img",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'margin_images',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-thumbnail",
            'unit'		=> $margin_images_unit,
            'props'		=> array(
                'margin-top' 	 => 'margin_images_top', 
                'margin-right'   => 'margin_images_right',
                'margin-bottom'  => 'margin_images_bottom',
                'margin-left' 	 => 'margin_images_left',
            ),
        ) 
    );
    
    //date
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .meta-data",
            'props'    => array(
                'color' => $color_date
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_date',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .meta-data",
        ) 
    );

     //categories
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .post-cat",
            'props'    => array(
                'color' => $color_cate
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_cate',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-meta-list .post-cat",
        ) 
    );

     //details
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-des .post-des",
            'props'    => array(
                'color' => $color_details
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-blog-des .post-des",
        ) 
    );

    // button
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-btn-wrapper",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
            'props'    => array(
                'color' => $button_details_color
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_button',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'button_border', 
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
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
        'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
        'enabled'  => in_array( $settings->business_bg_type, array( 'color') ),
        'props'    => array(
            'background-color' => $settings->business_bg_color,
        ),
    ) );

    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
        'enabled'  => in_array( $settings->business_bg_type, array( 'transparent' ) ),
        'props'    => array(
            'background-color' => 'transparent',
        ),
    ) );

    //Gradient
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-blog-post-area .nxadd-blog-post-wrap .nxadd-btn-wrapper .nxadd-btn",
        'enabled'  => 'gradient' === $settings->business_bg_type,
        'props'    => array(
            'background-image' => \FLBuilderColor::gradient( $settings->business_bg_gradient ),
        ),
    ) );




} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>