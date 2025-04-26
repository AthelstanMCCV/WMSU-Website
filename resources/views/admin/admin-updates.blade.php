<x-head>
    <x-admin-head>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                <div x-data="{ open: false }">
                    <!-- Trigger Button -->
                    <button @click="open = true" class="px-4 py-2 bg-[#7C0A02] text-white rounded-lg">+ Add Article</button>
                
                    <!-- Modal Background -->
                    <div 
                        x-show="open"
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                        style="display: none;"
                    >
                        <!-- Modal Content -->
                        <div class="bg-white rounded-xl w-full max-w-3xl p-6 relative">
                            <!-- Close Button -->
                            <button @click="open = false" class="absolute top-3 right-3 text-2xl text-gray-600">&times;</button>
                
                            <h2 class="text-2xl font-bold mb-4">Add New Article</h2>
                
                            <form action="/addArticlesSection" method="POST" enctype="multipart/form-data">
                                @csrf
                
                                <!-- Article Title -->
                                <div class="mb-4">
                                    <label class="block font-semibold mb-1">Article Title</label>
                                    <input type="text" name="title" class="w-full border p-2 rounded" required>
                                </div>

                                <!-- Article Date -->
                                <div class="mb-4">
                                    <label class="block font-semibold mb-1">Article Date</label>
                                    <input type="date" name="date" class="w-full border p-2 rounded" required>
                                </div>

                
                                <!-- Article Body -->
                                <div class="mb-4">
                                    <label class="block font-semibold mb-1">Article Body</label>
                                    <textarea name="body" rows="5" class="w-full border p-2 rounded" required></textarea>
                                </div>
                
                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label class="block font-semibold mb-2">Upload Images</label>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*" class="mb-2">
                                    <!-- Image Previews -->
                                    <div id="preview" class="flex flex-wrap gap-2"></div>
                                </div>
                
                                <!-- Submit Button -->
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-[#7C0A02] text-white px-4 py-2 rounded-lg">Submit</button>
                                </div>
                
                            </form>
                        </div>
                    </div>
                </div>      

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Body</th>
                                <th class="px-6 py-3">Images</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4">{{ $article->title }}</td>
                                <td class="px-6 py-4">{{ $article->date }}</td>
                                <td class="px-6 py-4">{{ Str::limit($article->body, 100) }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($article->images as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" class="w-20 h-20 object-cover rounded" alt="Article Image">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <button onclick="openEditArticleModal('{{ $article->id }}')" class="text-blue-600 hover:underline">Edit</button>
                                    <button onclick="openDeleteModal('{{ route('deleteArticle', $article->id) }}')" class="text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                
                            <!-- Edit Article Modal -->
                            <div id="editArticleModal-{{ $article->id }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                                <div class="bg-white p-6 rounded-lg w-[500px] relative">
                                    <h2 class="text-2xl font-semibold mb-4">Edit Article</h2>
                                    <button onclick="closeEditArticleModal('{{ $article->id }}')" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>
                
                                    <form action="{{ route('updateArticle', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Title</label>
                                            <input type="text" name="title" value="{{ $article->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" name="date" value="{{ $article->date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Body</label>
                                            <textarea name="body" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $article->body }}</textarea>
                                        </div>
                
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Upload New Images</label>
                                            <input type="file" name="images[]" multiple accept="image/*" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer">
                                        </div>
                
                                        <div class="text-end">
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </x-admin-head>
 </x-head>

 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const imagesInput = document.getElementById("images");
        const previewContainer = document.getElementById("preview");

        imagesInput.addEventListener("change", function () {
            previewContainer.innerHTML = "";
            Array.from(this.files).forEach(file => {
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.classList.add("w-24", "h-24", "object-cover", "rounded", "border");
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    });

    function openEditArticleModal(id) {
    document.getElementById('editArticleModal-' + id).classList.remove('hidden');
    }

    function closeEditArticleModal(id) {
        document.getElementById('editArticleModal-' + id).classList.add('hidden');
    }
</script>
