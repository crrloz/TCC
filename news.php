<?php include_once 'head.php';
if(isset($_SESSION["isadmin"])){ ?>
    <form action="includes/news.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Título da notícia">
        <input type="text" name="url" placeholder="URL da notícia">
        <input type="file" name="image" placeholder="Imagem da notícia">

        <input type="submit" name="submit_news" value="CADASTRAR NOTÍCIA">
    </form>
<?php } ?>