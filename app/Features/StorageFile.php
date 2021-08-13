<?php


namespace App\Features;


use Illuminate\Database\Eloquent\Model;

class StorageFile
{
    /**
     * @param $original
     * @param array $format
     * @return array|string
     */
    public function filenameWithCrop($original, array $format){
            $name = explode('.', $original);
            $name = $name[0] . $format['width'] . "x" . $format['height'] . '.' . $name[1];
        return $name;
    }

    /**
     * @param $original
     * @param array $format
     * @param Model $model
     * @param string $path
     * @return string
     */
    public function filenameWithCropAndPath($original, array $format, Model $model, string $path = "products"){
        $name = explode('.', $original);
        $name = $name[0] . $format['width'] . "x" . $format['height'] . '.' . $name[1];
        return '/storage/'.$path.'/'.$model->id.'/'.$name;
    }

    /**
     * Return poster with fit value
     * @param Model $lastPost
     * @param string $type
     * @param int $width
     * @param int $height
     * @return string
     */
    public function getPosterWith(Model $lastPost, int $width, int $height, string $type = 'posts')
    {
        $url = "/storage/" . $type . "/" . $lastPost->id;
        if ($lastPost->poster) {
            $name = explode('.', $lastPost->poster->name);
            $name = $name[0] . $width . "x" . $height . '.' . $name[1];
            $url .= '/' . $name;
        } elseif ($lastPost->avatar) {
            $name = explode('.', $lastPost->avatar->name);
            $name = $name[0] . $width . "x" . $height . '.' . $name[1];
            $url .= '/' . $name;
        }
        return $url;
    }

    /**
     * Return poster with fit value
     * @param Model $element
     * @param string $type
     * @param string $field
     * @return string
     */
    public function getPoster(Model $element, string $type = 'posts', string $field = "poster")
    {
        $url = "/storage/" . $type . "/" . $element->id;
        if ($element->{$field}) {
            $url .= '/' . $element->{$field}->name;
        }
        return $url;
    }

    /**
     * @param $element
     * @param $last
     * @param string $type
     * @return string
     */
    public function getPosterWithout($element, $last, string $type = "posts")
    {
        $url = "/storage/" . $type . "/" . $element->id;
        if ($last) {
            $url .= '/' . $last->name;
        }
        return $url;
    }

    /**
     * @param $element
     * @param $last
     * @param int $width
     * @param int $height
     * @param string $type
     * @return string
     */
    public function getPosterWithoutDefault($element, $last, int $width, int $height, string $type = "products")
    {
        $url = "/storage/" . $type . "/" . $element->id;
        if ($last) {
            $name = explode('.', $last->name);
            $name = $name[0] . $width . "x" . $height . '.' . $name[1];
            $url .= '/' . $name;
        }
        return $url;
    }

    public function getImages($name)
    {
        return '/images/' . $name;
    }


}
