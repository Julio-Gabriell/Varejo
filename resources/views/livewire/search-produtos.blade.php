<div>
    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquise pelo nome do produto...">

    <div>
        @foreach($produtos as $produto)
             <div class="border-1 border-amber-200 m-3"> {{-- Jooj, esse aqui é o card de produtos --}}
                <img src="{{ asset('storage/' . $produto->path) }}" alt="{{ $produto->nome }}">
                <p>
                    {{ $produto->nome }}
                </p>
                <p>
                    {{ $produto->estoque }}
                </p>
                <p>
                    {{ $produto->precokg }}
                </p>
                <a href="#" wire:click.prevent="adicionarProduto({{ $produto->idproduto }})" class="btn btn-primary">
                    Adicionar produto
                </a>
            </div>
        @endforeach
    </div>
    <div>

    </div>
</div>
