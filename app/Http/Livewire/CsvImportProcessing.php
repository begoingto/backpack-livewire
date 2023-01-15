<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CsvImportProcessing extends Component
{
    public function getImportsProperty(): Collection
    {
        return backpack_auth()->user()->imports()->oldest()->notCompleted()->get();
    }

    public function render()
    {
        return view('livewire.csv-import-processing');
    }
}
