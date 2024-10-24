<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    {{-- Table --}}
                    {{-- <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Product Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Unit</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Type</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Quantity</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Producer</th>
                                <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->product_name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->unit }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->type }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->qty }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->producer }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <!-- Contoh tombol edit dan delete -->
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-2 text-center text-sm text-gray-500">
                                        No products found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
