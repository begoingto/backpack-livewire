<?php
namespace App\Interfaces;

interface myCrudOperation
{
    public function create();

    public function update($id, $input);

    public function delete($id, $input);
}
