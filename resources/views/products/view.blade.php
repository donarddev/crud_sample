<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} — Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-gray-100 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto bg-gradient-to-br from-gray-900/60 to-gray-800/60 border border-cyan-500/10 rounded-2xl p-8 shadow-2xl">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-white">{{ $product->name }}</h1>
                    <p class="text-sm text-gray-400 mt-1">Product #{{ $product->id }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-yellow-500 to-orange-500 text-white font-semibold">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-rose-500 text-white font-semibold">Delete</button>
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="p-6 bg-gradient-to-br from-slate-800/60 to-slate-900/60 rounded-xl border border-gray-700/40">
                    <h3 class="text-sm text-cyan-300 font-semibold uppercase tracking-wider mb-2">Description</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">{{ $product->description ?? 'No description provided.' }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 rounded-xl bg-gradient-to-br from-gray-800/50 to-gray-900/50 border border-gray-700/30">
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Price</p>
                        <p class="text-2xl font-bold text-green-400 mt-2">${{ number_format($product->price ?? 0, 2) }}</p>
                    </div>
                    <div class="p-6 rounded-xl bg-gradient-to-br from-gray-800/50 to-gray-900/50 border border-gray-700/30">
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Stock</p>
                        <p class="text-2xl font-bold text-white mt-2">{{ $product->stock ?? 0 }}</p>
                    </div>
                    <div class="p-6 rounded-xl bg-gradient-to-br from-gray-800/50 to-gray-900/50 border border-gray-700/30">
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Created</p>
                        <p class="text-sm text-gray-300 mt-2">{{ $product->created_at?->format('Y-m-d H:i') ?? '-' }}</p>
                        <p class="text-xs text-gray-500 mt-1">Updated: {{ $product->updated_at?->format('Y-m-d H:i') ?? '-' }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('products.index') }}" class="text-cyan-300 hover:underline">← Back to products</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
