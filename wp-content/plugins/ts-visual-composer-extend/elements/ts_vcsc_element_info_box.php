<?php
    global $VISUAL_COMPOSER_EXTENSIONS;
	
    $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element = array(
		"name"                      => __( "TS Icon Feature Box", "ts_visual_composer_extend" ),
		"base"                      => "TS_VCSC_Icon_Feature_Box",
		"icon" 	                    => "ts-composer-element-icon-info-box",
		"class"                     => "",
		"category"                  => __( "VC Extensions", "ts_visual_composer_extend" ),
		"description"               => __("Place an icon feature box element", "ts_visual_composer_extend"),
		"admin_enqueue_js"        	=> "",
		"admin_enqueue_css"       	=> "",
		"params"                    => array(
			// Spacer Settings
			array(
				"type"              => "seperator",
				"param_name"        => "seperator_1",
				"seperator"         => "Info Box Content",
			),
			array(
				'type' 				=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorType,
				'heading' 			=> __( 'Panel Icon', 'ts_visual_composer_extend' ),
				'param_name' 		=> 'panel_icon',
				'value'				=> '',
				'source'			=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorValue,
				'settings' 			=> array(
					'emptyIcon' 			=> true,
					'type' 					=> 'extensions',
					'iconsPerPage' 			=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorPager,
					'source' 				=> $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorSource,
				),
				"description"       => ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_EditorVisualSelector == "true" ? __( "Select the icon for your info / notice panel.", "ts_visual_composer_extend" ) : $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconSelectorString),
			),
			// Content Settings
			array(
				"type"              => "seperator",
				"param_name"        => "seperator_2",
				"seperator"			=> "Panel Content",
				"group" 			=> "Panel Content",
			),
			array(
				"type"              => "textfield",
				"heading"           => __( "Panel Title", "ts_visual_composer_extend" ),
				"param_name"        => "panel_title",
				"value"             => "",
				"admin_label"       => true,
				"description"       => __( "Enter an optional title for the info / notice panel.", "ts_visual_composer_extend" ),
				"group" 			=> "Panel Content",
			),
			array(
				"type"				=> "textarea_html",
				"class"				=> "",
				"heading"			=> __( "Panel Content", "ts_visual_composer_extend" ),
				"param_name"		=> "content",
				"value"				=> "I am an info or notice panel. Click the edit button to change this text.",
				"description"		=> __( "Create the content for the info / notice element.", "ts_visual_composer_extend" ),
				"group" 			=> "Panel Content",
			),
			// Font Settings
			array(
				"type"              => "seperator",
				"param_name"        => "seperator_3",
				"seperator"			=> "Panel Fonts",
				"group" 			=> "Panel Fonts",
			),
			array(
				"type"				=> "fontsmanager",
				"heading"			=> __( "Title Font Family", "ts_visual_composer_extend" ),
				"param_name"		=> "font_title_family",
				"value"				=> "",
				"default"			=> "true",
				"connector"			=> "font_title_type",
				"description"		=> __( "Select the font to be used for the title text.", "ts_visual_composer_extend" ),
				"group"				=> "Panel Fonts",
			),
			array(
				"type"				=> "hidden_input",
				"param_name"		=> "font_title_type",
				"value"				=> "",
				"description"		=> "",
				"group"				=> "Panel Fonts",
			),				
			array(
				"type"				=> "fontsmanager",
				"heading"			=> __( "Content Font Family", "ts_visual_composer_extend" ),
				"param_name"		=> "font_content_family",
				"value"				=> "",
				"default"			=> "true",
				"connector"			=> "font_content_type",
				"description"		=> __( "Select the font to be used for the content text.", "ts_visual_composer_extend" ),
				"group"				=> "Panel Fonts",
			),
			array(
				"type"				=> "hidden_input",
				"param_name"		=> "font_content_type",
				"value"				=> "",
				"description"		=> "",
				"group"				=> "Panel Fonts",
			),		
			// Other Settings
			array(
				"type"              => "seperator",
				"param_name"        => "seperator_5",
				"seperator"			=> "Other Settings",
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Margin: Top", "ts_visual_composer_extend" ),
				"param_name"        => "margin_top",
				"value"             => "0",
				"min"               => "-50",
				"max"               => "200",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Select the top margin for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "nouislider",
				"heading"           => __( "Margin: Bottom", "ts_visual_composer_extend" ),
				"param_name"        => "margin_bottom",
				"value"             => "0",
				"min"               => "-50",
				"max"               => "200",
				"step"              => "1",
				"unit"              => 'px',
				"description"       => __( "Select the bottom margin for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"              => "textfield",
				"heading"           => __( "Define ID Name", "ts_visual_composer_extend" ),
				"param_name"        => "el_id",
				"value"             => "",
				"description"       => __( "Enter an unique ID for the element.", "ts_visual_composer_extend" ),
				"group" 			=> "Other Settings",
			),
			array(
				"type"				=> "tag_editor",
				"heading"			=> __( "Extra Class Names", "ts_visual_composer_extend" ),
				"param_name"		=> "el_class",
				"value"				=> "",
				"description"		=> __( "Enter additional class names for the element.", "ts_visual_composer_extend" ),
				"group"				=> "Other Settings",
			),
		)
	);
	
	if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_LeanMap == "true") {
		return $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element;
	} else {			
		vc_map($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Element);
	}
?>