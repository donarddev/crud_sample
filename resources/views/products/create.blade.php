<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-gray-100">

<div class="min-h-screen bg-gradient-to-br from-slate-900 to-slate-800 py-12">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto bg-gradient-to-br from-gray-900/70 to-gray-800/60 border border-cyan-500/10 rounded-2xl p-8 shadow-2xl">
      
      <h1 class="text-3xl font-extrabold text-white mb-4">Create Product</h1>
      <p class="text-sm text-gray-300 mb-6">Add a new product to your catalog.</p>

      @if ($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-900/60 border border-red-500/30 text-red-200">
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
          <label class="block text-sm text-gray-300 mb-2">Name</label>
          <input 
            name="name" 
            value="{{ old('name') }}" 
            required 
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-cyan-400 focus:outline-none" />
        </div>

        <div>
          <label class="block text-sm text-gray-300 mb-2">Description</label>
          <textarea 
            name="description" 
            rows="4" 
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-gray-200 focus:ring-2 focus:ring-cyan-400 focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm text-gray-300 mb-2">Price</label>
            <input 
              name="price" 
              type="number" 
              step="0.01" 
              value="{{ old('price') }}" 
              required 
              class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-green-400 focus:outline-none" />
          </div>
          <div>
            <label class="block text-sm text-gray-300 mb-2">Stock</label>
            <input 
              name="stock" 
              type="number" 
              value="{{ old('stock', 0) }}" 
              required 
              class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-emerald-400 focus:outline-none" />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <a href="{{ route('products.index') }}" 
             class="text-sm text-cyan-300 hover:underline">
             ← Back to list
          </a>

          <button 
            type="submit" 
            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold hover:brightness-110 transition">
            Create
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>