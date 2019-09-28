<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2019
 * Time: 8:14
 */

namespace App\Repositories;
use App\Http\Resources\ImageTextResource;
use App\ImageText as Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class FileActionRepository extends CoreRepository
{

    private $upload_file_server_url;

    protected function getModelClass()
    {
        return Model::class;
    }

//    public function __construct()
//    {
//        parent::
//        $this->upload_file_server_url = env('UPLOAD_FILE_SERVER_URL');
//    }


    public function UploadFileToAws($data)
    {
        $fullPath = 'images/originals';
        $result = Storage::disk('s3')->put($fullPath, $data['photo'], 'public');
        $file_name_on_aws =basename($result);
        $result_path = Storage::disk('s3')->url($fullPath) .'/'. $file_name_on_aws;
        return $result_path;
    }

    public function saveData($data)
    {
       $img_url = $this->UploadFileToAws($data);
       $img_photo_object = $this->startConditions()->create([
          'text' => $data['text'],
           'img_url' => $img_url
       ]);

       return $img_photo_object;
    }
}
