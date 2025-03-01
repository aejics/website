<style>
    .imagens-not img {
        width: 100%;
        height: auto;
    }
</style>
<body>
    <?php include '../src/navbar.php'; ?>
    <div class="justify-content-center text-center">
        <div class="text-center mt-3">
            <h3>Acontecimentos no AEJICS</h3>
            <p>Ano Letivo: 2024-2025</p>
            <hr width="20%" class="mx-auto">
        </div>
        <?php 
        $files = array_reverse(glob('*.json'));
        foreach ($files as $file) {
            if ($file == 'exemplo.json') {
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
