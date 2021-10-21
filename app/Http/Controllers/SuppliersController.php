<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSupplierRequest;

class SuppliersController extends Controller
{
    public function index()
    {
         $suppliers = Supplier::query()
            ->latest();

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new Supplier)->getFillable());
            $suppliers = $suppliers
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $suppliers = $suppliers->paginate(20);

        return view('pages.suppliers.index', compact(
            'suppliers'
        ));
    }

    public function create()
    {
        return view('pages.suppliers.create');
    }

    public function store(Request $request)
    {
        $supplier = Supplier::create($request->only(
            'name',
            'email',
            'contact_number',
            'address',
        ));

        return redirect()->route('suppliers.index')
            ->withStatus('Successfully added supplier.');
    }
    public function edit(Supplier $supplier)
    {
        return view('pages.suppliers.edit', compact(
            'supplier'
        ));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->only(
            'name',
            'email',
            'contact_number',
            'address',
            'is_active'
        ));

        return redirect()->route('suppliers.index')
            ->withStatus('Successfully updated supplier details.');
    }
}
