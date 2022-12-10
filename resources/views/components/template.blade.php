<div {{ $attributes }}>
    @livewireStyles
    {{$slot}}
    @livewireScripts
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <x-livewire-alert::scripts />
</div>
