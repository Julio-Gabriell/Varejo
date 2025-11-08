<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;

class AdicionarProdutos extends Component
{
    public $carrinho = [];

    protected $listeners = ['produtoAdicionado' => 'adicionarProduto'];

    public function adicionarProduto($produtoId)
    {
        $produto = Produto::find($produtoId);

        if ($produto) {
            $this->carrinho[] = $produto;
        }
    }

    public function render()
    {
        return view('livewire.adicionar-produtos', [
            'carrinho' => $this->carrinho,
        ]);
    }
}
