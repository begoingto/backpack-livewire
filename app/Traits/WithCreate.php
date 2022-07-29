<?php
namespace App\Traits;

trait WithCreate
{
    public function create($input)
    {
        $this->model::create($input);
    }
}
