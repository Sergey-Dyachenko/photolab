<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2019
 * Time: 8:14
 */

namespace App\Repositories;
use App\FileAction as Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FileActionRepository extends CoreRepository
{

    private $upload_file_server_url;

    protected function getModelClass()
    {
        return Model::class;
    }

    public function __construct()
    {
        $this->upload_file_server_url = env('UPLOAD_FILE_SERVER_URL');
    }


    public function UploadFileRequestToServer($url, $form_params)
    {
        $client = new Client();
        //dd($form_params);
        $result = $client->post($url, $form_params);
        dd($result->getBody());
    }

    public function upload_file_to_server($file)
    {
        $form_params = [
            'file1' => $file,
            'no_resize' => 1
        ];
        $this->UploadFileRequestToServer($this->upload_file_server_url, $form_params);
    }
}
