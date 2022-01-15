<?php
    namespace App\LibraryStrings;

    class Strings{

        function rand_string() 
        {  
            $chars = config('setuid.characters');  
            $size = strlen( $chars );  

            $str = "";
            for( $i = 0; $i < config('setuid.lenght_uid'); $i++ ) 
            {  
                $str .= $chars[ rand( 0, $size - 1 ) ]; 
            }  
            return $str;
        }  
    }
?>