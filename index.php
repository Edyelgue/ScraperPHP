<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Automação</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="" method="post">
        <div>
            <input type="submit" name="executarAuto" value="executarAuto">
        </div>
    </form>
</body>
</html>

<?php

// Inclua a biblioteca Simple HTML DOM Parser
require './simple_html_dom.php';

// URL da página a ser raspada
$url = 'https://github.com/Edyelgue?tab=repositories';

// Antes de fazer a solicitação HTTPS
stream_context_set_default([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

// Faça uma solicitação GET para obter o conteúdo da página
$html = file_get_html($url);

// Verifique se a página foi carregada corretamente
if (!$html) {
    echo "Erro ao carregar a página.";
    exit;
}

// Extrair informações da página
// Por exemplo, vamos extrair todos os links da página
echo "<hr>";
foreach ($html->find('h3 a') as $link) {
    echo trim($link->plaintext) . "<br>---<br>";
}

// Libere os recursos
$html->clear();
unset($html);

stream_context_set_default([
    'ssl' => [
        'verify_peer' => true,
        'verify_peer_name' => true,
    ],
]);

?>