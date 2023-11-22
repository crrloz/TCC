	<footer>
		<div class="container m-t-40">
			<div class="row">
				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="m-b-33">
						Contate-nos
					</h4>

					<ul class="m-b-70">
						<?php
						$sql = "SELECT elementsText FROM site_element WHERE elementsName = 'telefone_coletivo';";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);

						if ($result) { ?>
						<li class="m-b-14 admin-hov">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							<?php echo $row['elementsText']."</li>";
						} else { ?>
						<li class="m-b-14 admin-hov">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							Erro na consulta SQL
						</li>
						<?php }?>
							
						<?php
						$sql = "SELECT elementsText FROM site_element WHERE elementsName = 'email_coletivo';";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						
						if ($result) { ?>
						<li class="m-b-14 admin-hov">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							<?php echo $row['elementsText']."</li>";
						} else { ?>
						<li class="m-b-14 admin-hov">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							Erro na consulta SQL
						</li>
						<?php } ?>

						<li class="m-t-20 m-b-14">
							<a href="contact.php" class="btn4 bo-color1 color6 bo-color-user color-user">CONTATAR</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="m-b-33">
						Serviços para Clientes
					</h4>

					<div class="m-b-25">
						<ul class="m-b-70">
							<li class="m-b-14">
								<a href="policy.php" class="color4">Política de Proteção e Privacidade</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="end-footer bg2 bg-user">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-20 c-white"><i class="fa fa-youtube-play m-l-18" aria-hidden="true"></i></a>
						<a target="_blank" href="https://instagram.com/coletivo.humanos/" class="fs-20 c-white"><i class="fa fa-instagram m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="color0 p-r-20 p-t-5 p-b-5">
						Projeto de TCC
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- De volta ao topo -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</span>
	</div>

    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
	
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