<x-head>
    <x-admin-head>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                @if($sections->isEmpty())
                    <p>No sections added yet.</p>
                @endif
                <!-- Add News Button -->
                <button onclick="openAddNewsModal()" class="mb-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Add News
                </button>
                <!-- Modal Overlay -->
                <div id="addNewsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                    <!-- Modal Content -->
                    <div class="bg-white p-6 rounded-lg w-[500px] relative">
                        <h2 class="text-2xl font-semibold mb-4">Add News</h2>

                        <!-- Close button -->
                        <button onclick="closeAddNewsModal()"
                            class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

                        <!-- News Form -->
                        <form action="/addNewsSection" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf

                            <!-- News Image -->
                            <div>
                                <label for="RENewsImg" class="block text-sm font-medium text-gray-700">News Image</label>
                                <input type="file" name="RENewsImg" id="RENewsImg"
                                    accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <p class="mt-1 text-sm text-gray-500">Allowed formats: jpeg, png, jpg, gif. Max 5MB.</p>
                            </div>

                            <!-- News Title -->
                            <div>
                                <label for="RENewsTitle" class="block text-sm font-medium text-gray-700">News Title</label>
                                <input type="text" name="RENewsTitle" id="RENewsTitle"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <!-- News Date -->
                            <div>
                                <label for="RENewsDate" class="block text-sm font-medium text-gray-700">News Date</label>
                                <input type="date" name="RENewsDate" id="RENewsDate"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <!-- News Content -->
                            <div>
                                <label for="RENewsContent" class="block text-sm font-medium text-gray-700">News Content</label>
                                <textarea name="RENewsContent" id="RENewsContent" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>

                            <input type="hidden" name="page_id" value="2">

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Add News
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($sections as $indicator => $group)
                <h2 class="text-4xl inter-bold mt-4 mb-4">{{ $indicator }}</h2>
            
                @if($indicator === 'Research & Extension News')
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">Title</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Content</th>
                                    <th class="px-6 py-3">Image/Video</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group->groupBy('alt') as $alt => $newsGroup)
                                    <tr class="bg-white border-b border-gray-200">
                                        <td class="px-6 py-4">{{ $newsGroup->firstWhere('description', 'RENewsTitle')->content ?? '' }}</td>
                                        <td class="px-6 py-4">{{ $newsGroup->firstWhere('description', 'RENewsDate')->content ?? '' }}</td>
                                        <td class="px-6 py-4">{{ $newsGroup->firstWhere('description', 'RENewsContent')->content ?? '' }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $media = $newsGroup->firstWhere('description', 'RENewsImg');
                                                $extension = $media ? pathinfo($media->imagePath, PATHINFO_EXTENSION) : '';
                                            @endphp
                                            @if($media)
                                                @if(in_array($extension, ['mp4', 'webm', 'ogg']))
                                                    <video controls class="w-24 rounded">
                                                        <source src="{{ asset('storage/' . $media->imagePath) }}" type="video/{{ $extension }}">
                                                    </video>
                                                @else
                                                    <img src="{{ asset('storage/' . $media->imagePath) }}" class="w-24 rounded" />
                                                @endif
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <button onclick="openEditNewsModal('{{ $alt }}')" class="text-blue-600 hover:underline">Edit</button>
                                            <button type="button" onclick="openDeleteModal('{{ route('deleteNewsGroup', $alt) }}')" class="text-red-600 hover:underline">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit News Modal -->
                                    <div id="editNewsModal-{{ $alt }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                                        <div class="bg-white p-6 rounded-lg w-[500px] relative">
                                            <h2 class="text-2xl font-semibold mb-4">Edit News</h2>
                                            <button onclick="closeEditNewsModal('{{ $alt }}')" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

                                            <form action="{{ route('updateNewsGroup', $alt) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                                @csrf

                                                @foreach($newsGroup as $item)
                                                    @if($item->description == 'RENewsTitle')
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Title</label>
                                                            <input type="text" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}"
                                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                        </div>
                                                    @elseif($item->description == 'RENewsDate')
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Date</label>
                                                            <input type="date" name="newsItems[{{ $item->id }}]" value="{{ $item->content }}"
                                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                        </div>
                                                    @elseif($item->description == 'RENewsContent')
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Content</label>
                                                            <textarea name="newsItems[{{ $item->id }}]" rows="4"
                                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $item->content }}</textarea>
                                                        </div>
                                                    @elseif($item->description == 'RENewsImg')
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Media</label>
                                                            <input type="file" name="media" accept="image/*,video/*"
                                                                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer">
                                                            @if($item->imagePath)
                                                                <img src="{{ asset('storage/' . $item->imagePath) }}" alt="" class="mt-2 rounded w-24">
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach

                                                <div class="text-end">
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            
                @else
                    {{-- fallback default table rendering for other sections --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">Description</th>
                                    <th class="px-6 py-3">Content Type</th>
                                    <th class="px-6 py-3">Content</th>
                                    <th class="px-6 py-3">Image/Video</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group as $section)
                                    <tr class="bg-white border-b border-gray-200">
                                        <td class="px-6 py-4">{{ $section->description }}</td>
                                        <td class="px-6 py-4">{{ $section->elemType }}</td>
                                        <td class="px-6 py-4">{{ $section->content }}</td>
                                        <td class="px-6 py-4">{{ $section->imagePath }}</td>
                                        <td class="px-6 py-4">
                                            <button onclick="openModal({{ $section->id }})" class="text-blue-600 hover:underline">Edit</button>
                                        </td>
                                    </tr>
                                    {{-- existing modals if any --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach
                    
            </div>
         </div>
    </x-admin-head>
 </x-head>

 <!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-[400px] relative">
        <h2 class="text-xl font-semibold mb-4 text-center">Confirm Delete</h2>
        <p class="mb-6 text-gray-700 text-center">Are you sure you want to delete this item? This action cannot be undone.</p>

        <!-- Close button -->
        <button onclick="closeDeleteModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
            </div>
        </form>
    </div>
</div>

 <!-- Modal JS -->
<script>
    function openAddNewsModal() {
        document.getElementById('addNewsModal').classList.remove('hidden');
    }

    function closeAddNewsModal() {
        document.getElementById('addNewsModal').classList.add('hidden');
    }

    function openEditNewsModal(alt) {
        document.getElementById('editNewsModal-' + alt).classList.remove('hidden');
    }

    function closeEditNewsModal(alt) {
        document.getElementById('editNewsModal-' + alt).classList.add('hidden');
    }

    function openDeleteModal(actionUrl) {
    const form = document.getElementById('deleteForm');
    form.action = actionUrl;
    document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>