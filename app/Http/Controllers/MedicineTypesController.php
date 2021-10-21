<?php

namespace App\Http\Controllers;

use App\Models\MedicineType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMedicineTypeRequest;
use App\Http\Requests\UpdateMedicineTypeRequest;

class MedicineTypesController extends Controller
{
    public function index()
    {
        $types = MedicineType::query()
            ->latest();

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new MedicineType)->getFillable());
            $types = $types
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $types = $types->paginate(20);

        return view('pages.medicine-types.index', compact(
            'types'
        ));
    }

    public function create()
    {
        return view('pages.medicine-types.create');
    }

    public function store(StoreMedicineTypeRequest $request)
    {
        $type = MedicineType::create($request->only(
            'name',
        ));

        return redirect()->route('medicine-types.index')
            ->withStatus('Successfully added medicine type.');
    }

    public function edit(MedicineType $medicineType)
    {
        return view('pages.medicine-types.edit', compact(
            'medicineType'
        ));
    }

    public function update(UpdateMedicineTypeRequest $request, MedicineType $medicineType)
    {
        $medicineType->update($request->only(
            'name',
            'is_active',
        ));

        return redirect()->route('medicine-types.index')
            ->withStatus('Successfully updated medicine type.');
    }
}
