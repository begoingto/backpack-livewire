<?php
namespace App\Traits;

trait PublicProperties
{
    use WithMessages,WithCreate,WithUpdate,WithDelete,WithFilter,WithSorting;

    public $s_date;
    public $e_date;
    public $date;
    public $filter = false;
    public $limited = 10;
    public $show_limit = [10, 25, 50, 100];
    public $sortBy = 'created_at';
    public $desc = true;
    public $q;
    public $items = [];
    public $action = null;
    public $entity;
    public $checkSelectMulti = false;
    public $readyToLoadRecord = false;

    public $plisteners = [
        'confirmed', // this method on WithMessage
        'cancelled',
        'startDate', //this method on WithFilter
        'endDate'
    ];

    public function updatedCheckSelectMulti()
    {
        if ($this->checkSelectMulti) {
            $this->items = $this->records->pluck('id')->toArray();
        } else {
            $this->items = [];
        }
    }

    public function resetAll()
    {
        $this->reset([
            'items',
            'checkSelectMulti'
        ]);
    }

    public function updatedItems()
    {
        if (count($this->items) == 1) {
            $item = $this->model::findOrFail($this->items[0]);
            $this->edit($item);
        } else {
            $this->resetForm(); //from parent component
        }
    }

    public function loadingRecords()
    {
        $this->readyToLoadRecord = true;
    }
}
