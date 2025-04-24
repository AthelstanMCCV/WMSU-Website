<x-head>
    <x-admin-head>
       <div class="p-4 sm:ml-64">
          <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
             @foreach($sections as $indicator => $group)
                <h2 class="text-4xl inter-bold mt-4 mb-4">{{ $indicator }}</h2>
            
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Content Type</th>
                                <th scope="col" class="px-6 py-3">Content</th>
                                <th scope="col" class="px-6 py-3">Image/Video</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($group as $section)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-6 py-4">{{ $section->description }}</td>
                                    <td class="px-6 py-4">{{ $section->elemType }}</td>
                                    <td class="px-6 py-4">{{ $section->content }}</td>
                                    <td class="px-6 py-4">{{ $section->imagePath }}</td>
                                    <td class="px-6 py-4 text-start">
                                        <button onclick="openModal({{ $section->id }})" class="text-blue-600 hover:underline">Edit</button>
                                    </td>
                                </tr>
                                <div id="modal-{{ $section->id }}" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                    <div class="bg-white p-6 rounded-xl w-[400px] transition-all duration-300 transform scale-95 opacity-0" id="modalContent-{{ $section->id }}">
                                        <h2 class="text-xl mb-4">Edit Section</h2>
                                        <form action="{{ route('sections.update', $section->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Content:</label>
                                                <input type="text" name="content" value="{{ $section->content }}" class="w-full border rounded p-2">
                                            </div>
                                            <div class="mb-3">
                                                <label>Image:</label>
                                                <input type="file" name="media" accept="image/*,video/*" class="w-full">
                                                @if($section->imagePath)
                                                    @php
                                                        $extension = pathinfo($section->imagePath, PATHINFO_EXTENSION);
                                                    @endphp

                                                    @if(in_array($extension, ['mp4', 'webm', 'ogg']))
                                                        <video controls class="mt-2 w-full rounded">
                                                            <source src="{{ asset('storage/' . $section->imagePath) }}" type="video/{{ $extension }}">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @else
                                                        <img src="{{ asset('storage/' . $section->imagePath) }}" alt="Image" class="mt-2 w-full rounded">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="button" onclick="closeModal({{ $section->id }})" class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach            
          </div>
       </div>
    </x-admin-head>
 </x-head>

<script>
    function openModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        const content = document.getElementById(`modalContent-${id}`);
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 50);
    }
    
    function closeModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        const content = document.getElementById(`modalContent-${id}`);
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }
    </script>