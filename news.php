<?php include_once 'head.php';?>
    <title>Novidades | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    input {
		width: 100%;
		height: 100%;
		border: none;
        background: none;
		color: #9267b0;
	}

	::-webkit-input-placeholder {
		color: #9267b0;
	}

	.input-field-subject {
        border: 0;
        background-color: transparent;
        border-bottom: 0.5px solid; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
        width: 100%;
    }

    .input-field-subject:focus, .input-field-subject:valid {
        outline: 0;
        border-bottom: 1px solid;
    }
</style>
<body style="background-color: rgb(250, 238, 221);">
    <!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/inaraemulher.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            NOVIDADES
        </h2>
    </section>


    <!-- Seção de Administração -->
    <?php if(isset($_SESSION["isadmin"])){ ?>
    <section class="section-news p-b-113" action="includes/news.inc.php">
		<div class="container">
            <h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				CADASTRE UMA NOVIDADE
			</h2>

			<form action="includes/news.inc.php" method="post" enctype="multipart/form-data" class="wrap-form-news size22 m-l-r-auto">
				<div class="row">
					<div class="col-md-4">
						<!-- Título -->
						<span>
							Título da notícia
						</span>

						<div class="wrap-inputtitle size12 bo3 m-t-3 m-b-23">
							<input class="input-news sizefull p-l-20" type="text" name="title" placeholder="Título">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Url -->
						<span>
							Url
						</span>

						<div class="wrap-inputurl size12 bo3 m-t-3 m-b-23">
							<input class="input-news sizefull p-l-20" type="text" name="url" placeholder="Url">
						</div>
					</div>

					<div class="col-md-4">
						<!-- PDF -->
						<span>
							PDF (opcional)
						</span>

						<div class="wrap-inputpdf size12 bo3 m-t-3 m-b-23">
                            <input class="input-news sizefull p-l-20" type="file" name="pdf" placeholder="PDF">
						</div>
					</div>
				</div>

                <div class="col-12 t-center m-b-10">
					<p>Caso deseja fazer o upload apenas de um PDF, a adição de uma Url não será útil.</p>
				</div>

                <div class="col-12 flex-c-m bo-rad-10 bg1 bg5-hover trans-0-4">
					<!-- Imagem -->
					<label for="fileInput" class="m-t-10 m-b-10 color0 pointer">
						<span class="ti-plus"></span> Adicionar foto
					</label>
					<input type="file" name="image" id="fileInput" style="display: none;"/>
				</div>

				<div class="wrap-btn-send flex-c-m m-t-13">
					<!-- Button3 -->
					<button class="btn3 flex-c-m size36 trans-0-4" type="submit" name="submit_news">
						Enviar
					</button>
				</div>
			</form>
        </div>
    </section>
    <?php } ?>
</body>
