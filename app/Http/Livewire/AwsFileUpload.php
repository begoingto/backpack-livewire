<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AwsFileUpload extends Component
{
    use WithFileUploads, LivewireAlert;
    public $name = "aws file upload";
    public $file;

    public function render()
    {
        $data = DB::table('file_uploads')->select('*')->get()->map(function ($v) {
            $v = (array)$v;
            $v['url'] = Storage::disk('s3')->url($v['url']);
            return $v;
        });
        // dd($data);
        return view('livewire.aws-file-upload', compact('data'));
    }

    public function submit()
    {
        $filename = $this->file->getClientOriginalName();
        $url = $this->file->store('test1', 's3');
        info($url);
        $this->alert('success', 'Category has been upload success');
        $this->file = '';
        DB::statement("INSERT INTO file_uploads (url) VALUES('" . $url . "');");
    }

    private function imgUrl($url)
    {
        return Storage::disk('s3')->response($url);
    }
}
