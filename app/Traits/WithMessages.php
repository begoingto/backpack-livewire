<?php
namespace App\Traits;

use App\Enums\ActionEnum;

trait WithMessages
{
    public function messageSuccess($action)
    {
        $this->alert('success', 'Category has been ' . $action . ' success');
    }

    public function cancelled()
    {
        $this->resetAll();
        if (count($this->items) == 1) {
            $this->resetForm();
        }
    }

    public function confirmed()
    {
        match ($this->action) {
            ActionEnum::SELECTDELETE->value => $this->SelectedDelete(),
            default => $this->alert('warning', 'You doesn\' have action.')
        };
    }

    public function confirmMessage($message)
    {
        $this->alert('warning', $message, [
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
    }
}
