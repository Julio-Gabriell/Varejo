<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;

class SearchProdutos extends Component
{
    public $search = '';
    public $produtos = [];

    public function mount()
    {
        $this->produtos = Produto::all();
    }

    public function updatedSearch()
    {
        $this->produtos = Produto::where('nome', 'like', '%' . $this->search . '%')->get();
    }

    public function adicionarProduto($produtoId)
    {
        $this->dispatch('produtoAdicionado', $produtoId);
    }

    public function render()
    {
        return view('livewire.search-produtos', [
            'produtos' => $this->produtos
        ]);
    }
}
