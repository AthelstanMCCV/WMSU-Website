<x-head>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Content</h2>
      
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
      
          <!-- Content Text -->
          <div class="mb-5">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content Text</label>
            <textarea id="content" name="content" rows="4" required
              class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="Enter your content here...">{{ old('content') }}</textarea>
            @error('content')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
      
          <!-- Image Upload with Preview -->
          <div class="mb-5" x-data="{ imagePreview: null }">
            <label for="image" class="block text-gray-700 font-medium mb-2">Upload Image</label>
            <input type="file" id="image" name="image" accept="image/*" required
              @change="const file = $event.target.files[0]; if (file) { imagePreview = URL.createObjectURL(file) }"
              class="w-full text-gray-600 p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
      
            <!-- Image Preview -->
            <template x-if="imagePreview">
              <div class="mt-4">
                <img :src="imagePreview" alt="Image Preview" class="w-full h-auto rounded-lg border shadow">
              </div>
            </template>
      
            @error('image')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
      
          <!-- Submit Button -->
          <div class="flex justify-end">
            <button type="submit"
              class="px-5 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">Submit</button>
          </div>
        </form>
      </div>      
</x-head>