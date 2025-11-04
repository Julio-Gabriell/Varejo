<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();

        return view('fornecedores', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedoresForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FornecedorRequest $request) 
    {    
        $fornecedor = Fornecedor::create (
            $request->validated()
        );

        return view('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedoresFormEdit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FornecedorRequest $request, string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->update(
            $request->validated()
        );

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fornecedor::destroy($id);

        return redirect()->route('home');
    }
}
