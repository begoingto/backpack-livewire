<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Enums\StatusEnum;
use Livewire\WithPagination;
use App\Exports\CategoryExport;
use App\Traits\PublicProperties;
use Maatwebsite\Excel\Facades\Excel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoryManage extends Component
{
    use WithPagination,LivewireAlert,PublicProperties;
    protected $paginationTheme = 'bootstrap';
    public $listeners = [];
    public $name;
    public $status = StatusEnum::Active;
    public $f_name;
    public $f_status = 'all';
    public $model = Category::class;

    public function mount()
    {
        $this->listeners = array_merge($this->listeners, $this->plisteners);
    }

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function updatedFName()
    {
        $this->q = $this->f_name;
    }

    public function getRecordsProperty()
    {
        if ($this->s_date != null) {
            $this->date = [$this->s_date, $this->e_date];
        }
        return Category::withCount('articles')
        ->when($this->date, fn ($q) => $q->dateFilter($this->date))
        ->when($this->q, fn ($query) => $query->where('name', 'Like', '%' . $this->q . '%'))
        ->when($this->f_status != 'all', fn ($q) => $q->where('status', $this->f_status))
        ->orderBy($this->sortBy, $this->desc ? 'desc' : 'asc')
        ->paginate($this->limited);
    }

    public function render()
    {
        return view('livewire.category-manage', ['records' => $this->records]);
    }

    public function resetFilter()
    {
        $this->reset([
            'f_name',
            'f_status'
        ]);
        $this->resetSE();
        $this->resetQ();
    }

    public function submit()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'status' => $this->status
        ];
        if (empty($this->entity)) {
            $this->create($data);
            $this->messageSuccess('create');
        } else {
            $this->update($this->entity->id, $data);
            $this->messageSuccess('update');
        }
        $this->resetForm();
    }

    public function edit(Category $entity)
    {
        $this->entity = $entity;
        $this->name = $entity->name;
        $this->status = $entity->status;
    }

    public function resetForm()
    {
        $this->reset([
            'entity',
            'name',
            'status'
        ]);
        $this->resetValidation();
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'categories.xlsx');
    }
}
