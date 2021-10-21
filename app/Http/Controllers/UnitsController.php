<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::query()
            ->latest();

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new Unit)->getFillable());
            $units = $units
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $units = $units->paginate(20);

        return view('pages.units.index', compact(
            'units'
        ));
    }

    public function create()
    {
        return view('pages.units.create');
    }

    public function store(StoreUnitRequest $request)
    {
        $period = Unit::create($request->only(
            'name',
            'description',
        ));

        return redirect()->route('units.index')
            ->withStatus('Successfully added unit.');
    }

    public function edit(Unit $unit)
    {
        return view('pages.units.edit', compact(
            'unit'
        ));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->only(
            'name',
            'description',
            'is_active',
        ));

        return redirect()->route('units.index')
            ->withStatus('Successfully updated unit.');
    }
}
