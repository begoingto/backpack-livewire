<?php
namespace App\Http\Livewire;

use App\Helpers\ChunkIterator;
use App\Jobs\ImportCsv;
use App\Models\Customer;
use Illuminate\Support\Facades\Bus;
use League\Csv\Reader;
use League\Csv\Statement;
use Livewire\Component;
use Livewire\WithFileUploads;

class CsvFileUpload extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public $file;
    public string $model = Customer::class;
    public $fileHeaders;
    public int $fileRowsCount=0;
    public array $columnsToMap = ['id', 'first_name', 'last_name', 'email'];
    public array $requiredColumns = ['id', 'first_name', 'last_name', 'email'];
    public array $columnslabel = ['id' => 'ID', 'first_name' => 'First Name', 'last_name' => 'Last Name', 'email' => 'Email'];

    protected $listeners = [
        'toggle'
    ];

    public function mount()
    {
        $this->columnsToMap = collect($this->columnsToMap)
                                ->mapWithKeys(fn ($column) => [$column => ''])
                                ->toArray();
    }

    public function rules()
    {
        $columnsRule = collect($this->columnsToMap)
                        ->mapWithKeys(function ($val, $column) {
                            return [
                                'columnsToMap.' . $column => ['required']
                            ];
                        })
                        ->toArray();
        return array_merge($columnsRule, [
            'file' => ['required', 'mimes:csv', 'max:51200']
        ]);
    }

    public function validationAttributes()
    {
        return collect($this->requiredColumns)
                ->mapWithKeys(function ($column) {
                    return ['columnsToMap.' . $column => strtolower($this->columnslabel[$column] ?? $column)];
                })
                ->toArray();
    }

    public function updatedFile()
    {
        //validation
        $this->validateOnly('file');
        $csv = $this->readCsv;
        // read csv
        $this->fileHeaders = $csv->getHeader();

        $this->fileRowsCount = count($this->csvRecords);

        $this->resetValidation();
    }

    public function getReadCsvProperty(): Reader
    {
        return $this->readCsv($this->file->getRealPath());
    }

    public function getCsvRecordsProperty()
    {
        return Statement::create()->process($this->readCsv);
    }

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function import()
    {
        $this->validate();
        // create import
        $import = $this->createImport();

        // chunk record
        $batches = collect((new ChunkIterator($this->csvRecords->getRecords(), 10))->get())
                    ->map(function($chunk) use($import){
                        return new ImportCsv($import,Customer::class,$chunk,$this->columnsToMap);
                    })->toArray();


        Bus::batch($batches)
            ->finally(function()use($import){
                $import->touch('completed_at');
            })
            ->dispatch();

    }

    protected function createImport()
    {
        return backpack_auth()->user()->imports()->create([
            'model' => $this->model,
            'file_path' => $this->file->getRealPath(),
            'file_name' => $this->file->getClientOriginalName(),
            'total_rows' => count($this->csvRecords),
        ]);
    }

    public function readCsv($path): Reader
    {
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        return $csv;
    }

    public function render()
    {
        return view('livewire.csv-file-upload');
    }
}
