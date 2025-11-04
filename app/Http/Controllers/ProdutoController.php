<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
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
        $produtos = Produto::all();

        return view('produtos', compact('produtos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtosForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $pathImagem = $this->uploadImagem($request);

        $produto = Produto::create([
            ...$request->validated(),
            'path' => $pathImagem,
        ]);

        return redirect()->route('home');
    }
    private function uploadImagem($request)
    {
        if ($request->hasFile('path') && $request->file('path')->isValid()) {
            return $request->file('path')->store('uploads', 'public');
        }

        return 'uploads/default.png';
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
        $produto = Produto::findOrFail($id);

        return view('produtosFormEdit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update(
            $request->validated()
        );

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);

        return redirect()->route('home');
    }
}
