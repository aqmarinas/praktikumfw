<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-2xl font-bold">Create New Supplier</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                        <form action="{{ route('supplier-store') }}" method="POST" class="space-y-4">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                            @csrf <!-- Laravel CSRF protection -->

                            <div class="form-group">
                                <label for="supplier_name" class="block text-sm font-medium text-gray-700">Supplier
                                    Name</label>
                                <input type="text" id="supplier_name" name="supplier_name"
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="supplier_address" class="block text-sm font-medium text-gray-700">Supplier
                                    Address</label>
                                <input type="text" id="supplier_address" name="supplier_address"
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>

                            </div>

                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone"
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                <textarea id="comment" name="comment" rows="3"
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
