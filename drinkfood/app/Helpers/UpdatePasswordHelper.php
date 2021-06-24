<?php

function showErrorValidate($errors)
{
    if ($errors->any())
    {
        foreach ($errors->all() as $error)
        {
            echo "<span class='error'>".trans("message.$error")."</span><br>";
        }
    }
}

?>