<div>
    <!-- resources/views/components/sidebar.blade.php -->
<div class="flex h-screen bg-gray-100">
    <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-center py-3">
                <img src="{{ asset('Assets/Imagens/logoNova.png') }}" alt="Logo" height="90" width="90">
            </div>

            <nav class="mt-4 space-y-1">
                <!-- Performance -->
                <a href="#"
                   class="flex items-center px-4 py-2 m-3 text-sm font-medium rounded-md
                   {{ request()->routeIs('dashboard') ? 'text-orange-600 bg-orange-100' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-chart-line mr-3"></i> Performance
                </a>

                <!-- Produtos -->
                <a href="{{ route('produtos') }}"
                   class="flex items-center px-4 py-2 m-3 text-sm rounded-md
                   {{ request()->routeIs('produtos*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-box mr-3"></i> Produtos
                </a>

                <!-- Vendas -->
                <a href="{{ route('vendas') }}"
                   class="flex items-center px-4 py-2 m-3 text-sm rounded-md
                   {{ request()->routeIs('vendas*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-cart-shopping mr-3"></i> Vendas
                </a>

                <!-- Fornecedores -->
                <a href="{{ route('fornecedor') }}"
                   class="flex items-center px-4 py-2 m-3 text-sm rounded-md
                   {{ request()->routeIs('fornecedor*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-truck mr-3"></i> Fornecedores
                </a>
            </nav>
        </div>

        <div class="p-4 space-y-2 m-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center text-gray-700">
                    <i class="fa-solid fa-user mr-2"></i>
                    <span>{{ Auth::user()->name ?? '{user}' }}</span>
                </div>
                <i class="fa-solid fa-chevron-down text-gray-500 text-sm"></i>
            </div>

            <form action="{{ route('logout') }}" method="POST"
                  class="flex items-center text-orange-600 hover:text-orange-700">
                @csrf
                <button type="submit" class="flex items-center text-sm font-medium">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Sair
                </button>
            </form>
        </div>
    </aside>

    <!-- Onde vai o conteúdo da página -->
    <main class="flex-1 p-6 overflow-y-auto">
        {{ $slot }}
    </main>
</div>

</div>