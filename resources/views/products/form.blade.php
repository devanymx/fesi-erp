<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="grid">
                            <div class="mt-5 md:col-span-4 md:mt-0">
                                @if($method == "post")
                                    <form action="{{route('products.create')}}" method="POST">
                                @elseif($method == "put")
                                    <form action="{{route('products.update', [$product->id])}}" method="POST">
                                        @method('PUT')
                                @endif
                                    @csrf
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-8 gap-6">
                                                <div class="col-span-8 sm:col-span-4">
                                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre del producto</label>
                                                    <input type="text" name="name" id="name" value="{{$product->name}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-4">
                                                    <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Código del producto</label>
                                                    <input type="text" name="code" id="code" value="{{$product->code}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-4">
                                                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción del producto</label>
                                                    <input type="text" name="description" value="{{$product->description}}" id="description" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-6 lg:col-span-2">
                                                    <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Tipo del producto</label>
                                                    <select id="type" name="type" value="{{$product->type}}" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <option>United States</option>
                                                        <option>Canada</option>
                                                        <option>Mexico</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-8 sm:col-span-6 lg:col-span-2">
                                                    <label for="cost" class="block text-sm font-medium leading-6 text-gray-900">Costo</label>
                                                    <input type="text" name="cost" id="cost" value="{{$product->cost}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-6 lg:col-span-2">
                                                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Precio</label>
                                                    <input type="text" name="price" id="price" value="{{$product->price}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="measurement" class="block text-sm font-medium leading-6 text-gray-900">Medida</label>
                                                    <input type="text" name="measurement" id="measurement" value="{{$product->measurement}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">URL de foto</label>
                                                    <input type="text" name="photo" id="photo" value="{{$product->photo}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="taxes" class="block text-sm font-medium leading-6 text-gray-900">Taxes</label>
                                                    <input type="text" name="taxes" id="taxes" value="{{$product->taxes}}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">Stock</label>
                                                    <input type="text" name="stock" id="stock" @if(isset($pivot)) value="{{$pivot->pivot->stock}}" @endif  class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="min_stock" class="block text-sm font-medium leading-6 text-gray-900">Stock mínimo</label>
                                                    <input type="text" name="min_stock" id="min_stock" @if(isset($pivot)) value="{{$pivot->pivot->min_stock}}" @endif class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>

                                                <div class="col-span-8 sm:col-span-3 lg:col-span-2">
                                                    <label for="max_stock" class="block text-sm font-medium leading-6 text-gray-900">Stock máximo</label>
                                                    <input type="text" name="max_stock" id="max_stock" @if(isset($pivot)) value="{{$pivot->pivot->max_stock}}" @endif class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
