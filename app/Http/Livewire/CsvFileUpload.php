<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CsvFileUpload extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public $file;
    public string $model;

    protected $listeners = [
        'toggle'
    ];

    protected function rules()
    {
        return [
            'file' => ['required', 'mimes:csv', 'max:51200']
        ];
    }

    public function updatedFile()
    {
        //validation
        $this->validateOnly('file');

        // read csv

        // grab data from csv
    }

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function render()
    {
        return view('livewire.csv-file-upload');
    }
}
