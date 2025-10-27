<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
class ProdutosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos', compact('produtos'));
    }

    public function ViewCriarProduto()
    {
        return view('produtosForm');
    }

    public function CriarProduto(ProdutoRequest $request)
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

    public function VierEditarProduto($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtosFormEdit', compact('produto'));
    }

    public function EditarProduto(ProdutoRequest $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update(
            $request->validated()
        );

        return redirect()->route('home');
    }

    public function deletar($id)
    {
        Produto::destroy($id);

        return redirect()->route('home');
    }
}
