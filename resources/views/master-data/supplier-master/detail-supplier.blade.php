<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="overflow-x-auto rounded-lg bg-white p-6 shadow-md">

            <!-- Back button -->
            <a href="{{ route('supplier-index') }}" class="text-blue-500 hover:underline">← Back</a>

            <div class="mt-4">
                <h3 class="mb-4 text-2xl font-semibold">{{ $supplier->supplier_name }}</h3>
                <p><strong>ID:</strong> {{ $supplier->id }}</p>
                <p><strong>Supplier Name:</strong> {{ $supplier->supplier_name }}</p>
                <p><strong>Supplier Adress:</strong> {{ $supplier->supplier_address }}</p>
                <p><strong>Phone Number:</strong> {{ $supplier->phone }}</p>
                <p><strong>Comment:</strong> {{ $supplier->comment }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
