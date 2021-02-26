<?php

namespace app\Helpers;

class CommonFunction
{

    public static function fileUpload($file, $fileName)
    {
        $flag = $file->storeAs(
            'images',
            $fileName
        );

        if($flag != false)
            return $fileName;
        else
            return null;
    }
}
