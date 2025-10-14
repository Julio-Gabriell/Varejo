<?php

namespace App\Http\Controllers;

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
        return view('produtos');
    }

    public function ViewCriarProduto()
    {
        return view('produtosForm');
    }

    public function CriarProduto(Request $request)
    {
        $produto = Produto::create($request->all());

        return view('home');
    }
}
