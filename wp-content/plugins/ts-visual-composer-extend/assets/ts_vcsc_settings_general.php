<?php
	global $VISUAL_COMPOSER_EXTENSIONS;

	// Standard Elements
	$Count_Media								= 0;
	$Count_Google								= 0;
	$Count_Buttons								= 0;
	$Count_Counters								= 0;
	$Count_Posts								= 0;
	$Count_Titles								= 0;
	$Count_Popups								= 0;
	$Count_Other								= 0;
	$Count_Beta									= 0;
	$Count_Types								= 0;
	$Count_Extra								= 0;
	$Count_Main 								= 0;
	$Count_Total								= 0;
	
	// Post Type Elements
	$Post_Timeline 								= 0;
	$Post_Team 									= 0;
	$Post_Testimonial 							= 0;
	$Post_Skillsets 							= 0;
	$Post_Logo 									= 0;
	$Post_Widget								= 0;
	
	// Extra Elements
	$Extra_Demos								= 0;
	$Extra_Enlighter 							= 0;
	$Extra_Navigator 							= 0;	
	
	// Count Main + Parent Elements
	foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Elements as $ElementName => $element) {
		if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Media')) {
			$Count_Media++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Google')) {
			$Count_Google++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Buttons')) {
			$Count_Buttons++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Counters')) {
			$Count_Counters++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Posts')) {
			$Count_Posts++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Titles')) {
			$Count_Titles++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Popups')) {
			$Count_Popups++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Other')) {
			$Count_Other++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'BETA')) {
			$Count_Beta++;
		}
	}
	
	// Count Child Elements
	foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Children as $ElementName => $element) {
		if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Media')) {
			$Count_Media++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Google')) {
			$Count_Google++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Buttons')) {
			$Count_Buttons++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Counters')) {
			$Count_Counters++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Posts')) {
			$Count_Posts++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Titles')) {
			$Count_Titles++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Popups')) {
			$Count_Popups++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Other')) {
			$Count_Other++;
		} else if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'BETA')) {
			$Count_Beta++;
		}
	}
	
	// Count Post Type Elements
	foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Types as $ElementName => $element) {
		if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Types')) {
			$Count_Types++;
			if ($element['posttype'] == 'ts_skillsets') {
				$Post_Skillsets++;
			} else if ($element['posttype'] == 'ts_team') {
				$Post_Team++;
			} else if ($element['posttype'] == 'ts_testimonials') {
				$Post_Testimonial++;
			} else if ($element['posttype'] == 'ts_timeline') {
				$Post_Timeline++;
			} else if ($element['posttype'] == 'ts_logos') {
				$Post_Logo++;
			}
		}
	}
	
	// Count Widget Elements
	$Post_Widget++;
	
	// Count Extra Elements
	foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Extra as $ElementName => $element) {
		if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['group'] == 'Extra')) {
			$Count_Extra++;
			if ($element['feature'] == 'Enlighter') {
				$Extra_Enlighter++;
			} else if ($element['feature'] == 'Navigator') {
				$Extra_Navigator++;
			}
		}
	}
	
	// Count Demo Elements
	foreach ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Demos as $ElementName => $element) {
		if (($element['deprecated'] == 'false') && ($element['type'] != 'external') && ($element['base'] != '') && ($element['group'] == 'Demos')) {
			$Count_Extra++;
			$Extra_Demos++;
		}
	}	
	
	// Count Main + Parent Elements
	$Count_Deprecated							= TS_VCSC_CountArrayMatches($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Elements, 	'deprecated', 		'true');
	$Count_External								= TS_VCSC_CountArrayMatches($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Elements, 	'type', 			'external');
	
	// Count Child Elements
	$Count_Deprecated							+= TS_VCSC_CountArrayMatches($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Children,	'deprecated', 		'true');
	$Count_External								+= TS_VCSC_CountArrayMatches($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Children,	'type', 			'external');
	
	// Total Counts
	$Count_Main									= $Count_Media + $Count_Google + $Count_Buttons + $Count_Counters + $Count_Posts + $Count_Titles + $Count_Popups + $Count_Other + $Count_Beta;
	$Count_Total								= $Count_Media + $Count_Google + $Count_Buttons + $Count_Counters + $Count_Posts + $Count_Titles + $Count_Popups + $Count_Other + $Count_Beta + $Extra_Enlighter + $Extra_Navigator;

	if (($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_CustomPostTypesTimeline == "true") && ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Visual_Composer_Elements["TS CSS Media Timeline"]["active"] == "true")) {
		$Count_Main								= $Count_Main - 1;
		$Count_Total							= $Count_Total - 1;
	}	
	
	$Count_Fonts								= sizeof($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Fonts_Google);

	$memory_recommended							= 20 * 1024 * 1024;
	$memory_required							= 10 * 1024 * 1024;
	$memory_allocated							= ini_get('memory_limit');
	$memory_allocated 							= preg_replace("/[^0-9]/", "", $memory_allocated) * 1024 * 1024;
	$memory_peakusage 							= memory_get_peak_usage(true);
	$memory_remaining							= $memory_allocated - $memory_peakusage;
	$memory_utilization							= $memory_peakusage / $memory_allocated * 100;
	$memory_checkup								= (($memory_remaining < $memory_recommended) ? "false" : "true");
	$memory_minimum								= (($memory_remaining < $memory_required) ? "false" : "true");
	
	// Advanced Link Selector
    $ts_vcsc_extend_settings_linkerEnabled		= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['enabled'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_linkerGlobal		= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['global'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_linkerOffset		= $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['offset'];
	$ts_vcsc_extend_settings_linkerPosts		= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['posts'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_linkerCustom		= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['custom'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_linkerOrderby		= $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['orderby'];
	$ts_vcsc_extend_settings_linkerOrder		= $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterLinkPicker['order'];
	
	// Numeric Slider Inputs (NoUiSlider)
	$ts_vcsc_extend_settings_nouisliderEnabled	= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterNoUiSlider['enabled'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_nouisliderPips		= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterNoUiSlider['pips'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_nouisliderTooltip	= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterNoUiSlider['tooltip'] == "true" ? 1 : 0);
	$ts_vcsc_extend_settings_nouisliderInput	= ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_ParameterNoUiSlider['input'] == "true" ? 1 : 0);
	
	if (($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginValid == "true") && ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "false") && ((strpos($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginEnvato, $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginLicense) != FALSE))) {
		$autoupdate_allowed						= "true";
	} else {
		$autoupdate_allowed						= "false";
	}
	
	if (TS_VCSC_VersionCompare($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Version, '4.5.0') >= 0) {
		$visual_composer_link					= 'admin.php?page=vc-general';
		if (TS_VCSC_VersionCompare($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Version, '4.8.0') >= 0) {
			$visual_composer_roles				= 'admin.php?page=vc-roles';
		} else {
			$visual_composer_roles				= 'admin.php?page=vc-general';
		}
	} else {
		$visual_composer_link					= 'options-general.php?page=vc_settings';
		$visual_composer_roles					= 'options-general.php?page=vc_settings';
	}
?>
<div id="ts-settings-general" class="tab-content">
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-show"><i class="dashicons-info"></i>General Information</div>
		<div class="ts-vcsc-section-content">
			<div class="ts-vcsc-notice-field ts-vcsc-success" style="margin-top: 10px; font-size: 13px; text-align: justify;">
				In order to use this plugin, you MUST have the Visual Composer Plugin installed; either as a normal plugin or as part of your theme. If Visual Composer is part of your theme, please ensure that it has not been modified;
				some theme developers heavily modify Visual Composer in order to allow for certain theme functions. Unfortunately, some of these modification prevent this extension pack from working correctly.
			</div>
			<div style="margin-top: 20px; margin-bottom: 10px;">
				<h3>Composium - Visual Composer Extensions</h3>
				<div style="margin-top: 20px;">
					<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="http://codecanyon.net/item/visual-composer-extensions-addon/7190695" target="_blank"><img src="<?php echo TS_VCSC_GetResourceURL('images/logos/ts_vcsc_menu_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Buy Plugin</a>
					<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="http://tekanewascripts.com/vcextensions/documentation/" target="_blank"><img src="<?php echo TS_VCSC_GetResourceURL('images/other/ts_vcsc_manual_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Manual</a>
					<?php
						if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "false") {
							echo '<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="http://helpdesk.tekanewascripts.com/forums/forum/wordpress-plugins/visual-composer-extensions/" target="_blank"><img src="' . TS_VCSC_GetResourceURL('images/other/ts_vcsc_support_icon_16x16.png') . '" style="width: 16px; height: 16px; margin-right: 10px;">Support Forum</a>';
						}
					?>
					<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="http://helpdesk.tekanewascripts.com/category/visual-composer-extensions/" target="_blank"><img src="<?php echo TS_VCSC_GetResourceURL('images/other/ts_vcsc_knowledge_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Knowledge Base</a>
					<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="admin.php?page=TS_VCSC_CSS" target="_parent"><img src="<?php echo TS_VCSC_GetResourceURL('images/other/ts_vcsc_customcss_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Custom CSS</a>
					<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="admin.php?page=TS_VCSC_JS" target="_parent"><img src="<?php echo TS_VCSC_GetResourceURL('images/other/ts_vcsc_customjs_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Custom JS</a>
					<?php
						if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "false") {
							echo '<a class="button-secondary" style="width: 150px; margin: 0px auto; text-align: center;" href="admin.php?page=TS_VCSC_License" target="_parent"><img src="' . TS_VCSC_GetResourceURL('images/other/ts_vcsc_license_icon_16x16.png') . '" style="width: 16px; height: 16px; margin-right: 10px;">License</a>';
						}						
						echo '<div style="border: 1px solid #ededed; margin: 20px 0 0 0; padding: 10px 10px 0 10px; background: #FAFAFA;">';
							echo '<p>Current Version: ' . COMPOSIUM_VERSION . '</p>';
							echo '<p style="font-size: 90%; font-style: italic;">Visual Composer Version: '. $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VisualComposer_Version . '</p>';
							if (function_exists('is_multisite') && is_multisite()) {
								echo '<p>Multisite Environment: Yes</p>';
								echo '<p>Plugin Activated Network Wide: ' . ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginIsMultiSiteActive == "true" ? "Yes" : "No") . '</p>';
							} else {
								echo '<p>Multisite Environment: No</p>';
							}
							echo '<p>Available Elements: ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_CountTotalElements . ' / <span style="font-weight: bold; color: #0078CE;">Active Elements: ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_CountActiveElements . '</span></p>';
							if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_EditorIconFontsInternal == "true") {
								$TS_VCSC_TotalIconFontsInstalled = (count($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Installed_Icon_Fonts) + count($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Composer_Icon_Fonts));
							} else {
								$TS_VCSC_TotalIconFontsInstalled = count($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Installed_Icon_Fonts);
							}
							if (get_option('ts_vcsc_extend_settings_tinymceCustomArray', '') != '') {
								echo '<p>Available Fonts: ' . $TS_VCSC_TotalIconFontsInstalled . ' / <span style="font-weight: bold; color: #0078CE;">Active Fonts: ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Fonts . '</span></p>';
							} else {
								echo '<p>Available Fonts: ' . ($TS_VCSC_TotalIconFontsInstalled - 1) . ' / <span style="font-weight: bold; color: #0078CE;">Active Fonts: ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Fonts . '</span></p>';
							}
							echo '<p>Available Icons: ' . number_format($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Total_Icon_Count) . ' / <span style="font-weight: bold; color: #0078CE;">Active Icons: ' . number_format($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_Active_Icon_Count) . '</span></p>';
							if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "true") {
								echo '<p style="text-align: justify;">Need more help? Please contact the developer of your theme as it includes this plugin via extended license.<br/><br/>';
							}
						echo '</div>';
					?>
				</div>
			</div>
		</div>		
	</div>
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-desktop"></i>Quick System Check</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<?php
				if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginPHP == "false") {
					echo '<div class="ts-vcsc-info-field ts-vcsc-critical" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; font-weight: normal; text-align: justify;">';
						echo 'Your server is currently running the outdated PHP version <span style="font-weight: bold;">' . PHP_VERSION . '</span>, which is not sufficient for some of the advanced features and custom post types this
						plugin provides for. In order to use all features, please change your server settings to use at least PHP v5.4.x. WordPress itself recommends using PHP v5.6.0 or higher, as all older PHP versions have been
						officially retired and are unsupported.';				
						if (array_key_exists(substr(PHP_VERSION, 0, 3), $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PHP_End_Of_Life)) {
							echo '<br/><br/><span style="font-weight: bold;">Your current PHP version has officially been retired and deprecated on ' . $VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PHP_End_Of_Life[substr(PHP_VERSION, 0, 3)] . '.</span>';
						}
					echo '</div>';
				}
			?>
			<div class="ts-vcsc-info-field ts-vcsc-warning">The provided summary is using information returned by your server based on php.ini settings. Depending upon your hosting company and hosting package, your server might
			actually provide less memory than requested and shown in the php.ini; please contact your hosting company for more detailed and accurate information.</div>
			<p style="margin: 10px 0 0 0;">Allocated Memory: <?php echo number_format(($memory_allocated / 1024 / 1024), 0); ?>MB</p>
			<p style="margin: 0;">Already Utilized Memory: <?php echo number_format(($memory_peakusage / 1024 / 1024), 0); ?>MB</p>
			<p style="margin: 0;">Remaining Memory: <?php echo number_format(($memory_remaining / 1024 / 1024), 0); ?>MB</p>
			<p style="margin: 0;">Utilization Rate: <?php echo number_format($memory_utilization, 2); ?>%</p>			
			<a class="button-secondary" style="width: 150px; margin: 10px auto 10px auto; text-align: center;" href="admin.php?page=TS_VCSC_System" target="_parent"><img src="<?php echo TS_VCSC_GetResourceURL('images/other/ts_vcsc_system_icon_16x16.png'); ?>" style="width: 16px; height: 16px; margin-right: 10px;">Full System Info</a>
			<?php
				if ($memory_checkup == "true") {
					echo '<div class="ts-vcsc-info-field ts-vcsc-success" style="margin-top: 10px; font-size: 13px; text-align: justify; font-weight: bold;">
						Your site seems to have sufficient PHP memory remaining to use Visual Composer and this add-on without problems. Have in mind that activating additional elements or features of this
						add-on and/or adding new plugins will further increase your memory usage and naturally impact the overall performance of Visual Composer.
					</div>';
				} else {
					echo '<div class="ts-vcsc-info-field ts-vcsc-' . ($memory_minimum == "true" ? "warning" : "critical") . '" style="margin-top: 10px; margin-bottom: 10px; font-size: 13px; text-align: justify; font-weight: bold;">
						Your site is ' . ($memory_minimum == "true" ? "" : "VERY") . ' close to memory exhaustion. You have only ' . (number_format(($memory_remaining / 1024 / 1024), 0)) . 'MB of memory remaining,
						when in idle mode, which might not be enough once you actually edit a page or post with Visual Composer. In general, it is advised to have around ' . (number_format(($memory_recommended / 1024 / 1024), 0)) , 'MB
						of memory remaining, when idling. Depending upon your theme and other activated plugins, that number might actually be more or less.
					</div>';
				}
			?>
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 10px; font-size: 13px; text-align: justify; font-weight: normal;">
				The memory consumption shown above only reflects the current consumption on this particular settings page. Whenever you edit a page or post, the memory consumption will increase significantly, as Visual Composer, this add-on,
				your theme and possibly other active plugins will load additional files that are not loaded outside of any edit pages. To live monitor your memory usage on all admin pages/sections, it is recommended to install this
				free plugin from the WordPress repository: <a href="https://wordpress.org/plugins/query-monitor/" target="_blank">Query Monitor</a>
			</div>	
		</div>
	</div>	
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-show"><i class="dashicons-admin-generic"></i>General Plugin Settings</div>
		<div class="ts-vcsc-section-content">
			<div style="margin-top: 20px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Update-Notification Page:</div>
				<p style="font-size: 12px;">Define whether you want to use the update notification, where the plugin will create a sub-page within the "VC Extensions" menu with information for the available update and instructions; otherwise, check for available updates <a href="http://helpdesk.tekanewascripts.com/freebies-page/" target="_blank">here</a></p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowNotification == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowNotification" class="toggle-check ts_vcsc_extend_settings_allowNotification" name="ts_vcsc_extend_settings_allowNotification" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowNotification); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowNotification == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowNotification == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_translationsDomain">Enable Update Notification Page</label>
			</div>			
			<div id="ts_vcsc_extend_settings_allowNotification_true" style="margin-left: 25px; margin-top: 20px; display: <?php echo ($ts_vcsc_extend_settings_allowNotification == 1 ? "block" : "none"); ?>">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Show Update-Notification Message:</div>
				<p style="font-size: 12px;">Define whether you want to also show an update message, where the plugin will create an addition to the admin menu bar, prominently informing you about the availability of a new update and linking to the update notification page.</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowMenuBarNotice == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowMenuBarNotice" class="toggle-check ts_vcsc_extend_settings_allowMenuBarNotice" name="ts_vcsc_extend_settings_allowMenuBarNotice" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowMenuBarNotice); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowMenuBarNotice == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowMenuBarNotice == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowMenuBarNotice">Show Update Notification Message</label>
			</div>			
			<div style="margin-top: 30px; display: <?php echo ($autoupdate_allowed == "true" ? "block" : "none"); ?>;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Auto-Update Feature:</div>
				<p style="font-size: 12px;">Define whether you want to use the auto-update feature of the plugin, allowing the plugin to be updated through WordPress:</p>
				<div class="ts-vcsc-notice-field ts-vcsc-warning" style="margin-top: 10px; font-size: 13px; text-align: justify;">
					If the auto-update procedure fails, it is most likely because your internal WordPress post size and upload limits and or available PHP memory is not sufficient to handle the size of the update file (retrieval,
					extracting, replacing). In that case, you should update the plugin via manual FTP upload, replacing all existing files on your server.
				</div>	
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowAutoUpdate == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowAutoUpdate" class="toggle-check ts_vcsc_extend_settings_allowAutoUpdate" name="ts_vcsc_extend_settings_allowAutoUpdate" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowAutoUpdate); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowAutoUpdate == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowAutoUpdate == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowAutoUpdate">Enable Auto-Update Feature</label>
			</div>
			<div style="margin-top: <?php echo ($autoupdate_allowed == "true" ? "30" : "10"); ?>px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Placement of Visual Composer Extensions Menu:</div>
				<p style="font-size: 12px;">Define where the menu for this plugin should be placed in WordPress; if disabled, the main menu will be placed in the 'Settings' section:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_mainmenu == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_mainmenu" class="toggle-check ts_vcsc_extend_settings_mainmenu" name="ts_vcsc_extend_settings_mainmenu" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_mainmenu); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_mainmenu == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_mainmenu == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_mainmenu">Give Visual Composer Extensions its own menu</label>
			</div>		
			<div style="margin-top: 30px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Use of Language Domain Translations:</div>
				<p style="font-size: 12px;">Define if the plugin can use its language domain files (stored in the 'locale' folder) in order to automatically be translated into available languages:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_translationsDomain == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_translationsDomain" class="toggle-check ts_vcsc_extend_settings_translationsDomain" name="ts_vcsc_extend_settings_translationsDomain" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_translationsDomain); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_translationsDomain == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_translationsDomain == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_translationsDomain">Use Plugin Language Files</label>
			</div>			
			<div style="margin-top: 30px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Show Dashboard Panel:</div>
				<p style="font-size: 12px;">Define if the plugin should show its dashboard panel with basic plugin information:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_dashboard == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_dashboard" class="toggle-check ts_vcsc_extend_settings_dashboard" name="ts_vcsc_extend_settings_dashboard" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_dashboard); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_dashboard == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_dashboard == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_dashboard">Show Dashboard Panel</label>
			</div>			
			<div style="margin-top: 30px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Always Load + Register Shortcodes:</div>
				<p style="font-size: 12px;">Define if the plugin should always load and register its associated shortcodes:</p>
				<div class="ts-vcsc-notice-field ts-vcsc-warning" style="margin-top: 10px; font-size: 13px; text-align: justify;">
					By default, the plugin will only load and register its associated shortcode definitions when rendering a page on the frontend, but not while viewing the backend (admin) section of WordPress. If you are using
					other plugins that for some reason load and process page/post content from within their backend sections, it might be necessary to load and process shortcode definitions even on the backend part of your website.
					If so, simply enable the option below, and the plugin will load and process its shortcode definitions at all times. Please be aware that enabling this option will automatically increase the memory requirements of
					the plugin when using the WordPress admin section (increase will depend upon number of enabled elements).
				</div>				
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_shortcodesalways == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_shortcodesalways" class="toggle-check ts_vcsc_extend_settings_shortcodesalways" name="ts_vcsc_extend_settings_shortcodesalways" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_shortcodesalways); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_shortcodesalways == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_shortcodesalways == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_dashboard">Always Load + Register Shortcodes</label>
			</div>			
			<div style="margin-top: 30px; margin-bottom: 60px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Priority for Output of JS Variables:</div>
				<p style="font-size: 12px;">Define the priority WordPress should use when outputting plugin settings as JS variables:</p>
				<div class="ts-vcsc-notice-field ts-vcsc-warning" style="margin-top: 10px; font-size: 13px; text-align: justify;">
					Some of the plugin settings control how certain JavaScript functions on the frontend work. In order to do so, those settings must be outputted on each page (using the HEAD section of the page), while at the same
					time ensuring that the variables have been generated BEFORE any respective JS function needs it. By default, the plugin will give the variable output a priority of 6, which is the right priority for most websites.
					But if you use a caching plugin for example, the order in which JS files are loaded might be changed, sometimes requiring a different priority for the variable output, which you can change using the option below.
				</div>	
				<div class="ts-nouislider-input-slider">
					<input style="width: 100px; float: left; margin-left: 0px; margin-right: 10px;" name="ts_vcsc_extend_settings_variablesPriority" id="ts_vcsc_extend_settings_variablesPriority" class="ts_vcsc_extend_settings_variablesPriority ts-nouislider-serial nouislider-input-selector nouislider-input-composer" type="number" min="1" max="999" step="1" value="<?php echo $ts_vcsc_extend_settings_variablesPriority; ?>"/>
					<span style="float: left; margin-right: 30px; margin-top: 10px;" class="unit"></span>
					<div id="ts_vcsc_extend_settings_variablesPriority_slider" class="ts-nouislider-input ts-nouislider-settings-element" data-value="<?php echo $ts_vcsc_extend_settings_variablesPriority; ?>" data-min="1" data-max="999" data-decimals="0" data-step="1" style="width: 250px; float: left; margin-top: 10px;"></div>
				</div>
			</div>
		</div>		
	</div>
	<div class="ts-vcsc-section-main" style="display: <?php echo ((version_compare(PHP_VERSION, '5.2.0') >= 0) ? "block" : "none"); ?>;">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-googleplus"></i>Google Fonts Manager</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-notice-field ts-vcsc-success" style="margin-top: 10px; font-size: 13px; text-align: justify;">
				Some elements allow you to assign a custom font to titles or content sections of the element. By default, the add-on will give you access to currently <?php echo $Count_Fonts; ?> different Google Fonts. If that is simply too much for you,
				the built-in Google Fonts Manager will allow you to define your custom set of Google Fonts by simply selecting the fonts you want to use, while leaving all other disabled. You can even assign fonts to a "favorite"
				list so that those fonts will always be listed first in the element settings.
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Google Fonts Manager:</div>
				<p style="font-size: 12px;">Enable or disable the use of the Google Fonts Manager:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowGoogleManager == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowGoogleManager" class="toggle-check ts_vcsc_extend_settings_allowGoogleManager" name="ts_vcsc_extend_settings_allowGoogleManager" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowGoogleManager); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowGoogleManager == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowGoogleManager == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowGoogleManager">Enable Google Fonts Manager</label>
			</div>
		</div>
	</div>	
	<?php
	if ((($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "true") && (get_option('ts_vcsc_extend_settings_iconicum', 1) == 1)) || (($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginExtended == "false") && ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginValid == "true"))) {
		if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_IconicumStandard == "false") { ?>
			<div class="ts-vcsc-section-main">
				<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-awards"></i>Iconicum - Font Icon Generator</div>
				<div class="ts-vcsc-section-content slideFade" style="display: none;">
					<div class="ts-vcsc-notice-field ts-vcsc-success" style="margin-top: 10px; font-size: 13px; text-align: justify;">
						"Composium - Visual Composer Extensions" includes a customized version of our plugin "Iconicum - WordPress Icon Fonts". This plugin allows you to use all the font icons that come with "Composium - Visual Composer Extensions"
						outside of the elements that can utilize icons. By using the provided icon generator, you can easily generate icon shortcodes and use those shortcodes anywhere on your site where a standard tinyMCE editor
						field is provided to you.
					</div>					
					<div style="margin-top: 10px; margin-bottom: 20px;">
						<div style="font-weight: bold; font-size: 14px; margin: 0;">Provide Menu Shortcode Generator for Font Icons:</div>
						<p style="font-size: 12px;">Adds an icon shortcode generator to the settings menu:</p>
						<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_useMenuGenerator == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
							<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_useMenuGenerator" class="toggle-check ts_vcsc_extend_settings_useMenuGenerator" name="ts_vcsc_extend_settings_useMenuGenerator" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_useMenuGenerator); ?>/>
							<div class="toggle toggle-light" style="width: 80px; height: 20px;">
								<div class="toggle-slide">
									<div class="toggle-inner">
										<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_useMenuGenerator == 1 ? 'active' : ''); ?>">Yes</div>
										<div class="toggle-blob"></div>
										<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_useMenuGenerator == 0 ? 'active' : ''); ?>">No</div>
									</div>
								</div>
							</div>
						</div>
						<label class="labelToggleBox" for="ts_vcsc_extend_settings_useMenuGenerator">Enable Menu Font Icon Generator</label>
					</div>					
					<div style="margin-top: 10px; margin-bottom: 10px;">
						<div style="font-weight: bold; font-size: 14px; margin: 0;">Provide tinyMCE Shortcode Generator for Font Icons:</div>
						<p style="font-size: 12px;">Adds a shortcode generator button to any standard tinyMCE editor menu to embed font icons directly into the text editor:</p>
						<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_useIconGenerator == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
							<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_useIconGenerator" class="toggle-check ts_vcsc_extend_settings_useIconGenerator" name="ts_vcsc_extend_settings_useIconGenerator" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_useIconGenerator); ?>/>
							<div class="toggle toggle-light" style="width: 80px; height: 20px;">
								<div class="toggle-slide">
									<div class="toggle-inner">
										<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_useIconGenerator == 1 ? 'active' : ''); ?>">Yes</div>
										<div class="toggle-blob"></div>
										<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_useIconGenerator == 0 ? 'active' : ''); ?>">No</div>
									</div>
								</div>
							</div>
						</div>
						<label class="labelToggleBox" for="ts_vcsc_extend_settings_useIconGenerator">Enable tinyMCE Font Icon Generator</label>
					</div>			
					<div id="ts_vcsc_extend_settings_useIconGenerator_true" style="margin-top: 10px; margin-bottom: 10px; margin-left: 25px; <?php echo ($ts_vcsc_extend_settings_useIconGenerator == 0 ? 'display: none;' : 'display: block;'); ?>">
						<h4>Placement of Shortcode Generator Button:</h4>
						<p style="font-size: 12px;">If the option is disabled, the button will be placed into the tinyMCE menu bar instead:</p>
						<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_useTinyMCEMedia == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
							<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_useTinyMCEMedia" class="toggle-check ts_vcsc_extend_settings_useTinyMCEMedia" name="ts_vcsc_extend_settings_useTinyMCEMedia" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_useTinyMCEMedia); ?>/>
							<div class="toggle toggle-light" style="width: 80px; height: 20px;">
								<div class="toggle-slide">
									<div class="toggle-inner">
										<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_useTinyMCEMedia == 1 ? 'active' : ''); ?>">Yes</div>
										<div class="toggle-blob"></div>
										<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_useTinyMCEMedia == 0 ? 'active' : ''); ?>">No</div>
									</div>
								</div>
							</div>
						</div>
						<label class="labelToggleBox" for="ts_vcsc_extend_settings_useTinyMCEMedia">Place Generator Button next to "Add Media" Button</span></label>
					</div>
				</div>
			</div>
	<?php } else { ?>
		<div class="ts-vcsc-section-main">
			<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-awards"></i>Iconicum - Font Icon Generator</div>
			<div class="ts-vcsc-section-content slideFade" style="display: none;">
				<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 10px; font-size: 13px; text-align: justify;">
					"Iconicum - WordPress Icon Fonts" is already installed and activated as standalone plugin. Therefore, the version that is included with "Composium - Visual Composer Extensions" has been disabled in order to prevent conflicts.
				</div>	
				
			</div>
		</div>
	<?php }} ?>
	<div class="ts-vcsc-section-main" style="display: <?php echo ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_PluginPHP == "true" ? "block" : "none"); ?>;">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-clock"></i>Website Downtime Manager (BETA)</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; text-align: justify;">
				The website downtime manager (BETA) allows you to create custom downtime (offline/maintenance) pages, using Visual Composer, and to place your website into a downtime/maintenance mode, during which your custom page will be shown.
				Enabling the downtime manager will provide you with a new custom post type "VC Downpages" to create your downtime page, and a new menu entry in your "VC Extensions" menu to manage your scheduled downtime. While this feature has been
				thoroughly tested from a developers perspective and has been found to be working exactly as intended, we require some feedback from actual end users before officially moving it out of its BETA stage; after all, every site and server
				setup is a little different.
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Website Downtime Manager + Post Type:</div>
				<p style="font-size: 12px;">Enable the website downtime manager to easily and quickly put your website into downtime (maintenance) mode, while showing a custom page to your visitors:</p>
				<div class="ts-switch-button ts-composer-switch ts-downtime-manager-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowDowntimeManager == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowDowntimeManager" class="toggle-check ts_vcsc_extend_settings_allowDowntimeManager" name="ts_vcsc_extend_settings_allowDowntimeManager" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowDowntimeManager); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowDowntimeManager == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowDowntimeManager == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowDowntimeManager">Enable Website Downtime Manager + Post Type</label>
			</div>
		</div>
	</div>	
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-welcome-widgets-menus"></i>Widget Sidebars Manager</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; text-align: justify;">
				If the number of widget sidebars that is provided by your theme and any other plugins isn't sufficient for you, enable the "Widget Sidebars Manager" here, which will allow you to create up to 25 additional sidebars.
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Widget Sidebars Manager:</div>
				<p style="font-size: 12px;">Enable the widget sidebars manager to easily and quickly add more widget sidebars to your site:</p>
				<div class="ts-switch-button ts-composer-switch ts-downtime-manager-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowSidebarsManager == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowSidebarsManager" class="toggle-check ts_vcsc_extend_settings_allowSidebarsManager" name="ts_vcsc_extend_settings_allowSidebarsManager" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowSidebarsManager); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowSidebarsManager == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowSidebarsManager == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowSidebarsManager">Enable Widget Sidebars Manager</label>
			</div>
		</div>
	</div>
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-editor-code"></i>Shortcodes in Widgets (Sidebars)</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; text-align: justify;">
				By default, WordPress does not allow you to use shortcodes when using the text widget in any sidebar, although it is actually possible. The setting below will allow you to enable/disable that otherwise hidden feature.
				However, if you notice any additional paragraphs in widget output that comes from other plugins or your theme (which can make that output invalid, particularly when it is JS code), you should keep this feature deactivated.
				<strong>Please not that other plugins or your theme can overwrite that setting, depending upon when it is called upon.</strong>
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Shortcodes in Widgets:</div>
				<p style="font-size: 12px;">Allow the usage of shortcodes with the standard text widget in WordPress:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowShortcodesWidgets == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowShortcodesWidgets" class="toggle-check ts_vcsc_extend_settings_allowShortcodesWidgets" name="ts_vcsc_extend_settings_allowShortcodesWidgets" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowShortcodesWidgets); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowShortcodesWidgets == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowShortcodesWidgets == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowShortcodesWidgets">Enable Shortcodes in Widgets</label>
			</div>
		</div>
	</div>	
	<div class="ts-vcsc-section-main">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-editor-paragraph"></i>WordPress Auto-Paragraph Routine</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; text-align: justify;">
				By default, WordPress will attempt to wrap any content that is not already wrapped with a valid HTML wrapper (DIV, P, SPAN, etc.) with a paragraph wrap (P), which can sometimes cause issues whenver content is not meant
				to be wrapped at all. In those cases, you can deactivate the auto-paragraph wrapper below. <strong>Please not that other plugins or your theme can overwrite that setting, depending upon when it is called upon.</strong>
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Enable Auto-Paragraph Routine:</div>
				<p style="font-size: 12px;">Allow WordPress to process its auto-paragrpah routines for content and excerpts:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_allowAutoParagraphs == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_allowAutoParagraphs" class="toggle-check ts_vcsc_extend_settings_allowAutoParagraphs" name="ts_vcsc_extend_settings_allowAutoParagraphs" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_allowAutoParagraphs); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_allowAutoParagraphs == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_allowAutoParagraphs == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_allowAutoParagraphs">Enable Auto-Paragraph Routine</label>
			</div>
		</div>
	</div>	
	<div class="ts-vcsc-section-main" style="display: none;">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide"><i class="dashicons-image-flip-vertical"></i>Page Smooth Scroll (BETA)</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div class="ts-vcsc-info-field ts-vcsc-warning" style="margin-top: 20px; margin-bottom: 20px; font-size: 13px; text-align: justify;">
				If your theme or another active plugin already provides a smooth scroll routine, do NOT activate this feature, as you will otherwise create conflicting scroll callbacks, which can severaly impact the scroll behavior of your pages.
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<div style="font-weight: bold; font-size: 14px; margin: 0;">Smooth Scroll for Pages:</div>
				<p style="font-size: 12px;">Extend all pages with Smooth Scroll Feature (will not be applied on mobile devices); do not use if your theme or another plugin is already implementing a smooth scroll feature:</p>
				<div class="ts-switch-button ts-composer-switch" data-value="<?php echo ($ts_vcsc_extend_settings_additionsSmoothScroll == 1 ? 'true' : 'false'); ?>" data-width="80" data-style="compact" data-on="Yes" data-off="No" style="float: left; margin-right: 10px;">
					<input type="checkbox" style="display: none; " id="ts_vcsc_extend_settings_additionsSmoothScroll" class="toggle-check ts_vcsc_extend_settings_additionsSmoothScroll" name="ts_vcsc_extend_settings_additionsSmoothScroll" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_additionsSmoothScroll); ?>/>
					<div class="toggle toggle-light" style="width: 80px; height: 20px;">
						<div class="toggle-slide">
							<div class="toggle-inner">
								<div class="toggle-on <?php echo ($ts_vcsc_extend_settings_additionsSmoothScroll == 1 ? 'active' : ''); ?>">Yes</div>
								<div class="toggle-blob"></div>
								<div class="toggle-off <?php echo ($ts_vcsc_extend_settings_additionsSmoothScroll == 0 ? 'active' : ''); ?>">No</div>
							</div>
						</div>
					</div>
				</div>
				<label class="labelToggleBox" for="ts_vcsc_extend_settings_additionsSmoothScroll">Extend Pages with Smooth Scroll</label>
			</div>
		</div>
	</div>	
	<div class="ts-vcsc-section-main" style="display: none;">
		<div class="ts-vcsc-section-title ts-vcsc-section-hide">Other Settings</div>
		<div class="ts-vcsc-section-content slideFade" style="display: none;">
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<h4>Viewing Device Detection:</h4>
				<p style="font-size: 12px;">Enable or disable the use of the Device Detection:</p>
				<input type="hidden" name="ts_vcsc_extend_settings_loadDetector" value="0" />
				<input type="checkbox" name="ts_vcsc_extend_settings_loadDetector" id="ts_vcsc_extend_settings_loadDetector" value="1" <?php echo checked('1', $ts_vcsc_extend_settings_loadDetector); ?> />
				<label class="labelCheckBox" for="ts_vcsc_extend_settings_loadDetector">Use Device Detection</label>
			</div>
		</div>
	</div>
</div>