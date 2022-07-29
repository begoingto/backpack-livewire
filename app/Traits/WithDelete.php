<?php
namespace App\Traits;

use App\Enums\ActionEnum;

trait WithDelete
{
    public function delete($id)
    {
        $this->alert('warning', "You won't be able to revert this!", [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled',
            'confirmButtonText' => 'Yes, delete it!',
            'showCancelButton' => !0,
            'cancelButtonText' => 'No, cancel!',
            'customClass' => [
                'confirmButton' => 'btn btn-success mt-2',
                'cancelButton' => 'btn btn-danger ml-2 mt-2'
            ],
            'buttonsStyling' => false,
        ]);
        // $this->model::findOrFail($id)->delete();
        $this->messageSuccess('deleted');
    }

    public function btnRemove()
    {
        $this->action = ActionEnum::SELECTDELETE->value;
        $this->confirmMessage("You won't be able to revert this!");
    }

    public function SelectedDelete()
    {
        $this->model::destroy($this->items);
        $this->resetAll();
        $this->resetForm();
        $this->messageSuccess('deleted');
    }
}
