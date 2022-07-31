<?php
namespace App\Http\Controllers\Admin;

use Location\Polyline;
use Location\Coordinate;
use App\Http\Controllers\Controller;
use Location\Formatter\Coordinate\GeoJSON;
use Location\Formatter\Polyline\GeoJSON as PolylineGeoJSON;

class CustomController extends Controller
{
    public function category()
    {
        abort_if(!backpack_user()->hasPermissionTo('category_manager'), 403);

        return view('custom.category-costom');
    }

    public function map()
    {
        $bk = new Coordinate(11.557652185739615, 104.92204245003613);
        $polyline = new Polyline;
        $polyline->addPoint(new Coordinate(11.568327834436177, 104.89475295947739));
        $polyline->addPoint($bk);
        $formatter = new PolylineGeoJSON;
        $data = $bk->format(new GeoJSON);
        return view('custom.map', compact('data'));
    }

    public function loan()
    {
        return view('custom.loan');
    }
}
