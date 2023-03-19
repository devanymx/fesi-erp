<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form class="mb-8" action="{{ route('products.dashboard') }}" method="get">
                        <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Buscar producto</label>
                        <div class="mt-2 flex">
                            <div class="relative flex items-stretch focus-within:z-10">
                                <div class="pointer-events-none ml-auto absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search" class="block mr-0 rounded-none rounded-l-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tornillo">
                            </div>
                            <input type="submit" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50" value="Ordenar">
                            <a href="{{ route('products.new') }}" class="rounded bg-indigo-50 py-2 px-2 text-xs font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Crear producto</a>
                        </div>
                    </form>
                    <div class="overflow-hidden bg-white sm:rounded-md">
                        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($products as $product)
                                <li class="col-span-1 divide-y border shadow divide-gray-200 rounded-lg bg-white shadow">
                                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                                        <div class="flex-1 truncate">
                                            <div class="flex items-center space-x-3">
                                                <h3 class="truncate text-sm font-medium text-gray-900">{{$product->name}}</h3>
                                                <x-product.category category="Categoria"/>
                                            </div>
                                            <p class="mt-1 truncate text-sm text-gray-500">{{$product->description}}</p>
                                        </div>
                                        <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="{{$product->photo}}" alt="">
                                    </div>
                                    <div>
                                        <div class="-mt-px flex divide-x divide-gray-200">
                                            <div class="flex w-0 flex-1">
                                                <a href="{{route('products.edit', ['product' => $product->id])}}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                    Editar
                                                </a>
                                            </div>
                                            <div class="-ml-px flex w-0 flex-1">
                                                <a href="{{route('products.move', ['product' => $product->id])}}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                    Añadir a sucursal
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            @if(count($products) < 1)
                                    <div class="rounded-md bg-yellow-50 p-4 col-span-3">
                                        <div class="flex">
                                            <div class="ml-3">
                                                <h3 class="text-2xl font-medium text-yellow-800">No se ha encontrado ningún producto.</h3>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                        </ul>
                    </div>
                    <div class="mt-5">
                        {{ $products->onEachSide(3)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
