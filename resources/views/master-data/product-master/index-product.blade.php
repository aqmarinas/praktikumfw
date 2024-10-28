<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <a href="{{ route('product-create') }}">
                <button
                    class="mb-4 rounded-lg border border-green-500 bg-green-500 px-4 py-2 text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add product data
                </button>
            </a>
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">ID</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Product Name</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Unit</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Type</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Information</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Qty</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Producer</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr class="bg-white">
                            <td class="border border-gray-200 px-4 py-2">{{ $product->id }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->product_name }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->unit }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->type }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->information }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->qty }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $product->producer }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <a href="{{ route('product-edit', $product->id) }}"
                                    class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                                <button class="px-2 text-red-600 hover:text-red-800"
                                    onclick="confirmDelete(1)">Hapus</button>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id, deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // Jika user mengonfirmasi, kita dapat membuat form dan mengirimkan permintaan delete
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                // Tambahkan CSRF token
                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Tambahkan method spoofing untuk DELETE (karena HTML form hanya mendukung GET dan POST)
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

</x-app-layout>
