<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\SupplirRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('products')->get();
        return response()->json($suppliers);
    }

    public function show($id)
    {
        $supplier = Supplier::with('products')->find($id);
        return response()->json($supplier);
    }

    public function store(SupplirRequest $request)
    {
        $supplier = Supplier::create($request->all());
        return response()->json($supplier);
    }

    public function update(SupplirRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->all());
        return response()->json(["message"=>'successful!', "data"=>$supplier]);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return response()->json(['message' => 'Supplier deleted']);
    }
    //list
    public function list()
    {
        $suppliers = Supplier::all()->pluck('name', 'id');
        return response()->json($suppliers);
    }

}
