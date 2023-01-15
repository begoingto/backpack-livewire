<div>
    @forelse ($this->imports as $import)
        <div class="card">
            <div class="card-body d-flex">
                <h1 class="text-primary">
                    <i class="la la-cloud-upload la-lg mt-4"></i>
                </h1>
                <div class="ml-3 w-100">
                    <h5 class="mb-0">Importing {{ $import->file_name }}</h5>
                    <p>Imported {{ $import->processed_rows }}/{{ $import->total_rows }} rows</p>
                    <div class="progress">
                        <div @class([
                            'progress-bar progress-bar-striped',
                            'bg-success' => $import->percentageComplete() == 100,
                            'progress-bar-animated' => $import->percentageComplete() != 100,
                        ]) role="progressbar"
                            style="width: {{ $import->percentageComplete() }}%;"
                            aria-valuenow="$import->percentageComplete()" aria-valuemin="0" aria-valuemax="100">
                            {{ $import->percentageComplete() }}%</div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
