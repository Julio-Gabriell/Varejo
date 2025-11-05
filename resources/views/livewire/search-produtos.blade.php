<div>
    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquise pelo nome do produto...">

    <ul>
        @foreach($produtos as $produto)
            <li>{{ $produto->nome }}</li>
        @endforeach
    </ul>
</div>
