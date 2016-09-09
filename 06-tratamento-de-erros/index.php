<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>WS -PHP  Personalizando Erros</title>
        <link rel="stylesheet" href="./06-tratamento-de-erros/css/mod_6_reset.css">
    </head>
    <body>
         <?php
         
         echo php_ini_loaded_file();
          require_once './06-tratamento-de-erros/_app/config.inc.php';
          
          trigger_error("Essa é uma NOTICE!", E_USER_NOTICE);
          trigger_error("Esse é um WARNING!", E_USER_WARNING);
          trigger_error("Esse é um ERROR !", E_USER_ERROR);
         ?>
    </body>
    
    O
</html>


