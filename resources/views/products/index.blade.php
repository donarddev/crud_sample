<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional: Bootstrap (since your original code uses Bootstrap classes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

<!-- Header -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold">📦 Products Catalog</h1>
        <p class="text-blue-100 mt-2">View and manage your product inventory</p>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto mt-8 px-4 pb-12">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">All Products</h2>
            <p class="text-gray-600 text-sm mt-1">Complete list of available items</p>
        </div>
        <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
            Add Product
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-gradient-to-r from-green-400 to-green-500 text-white p-4 rounded-lg mb-6 flex justify-between items-center shadow-md">
            <span>{{ $message }}</span>
            <button onclick="this.parentElement.style.display='none'" class="font-bold text-lg hover:text-gray-200">✕</button>
        </div>
    @endif

    <!-- Products Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-xl border border-gray-200">
        <table class="min-w-full">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-4 px-6 text-left font-semibold text-sm uppercase tracking-wider">ID</th>
                    <th class="py-4 px-6 text-left font-semibold text-sm uppercase tracking-wider">Name</th>
                    <th class="py-4 px-6 text-left font-semibold text-sm uppercase tracking-wider">Description</th>
                    <th class="py-4 px-6 text-left font-semibold text-sm uppercase tracking-wider">Price</th>
                    <th class="py-4 px-6 text-left font-semibold text-sm uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                @forelse ($products as $product)
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="py-4 px-6 font-semibold text-gray-900">{{ $product->id }}</td>
                        <td class="py-4 px-6 font-semibold text-gray-900">{{ $product->name }}</td>
                        <td class="py-4 px-6 text-gray-600 text-sm">
                            {{ \Illuminate\Support\Str::limit($product->description ?? '', 50) }}
                        </td>
                        <td class="py-4 px-6 font-semibold text-green-600">
                            ${{ number_format($product->price ?? 0, 2) }}
                        </td>
                        <td class="py-4 px-6 space-x-2 flex">
                                <a href="{{ route('products.show', $product->id) }}" class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-3 py-1 rounded text-sm hover:shadow-md transition">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-3 py-1 rounded text-sm hover:shadow-md transition">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded text-sm hover:shadow-md transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-lg font-semibold">No products found.</p>
                                <p class="text-sm">Start by seeding the database or adding a new product.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer Info -->
    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg text-blue-700 text-sm">
        <strong>💡 Tip:</strong> Run <code class="bg-white px-2 py-1 rounded">php artisan migrate && php artisan db:seed --class=ProductSeeder</code> to populate sample data.
    </div>
</div>

<!-- Bootstrap JS (optional, for alerts if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>