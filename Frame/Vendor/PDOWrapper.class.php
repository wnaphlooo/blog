<?php
namespace Frame\Vendor;
use \PDO;
use \PDOException;

final class PDOWrapper {
    private $db_type;
    private $db_host;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset;
    private $pdo = null;

    public function __construct(){
        $this->db_type=$GLOBALS['config']['db_type'];
        $this->db_host=$GLOBALS['config']['db_host'];
        $this->db_port=$GLOBALS['config']['db_port'];
        $this->db_user=$GLOBALS['config']['db_user'];
        $this->db_pass=$GLOBALS['config']['db_pass'];
        $this->db_name=$GLOBALS['config']['db_name'];
        $this->charset=$GLOBALS['config']['charset'];
        $this->connectDB();
        $this->setErrMode();
    }

    public function connectDB() {
       
        try {
            $dsn = "{$this->db_type}:host={$this->db_host};port={$this->db_port};";
            $dsn .= "dbname={$this->db_name};charet={$this->charset}";
            $this->pdo = new PDO($dsn,$this->db_user, $this->db_pass);
    
        } catch (PDOException $e) {
            echo "错误状态:" . $e->getCode();
            echo '<br> 错误行:'.$e->getLine();
            echo '<br> 错误文件：'.$e->getFile();
            echo '<br> 错误信息:'.$e->getMessage();
        }
    }

    public function setErrMode(){
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    //公共的执行sql的语句的方法：insert，delete，update,set

    public function exec($sql){
           try{
            return $this->pdo->exec($sql);
           }catch(PDOException $e) {
            echo "<h2> sql语句错误</h2>";
            echo '<br> 错误行:'.$e->getLine();
            echo '<br> 错误文件：'.$e->getFile();
            echo '<br> 错误信息:'.$e->getMessage();
            die(); 
           }
    }

    public function fetchOne($sql) {
        try {
            $PDOStatement = $this->pdo->query($sql);
            return $PDOStatement->fetchOne(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           $this->showErr($e);
        }
    }

    
    public function fetchAll($sql) {
        try {
            $PDOStatement = $this->pdo->query($sql);
            return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           $this->showErr($e);
        }
    }

    public function rowCount($sql) {
        try {
            $PDOStatement = $this->pdo->query($sql);
            return $PDOStatement->rowCount();
        } catch (PDOException $e) {
           $this->showErr($e);
        }
    }
    
    private function showErr($e) {
        echo "<h2> sql语句错误</h2>";
        echo '<br> 错误行:'.$e->getLine();
        echo '<br> 错误文件：'.$e->getFile();
        echo '<br> 错误信息:'.$e->getMessage();
        die(); 
    }

}