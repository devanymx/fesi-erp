<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form class="mb-8" action="{{ route('dashboard') }}" method="get">
                        <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Buscar empleado</label>
                        <div class="mt-2 flex">
                            <div class="relative flex items-stretch focus-within:z-10">
                                <div class="pointer-events-none ml-auto absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search" class="block mr-0 rounded-none rounded-l-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="John Smith">
                            </div>
                            <input type="submit" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50" value="Ordenar">
                            <a href="{{ route('dashboard', ['role' => 'usuario']) }}" class="rounded bg-indigo-50 py-2 px-2 text-xs font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Empleados</a>
                            <a href="{{ route('dashboard', ['role' => 'admin']) }}" class="rounded bg-red-50 py-2 px-2 text-xs font-semibold text-red-600 shadow-sm hover:bg-red-100">Administradores</a>

                        </div>
                    </form>
                    <div class="overflow-hidden bg-white shadow sm:rounded-md">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach($products as $product)
                                <li>
                                    <a href="#" class="block hover:bg-gray-50">
                                        <div class="flex items-center px-4 py-4 sm:px-6">
                                            <div class="flex min-w-0 flex-1 items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="h-12 w-12 rounded-full" src="{{$product->photo}}" alt="">
                                                </div>
                                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                    <div>
                                                        <p class="truncate text-sm font-medium text-indigo-600">{{$product->name}}</p>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                                                <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                                            </svg>
                                                            <span class="truncate ml-2">{{$product->email}}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
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
