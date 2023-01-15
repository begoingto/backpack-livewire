<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body d-flex">
                <h1 class="text-primary">
                    <i class="la la-cloud-upload la-lg mt-4"></i>
                </h1>
                <div class="ml-3 w-100">
                    <p>Category_template.csv</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex">
                <h1 class="text-primary">
                    <i class="la la-cloud-upload la-lg mt-4"></i>
                </h1>
                <div class="ml-3 w-100">
                    <p>Category_template.csv</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-import">
            <form wire:submit.prevent="import" class="card-body needs-validation">
                <div class="drag-drop w-100 vh-75 d-flex flex-column justify-content-center p-4 align-items-center @error('file') border-danger   @enderror"
                    x-bind:class="{
                        'border-secondary': !dropping,
                        'border-dark': dropping,
                    }"
                    x-on:dragover.prevent="dropping=true" x-on:dragleave.prevent="dropping=false"
                    x-on:drop="dropping=false" x-on:drop.prevent="handleDrop($event)" x-data="{
                        dropping: false,
                    
                        handleDrop(event) {
                            @this.upload('file', event.dataTransfer.files[0])
                        }
                    
                    }">
                    <h1><i class="la la-cloud-upload la-lg mt-4"></i></h1>
                    <h3>Drag and Drop</h3>
                    <h3>Or <label for="file" class="text-primary">Browse</label></h3>
                    <input type="file" wire:model="file" name="file" id="file" class="d-none">
                </div>
                @error('file')
                    <p class="text-danger my-2">{{ $message }}</p>
                @enderror
                <div class="match-columns">
                    @if ($fileHeaders)
                        <hr>
                        <h5>Match Column</h5>
                        @foreach ($columnsToMap as $column => $value)
                            <div class="form-group row">
                                <label for="{{ $column }}" class="col-sm-4 col-form-label">
                                    {{ $columnslabel[$column] ?? $column }}<sup class="text-danger">*</sup>
                                </label>
                                <div class="col-sm-8">
                                    <select wire:model="columnsToMap.{{ $column }}" name="{{ $column }}"
                                        id="{{ $column }}" @class([
                                            'custom-select',
                                            'is-invalid' => $errors->has('columnsToMap.' . $column),
                                        ])>
                                        <option value="">Choose column to match</option>
                                        @foreach ($fileHeaders as $fileHeader)
                                            <option value="{{ $fileHeader }}" {{ $column==$fileHeader?'selected': '' }}>{{ $fileHeader }}</option>
                                        @endforeach
                                    </select>
                                    @error('columnsToMap.' . $column)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <hr>
                <button type="submit" class="btn btn-primary float-right"><i class="la la-cloud-upload la-lg"></i>
                    Import</button>
            </form>
        </div>
    </div>
</div>

@push('after_styles')
    <style>
        .card-import {
            height: 88vh;
        }

        .match-columns {
            height: 23rem;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
@endpush
