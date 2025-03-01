<?php
        // PARTE IMPORTANTE PARA O ADMINISTRADOR
        // Definir os links manualmente. Talvez seja mudado numa versão futura.
        $links = array(
            '/' => 'Página Principal',
            '/acontecimentos/' => 'Acontecimentos',
            '/ae/' => array(
                'title' => 'Agrupamento',
                'submenu' => array(
                    '/ae/escolas/' => 'Escolas',
                    '/ae/bibliotecasescolares/' => 'Bibliotecas Escolares',
                    '/ae/padde/' => 'Plano de Ação para o Desenvolvimento Digital de Escola',
                    '/ae/servicos/' => 'Serviços Administrativos',
                    '/ae/comunidadeducativa/' => 'Comunidade Educativa'
                )
            ),
            '/orgaosdegestao/' => 'Órgãos de Gestão',
            '/al20242025/' => array(
                'title' => 'Ano Letivo 2024-2025',
                'submenu' => array(
                    '/al20242025/critavaliacao/' => 'Critérios de Avaliação',
                    '/al20242025/provaseexames/' => 'Provas e Exames',
                    '/al20242025/projetosclubes/' => 'Projetos e Clubes',
                )
            ),
            '/contratacao/' => 'Contratação',
            '/contactos/' => 'Contactos'
        );
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEJICS</title>
    <meta name="description" content="Agrupamento de Escolas Joaquim Inácio da Cruz Sobral">
    <meta name="image" content="https://i.imgur.com/MsppKyi.png">
    <meta name="author" content="AEJICS">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="AEJICS, Agrupamento de Escolas Joaquim Inácio da Cruz Sobral, Sobral de Monte Agraço, Escola, Pero Negro">
    <link rel="icon" href="https://i.imgur.com/MsppKyi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php echo "<nav class='navbar sticky-top navbar-light navbar-expand-lg bg-success'>
        <div class='container-fluid'>
            <a class='navbar-brand text-white' href='/'>
                <img src='https://i.imgur.com/MsppKyi.png' alt='Logotipo do AEJICS' width='30' height='30' class='d-inline-block align-text-top'>
                Agrupamento de Escolas Joaquim Inácio da Cruz Sobral
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#links' aria-controls='links' aria-expanded='false' aria-label='Ver links'>
                <span class='navbar-toggler-icon'></span>
            </button>
        </div>
        <div class='collapse navbar-collapse text-white' id='links'>
        <ul class='navbar-nav' style='white-space: nowrap;'>";
        foreach ($links as $link => $text) {
            if (is_array($text)) {
                echo "<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle text-white' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    {$text['title']}
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                foreach ($text['submenu'] as $sublink => $subtext) {
                    echo "<li><a class='dropdown-item' href='$sublink'>$subtext</a></li>";
                }
                echo "</ul></li>";
            } else {
            if ($_SERVER['REQUEST_URI'] == $link) {
                echo "<li class='nav-item'>
                <a class='nav-link text-light active fw-bold' aria-current='$link' href='$link'>$text</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link text-white' aria-current='$link' href='$link'>$text</a>
            </li>";
            }
            }
        }
        echo "</ul></div></nav>";
?>