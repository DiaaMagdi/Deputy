<?php
include_once("config.php");
class control{

//========================================================================================        
//========================================================================================
//                                      PUBLIC VALIDATION INPUTS
//========================================================================================
//========================================================================================
    public function validate(array $inps){
        $counter = 0;
        foreach($inps as $key=>$input){
            if($key == "phone"){
                list($msg,$bool) = $this->mobileValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "name"){
                list($msg,$bool) = $this->personsNamesValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "email"){
                list($msg,$bool) = $this->emailValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "address"){
                list($msg,$bool) = $this->addressValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "text"){
                list($msg,$bool) = $this->textValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "mobile"){
                list($msg,$bool) = $this->mobileValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "username"){
                list($msg,$bool) = $this->usernameValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "password"){
                list($msg,$bool) = $this->passwordValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "url"){
                list($msg,$bool) = $this->urlValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "intNo"){
                list($msg,$bool) = $this->intNumberValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "floatNo"){
                list($msg,$bool) = $this->floatNumberValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "ip"){
                list($msg,$bool) = $this->IPsValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "date"){
                list($msg,$bool) = $this->dateValidation($input);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
            elseif($key == "sepText"){
                $sep = $inps['sep'];
                list($msg,$bool) = $this->separatedTextValidation($input,$sep);
                if($bool == true){
                    $counter++;
                }
                else{
                    $arr[] = $msg;
                    $arr[] = false;
                    return $arr;
                }
            }
        }
        $arr[] = $counter;
        $arr[] = true;
        return $arr;
    }
//========================================================================================    
//========================================================================================
//                                 END PUBLIC VALIDATION INPUTS
//========================================================================================
//========================================================================================
    

    
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------

    
    
    
//========================================================================================    
//========================================================================================
//                                 PRIVATE VALIDATION FUNCTIONS
//========================================================================================
//========================================================================================
    
    
//========================================================================================    
//                                 Validation Persons Names 
//========================================================================================    
    private function personsNamesValidation($name){
        if($name == null){
            $arr[] = false;
            $arr[] = "Please fill the name field";
            return $arr;
        }  
        elseif(strlen($name) < 8 || strlen($name) > 100){
            $arr[] = false;
            $arr[] = "Names must be between 8 and 100 letters";
            return $arr;
        } 
        elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $arr[] = false;
            $arr[] = "Please use letters and white spaces only";
            return $arr;
        }
        else{
            $arr[] = true; 
            $arr[] = "ok";
            return $arr;
        } 
    }
//========================================================================================    
//                                  End Validation Persons Names 
//========================================================================================


    
    
//========================================================================================
//                                      Validation Mobile 
//========================================================================================    
    private function mobileValidation($mobile){
        if($mobile == null){
            $arr[] = false;
            $arr[] = "Please enter mobile number";
            return $arr;
        }
        elseif(is_numeric($mobile) == false){
            $arr[] = "please check your numbers";
            $arr[] = false;
            return $arr;
        }
        elseif(strlen($mobile) != 11){
            $arr[] = "Complete phone number (11 Numbers)";
            $arr[] = false;
            return $arr;
        }
        elseif($mobile[0] != '0' && $mobile[1] != '1' ){
            $arr[] = "Mobile starts with 01";
            $arr[] = false;
            return $arr;
        }
        elseif($mobile[2] == '0' || $mobile[2] == '1' || $mobile[2] == '2'){
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
        else{
            $arr[] = "Mobile number starts with 010, 011 or 012";
            $arr[] = false;
            return $arr;
        }
    }
//========================================================================================    
//                                 End Validation Mobile 
//========================================================================================


    
    
//========================================================================================    
//                                   Validation Address 
//========================================================================================    
    private function addressValidation($address){
        if($address == null){
            $arr[] = "Please fill address field";
            $arr[] = false;
            return $arr;
        }
        else{
            $addressArray = explode(',',$address);
            $lastAddressIndex = end($addressArray);
            foreach($addressArray as $val){
                if($val == null){
                    $arr[] = "Check your address please (Must include comma ',').";
                    $arr[] = false;
                    return $arr;
                }
            }
            if(strlen($lastAddressIndex) < 4){
                $arr[] = "Address is too short";
                $arr[] = false;
                return $arr;
            }
            else{
                $arr[] = "ok";
                $arr[] = true;
                return $arr;
            }
        } 
    }
//========================================================================================    
//                                      End Validation Address 
//========================================================================================    
    
    
    
//========================================================================================    
//                                       Validation Email 
//========================================================================================    
    private function emailValidation($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $arr[] = "Check your email please";
            $arr[] = false;
            return $arr; 
        }
        else {
            $arr[] = "ok";
            $arr[] = true;
            return $arr;          
        }
    }
//========================================================================================    
//                                    End Validation Email 
//========================================================================================




//========================================================================================    
//                                    Validation Full Text 
//========================================================================================
    private function textValidation($text){
        if($text == "optionalText"){
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
        elseif(strlen($text) < 15 ){
            $arr[] = "Text is too short must be more than 15 letters";
            $arr[] = false;
            return $arr;
        }
        elseif(strlen($text) > 3000){
            $arr[] = "Text is too long must be less than 3000 letters";
            $arr[] = false;
            return $arr;
        }
        else{
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
    }
//========================================================================================    
//                                      End Validation Full Text 
//========================================================================================    
    
    
    
    
//========================================================================================    
//                                          Validation URL
//======================================================================================== 
    private function urlValidation($url){
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)){
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
        else{
            $arr[] = "Please enter a valid URL starts with http:// or https://";
            $arr[] = false;
            return $arr;
        }
    }
//========================================================================================    
//                                          End Validation URL 
//========================================================================================



    
//========================================================================================    
//                                          Validation INT Numb
//========================================================================================    
    private function intNumberValidation($number){
        if (!filter_var($number, FILTER_VALIDATE_INT)) {
            $arr[] = "Please enter a valid number";
            $arr[] = false;
            return $arr;
        }
        else{
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
    }
//========================================================================================    
//                                        END Validation INT Numb
//========================================================================================


    
    
    
 //========================================================================================   
 //                                       Validation FLOAT Numb
//========================================================================================    
    private function floatNumberValidation($number){
        if (!filter_var($inp, FILTER_VALIDATE_FLOAT)) {
            $arr[] = "Please enter a valid number";
            $arr[] = false;
            return $arr;
        }
        else{
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
    }
//========================================================================================    
//                                      END Validation FLOAT Numb
//========================================================================================

    
    
    
    
//========================================================================================    
//                                          Validation IP 
//========================================================================================    
    private function IPsValidation($ip){
        if (!filter_var($inp, FILTER_VALIDATE_IP)) {
            $arr[] = "Please check your ip address";
            $arr[] = false;
            return $arr;
        }
        else{
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
    }
//========================================================================================    
//                                      END Validation IP 
//========================================================================================


    
    
//========================================================================================    
//                                          Validation Date 
//========================================================================================
    private function dateValidation($date){
        $arrDate = explode('/',$date);
        if(is_numeric($arrDate[0]) && is_numeric($arrDate[1]) && is_numeric($arrDate[2])){
            $res = checkdate($arrDate[1],$arrDate[0],$arrDate[2]);
            if(!$res){
                $arr[] = "Please check the date format";
                $arr[] = false;
                return $arr;
            }
            else{
                $arr[] = "ok";
                $arr[] = true;
                return $arr;
            }
        }
        else{
            $arr[] = "Please check the date values, just numbers are allowed";
            $arr[] = false;
            return $arr;
        }
    }
//========================================================================================    
//                                      END Validation Date 
//========================================================================================
    
    
    
    
    
//========================================================================================    
//                                       Validation Username 
//========================================================================================     
    private function usernameValidation($username){
        if (ctype_alnum($inp)) {
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
        else{
            $arr[] = "Please check the username value";
            $arr[] = false;
            return $arr;
        }
    }
//========================================================================================
//                                      END Validation Username 
//========================================================================================
    
    
    
    
//========================================================================================    
//                                        Validation Password 
//========================================================================================    
    private function passwordValidation($password){
        if (strlen($password) >= 6 && strlen($password) < 150 ) {
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
        else{
            $arr[] = "Please check the password value, must be between 6:150 letters";
            $arr[] = false;
            return $arr;
        }
    }
//========================================================================================    
//                                  END Validation Password 
//========================================================================================    
    
    


//========================================================================================   
//                                  Validation Separated Text 
//========================================================================================    
    private function separatedTextValidation($sepText,$sep){
        $sepPos = strpos($sepText,$sep);
        if($sepPos <= 0 ){
            $arr[] = "You have to use comma symbole ',' in your text";
            $arr[] = false;
            return $arr;
        }
        else{
            $arr[] = "ok";
            $arr[] = true;
            return $arr;
        }
    }
//========================================================================================    
//                                 End Validation Separated Text 
//========================================================================================    
    
    
//========================================================================================    
//========================================================================================
//                              END PRIVATE VALIDATION FUNCTIONS
//========================================================================================
//========================================================================================
    
    
    
    
//---------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------    
    
    
    
    
    
    
    
//========================================================================================    
//========================================================================================
//                                     PUBLIC QUERIES
//========================================================================================
//========================================================================================    
    
    
    
//========================================================================================    
//                                      Public Select 
//========================================================================================    
    public function selAll($tab,$cols,$cond){
        $objModel = new model;
        $res = $objModel->sel($tab,$cols,$cond);
        return $res;
    }
//========================================================================================    
//                                      End Public Select 
//========================================================================================    
    
    
    
    
    
    
    
//========================================================================================    
//                                      Public Insert 
//========================================================================================    
    public function insAll($tab,$cols,$vals){
        $objModel = new model;
        $bool = $objModel->ins($tab,$cols,$vals);
        return $bool;
    }
//========================================================================================    
//                                      End Public Insert 
//========================================================================================    
    
    
    
    
    
//========================================================================================    
//                                       Public Update 
//========================================================================================    
    public function upAll($tab,$colsAndValues,$cond){
        $objModel = new model;
        $bool = $objModel->up($tab,$colsAndValues,$cond);
        return $bool;
    }
//========================================================================================    
//                                      End Public Update 
//========================================================================================    
    
    
    
    
    
//========================================================================================    
//                                      Public Delete 
//========================================================================================    
    public function delAll($tab,$cond){
        $objModel = new model;
        $bool = $objModel->del($tab,$cond);
        return $bool;
    }
//========================================================================================    
//                                    End Public Delete 
//========================================================================================    
    
    
    
  
  
//========================================================================================    
//                                  Public Select Query 
//========================================================================================    
    public function selAllQ($Q){
        $objModel = new model;
        $res = $objModel->Q($Q);
        return $res;
    }
//========================================================================================    
//                                  End Public Delete 
//========================================================================================    
    

    
    
//========================================================================================
//========================================================================================
//                                  End Of PUBLIC QUERIES
//========================================================================================
//========================================================================================
}
?>