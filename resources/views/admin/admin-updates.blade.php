<x-head>
    <x-admin-head>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                @foreach($sections as $indicator => $group)
                @if($indicator === 'UpdatesArticles')
                <h2 class="text-4xl inter-bold mt-4 mb-4">{{ $indicator }}</h2>
            
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            @foreach($group->groupBy('alt') as $alt => $articleGroup)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-6 py-4">{{ $articleGroup->firstWhere('description', 'ArticleTitle')->content ?? '' }}</td>
                                    <td class="px-6 py-4">{{ $articleGroup->firstWhere('description', 'ArticleDate')->content ?? '' }}</td>
                                    <td class="px-6 py-4">{{ $articleGroup->firstWhere('description', 'ArticleBody')->content ?? '' }}</td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        @foreach($articleGroup->where('description', 'ArticleImage') as $image)
                                            <img src="{{ asset('storage/' . $image->imagePath) }}" class="w-24 h-16 object-cover rounded" />
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        <button onclick="openEditArticleModal('{{ $alt }}')" class="text-blue-600 hover:underline">Edit</button>
                                        <button type="button" onclick="openDeleteModal('{{ route('deleteArticleGroup', $alt) }}')" class="text-red-600 hover:underline">Delete</button>
                                    </td>
                                </tr>
            
                                <!-- Optional: Edit Modal per article group -->
                                <div id="editArticleModal-{{ $alt }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                                    <div class="bg-white p-6 rounded-lg w-[500px] relative">
                                        <h2 class="text-2xl font-semibold mb-4">Edit Article</h2>
                                        <button onclick="closeEditArticleModal('{{ $alt }}')" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>
            
                                        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                                            @csrf
            
                                            @foreach($articleGroup as $item)
                                                @if($item->description == 'ArticleTitle')
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Title</label>
                                                        <input type="text" name="articleItems[{{ $item->id }}]" value="{{ $item->content }}"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                    </div>
                                                @elseif($item->description == 'ArticleDate')
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Date</label>
                                                        <input type="date" name="articleItems[{{ $item->id }}]" value="{{ $item->content }}"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                    </div>
                                                @elseif($item->description == 'ArticleBody')
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Body</label>
                                                        <textarea name="articleItems[{{ $item->id }}]" rows="4"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $item->content }}</textarea>
                                                    </div>
                                                @elseif($item->description == 'ArticleImage')
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Replace Image</label>
                                                        <input type="file" name="imageItems[{{ $item->id }}]"
                                                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer">
                                                        @if($item->imagePath)
                                                            <img src="{{ asset('storage/' . $item->imagePath) }}" class="mt-2 rounded w-24">
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
            @endif
            @endforeach
            </div>
        </div>
    </x-admin-head>
</x-head>
