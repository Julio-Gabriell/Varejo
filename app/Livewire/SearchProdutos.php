<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;

class SearchProdutos extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-produtos', [
            'produtos' => Produto::where('nome', 'like', '%' . $this->search . '%')
                ->get(), 
        ]);
    }
}


