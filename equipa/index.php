<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipa Responsável - Acontecimentos no AEJICS</title>
    <meta name="description" content="Equipa de Apoio à Produção e Acontecimentos no Agrupamento">
    <meta name="image" content="https://i.imgur.com/MsppKyi.png">
    <meta name="author" content="Produções AEJICS">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="AEJICS, Acontecimentos, 2024, 2025">
    <link rel="icon" href="https://i.imgur.com/MsppKyi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    .imagens-not img {
        width: 100%;
        height: auto;
    }
</style>
<body>
    <nav class="navbar sticky-top navbar-light navbar-expand-lg bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">
                <img src="https://i.imgur.com/MsppKyi.png" alt="Logotipo do AEJICS" width="30" height="30" class="d-inline-block align-text-top">
                Acontecimentos AEJICS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#links" aria-controls="links" aria-expanded="false" aria-label="Ver links">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse text-white" id="links">
            <ul class="navbar-nav" style="white-space: nowrap;">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="/" href="/">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="/equipa" href="/equipa/">Equipa Responsável</a>
                </li>
            </ul>
        </div>
        <br>
    </nav>
    <div class="justify-content-center text-center">
        <div class="text-center mt-3">
            <h3>Equipa Responsável</h3>
            <p>A Equipa de Apoio à Produção e Acontecimentos no Agrupamento</p>
            <hr width="20%" class="mx-auto">
        </div>
    <?php 
        print "<div class='d-flex justify-content-center flex-wrap'>";
        $files = glob('membros/*.json');
        foreach ($files as $file) {
            $json = json_decode(file_get_contents($file), true);
            print "<div class='card m-2' style='width: 18rem;'>";
            print "<img src='".$json['foto']."' class='card-img-top' alt='Foto de ".$json['nome']."'>";
            print "<div class='card-body'>";
            print "<h5 class='card-title'>".$json['nome']."</h5>";
            print "<p class='card-text'>".$json['descricao']."</p>";
            print "<a href='mailto:".$json['email']."' class='btn btn-primary'>Contactar</a>";
            print "</div>";
            print "</div>";
        }
        print "</div>";
    ?>
    <div class="footer justify-content-center text-center bg-success text-white">
        <p>© 2024-2025 Produções AEJICS</p>
    </div>
</body>
</html>
