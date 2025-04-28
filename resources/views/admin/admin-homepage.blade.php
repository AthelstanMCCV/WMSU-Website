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
            <form action="{{ url('/addSection') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
            
                <!-- About Title -->
                <div>
                    <label for="aboutTitle" class="block text-sm font-medium text-gray-700">About Title</label>
                    <input type="text" name="aboutTitle" id="aboutTitle"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            
                <!-- Image -->
                <div>
                    <label for="aboutImage" class="block text-sm font-medium text-gray-700">Image (optional)</label>
                    <input type="file" name="aboutImage" id="aboutImage"
                        accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <p class="mt-1 text-sm text-gray-500">Allowed formats: jpeg, png, jpg, gif. Max 5MB.</p>
                </div>
            
                <!-- Text Content -->
                <div>
                    <label for="aboutContent" class="block text-sm font-medium text-gray-700">Text Content</label>
                    <textarea name="aboutContent" id="aboutContent" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
            
                <!-- Multiple Text Links -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Text Links</label>
                    <div id="linkInputs" class="space-y-2 mt-2">
                        <input type="text" name="links[]" placeholder="Enter link text"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <button type="button" onclick="addLinkInput()"
                        class="mt-2 text-indigo-600 hover:underline text-sm">+ Add another link</button>
                </div>

                <input type="text" name="page_id" value="1" hidden>
            
                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Section
                    </button>
                </div>
            </form>
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

    function addLinkInput() {
        const linkInputsContainer = document.getElementById('linkInputs');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'links[]';
        input.placeholder = 'Enter link text';
        input.className = 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500';

        linkInputsContainer.appendChild(input);
    }
    </script>