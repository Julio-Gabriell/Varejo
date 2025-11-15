<div>
  <div class="flex h-screen bg-gray-100">
    <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
      <div>
        <div class="flex items-center justify-center py-3">
          <img src="{{ asset('Assets/Imagens/logoNova.png') }}" alt="Logo" height="90" width="90">
        </div>

        <nav class="mt-4 space-y-1">
          <a href="#"
            class="flex items-center px-4 py-2 m-3 text-sm font-medium rounded-md
            {{ request()->routeIs('dashboard') ? 'text-orange-600 bg-orange-100' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fa-solid fa-chart-line mr-3"></i> Performance
          </a>

          <a href="{{ route('produtos') }}"
            class="flex items-center px-4 py-2 m-3 text-sm rounded-md
            {{ request()->routeIs('produtos*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fa-solid fa-box mr-3"></i> Produtos
          </a>

          <a href="{{ route('vendas') }}"
            class="flex items-center px-4 py-2 m-3 text-sm rounded-md
            {{ request()->routeIs('vendas*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fa-solid fa-cart-shopping mr-3"></i> Vendas
          </a>

          <a href="{{ route('dividas') }}"
            class="flex items-center px-4 py-2 m-3 text-sm rounded-md
            {{ request()->routeIs('dividas*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fa-solid fa-receipt mr-3"></i> Dívidas
          </a>

          <a href="{{ route('fornecedor') }}"
            class="flex items-center px-4 py-2 m-3 text-sm rounded-md
            {{ request()->routeIs('fornecedor*') ? 'text-orange-600 bg-orange-100 font-medium' : 'text-gray-700 hover:bg-gray-100' }}">
            <i class="fa-solid fa-truck mr-3"></i> Fornecedores
          </a>
        </nav>
      </div>

      <div class="relative p-3">
        <button id="userMenuButton" class="flex items-center justify-between w-full text-gray-700 px-4 py-2 rounded-md hover:bg-gray-100 transition">
          <div class="flex items-center">
            <i class="fa-solid fa-user text-gray-500 mr-2"></i>
            <span>{{ Auth::user()->name ?? '(user)' }}</span>
          </div>
          <i class="fa-solid fa-chevron-down text-sm"></i>
        </button>

        <div id="userDropdownMenu"
          class="absolute bottom-12 left-3 right-3 hidden rounded-md divide-y divide-gray-100">
          <form action="{{ route('logout') }}" method="POST"
                  class="flex items-center text-orange-600 hover:text-orange-700">
                @csrf
                <button type="submit" class="flex items-center text-sm font-medium">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Sair
                </button>
            </form>
        </div>
      </div>
    </aside>

    
    <main class="flex-1 p-6 overflow-y-auto">
      {{ $slot }}
    </main>
  </div>
</div>