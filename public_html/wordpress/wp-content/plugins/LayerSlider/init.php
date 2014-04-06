<?php if(is_array($slides)) {  ?>
    <script type="text/javascript">

        jQuery(document).ready(function(){

        	jQuery("#layerslider_<?php echo $id?>").layerSlider({
                width               : '<?php echo layerslider_check_unit($slides['properties']['width']) ?>',
                height              : '<?php echo layerslider_check_unit($slides['properties']['height']) ?>',
                responsive          : <?php echo isset($slides['properties']['responsive']) ? 'true' : 'false' ?>,
                responsiveUnder     : <?php echo !empty($slides['properties']['responsiveunder']) ? $slides['properties']['responsiveunder'] : '0' ?>,
                sublayerContainer   : <?php echo !empty($slides['properties']['sublayercontainer']) ? $slides['properties']['sublayercontainer'] : '0' ?>,
        		autoStart			: <?php echo ( isset($slides['properties']['autostart']) && $slides['properties']['autostart'] != 'false') ? 'true' : 'false' ?>,
        		pauseOnHover		: <?php echo ( isset($slides['properties']['pauseonhover']) && $slides['properties']['pauseonhover'] != 'false') ? 'true' : 'false' ?>,
        		firstLayer			: <?php echo is_numeric($slides['properties']['firstlayer']) ? $slides['properties']['firstlayer'] : '\'random\'' ?>,
        		animateFirstLayer	: <?php echo ( isset($slides['properties']['animatefirstlayer']) && $slides['properties']['animatefirstlayer'] != 'false') ? 'true' : 'false' ?>,
                randomSlideshow     : <?php echo ( isset($slides['properties']['randomslideshow']) && $slides['properties']['randomslideshow'] != 'false') ? 'true' : 'false' ?>,
        		twoWaySlideshow		: <?php echo ( isset($slides['properties']['twowayslideshow']) && $slides['properties']['twowayslideshow'] != 'false') ? 'true' : 'false' ?>,
        		keybNav				: <?php echo ( isset($slides['properties']['keybnav']) && $slides['properties']['keybnav'] != 'false') ? 'true' : 'false' ?>,
        		touchNav			: <?php echo ( isset($slides['properties']['touchnav']) && $slides['properties']['touchnav'] != 'false') ? 'true' : 'false' ?>,
        		imgPreload			: <?php echo ( isset($slides['properties']['imgpreload']) && $slides['properties']['imgpreload'] != 'false') ? 'true' : 'false' ?>,
        		navPrevNext			: <?php echo ( isset($slides['properties']['navprevnext']) && $slides['properties']['navprevnext'] != 'false') ? 'true' : 'false' ?>,
        		navStartStop		: <?php echo ( isset($slides['properties']['navstartstop']) && $slides['properties']['navstartstop'] != 'false') ? 'true' : 'false' ?>,
        		navButtons			: <?php echo ( isset($slides['properties']['navbuttons']) && $slides['properties']['navbuttons'] != 'false') ? 'true' : 'false' ?>,
                hoverPrevNext       : <?php echo ( isset($slides['properties']['hoverprevnext']) && $slides['properties']['hoverprevnext'] != 'false') ? 'true' : 'false' ?>,
                hoverBottomNav      : <?php echo ( isset($slides['properties']['hoverbottomnav']) && $slides['properties']['hoverbottomnav'] != 'false') ? 'true' : 'false' ?>,
                thumbnailNavigation : '<?php echo !empty($slides['properties']['thumb_nav']) ? $slides['properties']['thumb_nav'] : 'hover'; ?>',
                tnWidth             : <?php echo !empty($slides['properties']['thumb_width']) ? $slides['properties']['thumb_width'] : '100' ?>,
                tnHeight            : <?php echo !empty($slides['properties']['thumb_height']) ? $slides['properties']['thumb_height'] : '60' ?>,
                tnContainerWidth    : '<?php echo !empty($slides['properties']['thumb_container_width']) ? $slides['properties']['thumb_container_width'] : '60%' ?>',
                tnActiveOpacity     : <?php echo !empty($slides['properties']['thumb_active_opacity']) ? $slides['properties']['thumb_active_opacity'] : '35' ?>,
                tnInactiveOpacity   : <?php echo !empty($slides['properties']['thumb_inactive_opacity']) ? $slides['properties']['thumb_inactive_opacity'] : '100' ?>,

        		skin				: '<?php echo $slides['properties']['skin']?>',
        		skinsPath			: '<?php echo plugins_url('/LayerSlider/skins/') ?>',
        		<?php if(!empty($slides['properties']['backgroundcolor'])) : ?>
        		globalBGColor		: '<?php echo $slides['properties']['backgroundcolor']?>',
        		<?php endif; ?>
        		<?php if(!empty($slides['properties']['backgroundimage'])) : ?>
        		globalBGImage		: <?php echo !empty($slides['properties']['backgroundimage']) ? '\''.$slides['properties']['backgroundimage'].'\'' : 'false' ?>,
        		<?php endif; ?>
        		yourLogo			: <?php echo !empty($slides['properties']['yourlogo']) ? '\''.$slides['properties']['yourlogo'].'\'' : 'false'?>,
        		yourLogoStyle		: <?php echo !empty($slides['properties']['yourlogostyle']) ? '\''.$slides['properties']['yourlogostyle'].'\'' : '\'position: absolute; left: 10px; top: 10px; z-index: 99;\''?>,
        		yourLogoLink		: <?php echo !empty($slides['properties']['yourlogolink']) ? '\''.$slides['properties']['yourlogolink'].'\'' : 'false'?>,
        		yourLogoTarget		: <?php echo !empty($slides['properties']['yourlogotarget']) ? '\''.$slides['properties']['yourlogotarget'].'\'' : '\'_self\''?>,

        		loops				: <?php echo !empty($slides['properties']['loops']) ? $slides['properties']['loops'] : 0 ?>,
        		forceLoopNum		: <?php echo ( isset($slides['properties']['forceloopnum']) && $slides['properties']['forceloopnum'] != 'false') ? 'true' : 'false' ?>,
        		autoPlayVideos		: <?php echo ( isset($slides['properties']['autoplayvideos']) && $slides['properties']['autoplayvideos'] != 'false') ? 'true' : 'false' ?>,

        		<?php
        		$autoPauseSlideshow = !empty($slides['properties']['autopauseslideshow']) ? $slides['properties']['autopauseslideshow'] : 'auto';

        		if($autoPauseSlideshow == 'auto') {
            		$autoPauseSlideshow = '\'auto\'';

        		} else if($autoPauseSlideshow == 'enabled') {
                    $autoPauseSlideshow = 'true';

                } else if($autoPauseSlideshow == 'disabled') {
                    $autoPauseSlideshow = 'false';
                }
        		?>

        		autoPauseSlideshow	: <?php echo $autoPauseSlideshow ?>,
        		youtubePreview		: <?php echo !empty($slides['properties']['youtubepreview']) ? '\''.$slides['properties']['youtubepreview'].'\'' : '\'maxresdefault.jpg\'' ?>,

        		cbInit				: <?php echo !empty($slides['properties']['cbinit']) ? stripslashes($slides['properties']['cbinit']) : 'function() {}'?>,
        		cbStart				: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbstart']) : 'function() {}'?>,
        		cbStop				: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbstop']) : 'function() {}'?>,
        		cbPause				: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbpause']) : 'function() {}'?>,
        		cbAnimStart			: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbanimstart']) : 'function() {}'?>,
        		cbAnimStop			: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbanimstop']) : 'function() {}'?>,
        		cbPrev				: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbprev']) : 'function() {}'?>,
        		cbNext				: <?php echo !empty($slides['properties']['cbstart']) ? stripslashes($slides['properties']['cbnext']) : 'function() {}'?>
        	});
        });
    </script>
<?php } ?>