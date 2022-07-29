<div class="card-body position-relative p-0">
    <x-loading wire:loading />
    <table class="table table-responsive-md table-hover" id="printJS-form">
        <thead>
            <tr class="text-center">
                {{$thead}}
            </tr>
        </thead>
        <tbody>
            {{$tbody}}
        </tbody>
    </table>
    <div class="px-2">
        {{ $records->links() }}
    </div>
</div>