<?php
	$slider = get_option('layerslider-slides');
	$slider = is_array($slider) ? $slider : unserialize($slider);
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

<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="wrap" id="ls-slider-form">

	<input type="hidden" name="posted_add" value="1">

	<!-- Title -->
	<div class="ls-icon-layers"></div>
	<h2>
		Add new LayerSlider
		<a href="?page=layerslider" class="add-new-h2">Back to the list</a>
	</h2>

	<!-- Main menu bar -->
	<div id="ls-main-nav-bar">
		<a href="#" class="settings active">Global Settings</a>
		<a href="#" class="layers">Layers</a>
		<a href="#" class="callbacks">Event Callbacks</a>
		<a href="#" class="support unselectable">Documentation</a>
		<a href="#" class="clear unselectable"></a>
	</div>

	<!-- Pages -->
	<div id="ls-pages">

		<!-- Global Settings -->
		<div class="ls-page ls-settings active">

			<div id="post-body-content">
				<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="title" value="" id="title" autocomplete="off" placeholder="Type your slider name here">
					</div>
				</div>
			</div>

			<div class="ls-box ls-settings">
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
							<td>Width</td>
							<td><input type="text" name="width" value="600" class="input"></td>
							<td class="desc">(px) The slider width in pixels. For compatibility reasons, we still support percentage values, but for responsive layout, you should use pixels.</td>
						</tr>
						<tr>
							<td>Height</td>
							<td><input type="text" name="height" value="300" class="input"></td>
							<td class="desc">(px) The slider height in pixels. </td>
						</tr>
						<tr>
							<td>Responsive</td>
							<td><input type="checkbox" name="responsive" checked="checked"></td>
							<td class="desc">Enable this option to turn LayerSlider into a responsive slider.</td>
						</tr>
						<tr>
							<td>Full-width slider</td>
							<td><input type="checkbox" name="forceresponsive"></td>
							<td class="desc">When you are using a responsiveness or percentage dimensions for the slider, it will respond the parent element size changes. With tis option you can bypass this behaviour and LayerSlider will be a full-width slider.</td>
						</tr>
						<tr>
							<td>Responsive under</td>
							<td><input type="text" name="responsiveunder" value="0"></td>
							<td class="desc">(px) You can force the slider to change automatically into responsive mode but only if the slider width is smaller than responsiveUnder pixels. It can be used if you need a full-width slider with fixed height but you also need it to be responsive if the browser is smaller... Important! If you enter a value higher than 0, the normal responsive mode will be switched off automatically!</td>
						</tr>
						<tr>
							<td>Sublayer Container</td>
							<td><input type="text" name="sublayercontainer" value="0"></td>
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
							<td><input type="checkbox" name="autostart" checked="checked"></td>
							<td class="desc">If enabled, slideshow will automatically start after loading the page.</td>
						</tr>
						<tr>
							<td>Pause on hover</td>
							<td><input type="checkbox" name="pauseonhover" checked="checked"></td>
							<td class="desc">Slideshow will pause when mouse pointer is over LayerSlider.</td>
						</tr>
						<tr>
							<td>First layer</td>
							<td><input type="text" name="firstlayer" value="1" class="input"></td>
							<td class="desc">LayerSlider will start with this layer (you can type the word <i>random</i> if you want the slider to start with a random layer).</td>
						</tr>
						<tr>
							<td>Animate first layer</td>
							<td><input type="checkbox" name="animatefirstlayer" checked="checked"></td>
							<td class="desc">If enabled, first layer will animate (slide in) instead of fading</td>
						</tr>
						<tr>
							<td>Random slideshow</td>
							<td><input type="checkbox" name="randomslideshow"></td>
							<td class="desc"> LayerSlider will change to a random layer instead of changing to the next / prev layer. Note that 'loops' feature won't work with this option.</td>
						</tr>
						<tr>
							<td>Two way slideshow</td>
							<td><input type="checkbox" name="twowayslideshow" checked="checked"></td>
							<td class="desc">If enabled, slideshow will go backwards if you click the prev button.</td>
						</tr>
						<tr>
							<td>Loops</td>
							<td>
								<select name="loops">
									<?php for($c = 0; $c < 11; $c++) : ?>
									<option><?php echo $c ?></option>
									<?php endfor; ?>
								</select>
							</td>
							<td class="desc">Number of loops if automatically start slideshow is enabled (0 means infinite!)</td>
						</tr>
						<tr>
							<td>Force the number of loops</td>
							<td><input type="checkbox" name="forceloopnum" checked="checked"></td>
							<td class="desc">If enabled, the slider will always stop at the given number of loops even if the user restarts the slideshow.</td>
						</tr>
						<tr>
							<td>Automatically play videos</td>
							<td><input type="checkbox" name="autoplayvideos" checked="checked"></td>
							<td class="desc">If enabled, the slider will automatically play youtube and vimeo videos.</td>
						</tr>
						<tr>
							<td>Automatically pause slideshow</td>
							<td>
								<select name="autopauseslideshow">
									<option>auto</option>
									<option>enabled</option>
									<option>disabled</option>
								</select>
							</td>
							<td class="desc">If you enabled automatically play videos, the auto value means that the slideshow will stop UNTIL the video is playing and after that it continues. Enabled means slideshow will stop and it won't continue after video is played.</td>
						</tr>
						<tr>
							<td>Youtube preview</td>
							<td>
								<select name="youtubepreview">
									<option>maxresdefault.jpg</option>
									<option>hqdefault.jpg</option>
									<option>mqdefault.jpg</option>
									<option>default.jpg</option>
								</select>
							</td>
							<td class="desc">Default thumbnail picture of YouTube videos. Can be maxresdefault.jpg, hqdefault.jpg, mqdefault.jpg or default.jpg. Note, that maxresdefault.jpg is not available to all (not HD) videos.</td>
						</tr>
						<tr>
							<td>Keyboard navigation</td>
							<td><input type="checkbox" name="keybnav" checked="checked"></td>
							<td class="desc">You can navigate with the left and right arrow keys.</td>
						</tr>
						<tr>
							<td>Touch navigation</td>
							<td><input type="checkbox" name="touchnav" checked="checked"></td>
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
									<?php if($entry == 'defaultskin') { ?>
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
									<input type="text" name="backgroundcolor" value="transparent" class="input color">
									<div class="colorpicker">colorpicker</div>
								</div>
							</td>
							<td class="desc">Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that background sublayers are covering the background.</td>
						</tr>
						<tr>
							<td>Background image</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="backgroundimage" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that background sublayers are covering the global background image.</td>
						</tr>
						<tr>
							<td>Slider style</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="sliderstyle" class="input">
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
							<td><input type="checkbox" name="navprevnext" checked="checked"></td>
							<td class="desc">If disabled, Prev and Next buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Start and Stop buttons</td>
							<td><input type="checkbox" name="navstartstop" checked="checked"></td>
							<td class="desc">If disabled, Start and Stop buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Navigation buttons</td>
							<td><input type="checkbox" name="navbuttons" checked="checked"></td>
							<td class="desc">If disabled, slide buttons will be invisible.</td>
						</tr>
						<tr>
							<td>Prev and next buttons on hover</td>
							<td><input type="checkbox" name="hoverprevnext" checked="checked"></td>
							<td class="desc">If enabled, the prev and next buttons will be shown only if you move your mouse cursor over the slider.</td>
						</tr>
						<tr>
							<td>Bottom navigation on hover</td>
							<td><input type="checkbox" name="hoverbottomnav"></td>
							<td class="desc">The bottom navigation controls (with also thumbnails) will be shown only if you move your mouse cursor over the slider.</td>
						</tr>
						<tr>
							<td>Thumbnail navigation</td>
							<td>
								<select name="thumb_nav">
									<option>disabled</option>
									<option selected="selected">hover</option>
									<option>always</option>
								</select>
							</td>
							<td class="desc"></td>
						</tr>
						<tr>
							<td>Thumbnail width</td>
							<td><input type="text" name="thumb_width" value="100"></td>
							<td class="desc">The width of the thumbnails in the navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail height</td>
							<td><input type="text" name="thumb_height" value="60"></td>
							<td class="desc">The height of the thumbnails in the navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail container width</td>
							<td><input type="text" name="thumb_container_width" value="60%"></td>
							<td class="desc">The width of the thumbnail navigation area.</td>
						</tr>
						<tr>
							<td>Thumbnail active opacity</td>
							<td><input type="text" name="thumb_active_opacity" value="35"></td>
							<td class="desc">The selected thumbnail opacity (0-100).</td>
						</tr>
						<tr>
							<td>Thumbnail inactive opacity</td>
							<td><input type="text" name="thumb_inactive_opacity" value="100"></td>
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
							<td><input type="checkbox" name="imgpreload" checked="checked"></td>
							<td class="desc">Preloads all images and background-images of the next layer.</td>
						</tr>
						<tr>
							<td>Use relative URLs</td>
							<td><input type="checkbox" name="relativeurls" checked="checked"></td>
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
									<input type="text" name="yourlogo" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">This is a fixed layer that will be shown above of LayerSlider container. For example if you want to display your own logo, etc., you can upload an image or choose one from the Media Library.</td>
						</tr>
						<tr>
							<td>YourLogo style</td>
							<td><input type="text" name="yourlogostyle" value="left: 10px; top: 10px;" class="input"></td>
							<td class="desc">You can style your logo. You can use any CSS properties, for example you can add left and top properties to place the image inside the LayerSlider container anywhere you want.</td>
						</tr>
						<tr>
							<td>YourLogo link</td>
							<td>
								<div class="reset-parent">
									<input type="text" name="yourlogolink" class="input">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc">You can add a link to your logo. Set false is you want to display only an image without a link.</td>
						</tr>
						<tr>
							<td>YourLogo link target</td>
							<td>
								<select name="yourlogotarget">
									<option>_self</option>
									<option>_blank</option>
								</select>
							</td>
							<td class="desc">If '_blank', the clicked url will open in a new window.</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Layers -->
		<div class="ls-page">

			<div id="ls-layer-tabs">
				<a href="#" class="active">Layer #1 <span>x</span></a>
				<a href="#" class="unsortable" id="ls-add-layer">Add new layer</a>
				<div class="unsortable clear"></div>
			</div>
			<div id="ls-layers">
				<div class="ls-box ls-layer-box active">
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
							<tr class="active">
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
													<input type="text" name="image"  class="ls-upload" value="">
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
		</div>

		<!-- Event Callbacks -->
		<div class="ls-page ls-callback-page">
			<div class="ls-box ls-callback-box">
				<h3 class="header">cbInit</h3>
				<div class="inner">
					<textarea name="cbinit" cols="20" rows="5">function(element) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbStart</h3>
				<div class="inner">
					<textarea name="cbstart" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbStop</h3>
				<div class="inner">
					<textarea name="cbstop" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPause</h3>
				<div class="inner">
					<textarea name="cbpause" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbAnimStart</h3>
				<div class="inner">
					<textarea name="cbanimstart" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbAnimStop</h3>
				<div class="inner">
					<textarea name="cbanimstop" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPrev</h3>
				<div class="inner">
					<textarea name="cbprev" cols="20" rows="5">function(data) { }</textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbNext</h3>
				<div class="inner">
					<textarea name="cbnext" cols="20" rows="5">function(data) { }</textarea>
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