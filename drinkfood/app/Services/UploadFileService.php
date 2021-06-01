<?php
namespace App\Services;

use PhpParser\Builder\Class_;

class UploadFileService
{

    /* Function upload avatar */
    function UploadAvatar($req, $file, $pathSaveFile)
    {
        $rules = [
                "avatar" => "mimes:jpeg,png,jpg|max:2048",
            ];

        $messages = [
                "avatar.mimes" => trans_choice('message.file_not_correct', 1),
                "avatar.max" => trans_choice('message.file_not_correct', 2)
            ];

        $validate = $req->validate($rules, $messages);
        if($validate == true)
        {          
            /* Get extension of file current user upload */
            $fileExtension = $file->getClientOriginalExtension();
            /* Create new name file */
            $newNameFile = "drinksfoods_".time().rand(0000,9999).".".$file->getClientOriginalExtension();
            /* Save file in to folder */
            $saveFile = $file->move($pathSaveFile, $newNameFile);
            return $newNameFile;
        }else{
            return redirect()->back();
        }  
    }
}

?>