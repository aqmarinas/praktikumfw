<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Supplier') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="overflow-x-auto">

            {{-- Alert --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-500">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Search --}}
            <form method="GET" action="{{ route('supplier-index') }}" class="mb-4 flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari supplier..."
                    class="w-1/4 rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit"
                    class="ml-2 rounded-lg bg-green-500 px-4 py-2 text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
            </form>

            {{-- Add Supplier --}}
            <a href="{{ route('supplier-create') }}">
                <button
                    class="mb-4 rounded-lg border border-green-500 bg-green-500 px-4 py-2 text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add supplier data
                </button>
            </a>

            {{-- Table --}}
            @if ($suppliers->isNotEmpty())
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">ID</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Supplier Name</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Supplier Address</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Phone</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Comment</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr class="bg-white">
                                <td class="border border-gray-200 px-4 py-2">{{ $supplier->id }}</td>
                                <td class="border border-gray-200 px-4 py-2 hover:text-blue-500 hover:underline">
                                    <a href="{{ route('supplier-detail', $supplier->id) }}">
                                        {{ $supplier->supplier_name }}
                                    </a>
                                </td>
                                <td class="border border-gray-200 px-4 py-2">{{ $supplier->supplier_address }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $supplier->phone }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $supplier->comment }}</td>
                                <td class="border border-gray-200 px-4 py-2">
                                    <a href="{{ route('supplier-edit', $supplier->id) }}"
                                        class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                                    <button class="px-2 text-red-600 hover:text-red-800"
                                        onclick="confirmDelete('{{ route('supplier-delete', $supplier->id) }}')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mb-4 text-center text-2xl font-bold text-white">No suppliers found</p>
            @endif

            {{-- Pagination --}}
            <div class="mt-4">
                {{-- {{ $suppliers->links() }} --}}
                {{ $suppliers->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            // console.log(deleteUrl);
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
