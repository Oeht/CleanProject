<?php

class myPDO 
{
    private $dbh;
    private $dbTmp;
    private $POST;
    
    
    function myPDO()
    {
        try
        {
            $this->dbh = new PDO(PDO_DSN,PDO_USER,PDO_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br />";
            echo "Benutzer und/oder Passwort falsch!";
            die();
        }
        
        $this->POST = $_POST;
    }
    
    function query($sql,$array=array(),$fetchAll=false)
    {
        $qry_type = explode(" ",$sql);
        $result=false;
        /***
        ** TODO:
        ** möglichkeit für boolischen rückgabewert checken
        **/
        $qt = strtoupper($qry_type[0]);
        switch($qt)
        {
            case "SELECT":
                            $this->dbTmp = $this->dbh->prepare($sql);
                            $this->dbTmp->execute($array);
                            if($fetchAll)
                            {
                                while( $row = $this->dbTmp->fetchAll(PDO::FETCH_ASSOC))
                                {
                                    $result = $row;
                                }
                            }
                            else
                            {
                                while( $row = $this->dbTmp->fetch(PDO::FETCH_ASSOC))
                                {
                                    $result = $row;
                                }
                            }
                            break;
            case "UPDATE":
            case "INSERT":
            case "DELETE":
                            $this->dbTmp = $this->dbh->prepare($sql);
                            $result = $this->dbTmp->execute($array);
                            break;
            default: break;
        }
        
        return $result;
    }
    
    function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    
    function prepareSQLstatement(&$string,&$array,$statement,$md5=false)
    {
        $tmp = explode("=",$statement);
        
        // array vorbereiten. ggf mit md5
        if($md5)
        {
            $array[$tmp[1]] = md5($this->POST[$tmp[0]]);
        }
        else
        {
            $array[$tmp[1]] = $this->POST[$tmp[0]];
        }
        
        // string füllen. ggf mit komma anhängen
        if(!empty($string))
        {
            $string .= ", " . $statement;
            
        }
        else
        {
            $string .= $statement;
        }
    }
}
    
?>