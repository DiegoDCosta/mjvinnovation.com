<?php
    /*
     No Additional Setting Options
    */
    if (!class_exists('TS_Parameter_IconsPanel')) {
        class TS_Parameter_IconsPanel {
            function __construct() {	
                if (function_exists('vc_add_shortcode_param')) {
					vc_add_shortcode_param('icons_panel', array(&$this, 'iconspanel_settings_field'));
				} else if (function_exists('add_shortcode_param')) {
                    add_shortcode_param('icons_panel', array(&$this, 'iconspanel_settings_field'));
				}
            }        
            function iconspanel_settings_field($settings, $value) {
                global $VISUAL_COMPOSER_EXTENSIONS;
                $dependency     = vc_generate_dependencies_attributes($settings);
                $param_name     = isset($settings['param_name']) ? $settings['param_name'] : '';
                $type           = isset($settings['type']) ? $settings['type'] : '';
                $default		= isset($settings['default']) ? $settings['default'] : '';
				/*
                $height         = isset($settings['height']) ? $settings['height'] : "250";
                $size           = isset($settings['size']) ? $settings['size'] : "34";
                $margin         = isset($settings['margin']) ? $settings['margin'] : "4";
                $custom         = isset($settings['custom']) ? $settings['custom'] : 'true';
                $icon_select    = isset($settings['source']) ? $settings['source'] : '';
                $font_select	= isset($settings['fonts']) ? $settings['fonts'] : 'true';
                $icon_filter	= isset($settings['filter']) ? $settings['filter'] : 'true';
                $summary		= isset($settings['summary']) ? $settings['summary'] : 'true';                
                $override		= isset($settings['override']) ? $settings['override'] : 'false';
				*/
				$visual			= $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_EditorVisualSelector;
				$parameters		= isset($settings['settings']) ? $settings['settings'] : array();
				$icon_select    = isset($parameters['source']) ? $parameters['source'] : array();
				$emptyIcon		= isset($parameters['emptyIcon']) ? $parameters['emptyIcon'] : "true";
				if ($emptyIcon == true) {
					$emptyIcon	= "true";
				} else if ($emptyIcon == false) {
					$emptyIcon	= "false";
				}
				$emptyIconValue	= isset($parameters['emptyIconValue']) ? $parameters['emptyIconValue'] : "";
				$hasSearch		= isset($parameters['hasSearch']) ? $parameters['hasSearch'] : "true";
				if ($hasSearch == true) {
					$hasSearch	= "true";
				} else if ($hasSearch == false) {
					$hasSearch	= "false";
				}
				$iconsPerPage	= isset($parameters['iconsPerPage']) ? $parameters['iconsPerPage'] : 200;				
                $url            = $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginPath;
				$randomizer		= mt_rand(999999, 9999999);
                $output         = '';
                if (($visual == "true") || ($override == "true")) {
                    //$output .= '<div id="ts-font-icons-selector-parent-' . $randomizer . '" class="ts-font-icons-selector-parent ts-settings-parameter-gradient-grey">';
					$output .= '<div id="ts-font-icons-picker-parent-' . $randomizer . '" class="ts-font-icons-picker-parent">';
						/*
                        // Font Selector
						if (($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Fonts > 1 ) && ($font_select == "true")) {
                            $output .= '<span class="ts-font-icons-selector-label" style="margin-top: 5px;">' . __( "Filter by Font:", "ts_visual_composer_extend" ) . '</span>';
                        }						
                        if ($font_select == "true") {
                            $output .= '<select name="ts-font-icons-fonts" id="ts-font-icons-fonts" class="ts-font-icons-fonts wpb_vc_param_value wpb-input wpb-select font dropdown" style="margin-bottom: 20px; ' . ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Fonts > 1 ? "display: block;" : "display: none;") . '">';
                                foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_List_Select_Fonts as $Icon_Font => $iconfont) {
                                    if (strlen($iconfont) != 0) {
                                        $font = str_replace("(", "", strtolower($Icon_Font));
                                        $font = str_replace(")", "", strtolower($font));
                                        $output .= '<option class="" value="' . $font . '">' . $Icon_Font . '</option>';
                                    } else {
                                        $output .= '<option class="" value="">' . $Icon_Font . '</option>';
                                    }
                                }
                            $output .= '</select>';
                        }
						// Icon Search / Filter
                        if ($icon_filter == "true") {
                            $output .= '<span class="ts-font-icons-selector-label">' . __( "Filter by Icon:", "ts_visual_composer_extend" ) . '</span>';
                            $output .= '<input name="ts-font-icons-search" id="ts-font-icons-search-' . $randomizer . '" class="ts-font-icons-search" type="text" placeholder="' . __( "Search ...", "ts_visual_composer_extend" ) . '" />';				
                            $output .= '<div id="ts-font-icons-count-' . $randomizer . '" class="ts-font-icons-count" data-count="' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Count . '" style="margin-top: 10px; font-size: 10px;">' . __( "Icons Found:", "ts_visual_composer_extend" ) . ' <span id="ts-font-icons-found" class="ts-font-icons-found">' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Count . '</span> / ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Count . '</div>';				
                        }
						// Icon Preview
                        if ($summary == "true") {
                            $output .= '<div id="ts-font-icons-preview-' . $randomizer . '" class="ts-font-icons-preview" style="' . ((empty($value) || $value == "transparent") ? "display: none;" : "") . '">';
                                $output .= '<div class="ts-font-icons-preview-left">';
                                    $output .= '<span class="ts-font-icons-selector-label">' . __( "Selected Icon:", "ts_visual_composer_extend" ) . '</span>';
                                    $output .= '<span class="ts-font-icons-selector-message">' . __( "Class Name:", "ts_visual_composer_extend" ) . ' <span class="ts-font-icons-preview-class">' . $value . '</span></span>';
                                $output .= '</div>';
                                $output .= '<div class="ts-font-icons-preview-right">';
                                    $output .= '<i class="' . $value . '" style=""></i>';
                                $output .= '</div>';
                            $output .= '</div>';
                        }
						// Icon Picker
                        $output .= '<div id="ts-font-icons-wrapper-' . $param_name . '" class="ts-visual-selector ts-font-icons-wrapper" style="max-height: ' . $height . 'px;">';
                            $output .= '<input name="' . $param_name . '" id="' . $param_name . '" class="ts-font-icons-input wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="hidden" value="' . $value . '"/>';
                            // Add Built-In Fonts (based on provided Source)              
                            foreach ($icon_select as $group => $icons) {
                                if (!is_array($icons) || !is_array(current($icons))) {
                                    $class_key      = key($icons);
                                    $class_group    = explode('-', esc_attr($class_key));
                                    if (($class_group[0] != "dashicons") && ($class_group[0] != "transparent")) {
                                        if ($value == esc_attr($class_key)) {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-' . $class_group[1] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($icons)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                        } else {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-' . $class_group[1] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($icons)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                        }
                                    } else if ($class_group[0] == "transparent") {
                                        if ($value == 'transparent') {
                                            $output .= '<a class="TS_VCSC_Icon_Empty TS_VCSC_Icon_Link ts-no-icon current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . __( "No Icon", "ts_visual_composer_extend" ) . '" data-group="" rel="transparent" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;">r<div class="selector-tick"></div></a>';
                                        } else {
                                            $output .= '<a class="TS_VCSC_Icon_Empty TS_VCSC_Icon_Link ts-no-icon" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . __( "No Icon", "ts_visual_composer_extend" ) . '" data-group="" rel="transparent" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;">r</a>';
                                        }
                                    } else {
                                        if ($value == esc_attr($class_key)) {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-' . $class_group[0] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($icons)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                        } else {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-' . $class_group[0] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($icons)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                        }
                                    }
                                } else {
                                    foreach ($icons as $key => $label) {
                                        $class_key      = key($label);
                                        $class_group    = explode('-', esc_attr($class_key));
                                        $font           = str_replace("(", "", strtolower(strtolower(esc_attr($group))));
                                        $font           = str_replace(")", "", strtolower($font));
                                        if (($class_group[0] != "dashicons") && ($class_group[0] != "transparent")) {
                                            if ($value == esc_attr($class_key)) {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-' . $class_group[1] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($label)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                            } else {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-' . $class_group[1] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($label)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                            }
                                        } else if ($class_group[0] == "transparent") {
                                            if ($value == 'transparent') {
                                                $output .= '<a class="TS_VCSC_Icon_Empty TS_VCSC_Icon_Link ts-no-icon current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . __( "No Icon", "ts_visual_composer_extend" ) . '" data-group="" rel="transparent" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;">r<div class="selector-tick"></div></a>';
                                            } else {
                                                $output .= '<a class="TS_VCSC_Icon_Empty TS_VCSC_Icon_Link ts-no-icon" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . __( "No Icon", "ts_visual_composer_extend" ) . '" data-group="" rel="transparent" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;">r</a>';
                                            }
                                        } else {
                                            if ($value == esc_attr($class_key)) {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-' . $class_group[0] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($label)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                            } else {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-' . $class_group[0] . '" data-icon="' . esc_attr($class_key) . '" rel="' . esc_html(current($label)) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                            }
                                        }
                                    }
                                }
                            }
                            // Add Custom Upload Font
                            if ((get_option('ts_vcsc_extend_settings_tinymceCustom', 0) == 1) && ($custom == "true")) {                       
                                foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Icons_Compliant_Custom as $group => $icons) {
                                    if (!is_array($icons) || !is_array(current($icons))) {
                                        $class_key      = key($icons);
                                        $class_group    = explode('-', esc_attr($class_key));
                                        if ($value == esc_attr($class_key)) {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-custom" data-icon="' . esc_attr($class_key) . '" rel="' . esc_attr($class_key) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                        } else {
                                            $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="" data-filter="false" data-font="font-custom" data-icon="' . esc_attr($class_key) . '" rel="' . esc_attr($class_key) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                        }
                                    } else {
                                        foreach ($icons as $key => $label) {
                                            $class_key      = key($label);
                                            $class_group    = explode('-', esc_attr($class_key));
                                            $font           = str_replace("(", "", strtolower(strtolower(esc_attr($group))));
                                            $font           = str_replace(")", "", strtolower($font));
                                            if ($value == esc_attr($class_key)) {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link current" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-custom" data-icon="' . esc_attr($class_key) . '" rel="' . esc_attr($class_key) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i><div class="selector-tick"></div></a>';
                                            } else {
                                                $output .= '<a class="TS_VCSC_Icon_Taken TS_VCSC_Icon_Link" href="#" title="' . __( "Icon Name:", "ts_visual_composer_extend" ) . ' ' . esc_attr($class_key) . '" data-group="' . $font . '" data-filter="false" data-font="font-custom" data-icon="' . esc_attr($class_key) . '" rel="' . esc_attr($class_key) . '" style="height: ' . $size . 'px; width: ' . $size . 'px; margin: ' . $margin . 'px ' . $margin . 'px 0 0;"><i style="font-size: ' . $size . 'px; line-height: ' . $size . 'px; height: ' . $size . 'px; width: ' . $size . 'px;" class="' . esc_attr($class_key) . '"></i></a>';
                                            }
                                        }
                                    }
                                }                            
                            }			
                        $output .= '</div>';
                        */
						// Icon Picker
						if (($value == "") && ($default != "")) {
							$value	= $default;
						}
                        $output .= '<div id="ts-font-icons-picker-' . $param_name . '" class="ts-visual-selector ts-font-icons-picker" data-value="' . $value . '" data-theme="inverted" data-empty="' . $emptyIcon . '" data-transparent="' . $emptyIconValue . '" data-search="' . $hasSearch . '" data-pagecount="' . $iconsPerPage . '">';
							$iconGroups 			= array();
							$output .= '<select id="' . $param_name . '" name="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
								// Add Empty Placeholder
								if ($emptyIcon == "true") {
									if (($value == "") || ($value == "transparent")) {
										$output .= '<option value="" selected="selected"></option>';
									} else {
										$output .= '<option value=""></option>';
									}
								}
								// Add Built-In Fonts (based on provided Source)              
								foreach ($icon_select as $group => $icons) {
									if (!is_array($icons) || !is_array(current($icons))) {
										$font		= "";
									} else {									
										$font		= str_replace("(", "", esc_attr($group));
										$font		= str_replace(")", "", $font);
									}
									if (($font != "") && (!in_array($font, $iconGroups))) {
										$output .= '<optgroup label="' . $font . '">';
									}									
									if (!is_array($icons) || !is_array(current($icons))) {
										$class_key      = key($icons);
										$class_group    = explode('-', esc_attr($class_key));
										if (($class_group[0] != "dashicons") && ($class_group[0] != "transparent")) {
											if ($value == esc_attr($class_key)) {
												$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
											} else {
												$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
											}
										} else {
											if ($value == esc_attr($class_key)) {
												$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
											} else {
												$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
											}
										}
									} else {
										foreach ($icons as $key => $label) {
											$class_key      = key($label);
											$class_group    = explode('-', esc_attr($class_key));
											$font           = str_replace("(", "", strtolower(strtolower(esc_attr($group))));
											$font           = str_replace(")", "", strtolower($font));
											if (($class_group[0] != "dashicons") && ($class_group[0] != "transparent")) {
												if ($value == esc_attr($class_key)) {
													$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
												} else {
													$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
												}
											} else {
												if ($value == esc_attr($class_key)) {
													$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
												} else {
													$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
												}
											}
										}
									}									
									if (($font != "") && (!in_array($font, $iconGroups))) {
										$output .= '</optgroup>';
										array_push($iconGroups, $font);
									}
								}
								// Add Custom Upload Font
								if ((get_option('ts_vcsc_extend_settings_tinymceCustom', 0) == 1) && ($custom == "true")) {                       
									foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Icons_Compliant_Custom as $group => $icons) {
										if (!is_array($icons) || !is_array(current($icons))) {
											$class_key      = key($icons);
											$class_group    = explode('-', esc_attr($class_key));
											if ($value == esc_attr($class_key)) {
												$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
											} else {
												$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
											}
										} else {
											foreach ($icons as $key => $label) {
												$class_key      = key($label);
												$class_group    = explode('-', esc_attr($class_key));
												$font           = str_replace("(", "", strtolower(strtolower(esc_attr($group))));
												$font           = str_replace(")", "", strtolower($font));
												if ($value == esc_attr($class_key)) {
													$output .= '<option value="' . esc_attr($class_key) . '" selected="selected">' . esc_attr($class_key) . '</option>';
												} else {
													$output .= '<option value="' . esc_attr($class_key) . '">' . esc_attr($class_key) . '</option>';
												}
											}
										}
									}                            
								}
							$output .= '</select>';
                        $output .= '</div>';
                    $output .= '</div>';
                } else {
					$output .= '<div id="ts-font-icons-manual-parent-' . $randomizer . '" class="ts-font-icons-manual-parent ts-settings-parameter-gradient-grey">';
						$previewURL = site_url() . '/wp-admin/admin.php?page=TS_VCSC_Previews';			
						$output .= '<input name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="text" value="' . $value . '"/>';
						$output .= '<a href="' . $previewURL . '" target="_blank">' . __( "Find Icon Class Name", "ts_visual_composer_extend" ) . '</a>';
					$output .= '</div>';
                }
                return $output;
            }
        }
    }
    if (class_exists('TS_Parameter_IconsPanel')) {
        $TS_Parameter_IconsPanel = new TS_Parameter_IconsPanel();
    }
?>