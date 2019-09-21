<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.09.2019
 * Time: 8:18
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use phpDocumentor\Reflection\Types\Mixed_;


abstract class CoreRepository
{
    use DatabaseMigrations;
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();


    /**
     * @return \Illuminate\Contracts\Foundation\Application|Model|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}

