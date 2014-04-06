<?php

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Get the IF of the slider
	$id = (int) $_GET['id'];

	// Get slider
	$slider = $wpdb->get_row("SELECT * FROM $table_name WHERE id = ".(int)$id." ORDER BY date_c DESC LIMIT 1" , ARRAY_A);
	$slider = json_decode($slider['data'], true);

?>
<div id="ls-sample">
	<div class="ls-box ls-layer-box">
		<input type="hidden" name="layerkey" value="0">
		<table>
			<thead class="ls-layer-options-thead">
				<tr>
					<td colspan="7">
						<span id="ls-icon-layer-options"></span>
						<h4>
							Layer Options
							<a href="#" class="duplicate ls-layer-duplicate">Duplicate this layer</a>
						</h4>
					</td>
				</tr>
			</thead>
			<tbody class="ls-slide-options">
				<tr>
					<td class="right">Slide options</td>
					<td class="right">Background</td>
					<td>
						<div class="reset-parent">
							<input type="text" name="background" class="ls-upload" value="">
							<span class="ls-reset">x</span>
						</div>
					</td>
					<td class="right">Direction</td>
					<td>
						<select name="slidedirection">
							<option>top</option>
							<option selected="selecter">right</option>
							<option>bottom</option>
							<option>left</option>
						</select>
					</td>
					<td class="right">Delay</td>
					<td><input type="text" name="slidedelay" value="4000"> (ms)</td>
				</tr>
				<tr>
					<td class="right">Slide in animation</td>
					<td class="right">Duration</td>
					<td><input type="text" name="durationin" value="1500"> (ms)</td>
					<td class="right">Easing</td>
					<td>
						<select name="easingin">
							<option>linear</option>
							<option>swing</option>
							<option>easeInQuad</option>
							<option>easeOutQuad</option>
							<option>easeInOutQuad</option>
							<option>easeInCubic</option>
							<option>easeOutCubic</option>
							<option>easeInOutCubic</option>
							<option>easeInQuart</option>
							<option>easeOutQuart</option>
							<option>easeInOutQuart</option>
							<option>easeInQuint</option>
							<option>easeOutQuint</option>
							<option selected="selected">easeInOutQuint</option>
							<option>easeInSine</option>
							<option>easeOutSine</option>
							<option>easeInOutSine</option>
							<option>easeInExpo</option>
							<option>easeOutExpo</option>
							<option>easeInOutExpo</option>
							<option>easeInCirc</option>
							<option>easeOutCirc</option>
							<option>easeInOutCirc</option>
							<option>easeInElastic</option>
							<option>easeOutElastic</option>
							<option>easeInOutElastic</option>
							<option>easeInBack</option>
							<option>easeOutBack</option>
							<option>easeInOutBack</option>
							<option>easeInBounce</option>
							<option>easeOutBounce</option>
							<option>easeInOutBounce</option>
						</select>
					</td>
					<td class="right">Delay</td>
					<td><input type="text" name="delayin" value="0"> (ms)</td>
				</tr>
				<tr>
					<td class="right">Slide out animation</td>
					<td class="right">Duration</td>
					<td><input type="text" name="durationout" value="1500"> (ms)</td>
					<td class="right">Easing</td>
					<td>
						<select name="easingout">
							<option>linear</option>
							<option>swing</option>
							<option>easeInQuad</option>
							<option>easeOutQuad</option>
							<option>easeInOutQuad</option>
							<option>easeInCubic</option>
							<option>easeOutCubic</option>
							<option>easeInOutCubic</option>
							<option>easeInQuart</option>
							<option>easeOutQuart</option>
							<option>easeInOutQuart</option>
							<option>easeInQuint</option>
							<option>easeOutQuint</option>
							<option selected="selected">easeInOutQuint</option>
							<option>easeInSine</option>
							<option>easeOutSine</option>
							<option>easeInOutSine</option>
							<option>easeInExpo</option>
							<option>easeOutExpo</option>
							<option>easeInOutExpo</option>
							<option>easeInCirc</option>
							<option>easeOutCirc</option>
							<option>easeInOutCirc</option>
							<option>easeInElastic</option>
							<option>easeOutElastic</option>
							<option>easeInOutElastic</option>
							<option>easeInBack</option>
							<option>easeOutBack</option>
							<option>easeInOutBack</option>
							<option>easeInBounce</option>
							<option>easeOutBounce</option>
							<option>easeInOutBounce</option>
						</select>
					</td>
					<td class="right">Delay</td>
					<td><input type="text" name="delayout" value="0"> (ms)</td>
				</tr>
				<tr>
					<td class="right">Misc</td>
					<td class="right">#ID</td>
					<td><input type="text" name="id" value=""></td>
					<td class="right">Deeplink</td>
					<td><input type="text" name="deeplink"></td>
					<td class="right">Hidden</td>
					<td><input type="checkbox" name="skip" class="checkbox"></td>
				</tr>
				<tr>
					<td class="right">Navigation</td>
					<td class="right">Thumbnail</td>
					<td colspan="5">
						<div class="reset-parent">
							<input type="text" name="thumbnail" class="ls-upload" value="">
							<span class="ls-reset">x</span>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<td>
						<span id="ls-icon-preview"></span>
						<h4>Preview</h4>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="ls-preview-td">
						<div class="ls-preview-wrapper">
							<div class="ls-preview">
								<div class="draggable"></div>
							</div>
							<div class="ls-real-time-preview"></div>
							<button class="button ls-preview-button">Enter Preview</button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<td>
						<span id="ls-icon-sublayers"></span>
						<h4>Sublayers</h4>
					</td>
				</tr>
			</thead>
			<tbody class="ls-sublayers ls-sublayer-sortable">
				<tr>
					<td>
						<div class="ls-sublayer-wrapper">
							<span class="ls-sublayer-number">1</span>
							<span class="ls-highlight"><input type="checkbox"></span>
							<input type="text" name="subtitle" class="ls-sublayer-title" value="Sublayer #1">
							<div class="clear"></div>
							<div class="ls-sublayer-nav">
								<a href="#" class="active">Basic</a>
								<a href="#">Options</a>
								<a href="#">Link</a>
								<a href="#">Style</a>
								<a href="#">Attributes</a>
								<a href="#" title="Remove this sublayer" class="remove">x</a>
							</div>
							<div class="ls-sublayer-pages">
								<div class="ls-sublayer-page ls-sublayer-basic active">
									<select name="type">
										<option selected="selected">img</option>
										<option>div</option>
										<option>p</option>
										<option>span</option>
										<option>h1</option>
										<option>h2</option>
										<option>h3</option>
										<option>h4</option>
										<option>h5</option>
										<option>h6</option>
									</select>

									<div class="ls-sublayer-types">
										<span class="ls-type">
											<span class="ls-icon-img"></span><br>
											Image
										</span>

										<span class="ls-type">
											<span class="ls-icon-div"></span><br>
											Div
										</span>

										<span class="ls-type">
											<span class="ls-icon-p"></span><br>
											Paragraph
										</span>

										<span class="ls-type">
											<span class="ls-icon-span"></span><br>
											Span
										</span>

										<span class="ls-type">
											<span class="ls-icon-h1"></span><br>
											H1
										</span>

										<span class="ls-type">
											<span class="ls-icon-h2"></span><br>
											H2
										</span>

										<span class="ls-type">
											<span class="ls-icon-h3"></span><br>
											H3
										</span>

										<span class="ls-type">
											<span class="ls-icon-h4"></span><br>
											H4
										</span>

										<span class="ls-type">
											<span class="ls-icon-h5"></span><br>
											H5
										</span>

										<span class="ls-type">
											<span class="ls-icon-h6"></span><br>
											H6
										</span>
									</div>

									<div class="ls-image-uploader">
										<img src="<?php echo plugins_url('/img/transparent.png', __FILE__) ?>" alt="sublayer image">
										<input type="text" name="image" class="ls-upload" value="">
										<p>
											Click into this text field to open WordPress
											Media Library where you can upload new images
											or select previously used ones.
										</p>
									</div>
									<div class="ls-html-code">
										<h5>Custom HTML content</h5>
										<textarea name="html" cols="50" rows="5"></textarea>
									</div>
								</div>
								<div class="ls-sublayer-page ls-sublayer-options">
									<table>
										<tbody>
											<tr>
												<td>Slide in animation</td>
												<td class="right">Direction</td>
												<td>
													<select name="slidedirection">
														<option>auto</option>
														<option>fade</option>
														<option>top</option>
														<option>right</option>
														<option>bottom</option>
														<option>left</option>
													</select>
												</td>
												<td class="right">Duration</td>
												<td><input type="text" name="durationin" value="1500"> (ms)</td>
												<td class="right">Easing</td>
												<td>
													<select name="easingin">
														<option>linear</option>
														<option>swing</option>
														<option>easeInQuad</option>
														<option>easeOutQuad</option>
														<option>easeInOutQuad</option>
														<option>easeInCubic</option>
														<option>easeOutCubic</option>
														<option>easeInOutCubic</option>
														<option>easeInQuart</option>
														<option>easeOutQuart</option>
														<option>easeInOutQuart</option>
														<option>easeInQuint</option>
														<option>easeOutQuint</option>
														<option selected="selected">easeInOutQuint</option>
														<option>easeInSine</option>
														<option>easeOutSine</option>
														<option>easeInOutSine</option>
														<option>easeInExpo</option>
														<option>easeOutExpo</option>
														<option>easeInOutExpo</option>
														<option>easeInCirc</option>
														<option>easeOutCirc</option>
														<option>easeInOutCirc</option>
														<option>easeInElastic</option>
														<option>easeOutElastic</option>
														<option>easeInOutElastic</option>
														<option>easeInBack</option>
														<option>easeOutBack</option>
														<option>easeInOutBack</option>
														<option>easeInBounce</option>
														<option>easeOutBounce</option>
														<option>easeInOutBounce</option>
													</select>
												</td>
												<td class="right">Delay</td>
												<td><input type="text" name="delayin" value="0"> (ms)</td>
											</tr>

											<tr>
												<td>Slide out animation</td>
												<td class="right">Direction</td>
												<td>
													<select name="slideoutdirection">
														<option>auto</option>
														<option>fade</option>
														<option>top</option>
														<option>right</option>
														<option>bottom</option>
														<option>left</option>
													</select>
												</td>
												<td class="right">Duration</td>
												<td><input type="text" name="durationout" value="1500"> (ms)</td>
												<td class="right">Easing</td>
												<td>
													<select name="easingout">
														<option>linear</option>
														<option>swing</option>
														<option>easeInQuad</option>
														<option>easeOutQuad</option>
														<option>easeInOutQuad</option>
														<option>easeInCubic</option>
														<option>easeOutCubic</option>
														<option>easeInOutCubic</option>
														<option>easeInQuart</option>
														<option>easeOutQuart</option>
														<option>easeInOutQuart</option>
														<option>easeInQuint</option>
														<option>easeOutQuint</option>
														<option selected="selected">easeInOutQuint</option>
														<option>easeInSine</option>
														<option>easeOutSine</option>
														<option>easeInOutSine</option>
														<option>easeInExpo</option>
														<option>easeOutExpo</option>
														<option>easeInOutExpo</option>
														<option>easeInCirc</option>
														<option>easeOutCirc</option>
														<option>easeInOutCirc</option>
														<option>easeInElastic</option>
														<option>easeOutElastic</option>
														<option>easeInOutElastic</option>
														<option>easeInBack</option>
														<option>easeOutBack</option>
														<option>easeInOutBack</option>
														<option>easeInBounce</option>
														<option>easeOutBounce</option>
														<option>easeInOutBounce</option>
													</select>
												</td>
												<td class="right">Delay</td>
												<td><input type="text" name="delayout" value="0"> (ms)</td>
											</tr>

											<tr>
												<td>Other options</td>
												<td class="right">P. Level</td>
												<td><input type="text" name="level" value="2"></td>
												<td class="right">Show until</td>
												<td><input type="text" name="showuntil" value="0"> (ms)</td>
												<td class="right">Hidden</td>
												<td><input type="checkbox" name="skip" class="checkbox"></td>
												<td colspan="3"><button class="button duplicate">Duplicate this sublayer</button></td>
											</tr>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-link">
									<table>
										<tbody>
											<tr>
												<td>URL</td>
												<td class="url"><input type="text" name="url" value=""></td>
												<td>
													<select name="target">
														<option>_self</option>
														<option>_blank</option>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-style">
									<table>
										<tbody>
											<tr>
												<td>Style settings</td>
												<td class="right">Top</td>
												<td><input type="text" name="top" value="0"></td>
												<td class="right">Left</td>
												<td><input type="text" name="left" value="0"></td>
												<td class="right">Word-wrap</td>
												<td><input type="checkbox" name="wordwrap" class="checkbox"></td>
											</tr>
											<tr>
												<td>Custom style settings</td>
												<td class="right">Custom styles</td>
												<td colspan="4"><textarea rows="5" cols="50" name="style" class="style"></textarea></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-attributes">
									<table>
										<tbody>
											<tr>
												<td>Attributes</td>
												<td class="right">ID</td>
												<td><input type="text" name="id" value=""></td>
												<td class="right">Classes</td>
												<td><input type="text" name="class" value=""></td>
												<td class="right">Title</td>
												<td><input type="text" name="title" value=""></td>
												<td class="right">Alt</td>
												<td><input type="text" name="alt" value=""></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<a href="#" class="ls-add-sublayer">Add new sublayer</a>
	</div>
</div>

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" class="wrap" id="ls-slider-form">

	<input type="hidden" name="posted_edit" value="1">

	<!-- Title -->
	<div class="ls-icon-layers"></div>
	<h2>
		Edit this LayerSlider
		<a href="?page=layerslider" class="add-new-h2">Back to the list</a>
	</h2>

	<!-- Main menu bar -->
	<div id="ls-main-nav-bar">
		<a href="#" class="settings">Global Settings</a>
		<a href="#" class="layers active">Layers</a>
		<a href="#" class="callbacks">Event Callbacks</a>
		<a href="#" class="support unselectable">Documentation</a>
		<a href="#" class="clear unselectable"></a>
	</div>

	<!-- Pages -->
	<div id="ls-pages">

		<!-- Global Settings -->
		<div class="ls-page ls-settings">

			<div id="post-body-content">
				<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="title" value="<?php echo $slider['properties']['title'] ?>" id="title" autocomplete="off" placeholder="Type your slider name here">
					</div>
				</div>
			</div>

			<div class="ls-box">
				<h3 class="header">Global Settings</h3>
				<table>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-basic"></span>
								<h4>Basic</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Slider width</td>
							<td><input type="text" name="width" value="<?php echo $slider['properties']['width'] ?>" class="input"></td>
							<td class="desc">(px) The slider width in pixels. For compatibility reasons, we still support percentage values, but for responsive layout, you should use pixels.</td>
						</tr>
						<tr>
							<td>Slider height</td>
							<td><input type="text" name="height" value="<?php echo $slider['properties']['height'] ?>" class="input"></td>
							<td class="desc">(px) The slider height in pixels. </td>
						</tr>
						<tr>
							<td>Responsive</td>
							<td><input type="checkbox" name="responsive" <?php echo isset($slider['properties']['responsive']) ? 'checked="checked"' : '' ?>></td>
							<td class="desc">Enable this option to turn LayerSlider into a responsive slider.</td>
						</tr>
						<tr>
							<td>Full-width slider</td>
							<td><input type="checkbox" name="forceresponsive" <?php echo ( isset($slider['properties']['forceresponsive']) && $slider['properties']['forceresponsive'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">When you are using a responsiveness or percentage dimensions for the slider, it will respond the parent element size changes. With tis option you can bypass this behaviour and LayerSlider will be a full-width slider.</td>
						</tr>
						<tr>
							<td>Responsive under</td>
							<td><input type="text" name="responsiveunder" value="<?php echo !empty($slider['properties']['responsiveunder']) ? $slider['properties']['responsiveunder'] : '0' ?>"></td>
							<td class="desc">(px) You can force the slider to change automatically into responsive mode but only if the slider width is smaller than responsiveUnder pixels. It can be used if you need a full-width slider with fixed height but you also need it to be responsive if the browser is smaller... Important! If you enter a value higher than 0, the normal responsive mode will be switched off automatically!</td>
						</tr>
						<tr>
							<td>Sublayer Container</td>
							<td><input type="text" name="sublayercontainer" value="<?php echo !empty($slider['properties']['sublayercontainer']) ? $slider['properties']['sublayercontainer'] : '0' ?>"></td>
							<td class="desc">(px) This feature is needed if you are using a full-width slider and you need that your sublayers forced to positioning inside a centered custom width container. Just specify the width of this container in pixels! Note, that this feature is working only with pixel-positioned sublayers, but of course if you add left: 50% position to a sublayer it will be positioned horizontally to the center, as before!</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-slideshow"></span>
								<h4>Slideshow</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Automatically start slideshow</td>
							<td><input type="checkbox" name="autostart" <?php echo ( isset($slider['properties']['autostart']) && $slider['properties']['autostart'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, slideshow will automatically start after loading the page.</td>
						</tr>
						<tr>
							<td>Pause on hover</td>
							<td><input type="checkbox" name="pauseonhover" <?php echo ( isset($slider['properties']['pauseonhover']) && $slider['properties']['pauseonhover'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">Slideshow will pause when mouse pointer is over LayerSlider.</td>
						</tr>
						<tr>
							<td>First layer</td>
							<td><input type="text" name="firstlayer" value="<?php echo $slider['properties']['firstlayer'] ?>" class="input"></td>
							<td class="desc">LayerSlider will start with this layer (you can type the word <i>random</i> if you want the slider to start with a random layer).</td>
						</tr>
						<tr>
							<td>Animate first layer</td>
							<td><input type="checkbox" name="animatefirstlayer" <?php echo ( isset($slider['properties']['animatefirstlayer']) && $slider['properties']['animatefirstlayer'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, first layer will animate (slide in) instead of fading</td>
						</tr>
						<tr>
							<td>Random slideshow</td>
							<td><input type="checkbox" name="randomslideshow" <?php echo ( isset($slider['properties']['randomslideshow']) && $slider['properties']['randomslideshow'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"> LayerSlider will change to a random layer instead of changing to the next / prev layer. Note that 'loops' feature won't work with this option.</td>
						</tr>
						<tr>
							<td>Two way slideshow</td>
							<td><input type="checkbox" name="twowayslideshow" <?php echo ( isset($slider['properties']['twowayslideshow']) && $slider['properties']['twowayslideshow'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, slideshow will go backwards if you click the prev button.</td>
						</tr>
						<tr>
							<td>Loops</td>
							<td>
								<select name="loops">
									<?php for($c = 0; $c < 11; $c++) : ?>
									<?php if($slider['properties']['loops'] == $c) { ?>
									<option selected="selected"><?php echo $c ?></option>
									<?php } else {  ?>
									<option><?php echo $c ?></option>
									<?php } ?>
									<?php endfor; ?>
								</select>
							</td>
							<td class="desc">Number of loops if automatically start slideshow is enabled (0 means infinite!)</td>
						</tr>
						<tr>
							<td>Force the number of loops</td>
							<td><input type="checkbox" name="forceloopnum" <?php echo ( isset($slider['properties']['forceloopnum']) && $slider['properties']['forceloopnum'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, the slider will always stop at the given number of loops even if the user restarts the slideshow.</td>
						</tr>
						<tr>
							<td>Automatically play videos</td>
							<td><input type="checkbox" name="autoplayvideos" <?php echo ( isset($slider['properties']['autoplayvideos']) && $slider['properties']['autoplayvideos'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, the slider will automatically play youtube and vimeo videos.</td>
						</tr>
						<tr>
							<td>Automatically pause slideshow</td>
							<td>
								<select name="autopauseslideshow">
									<option <?php echo ($slider['properties']['autopauseslideshow'] == 'auto') ? 'selected="selected"' : '' ?>>auto</option>
									<option <?php echo ($slider['properties']['autopauseslideshow'] == 'enabled') ? 'selected="selected"' : '' ?>>enabled</option>
									<option <?php echo ($slider['properties']['autopauseslideshow'] == 'disabled') ? 'selected="selected"' : '' ?>>disabled</option>
								</select>
							</td>
							<td class="desc">If you enabled automatically play videos, the auto value means that the slideshow will stop UNTIL the video is playing and after that it continues. Enabled means slideshow will stop and it won't continue after video is played.</td>
						</tr>
						<tr>
							<td>Youtube preview</td>
							<td>
								<select name="youtubepreview">
									<option <?php echo ($slider['properties']['youtubepreview'] == 'maxresdefault.jpg') ? 'selected="selected"' : '' ?>>maxresdefault.jpg</option>
									<option <?php echo ($slider['properties']['youtubepreview'] == 'hqdefault.jpg') ? 'selected="selected"' : '' ?>>hqdefault.jpg</option>
									<option <?php echo ($slider['properties']['youtubepreview'] == 'mqdefault.jpg') ? 'selected="selected"' : '' ?>>mqdefault.jpg</option>
									<option <?php echo ($slider['properties']['youtubepreview'] == 'default.jpg') ? 'selected="selected"' : '' ?>>default.jpg</option>
								</select>
							</td>
							<td class="desc">Default thumbnail picture of YouTube videos. Can be maxresdefault.jpg, hqdefault.jpg, mqdefault.jpg or default.jpg. Note, that maxresdefault.jpg is not available to all (not HD) videos.</td>
						</tr>
						<tr>
							<td>Keyboard navigation</td>
							<td><input type="checkbox" name="keybnav" <?php echo ( isset($slider['properties']['keybnav']) && $slider['properties']['keybnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">You can navigate with the left and right arrow keys.</td>
						</tr>
						<tr>
							<td>Touch navigation</td>
							<td><input type="checkbox" name="touchnav" <?php echo ( isset($slider['properties']['touchnav']) && $slider['properties']['touchnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">Touch-control (on mobile devices).</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-appearance"></span>
								<h4>Appearance</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Skin</td>
							<td>
								<select name="skin">
									<?php $handle = opendir(dirname(__FILE__) . '/skins'); ?>
									<?php while (false !== ($entry = readdir($handle))) : ?>
									<?php if($entry == '.' || $entry == '..' || $entry == 'preview') continue; ?>
									<?php if($entry == $slider['properties']['skin']) { ?>
									<option selected="selected"><?php echo $entry ?></option>
									<?php } else { ?>
									<option><?php echo $entry ?></option>
									<?php } ?>
									<?php endwhile; ?>
									<?php closedir($handle); ?>
								</select>
							</td>
							<td class="desc">You can change the skin of the slider. The 'noskin' skin is a border- and buttonless skin. Your custom skins will appear in the list when you create their folders as well.</td>
						</tr>
						<tr>
							<td>Background color</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="backgroundcolor" value="<?php echo $slider['properties']['backgroundcolor'] ?>" class="input color">
									<div class="colorpicker">colorpicker</div>
								</div>
							</td>
							<td class="desc">Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that background sublayers are covering the background.</td>
						</tr>
						<tr>
							<td>Background image</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="backgroundimage" value="<?php echo $slider['properties']['backgroundimage'] ?>" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that background sublayers are covering the global background image.</td>
						</tr>
						<tr>
							<td>Slider style</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="sliderstyle" value="<?php echo isset($slider['properties']['sliderstyle']) ? $slider['properties']['sliderstyle'] : '' ?>" class="input">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">Here you can apply your custom CSS style settings to the slider.</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-nav"></span>
								<h4>Navigation</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Prev and Next buttons</td>
							<td><input type="checkbox" name="navprevnext" <?php echo ( isset($slider['properties']['navprevnext']) && $slider['properties']['navprevnext'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If disabled, Prev and Next buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Start and Stop buttons</td>
							<td><input type="checkbox" name="navstartstop" <?php echo ( isset($slider['properties']['navstartstop']) && $slider['properties']['navstartstop'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If disabled, Start and Stop buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Navigation buttons</td>
							<td><input type="checkbox" name="navbuttons" <?php echo ( isset($slider['properties']['navbuttons']) && $slider['properties']['navbuttons'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If disabled, slide buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Prev and next buttons on hover</td>
							<td><input type="checkbox" name="hoverprevnext" <?php echo ( isset($slider['properties']['hoverprevnext']) && $slider['properties']['hoverprevnext'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, the prev and next buttons will be shown only if you move your mouse cursor over the slider</td>
						</tr>
						<tr>
							<td>Bottom navigation on hover</td>
							<td><input type="checkbox" name="hoverbottomnav" <?php echo ( isset($slider['properties']['hoverbottomnav']) && $slider['properties']['hoverbottomnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">The bottom navigation controls (with also thumbnails) will be shown only if you move your mouse cursor over the slider.</td>
						</tr>
						<tr>
							<td>Thumbnail navigation</td>
							<td>
								<?php $slider['properties']['thumb_nav'] = !empty($slider['properties']['thumb_nav']) ? $slider['properties']['thumb_nav'] : 'hover'; ?>
								<select name="thumb_nav">
									<option <?php echo ($slider['properties']['thumb_nav'] == 'disabled') ? 'selected="selected"' : '' ?>>disabled</option>
									<option <?php echo ($slider['properties']['thumb_nav'] == 'hover') ? 'selected="selected"' : '' ?>>hover</option>
									<option <?php echo ($slider['properties']['thumb_nav'] == 'always') ? 'selected="selected"' : '' ?>>always</option>
								</select>
							</td>
							<td class="desc"></td>
						</tr>
						<tr>
							<td>Thumbnail width</td>
							<td><input type="text" name="thumb_width" value="<?php echo !empty($slider['properties']['thumb_width']) ? $slider['properties']['thumb_width'] : '100' ?>"></td>
							<td class="desc">The width of the thumbnails in the navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail height</td>
							<td><input type="text" name="thumb_height" value="<?php echo !empty($slider['properties']['thumb_height']) ? $slider['properties']['thumb_height'] : '60' ?>"></td>
							<td class="desc">The height of the thumbnails in the navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail container width</td>
							<td><input type="text" name="thumb_container_width" value="<?php echo !empty($slider['properties']['thumb_container_width']) ? $slider['properties']['thumb_container_width'] : '60%' ?>"></td>
							<td class="desc">The width of the thumbnail navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail active opacity</td>
							<td><input type="text" name="thumb_active_opacity" value="<?php echo !empty($slider['properties']['thumb_active_opacity']) ? $slider['properties']['thumb_active_opacity'] : '35' ?>"></td>
							<td class="desc">The selected thumbnail opacity (0-100).</td>
						</tr>
						<tr>
							<td>Thumbnail inactive opacity</td>
							<td><input type="text" name="thumb_inactive_opacity" value="<?php echo !empty($slider['properties']['thumb_inactive_opacity']) ? $slider['properties']['thumb_inactive_opacity'] : '100' ?>"></td>
							<td class="desc">The opacity of inactive thumbnails (0-100).</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-misc"></span>
								<h4>Misc</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Image preload</td>
							<td><input type="checkbox" name="imgpreload" <?php echo ( isset($slider['properties']['imgpreload']) && $slider['properties']['imgpreload'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">Preloads all images and background-images of the next layer.</td>
						</tr>
						<tr>
							<td>Use relative URLs</td>
							<td><input type="checkbox" name="relativeurls" <?php echo ( isset($slider['properties']['relativeurls']) && $slider['properties']['relativeurls'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc">If enabled, LayerSlider WP will use relative URLs for images.</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-yourlogo"></span>
								<h4>YourLogo</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>YourLogo</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="yourlogo" value="<?php echo $slider['properties']['yourlogo'] ?>" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">This is a fixed layer that will be shown above of LayerSlider container. For example if you want to display your own logo, etc., you can upload an image or choose one from the Media Library.</td>
						</tr>
						<tr>
							<td>YourLogo style</td>
							<td><input type="text" name="yourlogostyle" value="<?php echo $slider['properties']['yourlogostyle'] ?>" class="input"></td>
							<td class="desc">You can style your logo. You can use any CSS properties, for example you can add left and top properties to place the image inside the LayerSlider container anywhere you want.</td>
						</tr>
						<tr>
							<td>YourLogo link</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="yourlogolink" value="<?php echo $slider['properties']['yourlogolink'] ?>" class="input">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">You can add a link to your logo. Set false is you want to display only an image without a link.</td>
						</tr>
						<tr>
							<td>YourLogo link target</td>
							<td>
								<select name="yourlogotarget">
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_self') ? 'selected="selected"' : '' ?>>_self</option>
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_blank') ? 'selected="selected"' : '' ?>>_blank</option>
								</select>
							</td>
							<td class="desc">If '_blank', the clicked url will open in a new window.</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Layers -->
		<div class="ls-page active">

			<div id="ls-layer-tabs">
				<?php foreach($slider['layers'] as $key => $layer) : ?>
				<?php $active = empty($key) ? 'active' : '' ?>
				<a href="#" class="<?php echo $active ?>">Layer #<?php echo ($key+1) ?><span>x</span></a>
				<?php endforeach; ?>
				<a href="#" class="unsortable" id="ls-add-layer">Add new layer</a>
				<div class="unsortable clear"></div>
			</div>
			<div id="ls-layers">
				<?php if(!empty($slider['layers'])) : ?>
				<?php foreach($slider['layers'] as $key => $layer) : ?>
				<?php $active = empty($key) ? 'active' : '' ?>
				<div class="ls-box ls-layer-box <?php echo $active ?>">
					<input type="hidden" name="layerkey" value="0">
					<table>
						<thead class="ls-layer-options-thead">
							<tr>
								<td colspan="7">
									<span id="ls-icon-layer-options"></span>
									<h4>
										Layer Options
										<a href="#" class="duplicate ls-layer-duplicate">Duplicate this layer</a>
									</h4>
								</td>
							</tr>
						</thead>
						<tbody class="ls-slide-options">
							<tr>
								<td class="right">Slide options</td>
								<td class="right">Background</td>
								<td>
									<div class="reset-parent">
										<input type="text" name="background" class="ls-upload" value="<?php echo $layer['properties']['background']?>">
										<span class="ls-reset">x</span>
									</div>
								</td>
								<td class="right">Direction</td>
								<td>
									<select name="slidedirection">
										<option <?php echo ($layer['properties']['slidedirection'] == 'top') ? 'selected="selected"' : '' ?>>top</option>
										<option <?php echo ($layer['properties']['slidedirection'] == 'right') ? 'selected="selected"' : '' ?>>right</option>
										<option <?php echo ($layer['properties']['slidedirection'] == 'bottom') ? 'selected="selected"' : '' ?>>bottom</option>
										<option <?php echo ($layer['properties']['slidedirection'] == 'left') ? 'selected="selected"' : '' ?>>left</option>
									</select>
								</td>
								<td class="right">Delay</td>
								<td><input type="text" name="slidedelay" value="<?php echo $layer['properties']['slidedelay']?>"> (ms)</td>
							</tr>
							<tr>
								<td class="right">Slide in animation</td>
								<td class="right">Duration</td>
								<td><input type="text" name="durationin" value="<?php echo $layer['properties']['durationin']?>"> (ms)</td>
								<td class="right">Easing</td>
								<td>
									<select name="easingin">
										<option <?php echo ($layer['properties']['easingin'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
										<option <?php echo ($layer['properties']['easingin'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
									</select>
								</td>
								<td class="right">Delay</td>
								<td><input type="text" name="delayin" value="<?php echo $layer['properties']['delayin']?>"> (ms)</td>
							</tr>
							<tr>
								<td class="right">Slide out animation</td>
								<td class="right">Duration</td>
								<td><input type="text" name="durationout" value="<?php echo $layer['properties']['durationout']?>"> (ms)</td>
								<td class="right">Easing</td>
								<td>
									<select name="easingout">
										<option <?php echo ($layer['properties']['easingout'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
										<option <?php echo ($layer['properties']['easingout'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
									</select>
								</td>
								<td class="right">Delay</td>
								<td><input type="text" name="delayout" value="<?php echo $layer['properties']['delayout']?>"> (ms)</td>
							</tr>
							<tr>
								<td class="right">Misc</td>
								<td class="right">#ID</td>
								<td><input type="text" name="id" value="<?php echo $layer['properties']['id'] ?>"></td>
								<td class="right">Deeplink</td>
								<td><input type="text" name="deeplink" value="<?php echo isset($layer['properties']['deeplink']) ? $layer['properties']['deeplink'] : '' ?>"></td>
								<td class="right">Hidden</td>
								<td><input type="checkbox" name="skip" class="checkbox" <?php echo isset($layer['properties']['skip']) ? 'checked="checked"' : '' ?>></td>
							</tr>
							<tr>
								<td class="right">Navigation</td>
								<td class="right">Thumbnail</td>
								<td colspan="5">
									<div class="reset-parent">
										<input type="text" name="thumbnail" class="ls-upload" value="<?php echo isset($layer['properties']['thumbnail']) ? $layer['properties']['thumbnail'] : '' ?>">
										<span class="ls-reset">x</span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<td>
									<span id="ls-icon-preview"></span>
									<h4>Preview</h4>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="ls-preview-td">
									<div class="ls-preview-wrapper">
										<div class="ls-preview">
											<div class="draggable"></div>
										</div>
										<div class="ls-real-time-preview"></div>
										<button class="button ls-preview-button">Enter Preview</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<td>
									<span id="ls-icon-sublayers"></span>
									<h4>Sublayers</h4>
								</td>
							</tr>
						</thead>
						<tbody class="ls-sublayers ls-sublayer-sortable">
							<?php if(!empty($layer['sublayers'])) : ?>
							<?php foreach($layer['sublayers'] as $key => $sublayer) : ?>
							<?php $active = (count($layer['sublayers']) == ($key+1)) ? ' class="active"' : '' ?>
							<?php $title = empty($sublayer['subtitle']) ? 'Sublayer #'.($key+1).'' : htmlspecialchars(stripslashes($sublayer['subtitle'])); ?>
							<tr<?php echo $active ?>>
								<td>
									<div class="ls-sublayer-wrapper">
										<span class="ls-sublayer-number"><?php echo ($key + 1) ?></span>
										<span class="ls-highlight"><input type="checkbox"></span>
										<input type="text" name="subtitle" class="ls-sublayer-title" value="<?php echo $title ?>">
										<div class="clear"></div>
										<div class="ls-sublayer-nav">
											<a href="#" class="active">Basic</a>
											<a href="#">Options</a>
											<a href="#">Link</a>
											<a href="#">Style</a>
											<a href="#">Attributes</a>
											<a href="#" title="Remove this sublayer" class="remove">x</a>
										</div>
										<div class="ls-sublayer-pages">
											<div class="ls-sublayer-page ls-sublayer-basic active">
												<select name="type">
													<option <?php echo ($sublayer['type'] == 'img') ? 'selected="selected"' : '' ?>>img</option>
													<option <?php echo ($sublayer['type'] == 'div') ? 'selected="selected"' : '' ?>>div</option>
													<option <?php echo ($sublayer['type'] == 'p') ? 'selected="selected"' : '' ?>>p</option>
													<option <?php echo ($sublayer['type'] == 'span') ? 'selected="selected"' : '' ?>>span</option>
													<option <?php echo ($sublayer['type'] == 'h1') ? 'selected="selected"' : '' ?>>h1</option>
													<option <?php echo ($sublayer['type'] == 'h2') ? 'selected="selected"' : '' ?>>h2</option>
													<option <?php echo ($sublayer['type'] == 'h3') ? 'selected="selected"' : '' ?>>h3</option>
													<option <?php echo ($sublayer['type'] == 'h4') ? 'selected="selected"' : '' ?>>h4</option>
													<option <?php echo ($sublayer['type'] == 'h5') ? 'selected="selected"' : '' ?>>h5</option>
													<option <?php echo ($sublayer['type'] == 'h6') ? 'selected="selected"' : '' ?>>h6</option>
												</select>

												<div class="ls-sublayer-types">
													<span class="ls-type">
														<span class="ls-icon-img"></span><br>
														Image
													</span>

													<span class="ls-type">
														<span class="ls-icon-div"></span><br>
														Div
													</span>

													<span class="ls-type">
														<span class="ls-icon-p"></span><br>
														Paragraph
													</span>

													<span class="ls-type">
														<span class="ls-icon-span"></span><br>
														Span
													</span>

													<span class="ls-type">
														<span class="ls-icon-h1"></span><br>
														H1
													</span>

													<span class="ls-type">
														<span class="ls-icon-h2"></span><br>
														H2
													</span>

													<span class="ls-type">
														<span class="ls-icon-h3"></span><br>
														H3
													</span>

													<span class="ls-type">
														<span class="ls-icon-h4"></span><br>
														H4
													</span>

													<span class="ls-type">
														<span class="ls-icon-h5"></span><br>
														H5
													</span>

													<span class="ls-type">
														<span class="ls-icon-h6"></span><br>
														H6
													</span>
												</div>

												<div class="ls-image-uploader">
													<?php $imageSrc = !empty($sublayer['image']) ? $sublayer['image'] : plugins_url('/img/transparent.png', __FILE__) ?>
													<img src="<?php echo $imageSrc ?>" alt="sublayer image">
													<input type="text" name="image" class="ls-upload" value="<?php echo $sublayer['image'] ?>">
													<p>
														Click into this text field to open WordPress
														Media Library where you can upload new images
														or select previously used ones.
													</p>
												</div>

												<div class="ls-html-code">
													<h5>Custom HTML content</h5>
													<textarea name="html" cols="50" rows="5"><?php echo stripslashes($sublayer['html']) ?></textarea>
												</div>
											</div>
											<div class="ls-sublayer-page ls-sublayer-options">
												<table>
													<tbody>
														<tr>
															<td>Slide in animation</td>
															<td class="right">Direction</td>
															<td>
																<select name="slidedirection">
																	<option <?php echo ($sublayer['slidedirection'] == 'auto') ? 'selected="selected"' : '' ?>>auto</option>
																	<option <?php echo ($sublayer['slidedirection'] == 'fade') ? 'selected="selected"' : '' ?>>fade</option>
																	<option <?php echo ($sublayer['slidedirection'] == 'top') ? 'selected="selected"' : '' ?>>top</option>
																	<option <?php echo ($sublayer['slidedirection'] == 'right') ? 'selected="selected"' : '' ?>>right</option>
																	<option <?php echo ($sublayer['slidedirection'] == 'bottom') ? 'selected="selected"' : '' ?>>bottom</option>
																	<option <?php echo ($sublayer['slidedirection'] == 'left') ? 'selected="selected"' : '' ?>>left</option>
																</select>
															</td>
															<td class="right">Duration</td>
															<td><input type="text" name="durationin" value="<?php echo $sublayer['durationin'] ?>"> (ms)</td>
															<td class="right">Easing</td>
															<td>
																<select name="easingin">
																	<option <?php echo ($sublayer['easingin'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
																	<option <?php echo ($sublayer['easingin'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
																</select>
															</td>
															<td class="right">Delay</td>
															<td><input type="text" name="delayin" value="<?php echo $sublayer['delayin'] ?>"> (ms)</td>
														</tr>

														<tr>
															<td>Slide out animation</td>
															<td class="right">Direction</td>
															<td>
																<select name="slideoutdirection">
																	<option <?php echo ($sublayer['slideoutdirection'] == 'auto') ? 'selected="selected"' : '' ?>>auto</option>
																	<option <?php echo ($sublayer['slideoutdirection'] == 'fade') ? 'selected="selected"' : '' ?>>fade</option>
																	<option <?php echo ($sublayer['slideoutdirection'] == 'top') ? 'selected="selected"' : '' ?>>top</option>
																	<option <?php echo ($sublayer['slideoutdirection'] == 'right') ? 'selected="selected"' : '' ?>>right</option>
																	<option <?php echo ($sublayer['slideoutdirection'] == 'bottom') ? 'selected="selected"' : '' ?>>bottom</option>
																	<option <?php echo ($sublayer['slideoutdirection'] == 'left') ? 'selected="selected"' : '' ?>>left</option>
																</select>
															</td>
															<td class="right">Duration</td>
															<td><input type="text" name="durationout" value="<?php echo $sublayer['durationout'] ?>"> (ms)</td>
															<td class="right">Easing</td>
															<td>
																<select name="easingout">
																	<option <?php echo ($sublayer['easingout'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
																	<option <?php echo ($sublayer['easingout'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
																</select>
															</td>
															<td class="right">Delay</td>
															<td><input type="text" name="delayout" value="<?php echo $sublayer['delayout'] ?>"> (ms)</td>
														</tr>

														<tr>
															<td>Other options</td>
															<td class="right">P. Level</td>
															<td><input type="text" name="level" value="<?php echo $sublayer['level'] ?>"></td>
															<td class="right">Show until</td>
															<td><input type="text" name="showuntil" value="<?php echo !empty($sublayer['showuntil']) ? $sublayer['showuntil'] : '0'  ?>"> (ms)</td>
															<td class="right">Hidden</td>
															<td><input type="checkbox" name="skip" class="checkbox" <?php echo isset($sublayer['skip']) ? 'checked="checked"' : '' ?>></td>
															<td colspan="3"><button class="button duplicate">Duplicate this sublayer</button></td>
														</tr>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-link">
												<table>
													<tbody>
														<tr>
															<td>URL</td>
															<td class="url"><input type="text" name="url" value="<?php echo $sublayer['url'] ?>"></td>
															<td>
																<select name="target">
																	<option <?php echo ($sublayer['target'] == '_self') ? 'selected="selected"' : '' ?>>_self</option>
																	<option <?php echo ($sublayer['target'] == '_blank') ? 'selected="selected"' : '' ?>>_blank</option>
																</select>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-style">
												<table>
													<tbody>
														<tr>
															<td>Basic style settings</td>
															<td class="right">Top</td>
															<td><input type="text" name="top" value="<?php echo $sublayer['top'] ?>"></td>
															<td class="right">Left</td>
															<td><input type="text" name="left" value="<?php echo $sublayer['left'] ?>"></td>
															<td class="right">Word-wrap</td>
															<td><input type="checkbox" name="wordwrap" class="checkbox" <?php echo isset($sublayer['wordwrap']) ? 'checked="checked"' : '' ?>></td>
														</tr>
														<tr>
															<td>Custom style settings</td>
															<td class="right">Custom styles</td>
															<td colspan="4"><textarea rows="5" cols="50" name="style" class="style"><?php echo stripslashes($sublayer['style']) ?></textarea></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-attributes">
												<table>
													<tbody>
														<tr>
															<td>Attributes</td>
															<td class="right">ID</td>
															<td><input type="text" name="id" value="<?php echo $sublayer['id'] ?>"></td>
															<td class="right">Classes</td>
															<td><input type="text" name="class" value="<?php echo $sublayer['class'] ?>"></td>
															<td class="right">Title</td>
															<td><input type="text" name="title" value="<?php echo $sublayer['title'] ?>"></td>
															<td class="right">Alt</td>
															<td><input type="text" name="alt" value="<?php echo $sublayer['alt'] ?>"></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
					<a href="#" class="ls-add-sublayer">Add new sublayer</a>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>

		<!-- Event Callbacks -->
		<div class="ls-page ls-callback-page">
			<div class="ls-box ls-callback-box">
				<h3 class="header">cbInit</h3>
				<div class="inner">
					<textarea name="cbinit" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbinit']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbStart</h3>
				<div class="inner">
					<textarea name="cbstart" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbstart']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbStop</h3>
				<div class="inner">
					<textarea name="cbstop" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbstop']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPause</h3>
				<div class="inner">
					<textarea name="cbpause" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbpause']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbAnimStart</h3>
				<div class="inner">
					<textarea name="cbanimstart" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbanimstart']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbAnimStop</h3>
				<div class="inner">
					<textarea name="cbanimstop" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbanimstop']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPrev</h3>
				<div class="inner">
					<textarea name="cbprev" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbprev']) ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbNext</h3>
				<div class="inner">
					<textarea name="cbnext" cols="20" rows="5"><?php echo stripslashes($slider['properties']['cbnext']) ?></textarea>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="ls-box ls-publish">
		<h3 class="header">Publish</h3>
		<div class="inner">
			<button class="button-primary">Save changes</button>
			<p class="ls-saving-warning"></p>
			<div class="clear"></div>
		</div>
	</div>
</form>


<script type="text/javascript">
	var pluginPath = '<?php echo plugins_url() ?>';
</script>