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
use App\Http\Resources\ImageTextResource;
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
        $photo = $request->file('photo');
        $photoname = $request->file('photo')->getClientOriginalName();
        $text = $request->input('text');
        $data = [
            'photo' => $photo,
            'photoname' => $photoname,
            'text' => $text,
        ];
        $result = $this->repository->saveData($data);
        return new ImageTextResource($result);
    }

    public function upload_file_test(Request $request)
    {
        return response()->json([
            'photos' =>  [
                'https://cdn-s3.si.com/s3fs-public/swimsuit/img/site/issues-page-covers/swimsuit-2011-image.jpg',
                'https://cdn-s3.si.com/styles/medium_2x/s3/images/brooks_6.jpg?itok=U2AuXwah',
                'https://imagesvc.timeincapp.com/v3/mm/image?url=https%3A%2F%2Fcdn-s3.si.com%2Fs3fs-public%2Fswimsuit%2Fweb%2Fbo-krsmanovic%2F2016%2Fbo-krsmanovic-2016-photo-sports-illustrated-x159793_tk3_01792-rawwmfinal1920.jpg&w=1000&q=70'
            ]
        ]);
    }
}
