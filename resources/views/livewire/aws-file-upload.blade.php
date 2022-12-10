<x-template class="px-5">
    <h1 class="text-center">{{ strtoupper($name) }}</h1>
    <div class="py-4">
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Upload file</label>
                <input type="file" class="form-control" id="formGroupExampleInput"
                    wire:model="file"
                    placeholder="Example input placeholder">
                </div>
            @if ($file)
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $file->temporaryUrl() }}" class="img-fluid">
                    </div>
                </div>
            @endif
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
        <br>
        <div class="card card-body">
            <table class="table">
                <tr>
                    <th>Image</th>
                </tr>
                @forelse ($data as $v)
                    <tr>
                        <td><img src="{{ $v['url'] }}" class="img-fluid"></td>
                    </tr>
                @empty
                @endforelse
            </table>
        </div>
    </div>
</x-template>
