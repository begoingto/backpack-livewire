<?php
namespace App\Traits;

trait WithSorting
{
    public function updatedFilter()
    {
        $this->resetQ();
    }

    public function updatedLimited()
    {
        $this->gotoPage(1);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->desc = !$this->desc;
        }
        $this->sortBy = $field;
    }

    public function resetQ()
    {
        $this->reset([
            'q'
        ]);
    }
}
