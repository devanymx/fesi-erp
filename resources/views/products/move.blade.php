<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Movimiento de producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="grid">
                            <div class="mt-5 md:col-span-4 md:mt-0">
                                <form action="{{route('products.make-move', [$product->id])}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-8 gap-6">
                                                <div class="col-span-8 sm:col-span-4">
                                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre del producto</label>
                                                    <input type="text" name="name" id="name" value="{{$product->name}}" readonly autocomplete="given-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-4">
                                                    <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Código del producto</label>
                                                    <input type="text" name="code" id="code" value="{{$product->code}}" readonly autocomplete="family-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-6 lg:col-span-2">
                                                    <label for="origen" class="block text-sm font-medium leading-6 text-gray-900">Sucursal origen</label>
                                                    <select id="origen" name="origen" autocomplete="origen" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        @foreach($teams as $team)
                                                            <option value="{{$team->id}}">{{$team->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-8 sm:col-span-6 lg:col-span-2">
                                                    <label for="destino" class="block text-sm font-medium leading-6 text-gray-900">Sucursal destino</label>
                                                    <select id="destino" name="destino" autocomplete="destino" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        @foreach($teams as $team)
                                                            <option value="{{$team->id}}">{{$team->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">Stock inicial y/o a transferir</label>
                                                    <input type="text" name="stock" id="stock" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
