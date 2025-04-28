<x-head>
    <x-slot:navbar>
        <x-nav />
    </x-slot:navbar>
    <h2 class="text-3xl font-bold mb-6">Search Results for "{{ $query }}"</h2>

    @if($pages->isEmpty())
        <p>No pages found containing "{{ $query }}".</p>
    @else
        <ul class="space-y-6">
            @foreach($pages as $page)
                <li>
                    <a href="{{ $page['route'] }}" 
                       class="text-red-600 hover:underline text-xl font-semibold">
                        {{ $page['title'] }}
                    </a>
                    @if($page['snippets']->isNotEmpty())
                        <ul class="mt-2 space-y-1 pl-4 border-l-2 border-red-600">
                            @foreach($page['snippets'] as $snippet)
                                <li class="text-gray-700 text-sm">{{ $snippet }}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</x-head>
