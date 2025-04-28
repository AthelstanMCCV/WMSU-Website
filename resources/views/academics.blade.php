<x-head>
    <x-slot:navbar>
        <x-nav />
    </x-slot:navbar>
    <style>
        a {
            text-decoration: none !important;
        }
        
        .college-title {
            color: #0066cc;
            font-weight: 500;
            font-size: 1.25rem;
            line-height: 1.3;
        }
        
        .red-line {
            height: 2px;
            background-color: #BD0F03;
            width: 100%;
        }
        
        .view-details-btn {
            background-color: #BD0F03;
            color: white !important;
            text-align: center;
            padding: 8px 0;
            font-size: 0.9rem;
            border-radius: 4px;
            display: block;
            width: 100%;
        }
    </style>

<body class="font-sans antialiased text-gray-800 overflow-x-hidden bg-white mt-35">
    <main class="w-full">
        <!-- Page Banner -->
        <div class="bg-[#BD0F03] text-white text-center py-6">
            <h1 class="text-4xl font-semibold">Academic Programs</h1>
            <p class="max-w-3xl mx-auto mt-2 text-base px-4">
                Explore WMSU's diverse range of colleges, schools, and academic programs designed to 
                prepare you for success in your chosen field.
            </p>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 py-6">
            <!-- Colleges Section -->
            <div class="mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-1">Colleges and Schools</h2>
                <div class="w-full h-px bg-[#BD0F03]"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                <div>
                    <div class="red-line mb-2"></div>
                    <p class="text-sm text-gray-700 mb-3">
                        Explore programs, faculty, and opportunities
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
</x-head>