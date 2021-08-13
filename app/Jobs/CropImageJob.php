<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\ImageManager;

class CropImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $realPath;
    /**
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $formats;
    /**
     * @var string|null
     */
    private $filename;
    /**
     * @var array
     */
    private $options;

    /**
     * Create a new job instance.
     *
     * @param string $realPath
     * @param string|null $filename
     * @param array $options
     */
    public function __construct(string $realPath,?string $filename = null, array $options = [])
    {
        //
        $this->realPath = $realPath;
        $this->filename = $filename;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $manager = new ImageManager(['driver' => 'gd']);
        if (!is_null($this->filename) && (isset($this->options['fit']) && !empty($this->options['fit']))){
            $fit = explode('x', $this->options['fit']);
            $manager->make($this->realPath)->fit($fit[0], $fit[1])->save(storage_path('app/public/'.$this->filename));
        }

        if (isset($this->options['formats']) && !empty($this->options['formats'])){
            $path = pathinfo($this->filename, PATHINFO_DIRNAME);
            $filename = pathinfo($this->filename, PATHINFO_FILENAME);
            $extension = pathinfo($this->filename, PATHINFO_EXTENSION);

            //dd($path, $extension, $filename);
            foreach ($this->options['formats'] as $format){
                $nameAndPath = storage_path('app/public/'.$path.'/').$filename.$format['width']."x".$format['height'].'.'.$extension;
                $manager->make($this->realPath)
                    ->fit($format['width'], $format['height'])
                    ->save($nameAndPath);
                if (isset($format['ratio']) && !empty($format['ratio'])){
                    $manager->make($nameAndPath)
                        ->resize(null, $format[$format['ratio']], function ($constraint){
                            $constraint->aspectRatio();
                        });
                }
            }
        }
    }
}
