<div>
    <form wire:submit.prevent="submit" action="#">
        <div clas="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name"
                placeholder="Enter category name" />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check checkbox mt-2">
            <input class="form-check-input" id="status" type="checkbox" wire:model.lazy="status">
            <label class="form-check-label" for="status">Active</label>
        </div>
        <div class="d-flex align-items-center  mt-2">
            <button type="submit" class="btn btn-success px-5 btn-sm mr-2">{{ $entity ? 'Update' : 'Save' }}</button>
            @if ($entity)
                <a href="#" wire:click="resetForm" class="text-decoration-underline"><small>Back to
                        create</small></a>
                {{-- <a href="#" wire:click="delete({{$entity->id}})"
                    class="text-decoration-underline text-danger ml-2"><small>Delete</small></a> --}}
            @endif
            @error('name')
                <a href="#" wire:click="resetForm"
                    class="text-decoration-underline text-danger"><small>Reset</small></a>
            @enderror
        </div>
    </form>
    <hr />
    <div class="card">
        <div class="card-header py-1" x-init>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-10">
                    <button class="btn btn-sm border-0" @click="$wire.filter=!$wire.filter"><i class="la la-filter"></i>
                        Filter</button>
                    <div class="form-check form-check-inline align-items-center">
                        <label for="show" class="mb-0"><small>Show</small></label>
                        <select class="form-control form-control-sm border-0 hover-pointer" id="select3"
                            wire:model="limited">
                            @foreach ($show_limit as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($filter)
                        <a href="#" wire:click="resetFilter"
                            class="text-decoration-underline text-danger"><small>Reset filter</small></a>
                    @endif
                    @if ($items)
                        <button class="btn btn-outline-danger btn-sm" wire:click="btnRemove"><i class="la la-trash"></i>
                            Select delete</button>
                    @endif
                </div>
                <div>
                    <div class="d-flex align-items-center">
                        @if ($q && $filter == false)
                            <a href="#" class="text-decoration-underline text-danger mr-2"
                                wire:click="resetQ"><small>Reset</small></a>
                        @endif
                        <div>
                            <input type="text" wire:model="q" id="search" class="form-control"
                                placeholder="Enter search name" @disabled($filter) />
                        </div>
                    </div>
                </div>
            </div>
            @if ($filter)
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input class="form-control" id="name" wire:model="f_name" type="text"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Status</label>
                                <select wire:model="f_status" id="status" class="form-control">
                                    <option value="all" disabled selected>Select Status</option>
                                    @foreach (\App\Enums\StatusEnum::cases() as $val)
                                        <option value="{{ $val->value }}">{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="input-daterange input-group" data-date-format="yyyy-m-d"
                                data-date-autoclose="true" data-provide="datepicker">
                                <input wire:model="s_date" onchange='Livewire.emit("startDate", this.value)'
                                    type="text" class="form-control" name="start" placeholder="Start date"
                                    autocomplete="off">
                                <input wire:model="e_date" onchange='Livewire.emit("endDate",this.value)' type="text"
                                    class="form-control" name="end" placeholder="End date"
                                    @disabled(!$s_date) autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <button type="button" wire:click="filterDate('today')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> Today</button>
                                    <button type="button" wire:click="filterDate('yesterday')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> Yesterday</button>
                                    <button type="button" wire:click="filterDate('thisweek')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> This week</button>
                                    <button type="button" wire:click="filterDate('lastweek')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> Last week</button>
                                    <button type="button" wire:click="filterDate('thismonth')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> This month</button>
                                    <button type="button" wire:click="filterDate('lastmonth')" class="btn btn-info btn-sm"><i class="la la-calendar"></i> Last month</button>
                                    <button type="button" wire:click="filterDate" class="btn btn-primary btn-sm" @disabled(!$date)><i class="la la-list-ol"></i> All</button>
                                </div>
                                <div class="">
                                    <button type="button" wire:click="export()" class="btn btn-success btn-sm"><i class="la la-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif
        </div>

        <x-table :records="$records">
            <x-slot:thead>
                <x-th style="width:40px">
                    <input @class(['hover-pointer' => !count($records)==0 ]) wire:model="checkSelectMulti" type="checkbox" @disabled(count($records)==0)>
                </x-th>
                <x-th title="category name" column-sort="name" :desc="$desc" :sort-by="$sortBy"
                    wire:click="sortBy('name')" />
                <x-th title="status" column-sort="status" :desc="$desc" :sort-by="$sortBy"
                    wire:click="sortBy('status')" />
                <x-th title="total post" column-sort="articles_count" :desc="$desc" :sort-by="$sortBy"
                wire:click="sortBy('articles_count')" />
                <x-th title="created at" column-sort="created_at" :desc="$desc" :sort-by="$sortBy"
                    wire:click="sortBy('created_at')" />
            </x-slot>
            <x-slot:tbody>
                @forelse ($records as $category)
                <tr @class([
                    'record-selected' => in_array($category->id,$items)
                ])>
                    <x-td title="check" :id="$category->id" wire:model="items" />
                    <x-td :title="$category->name" :id="$category->id" :hover="true" :primary="true"/>
                    <td>
                        <span class="badge badge-{{ \App\Enums\StatusEnum::color($category->status) }}">
                            {{ \App\Enums\StatusEnum::name($category->status) }}
                        </span>
                    </td>
                    <x-td :title="$category->articles_count" :center="true" />
                    <x-td :title="$category->created_at" />
                </tr>
                @empty
                    <tr>
                        <td class="text-center py-2" colspan="5">Empty data</td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>
    </div>
</div>

@push('before_styles')
    <link href="{{ asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('after_styles')
    @vite('resources/css/datepicker.scss')
@endpush

@push('after_scripts')
    <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush
