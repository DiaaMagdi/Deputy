<?php
class model{
    public function ins($tab,$cols,$vals){
        $objConfig = new config;
        $q = "INSERT INTO $tab ($cols) VALUES ($vals)";
        mysqli_query($objConfig->link,"SET NAMES 'utf8'");
        mysqli_query($objConfig->link,'SET CHARACTER SET utf8');
        $bool = mysqli_query($objConfig->link,$q);
        //$bool = mysqli_error($objConfig->link);
        return $bool;
    }
    public function sel($tab,$cols,$cond){
        $objConfig = new config;
        $q = "SELECT $cols FROM $tab WHERE $cond";
        mysqli_query($objConfig->link,"SET NAMES 'utf8'");
        mysqli_query($objConfig->link,'SET CHARACTER SET utf8');
        $res = mysqli_query($objConfig->link,$q);
        if(mysqli_num_rows($res) <= 0){
            return mysqli_error($objConfig->link);
        }
        else{
            return $res;
        }
        //$bool = mysqli_error($objConfig->link);
    }
    public function up($tab,$colsAndValues,$cond){
        $objConfig = new config;
        $q = "UPDATE $tab SET $colsAndValues WHERE $cond";
        mysqli_query($objConfig->link,"SET NAMES 'utf8'");
        mysqli_query($objConfig->link,'SET CHARACTER SET utf8');
        $bool = mysqli_query($objConfig->link,$q);
        //$bool = mysqli_error($objConfig->link);
        return $bool;
    }
    public function del($tab,$cond){
        $objConfig = new config;
        $q = "DELETE FROM $tab WHERE $cond";
        mysqli_query($objConfig->link,"SET NAMES 'utf8'");
        mysqli_query($objConfig->link,'SET CHARACTER SET utf8');
        $bool = mysqli_query($objConfig->link,$q);
        //$bool = mysqli_error($objConfig->link);
        return $bool;
    }
    public function Q($q){
        $objConfig = new config;
        mysqli_query($objConfig->link,"SET NAMES 'utf8'");
        mysqli_query($objConfig->link,'SET CHARACTER SET utf8');
        $res = mysqli_query($objConfig->link,$q);
        if(mysqli_num_rows($res) <= 0){
            return false;
        }
        else{
            return $res;
        }
        //$bool = mysqli_error($objConfig->link);
//        return $bool;
    }
}
?>