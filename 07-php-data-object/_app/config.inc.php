<?php
//Configuração do site ###################
define('HOST','192.168.7.7');
define('USER','vagrant');
define('PASS','vagrant');
define('DBSA','wsphp');

// Auto Load de Classes ##################
function __autoload($Class)
{    
    $cDir = ['Conn'];
    $iDir = null;
    
    foreach ($cDir as $dirName):
        //verifica se o arquivo existe ou se é não é um diretório!
        if(!$iDir && file_exists(__DIR__."\\{$dirName}\\{$Class}.class.php") && !is_dir(__DIR__."\\{$dirName}\\{$Class}.class.php")):
            include_once (__DIR__."\\{$dirName}\\{$Class}.class.php");            
            $iDir = true;
        endif;
    endforeach;
    
    if(!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
    
    
    //TRATAMENTO DE ERROS ##################
    //CSS COnstantes : : Mensagens de Erro
    define('WS_ACCEPT', 'accept' );
    define('WS_INFOR', 'infor' );
    define('WS_ALERT','alert' );
    define('WS_ERROR','error' );
    
    //WSErro : : Exibe Erros lançados : : Front
    function WSErro ($ErrMsg, $ErrNo, $ErrDie = null)
    {
        $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
        echo "<p class = \"trigger {$CssClass}\">{$ErrMsg}<span class =\"ajax_close\"></span></p>";
    }   if ($ErrDie):
            die;
        endif;
    //PHPErro : : Personaliza o gatilho do PHP
        function PHPErro($ErrNo, $ErrMsg, $ErrFile, $Errline)
        {
            $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : $ErrNo));
        }
         echo "<p  class = \"trigger {$CssClass}\>";
         echo "<b>Erro na linha : #{$ErrLine} : : </b> {$ErrMsg} <br>";
         echo "<small>{$ErrFile}</small>";
         echo "<span class =\"ajax_close\"></span></p></p>";
         
     if($ErrNo == E_USER_ERROR):
         die();
     endif;
     set_error_handler('PHPErro');
}

 