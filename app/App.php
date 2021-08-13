<?php


namespace App;


use App\Features\StorageFile;

class App
{
    /**
     * Retourne l'identifiant passé en url
     * @return int|null
     */
    public static function getUpdatedIdFromUrl(){
        $id = explode('/', request()->path());
        $id = end($id);
        if (is_numeric($id)){
            $id = (int) $id;
        }else{
            $id = null;
        }
        return $id;
    }

    /**
     * @return StorageFile
     */
    public static function storage(){
        return (new StorageFile());
    }

    /**
     * @param string $content
     * @return string
     */
    public static function parseUrl(string $content):string
    {
        $content = preg_replace("/((http)+(s)?:\/\/[^<>\s]+)/", "<a href='$1' target='_blank'>$1</a>", $content);
        return $content;
    }
}
