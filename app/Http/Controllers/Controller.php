<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Jobs\CropImageJob;
use App\Models\Attachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File as IlluminateFile;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $form;
    protected $model;

    private $formBuilder;

    public function __construct()
    {
    }

    /**
     * Method to upload Post poster and save it in database
     * @param UploadedFile $file
     * @param $element
     * @param string $path
     * @param array $options
     * @return Builder|Model
     */
    protected function uploadGetSaveFile(UploadedFile $file, $element, string $path = "posts", $options = [])
    {
        $path = '/' . $path . '/' . $element->id;
        $filename = $file->storePublicly($path, ['disk' => "public"]);

        if (!empty($options) && (!empty($options['fit']) || !empty($options['formats']))) {
            $this->dispatch(new CropImageJob($file->getRealPath(), $filename, $options));
        }

        $data = [
            'name' => basename($filename),
            'type' => $file->getClientMimeType(),
            'attachable_type' => get_class($element),
            'attachable_id' => $element->id,
            'attribution' => $options['attribution'] ?? null,
            'created_at' => Carbon::now()
        ];

        return Attachment::create($data);
    }

    /**
     * @param string $filename
     * @param string $path
     * @return bool
     */
    protected function deleteFile(string $filename, string $path)
    {
        return IlluminateFile::delete(storage_path('app/public/uploads/' . $path . '/' . $filename));
    }

    /**
     * @param $file
     * @param $path
     * @param array $formats
     * @param $default
     */
    protected function deleteFileWithCropping($file, $path, $formats = [], $default = false)
    {
        $path = 'app/public/uploads/' . $path . '/';
        if (!empty($formats)) {
            foreach ($formats as $format) {
                IlluminateFile::delete(storage_path($path . $this->croppingFilename($file, $format['with'], $format['height'])));
            }
        }
        if ($default) {
            IlluminateFile::delete(storage_path('app/public/uploads/' . $path . '/' . $file->name));
        }
    }

    /**
     * Get cropping|resizing file name
     * @param $file
     * @param $width
     * @param $height
     * @return array|string
     */
    protected function croppingFilename($file, $width, $height)
    {
        $name = explode('.', $file->name);
        $name = $name[0] . $width . "x" . $height . '.' . $name[1];
        return $name;
    }

    /**
     * @param $path
     * @return bool
     */
    protected function deleteDirectory($path)
    {
        return IlluminateFile::deleteDirectory(storage_path('app/public/' . $path));
    }

    /**
     * @param null $model
     * @return Form
     */
    protected function getForm($model = null)
    {
        if (isset($this->model)) {
            $model = $model ?: new $this->model;
        } else {
            $model = "";
        }
        return $this->formBuilder->create($this->form, [
            'model' => $model
        ]);
    }

    /**
     * @param array $data
     * @param null $model
     * @return Form
     */
    protected function getFormWithData(array $data, $model = null)
    {
        if (isset($this->model)) {
            $model = $model ?: new $this->model;
        } else {
            $model = "";
        }
        return $this->formBuilder->create($this->form, [
            'model' => $model
        ], $data);
    }

    /**
     * @param array $elts
     * @param string|null $customField
     * @return array
     */
    public function formConstructData(array $elts, ?string $customField = null)
    {
        $data = [];
        if (!is_null($customField)) {
            foreach ($elts as $elt) {
                $data[$elt->id] = $elt->$customField;
            }
        } else {
            foreach ($elts as $elt) {
                $data[$elt->id] = $elt->name;
            }
        }
        return $data;
    }

    /**
     * @param array $values
     * @param string|null $field
     * @param string|null $customField
     * @return array
     */
    public function formConstructDataWithParent(array $values, ?string $field = 'sub', ?string $customField = null)
    {
        $data = [];

        if (!is_null($customField)) {
            foreach ($values as $elt) {
                foreach ($elt->{$field} as $item) {
                    $data[$elt->name][$item->id] = $item->$customField;
                }
            }
        } else {
            foreach ($values as $elt) {
                if ($elt->{$field}->isNotEmpty()) {
                    foreach ($elt->{$field} as $item) {
                        $data[$elt->name][$item->id] = $item->name;
                    }
                } else {
                    $data[] = $elt->name;
                }
            }
        }
        return $data;
    }

    /**
     * Cette méthode permet de savoir si l'utilisateur connecté est un administrateur
     * @return mixed
     */
    protected function isAdmin()
    {
        return auth()->user()->hasRole(['admin', 'super admin']);
    }
}
