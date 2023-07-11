    <!-- De volta ao topo -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</span>
	</div>

    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>

    <script src="js/main.js"></script>

	<script>
		(function ($) {
    		"use strict";

			/*[CARREGAR PÁGINA]
			===========================================================*/
			$(".animsition").animsition({
				inClass: 'fade-in',
				outClass: 'fade-out',
				inDuration: 1500,
				outDuration: 800,
				linkElement: '.animsition-link',
				loading: true,
				loadingParentElement: 'html',
				loadingClass: 'animsition-loading-1',
				loadingInner: '<div class="cp-spinner cp-meter"></div>',
				timeout: false,
				timeoutCountdown: 5000,
				onLoadEvent: true,
				browser: [ 'animation-duration', '-webkit-animation-duration'],
				overlay : false,
				overlayClass : 'animsition-overlay-slide',
				overlayParentElement : 'html',
				transition: function(url){ window.location.href = url; }
			});
		})(jQuery);
	</script>