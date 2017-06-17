</div>
		
		</div>
		<div id="footer" class="cf">
			<div id="widgets-wrap-footer" class="widget-column-3 cf">
				
				<div id="text-7" class="widget-footer frontier-widget widget_text">
					<?php
					$contact=$conn->fetchArray($groups->getById(CONTACT));
					?>
					<h4 class="widget-title"><? if($lan=='en') echo $contact['nameen']; else echo $contact['name'];?></h4>
					<div class="textwidget">
						<? if($lan=='en') echo $contact['shortcontents']; else echo $contact['shortcontents'];?>
					</div>
				</div>
				
				<div id="text-8" class="widget-footer frontier-widget widget_text">
					<?php
					$you=$conn->fetchArray($groups->getById(YOUTUBE));
					?>
					<h4 class="widget-title"><? if($lan=='en') echo 'Our Audios and Videos'; else echo 'हाम्रा अडियो र भिडिओहरु';?></h4>
					<div class="textwidget">
						<div class="msnb_notice scroll-up">
							<ul class="notice-list">
								<li>
									<a href="<? if($lan=='en') echo 'en/'?>audios">
										<img src="images/radio.png" />
									</a>
								</li>
								<li>
									<a href="<? if($lan=='en') echo 'en/'?>videos">
										<img src="images/tv.png" />
									</a>
								</li>
							</ul>
						</div>
						<!-- <iframe width="300" height="300" src="<?=$you['contents']?>" frameborder="0" allowfullscreen=""></iframe> -->
					</div>
				</div>

				<div id="text-5" class="widget-footer frontier-widget widget_text">
					<h4 class="widget-title">
						<? if($lan=='en') echo 'Connect With Us'; else echo 'फ़ेसबुकमा जोडिनुहोस';?>
					</h4>
					<div class="textwidget facebook">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkrishighar%2F&tabs=timeline&width=350px&height=230px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350px" height="230px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				</div>
				
			</div>
		</div>
		<div id="bottom-bar" class="cf">
				
			<span id="theme-link"><a href="http://www.krishighar.com/">Powered by: Team Krishighar</a></span>
			<span id="bottom-bar-text">© Copyright <?=date('Y');?>. National Rice Research Program, Nepal. All Right Reserved.</span>
		</div>
	</div>
	
	<script type="text/javascript" src="js/bjqs-1.3.min.js"></script>
	<script type="text/javascript">
		jQuery( document ).ready( function($) {
			$( '#basic-slider' ).bjqs( {
				animtype : 'fade',
				width : 480,
				height : 340,
				animduration : 500,
				animspeed : 5000,
				automatic : true,
				showcontrols : true,
				nexttext : '<span class="slider-next"></span>',
				prevtext : '<span class="slider-prev"></span>',
				showmarkers : false,
				usecaptions : true,
				responsive : true
			} );
		} );
	</script>
</body>
</html>