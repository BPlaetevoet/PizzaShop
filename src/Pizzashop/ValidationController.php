<?php
namespace Pizzashop;
/*
* Aparte controller om gegevens te valideren
*/
class ValidationController{

// valideer data
    public static function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
