@extends(backpack_view('blank'))
@section('content')
    <div class="card">
        <div class="card-header">Google Map</div>
        <div class="card-body" id="my_map">
        </div>
    </div>
@endsection

@push('after_styles')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #my_map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        const data = <?php echo $data; ?>;
        console.log(data);
        // Initialize and add the map
        function initMap() {
            // The location of bikay
            const bikay = {
                lat:11.557652185739615,
                lng: 104.92204245003613
            };
            // The map, centered at bikay
            const map = new google.maps.Map(document.getElementById("my_map"), {
                zoom: 15,
                center: bikay,
            });
            // The marker, positioned at bikay
            const marker = new google.maps.Marker({
                position: bikay,
                map: map,
            });
        }

        window.initMap = initMap;
    </script>
@endpush

@push('before_scripts')
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6_DV_Zyodwe7wkSJmdlf_e2HlcymFlsU&callback=initMap"></script>
@endpush
