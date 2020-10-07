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
    
     // content css render
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile",
            'props'    => array(
                'background-color' => $bgcolor_body,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile",
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
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile",
        ) 
    );

    // thumbnil
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_width',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image",
            'prop'		=> 'width',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'thum_height',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image",
            'prop'		=> 'height',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image",
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
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_photos',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile.nxbeaver-round-image .nxadd-team-member-image",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title",
            'props'    => array(
                'color' => $color_name
            ),
        ) 
    ); 
    // hover title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile:hover .nxadd-team-member-content .member-title",
            'props'    => array(
                'color' => $color_name_hover
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_name',
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_name',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-title",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //designation
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation",
            'props'    => array(
                'color' => $color_designation
            ),
        ) 
    ); 
    // hover designation
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile:hover .nxadd-team-member-content .member-designation",
            'props'    => array(
                'color' => $color_designation_hover
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_designation',
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_designation',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-team-member-profile .nxadd-team-member-content .member-designation",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //social
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a",
            'props'    => array(
                'color' => $color_social
            ),
        ) 
    ); 
    // hover social
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a:hover",
            'props'    => array(
                'color' => $color_social_hover
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_social',
            'selector' 	=> ".fl-node-$id .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_social',
            'selector'	=> ".fl-node-$id .nxbb-team-area .nxadd-social.nxaddon-social-colored > li.social-item > a",
            'prop'		=> 'margin-right',
        ) 
    );


} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>