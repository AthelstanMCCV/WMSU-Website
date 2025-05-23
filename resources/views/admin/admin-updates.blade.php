<x-head>
    <x-admin-head>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                <!-- Add Article Button -->
                <button onclick="document.getElementById('addArticleModal').classList.remove('hidden')" class="px-4 py-2 bg-green-600 text-white rounded mb-4">
                    Add New Article
                </button>

                <!-- Add Article Modal -->
                <div id="addArticleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="bg-white p-6 rounded-lg w-full max-w-lg">
                        <h2 class="text-xl font-bold mb-4">Add New Article</h2>
                        <form method="POST" action="{{ route('updates-articles.add') }}" enctype="multipart/form-data">
                            @csrf
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" class="w-full mb-3 border rounded px-3 py-2" placeholder="Title" required>
                            <label class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" name="date" class="w-full mb-3 border rounded px-3 py-2" required>
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="body" class="w-full mb-3 border rounded px-3 py-2" rows="4" placeholder="Body" required></textarea>

                            <label class="block mb-2">Upload Images</label>
                            <input type="file" name="images[]" multiple class="mb-3" accept="image/*" onchange="previewAddImages(event)">

                            <!-- Image preview container -->
                            <div id="addImagePreview" class="flex flex-wrap gap-2 mb-4"></div>

                            <div class="flex justify-end space-x-2">
                                <button type="button" onclick="document.getElementById('addArticleModal').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($sections as $indicator => $group)
                {{-- NON-ARCHIVED ARTICLES --}}
                <h2 class="text-4xl inter-bold mt-4 mb-4">Updates Articles</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h3 class="text-2xl inter-bold mt-4 mb-4">Active Articles</h3>
                    <table class="w-full table-fixed text-sm text-left rtl:text-right">
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
                        @foreach($nonArchivedGroups as $alt => $articleGroup)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4 max-w-[200px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleTitle')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[150px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleDate')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[300px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleBody')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[300px] align-top">
                                    <div class="flex flex-wrap gap-2 max-w-full overflow-x-auto">
                                        @foreach($articleGroup->where('description', 'ArticleImage') as $image)
                                            <img src="{{ asset('storage/' . $image->imagePath) }}" class="w-24 h-16 object-cover rounded" />
                                        @endforeach
                                    </div>
                                </td>
                                    <td class="px-6 py-4 flex items-center space-x-2">
                                        <button onclick="document.getElementById('editModal-{{ $alt }}').classList.remove('hidden')" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                                        <button onclick="document.getElementById('deleteModal-{{ $alt }}').classList.remove('hidden')" class="px-3 py-1 bg-red-500 text-white rounded">Archive</button>
                                    </td>
                            </tr>
                                <!-- Edit Modal -->
                                    <div id="editModal-{{ $alt }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-lg" x-data="{ files: [] }">
                                            <h2 class="text-2xl font-bold mb-4">Edit Article</h2>
                                            
                                            <form 
                                                method="POST" 
                                                action="{{ route('updates-articles.update', $alt) }}" 
                                                enctype="multipart/form-data" 
                                                class="space-y-4"
                                                @submit.prevent="
                                                    let formData = new FormData($event.target);
                                                    files.forEach(file => formData.append('media[]', file));
                                                    fetch($event.target.action, {
                                                        method: 'POST',
                                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                                        body: formData
                                                    }).then(response => {
                                                        if(response.ok) {
                                                            files = [];
                                                            $refs.fileInput.value = null;
                                                            document.getElementById('editModal-{{ $alt }}').classList.add('hidden');
                                                            location.reload(); // ✅ reload to reflect changes, or replace with dynamic refresh
                                                        } else {
                                                            alert('Something went wrong saving the article.');
                                                        }
                                                    });
                                                "
                                            >
                                                @csrf
                                                @method('POST')

                                                @foreach($articleGroup as $item)
                                                    @if($item->description === 'ArticleTitle')
                                                        <label class="block text-sm font-medium text-gray-700">Title</label>
                                                        <input type="text" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}" class="w-full border rounded px-3 py-2" placeholder="Title">
                                                    @elseif($item->description === 'ArticleDate')
                                                        <label class="block text-sm font-medium text-gray-700">Date</label>
                                                        <input type="date" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}" class="w-full border rounded px-3 py-2">
                                                    @elseif($item->description === 'ArticleBody')
                                                        <label class="block text-sm font-medium text-gray-700">Content</label>
                                                        <textarea name="newsItems[{{ $item->id }}]" class="w-full border rounded px-3 py-2" rows="4">{{ $item->content }}</textarea>
                                                    @endif
                                                @endforeach

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium">Current Images</label>
                                                    <div class="flex flex-wrap gap-4">
                                                        @foreach($articleGroup->where('description', 'ArticleImage') as $image)
                                                            <div x-data="{ loading: false }" class="relative group">
                                                                <img src="{{ asset('storage/' . $image->imagePath) }}" class="w-32 h-24 object-cover rounded border">
                                                                <button
                                                                    @click.prevent="loading = true; fetch('{{ route('updates-articles.delete-image', $image->id) }}', { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } }).then(() => $el.parentElement.remove())"
                                                                    class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 text-xs opacity-0 group-hover:opacity-100 transition"
                                                                    :disabled="loading"
                                                                    title="Remove image">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium">Add Images</label>
                                                    <input 
                                                        x-ref="fileInput"
                                                        type="file" 
                                                        multiple 
                                                        class="w-full border rounded px-3 py-2"
                                                        @change="files = [...$event.target.files]"
                                                    >

                                                    <template x-if="files.length > 0">
                                                        <div class="flex flex-wrap gap-4 mt-4">
                                                            <template x-for="(file, index) in files" :key="index">
                                                                <div class="relative">
                                                                    <img 
                                                                        :src="URL.createObjectURL(file)" 
                                                                        class="w-32 h-24 object-cover rounded border"
                                                                    >
                                                                    <button 
                                                                        type="button"
                                                                        @click="files.splice(index, 1)"
                                                                        class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 text-xs"
                                                                        title="Remove preview"
                                                                    >
                                                                        &times;
                                                                    </button>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </div>

                                                <div class="flex justify-end gap-2">
                                                    <button 
                                                        type="button" 
                                                        class="px-4 py-2 bg-gray-300 text-sm rounded"
                                                        @click="
                                                            files = []; 
                                                            $refs.fileInput.value = null;
                                                            document.getElementById('editModal-{{ $alt }}').classList.add('hidden')
                                                        "
                                                    >Cancel</button>
                                                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                <!-- Delete Modal -->
                                <div id="deleteModal-{{ $alt }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                    <div class="bg-white p-6 rounded-lg w-full max-w-md">
                                        <h2 class="text-xl font-bold mb-4">Confirm Archive</h2>
                                        <p class="mb-4">Are you sure you want to archive this article group?</p>
                                        <form method="POST" action="{{ route('updates-articles.delete', $alt) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-end space-x-2">
                                                <button type="button" onclick="document.getElementById('deleteModal-{{ $alt }}').classList.add('hidden')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Archive</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
                {{-- ARCHIVED ARTICLES --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h3 class="text-2xl inter-bold mt-4 mb-4">Archived Articles</h3>
                    <table class="w-full table-fixed text-sm text-left rtl:text-right">
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
                        @foreach($archivedGroups as $alt => $articleGroup)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4 max-w-[200px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleTitle')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[150px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleDate')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[300px] break-words whitespace-normal align-top">
                                    {{ $articleGroup->firstWhere('description', 'ArticleBody')->content ?? '' }}
                                </td>
                                <td class="px-6 py-4 max-w-[300px] align-top">
                                    <div class="flex flex-wrap gap-2 max-w-full overflow-x-auto">
                                        @foreach($articleGroup->where('description', 'ArticleImage') as $image)
                                            <img src="{{ asset('storage/' . $image->imagePath) }}" class="w-24 h-16 object-cover rounded" />
                                        @endforeach
                                    </div>
                                </td>
                                    <td class="px-6 py-4 flex items-center space-x-2">
                                        <button onclick="document.getElementById('editModal-{{ $alt }}').classList.remove('hidden')" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                                        <button type="button" onclick="openRestoreModal('{{ route('restoreNewsGroup', $alt) }}')" class="px-3 py-1 border border-white text-white bg-green-500 hover:bg-white hover:border-green-500 hover:text-green-500 rounded transition duration-300 ease-in-out">Restore</button>
                                    </td>
                            </tr>
                            <!-- Edit Modal -->
                                    <div id="editModal-{{ $alt }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-lg" x-data="{ files: [] }">
                                            <h2 class="text-2xl font-bold mb-4">Edit Article</h2>
                                            
                                            <form 
                                                method="POST" 
                                                action="{{ route('updates-articles.update', $alt) }}" 
                                                enctype="multipart/form-data" 
                                                class="space-y-4"
                                                @submit.prevent="
                                                    let formData = new FormData($event.target);
                                                    files.forEach(file => formData.append('media[]', file));
                                                    fetch($event.target.action, {
                                                        method: 'POST',
                                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                                        body: formData
                                                    }).then(response => {
                                                        if(response.ok) {
                                                            files = [];
                                                            $refs.fileInput.value = null;
                                                            document.getElementById('editModal-{{ $alt }}').classList.add('hidden');
                                                            location.reload(); // ✅ reload to reflect changes, or replace with dynamic refresh
                                                        } else {
                                                            alert('Something went wrong saving the article.');
                                                        }
                                                    });
                                                "
                                            >
                                                @csrf
                                                @method('POST')

                                                @foreach($articleGroup as $item)
                                                    @if($item->description === 'ArticleTitle')
                                                        <label class="block text-sm font-medium text-gray-700">Title</label>
                                                        <input type="text" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}" class="w-full border rounded px-3 py-2" placeholder="Title">
                                                    @elseif($item->description === 'ArticleDate')
                                                        <label class="block text-sm font-medium text-gray-700">Date</label>
                                                        <input type="date" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}" class="w-full border rounded px-3 py-2">
                                                    @elseif($item->description === 'ArticleBody')
                                                        <label class="block text-sm font-medium text-gray-700">Content</label>
                                                        <textarea name="newsItems[{{ $item->id }}]" class="w-full border rounded px-3 py-2" rows="4">{{ $item->content }}</textarea>
                                                    @endif
                                                @endforeach

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium">Current Images</label>
                                                    <div class="flex flex-wrap gap-4">
                                                        @foreach($articleGroup->where('description', 'ArticleImage') as $image)
                                                            <div x-data="{ loading: false }" class="relative group">
                                                                <img src="{{ asset('storage/' . $image->imagePath) }}" class="w-32 h-24 object-cover rounded border">
                                                                <button
                                                                    @click.prevent="loading = true; fetch('{{ route('updates-articles.delete-image', $image->id) }}', { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } }).then(() => $el.parentElement.remove())"
                                                                    class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 text-xs opacity-0 group-hover:opacity-100 transition"
                                                                    :disabled="loading"
                                                                    title="Remove image">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium">Add Images</label>
                                                    <input 
                                                        x-ref="fileInput"
                                                        type="file" 
                                                        multiple 
                                                        class="w-full border rounded px-3 py-2"
                                                        @change="files = [...$event.target.files]"
                                                    >

                                                    <template x-if="files.length > 0">
                                                        <div class="flex flex-wrap gap-4 mt-4">
                                                            <template x-for="(file, index) in files" :key="index">
                                                                <div class="relative">
                                                                    <img 
                                                                        :src="URL.createObjectURL(file)" 
                                                                        class="w-32 h-24 object-cover rounded border"
                                                                    >
                                                                    <button 
                                                                        type="button"
                                                                        @click="files.splice(index, 1)"
                                                                        class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 text-xs"
                                                                        title="Remove preview"
                                                                    >
                                                                        &times;
                                                                    </button>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </div>

                                                <div class="flex justify-end gap-2">
                                                    <button 
                                                        type="button" 
                                                        class="px-4 py-2 bg-gray-300 text-sm rounded"
                                                        @click="
                                                            files = []; 
                                                            $refs.fileInput.value = null;
                                                            document.getElementById('editModal-{{ $alt }}').classList.add('hidden')
                                                        "
                                                    >Cancel</button>
                                                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            @endforeach
                        </tbody>                        
                    </table>
                    <!-- Restore Confirmation Modal -->
                        <div id="restoreModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg w-[400px] relative shadow-lg">
                                <h2 class="text-xl font-semibold mb-4 text-center">Confirm Restore</h2>
                                <p class="mb-6 text-gray-700 text-center">Are you sure you want to restore this item?</p>

                                <!-- Close button -->
                                <button onclick="closeRestoreModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

                                <form id="restoreForm" method="POST" action="">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex justify-center space-x-4">
                                        <button type="button" onclick="closeRestoreModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Restore</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            @endforeach
            </div>
        </div>
    </x-admin-head>
</x-head>

<script>
    function previewAddImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('addImagePreview');
    previewContainer.innerHTML = ''; // Clear existing previews

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-24 h-16 object-cover rounded';
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
}

function openRestoreModal(actionUrl) {
    const form = document.getElementById('restoreForm');
    form.action = actionUrl;
    document.getElementById('restoreModal').classList.remove('hidden');
}

function closeRestoreModal() {
    document.getElementById('restoreModal').classList.add('hidden');
}
</script>