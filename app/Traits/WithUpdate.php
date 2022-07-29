<?php
namespace App\Traits;

trait WithUpdate
{
    public function update($id, $input)
    {
        $item = $this->model::findOrFail($id);
        $item->update($input);
    }
}
