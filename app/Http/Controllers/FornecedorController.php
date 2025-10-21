<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
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
        $fornecedores = Fornecedor::all();

        return view('fornecedores', compact('fornecedores'));
    }

    public function ViewCriarFornecedor()
    {
        return view('fornecedoresForm');
    }

    public function CriarFornecedor(Request $request)
    {
        $fornecedor = Fornecedor::create($request->all());

        return view('home');
    }
}
