</div>
</div>

<? if ($APPLICATION->GetCurPage(false) == SITE_DIR) : ?>
	<div class="right">
		<div id="content_1" class="content">

			<?
			$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => SITE_DIR . "include/news.php",
					"AREA_FILE_RECURSIVE" => "N",
					"EDIT_MODE" => "html",
				),
				false,
				array('HIDE_ICONS' => 'Y')
			);
			?>

		</div>
	</div>

<? else : ?>

<? endif ?>

</section>
<footer>
	<nav>

		<?
		$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"horizontal_multilevel",
			array(
				"ROOT_MENU_TYPE" => "bottom",
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "N",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "36000000",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => ""
			),
			false,
			array(
				"ACTIVE_COMPONENT" => "Y"
			)
		);
		?>

	</nav>

	<?
	$APPLICATION->IncludeFile(
		SITE_DIR . "include/footer.php",
		array(),
		array("MODE" => "html")
	);
	?>

</footer>
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>
<script type="text/javascript">
	(function($) {
		$(window).load(function() {
			$("#content_1").mCustomScrollbar({
				scrollButtons: {
					enable: true
				}
			});
			$("#content_1").hover(function() {
				$(document).data({
					"keyboard-input": "enabled"
				});
				$(this).addClass("keyboard-input");
			}, function() {
				$(document).data({
					"keyboard-input": "disabled"
				});
				$(this).removeClass("keyboard-input");
			});
			$(document).keydown(function(e) {
				if ($(this).data("keyboard-input") === "enabled") {
					var activeElem = $(".keyboard-input"),
						activeElemPos = Math.abs($(".keyboard-input .mCSB_container").position().top),
						pixelsToScroll = 60;
					if (e.which === 38) { //scroll up
						e.preventDefault();
						if (pixelsToScroll > activeElemPos) {
							activeElem.mCustomScrollbar("scrollTo", "top");
						} else {
							activeElem.mCustomScrollbar("scrollTo", (activeElemPos - pixelsToScroll), {
								scrollInertia: 400,
								scrollEasing: "easeOutCirc"
							});
						}
					} else if (e.which === 40) { //scroll down
						e.preventDefault();
						activeElem.mCustomScrollbar("scrollTo", (activeElemPos + pixelsToScroll), {
							scrollInertia: 400,
							scrollEasing: "easeOutCirc"
						});
					}
				}
			});
		});
	})(jQuery);
</script>

<script type="text/javascript">
	var tabCookieName = "cookie_tabs1";
	$("#tabs1").tabs({
		active: ($.cookie(tabCookieName) || 0),
		activate: function(event, ui) {
			var newIndex = ui.newTab.parent().children().index(ui.newTab);
			$.cookie(tabCookieName, newIndex);
		}
	});
	(jQuery)
</script>

<script type="text/javascript">
	var tabCookieName2 = "cookie_tabs2";
	$("#tabs2").tabs({
		active: ($.cookie(tabCookieName2) || 0),
		activate: function(event, ui) {
			var newIndex = ui.newTab.parent().children().index(ui.newTab);
			$.cookie(tabCookieName2, newIndex);
		}
	});
	(jQuery)
</script>

<script type="text/javascript">
	$("#tabs2").tabs({
		show: function(event, ui) {
			var $target = $(ui.panel);

			$('.content:visible').effect(
				'explode', {},
				1500,
				function() {
					$target.fadeIn();
				});
		}
	});
</script>

<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>

<script>
	(function(w, d, u) {
		var s = d.createElement('script');
		s.async = true;
		s.src = u + '?' + (Date.now() / 60000 | 0);
		var h = d.getElementsByTagName('script')[0];
		h.parentNode.insertBefore(s, h);
	})(window, document, 'https://portal.easymatrix.ru/upload/crm/site_button/loader_1_dezlc8.js');
</script>


</body>

</html>