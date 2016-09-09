<?php 
/**
 * Conn.class.php [ CONEXÃO ]
 * classe abstrata de conxão. Padrão Sigleton.
 * Retorna um Obeto PDO pelo método estático getConn();
 * @copyright (c) year, Yure Mark YureMarketing
 */
class Conn { 
    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    
    /** @var PDO */
    private static $connect = null;
    /**
     * Conecta com o banco de dados com o Pattern Singleton.
     * Retorna um Objeto PDO!
     */
    private static function Connectar()
    {
        try {            
            if (self::$connect == null): 
                $dsn = 'mysql:host=' . self::$Host . ';dbname='. self::$Dbsa;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];                
                self::$connect  = new PDO($dsn, self::$User, self::$Pass, $options);
            endif;            
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }
        
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connect;
    }
    
    /** Retorna um objeto PDO Singleton Pattern. */
    public static function getConn()
    {
        return self::Connectar();
    }
    
}
