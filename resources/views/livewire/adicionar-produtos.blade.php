{{-- E esse aqui é aquela parte lateral que aparece as informações do que foi selecionado --}}
<div>
    <h1>
        Carrinho
    </h1>
    <ul>
        @foreach($carrinho as $produto)
            <li>{{ $produto->nome }}</li>
            <li>{{ $produto->precokg }}</li>
        @endforeach
    </ul>
</div>
