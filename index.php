<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acontecimentos no AEJICS</title>
    <meta name="description" content="Acontecimentos no AEJICS">
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
            <h3>Acontecimentos no AEJICS</h3>
            <p>Ano Letivo: 2024-2025</p>
            <hr width="20%" class="mx-auto">
        </div>
        <?php 
        $files = array_reverse(glob('acontecimentos/*.json'));
        foreach ($files as $file) {
            if ($file == 'acontecimentos/exemplo.json') {
                continue;
            };
            $json = json_decode(file_get_contents($file), true);
            echo '<div class="noticia border border-success p-2 mb-1 mx-auto w-75">';
            echo '<div class="row">';
            echo '<div class="col-12 col-md-8 p-2">';
            echo '<h3>'.$json['titulo'].'</h3>';
            echo '<p class="fw-light">'.$json['texto'].'</p>';
            echo '</div>';
            if ($json['anexos']['ativado']) {
                switch ($json['anexos']['tipo']){
                    case 'imagens':
                        echo '<div class="col-12 col-md-4 p-2 imagens-not">';
                        foreach ($json['anexos']['imagens'] as $img) {
                            echo '<img src="'.$img.'" class="img-fluid mb-2">';
                        }
                        if ($json['anexos']['album']) {
                            echo '<br><br><a href="'.$json['anexos']['album'].'" class="btn btn-success">Ver Álbum Completo</a>';
                        }
                        echo '</div>';
                        break;
                    case 'imagenspequenas':
                        echo '<div class="col-12 col-md-4 p-2 imagens-not">';
                        foreach ($json['anexos']['imagens'] as $img) {
                            echo '<img src="'.$img.'" class="img-fluid mb-2" style="max-width:40%">';
                        }
                        if ($json['anexos']['album']) {
                            echo '<br><br><a href="'.$json['anexos']['album'].'" class="btn btn-success">Ver Álbum Completo</a>';
                        }
                        echo '</div>';
                        break;
                    case 'imagenscustom':
                        echo '<div class="col-12 col-md-4 p-2 imagens-not">';
                        foreach ($json['anexos']['imagens'] as $img) {
                            echo '<img src="'.$img.'" class="img-fluid mb-2" style="max-width:'.$json['anexos']['tamanho'].'%">';
                        }
                        if ($json['anexos']['album']) {
                            echo '<br><br><a href="'.$json['anexos']['album'].'" class="btn btn-success">Ver Álbum Completo</a>';
                        }
                        echo '</div>';
                        break;
                    case 'youtube':
                        echo '<div class="col-12 col-md-4 p-2 yt-not">';
                        echo '<div class="ratio ratio-16x9">';
                        echo '<iframe src="https://youtube.com/embed/'.$json['anexos']['video'].'" allowfullscreen></iframe>';
                        echo '</div>';
                        if ($json['anexos']['album']) {
                            echo '<br><br><a href="'.$json['anexos']['album'].'" class="btn btn-success">Ver Álbum Completo</a>';
                        }
                        echo '</div>';
                }
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
    <div class="footer justify-content-center text-center bg-success text-white">
        <p>© 2024-2025 Produções AEJICS</p>
    </div>
</body>
</html>
