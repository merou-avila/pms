<?php

namespace App\Http\Controllers;

use PDF;
use Storage;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\MedicineType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Requests\UploadMedicinePhotoRequest;

class MedicinesController extends Controller
{
    public function index()
    {
        $medicines = Medicine::query()
            ->with(
                'supplier',
                'medicineType',
                'unit',
                'category'
            )
            ->orderBy('name');

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new Medicine)->getFillable());
            $medicines = $medicines
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $medicines = $medicines->paginate(20);

        return view('pages.medicines.index', compact(
            'medicines'
        ));
    }

    public function create()
    {
        $medicineTypes = MedicineType::query()
            ->get();

        $suppliers = Supplier::query()
            ->get();

        $units = Unit::query()
            ->get();

        $categories = Category::query()
            ->get();

        return view('pages.medicines.create', compact(
            'medicineTypes',
            'suppliers',
            'units',
            'categories'
        ));
    }

    public function store(StoreMedicineRequest $request)
    {
        $medicine = Medicine::create($request->only(
            'name',
            'details',
            'price',
            'selling_price',
            'quantity',
            'type_id',
            'supplier_id',
            'unit_id',
            'category_id',
            'measurement',
            'barcode_number',
            'is_prescribed',
            'expired_at'
        ));

        return redirect()->route('medicines.show', $medicine)
            ->withStatus('Successfully added medicine.');
    }

    public function edit(Medicine $medicine)
    {
        $medicineTypes = MedicineType::query()
            ->get();

        $suppliers = Supplier::query()
            ->get();

        $units = Unit::query()
            ->get();

        $categories = Category::query()
            ->get();

        return view('pages.medicines.edit', compact(
            'medicine',
            'medicineTypes',
            'suppliers',
            'units',
            'categories'
        ));
    }

    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicine->update($request->only(
            'name',
            'details',
            'price',
            'selling_price',
            'quantity',
            'supplier_id',
            'type_id',
            'unit_id',
            'category_id',
            'measurement',
            'barcode_number',
            'is_prescribed',
            'expired_at'
        ));

        return redirect()->route('medicines.index')
            ->withNotification('Successfully updated medicine details!');
    }

    public function show(Medicine $medicine)
    {
        return view('pages.medicines.show', compact(
            'medicine'
        ));
    }

    public function upload(UploadMedicinePhotoRequest $request, Medicine $medicine)
    {
        $photoFile = $request->file('photo');
        $filename = generate_filename($photoFile, $medicine->id);

        try {
            if (! empty($medicine->photo)) {
                Storage::delete($medicine->photo);
            }
        } catch (\Exception $e) {

        }

        $path = $photoFile->storeAs(
            "medicine-photos",
            $filename
        );

        $medicine->update([
            'photo' => $path,
            'photo_uploaded_at' => now(),
        ]);

        return redirect()->back()
            ->withStatus('Successfully uploaded medicine\'s photo.');
    }

    public function showPhoto(Medicine $medicine)
    {
        abort_if(
            empty($medicine->photo)
        , 404);

        return Storage::response($medicine->photo);
    }

    public function generateBarcode(Medicine $medicine)
    {
        $pdf = PDF::loadView('pdf.medicines.barcode', compact(
                'medicine',
            ))
            ->setPaper([0, 0, (8.5 * 72), (5.5 * 72)])
            ->download($medicine->filename)
            ->getOriginalContent();

        Storage::put("barcodes/{$medicine->filename}", $pdf);

        return Storage::response($medicine->filepath);
    }
}
