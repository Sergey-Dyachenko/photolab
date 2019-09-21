<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17.09.2019
 * Time: 6:02
 */

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Http\Requests\UploadFileToServer;
use App\Repositories\FileActionRepository;
use Illuminate\Support\Facades\Request;

class FileActionController
{
    private $repository;


    public function __construct()
    {
        $this->repository = app(FileActionRepository::class);
   }

    public function upload_file(UploadFileToServer $request)
    {
        $file = $request->file('file1');
        $this->repository->upload_file_to_server($file);
    }
}
