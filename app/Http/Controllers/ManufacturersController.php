<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Requests\StoreManufacturersRequest;
use App\Http\Requests\UpdateManufacturersRequest;
use App\UseCases\Manufacturer\DestroyManufacturer;
use App\UseCases\Manufacturer\ListManufacturers;
use App\UseCases\Manufacturer\StoreManufacturer;
use App\UseCases\Manufacturer\UpdateManufacturer;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    public function index(Request $request)
    {
        $table = ListManufacturers::execute($request->all());

        return view('manufacturers.indexManufacturers', compact('table'));
    }

    public function create()
    {
        return view('manufacturers.createManufacturers');
    }

    public function store(StoreManufacturersRequest $request)
    {
        StoreManufacturer::execute($request->all());

        return redirect()->route('manufacturers.index');
    }

    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturers.showManufacturers', compact('manufacturer'));
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturers.editManufacturers', compact('manufacturer'));
    }

    public function update(UpdateManufacturersRequest $request, Manufacturer $manufacturer)
    {
        UpdateManufacturer::execute($request->all(), $manufacturer);

        return redirect()->route('manufacturers.index');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        DestroyManufacturer::execute($manufacturer);

        return redirect()->route('manufacturers.index');
    }
}
