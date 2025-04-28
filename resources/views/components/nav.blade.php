
<section class="navSectionCont">
    <div class="navSection h-full flex justify-between items-center mx-3 sm:mx-5">
        <div class="navLogo&TitleCont h-full flex items-center gap-2 sm:gap-4">
            <img class="navLogo w-14 h-14 sm:size-16" src="{{ asset('images/WMSU-Logo.png') }}" alt="">
            <div class="navDivider"></div>
            <div class="navTitle">
                <p class="inter-bold text-sm sm:text-base text-[#BD0F03]">WESTERN MINDANAO STATE UNIVERSITY</p>
                <p class="montserrat-regular text-[10px] sm:text-xs text-[#BD0F03] -mt-1">A Smart Research University by 2040</p>
            </div>
        </div>

        <div class="navLinksCont h-full flex items-center opacity-0 pointer-events-none absolute xl:opacity-100 xl:pointer-events-auto xl:relative">
            <div class="flex items-center text-xs inter-extralight text-[#BD0F03]">
                <a class="navLinks hover:font-extrabold duration-150 ease-in-out" href="/" id="Home">Home</a>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="About Us">
                    About Us <img class="ml-1 nav-arrow transition-transform duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt="">
                    <div class="dropdown-menu">
                        <div class="dropdown-title">
                            <div class="dropdown-content">
                                <h6 class="inter-bold">CORE VALUES</h6>
                                <p class="inter-light">Mission</p>
                                <p class="inter-light">Vision</p>
                                <p class="inter-light">Quality Policy</p>
                                <p class="inter-light">University Function</p>
                            </div>
                            <div class="nav-divider"></div>
                            <div class="dropdown-content">
                                <h6 class="inter-bold">INSTITUTIONAL IDENTITY</h6>
                                <p class="inter-light">Strategic Plan</p>
                                <p class="inter-light">Transparency Seal</p>
                            </div>
                            <div class="nav-divider"></div>
                            <div class="dropdown-content">
                                <h6 class="inter-bold">FOUNDATION</h6>
                                <a href='/About' class="inter-light">History of WMSU</a>
                                <p class="inter-light">News Archive</p>
                                <p class="inter-light">Bids & Awards</p>
                                <p class="inter-light">Gallery</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="Admissions">
                    Admissions <img class="ml-1 nav-arrow transition-transform duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt="">
                    <div class="dropdown-menu">
                        <!-- Dropdown content will be added here -->
                    </div>
                </div>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="Academic">
                    Academic <img class="ml-1 nav-arrow transition-transform duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt="">
                    <div class="dropdown-menu">
                        <!-- Dropdown content will be added here -->
                    </div>
                </div>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="Administration">
                    Administration
                </div>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="Res & Ext">
                    Res & Ext <img class="ml-1 nav-arrow transition-transform duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt="">
                    <div class="dropdown-menu">
                        <div class="dropdown-title">
                            <div class="dropdown-content">
                                <h6 class="inter-bold">ABOUT</h6>
                                <a href="/ResExt-Home" class="inter-light">RESEL</a>
                                <p class="inter-light">Research Development</p>
                                <p class="inter-light">Extension Services</p>
                                <p class="inter-light">External Linkages</p>
                                <h6 class="inter-bold">RESEARCH CENTERS</h6>
                                <p class="inter-light">Research Development and Evaluation Center</p>
                                <p class="inter-light">Research Ethics Oversight Center</p>
                                <p class="inter-light">Pure and Analytical Research Center</p>
                            </div>
                            <div class="nav-divider"></div>
                            <div class="dropdown-content">
                                <h6 class="inter-bold">RESEARCH OFFICES</h6>
                                <p class="inter-light">Intellectual Property & Technology Business Management - ITSO</p>
                                <p class="inter-light">Research Centers Operations Office</p>
                                <p class="inter-light">Research Ethics Oversight Committee</p>
                                <p class="inter-light">Creatives Works Unit</p>
                                <p class="inter-light">Research Project Development Unit</p>
                            </div>
                            <div class="nav-divider"></div>
                            <div class="dropdown-content">
                                <h6 class="inter-bold">ACTIVITIES, PROGRAMS & PROJECTS</h6>
                                <a href='/ResExt-Home/Activities' class="inter-light">Research & Development</a>
                                <a href='/About' class="inter-light">History of WMSU</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navLinks group hover:font-extrabold duration-150 ease-in-out" id="Other">
                    Others <img class="ml-1 nav-arrow transition-transform duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt="">
                    <div class="dropdown-menu">
                        <!-- Dropdown content will be added here -->
                    </div>
                </div>
            </div>
            <a class="MyWmsuBtn inter-regular text-xs py-2 px-7 ml-5 bg-[#BD0F03] border border-white text-white hover:bg-white hover:text-[#BD0F03] hover:border-[#BD0F03] duration-300 ease-in-out" href="/register">MyWMSU</a>
        </div>

        <div class="fixed top-[80px] md:top-[98px] right-8 z-50">
            <button id="search-toggle-btn" class="hidden md:block bg-[white] hover:bg-[white] text-white px-5 md:px-7 py-2 rounded-b-[100px] shadow-lg transition-all duration-300 ease-in-out transform hover:translate-y-2">
                <img src="{{ asset('images/search-icon.png') }}" alt="Search" class="h-2.5 w-2.5 md:h-3 md:w-3 -mt-1">
            </button>
            <!-- Search Dropdown -->
            <div id="search-dropdown" class="hidden fixed left-1/2 top-[120px] transform -translate-x-1/2 w-[600px] h-[400px] bg-gray-100 rounded-2xl shadow-2xl border border-gray-100 z-50">
                <div class="relative px-7 pt-7 pb-2">
                    <form method="GET" action="{{ route('site.search.json') }}" class="flex items-center w-full">
                        <svg class="w-5 h-5 text-black mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" name="query" placeholder="Search" 
                            class="flex-1 outline-none border border-black focus:ring-1 focus:ring-black focus:border-black bg-transparent text-gray-700 text-base placeholder-gray-400" 
                            autofocus />
                        <span id="search-esc-btn" class="ml-2 text-xs text-gray-400 px-2 py-1 border rounded bg-gray-50 hover:bg-red-200 hover:text-red-600 hover:border-red-700 active:bg-red-700 active:text-red-700 active:border-red-600 transition-colors duration-150 cursor-pointer">esc</span>
                    </form>
                </div>
                <hr class="border-gray-100">
                <div id="search-results" class="px-7 py-5 text-gray-800 overflow-y-auto h-[250px] space-y-4"></div>
                <hr class="border-gray-100">
                <div class="fixed bottom-4 right-4 flex justify-end items-center px-7 py-4">
                    <span class="text-xs text-gray-400 mr-1">Search by</span>
                    <img src="../images/WMSU-Logo.png" alt="algolia" class="h-5 w-auto ml-1 align-middle">
                    <span class="text-xs text-red-600 font-bold ml-1 align-middle">WMSU</span>
                </div>
            </div>
        </div>

        <!-- Hamburger of Mobile and Tablet View -->
        <button id="hamburger-button" class="menu hidden xl:opacity-0 xl:pointer-events-none xl:absolute opacity-100 pointer-events-auto relative" onclick="toggleMenu()" aria-label="Main Menu" type="button">
            <svg width="40" height="40" viewBox="0 0 100 100">
                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path class="line line2" d="M 20,50 H 80" />
                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
            </svg>
        </button>

        <!-- Drawer -->
        <div id="drawer-navigation" class="fixed top-[114px] left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-red-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-bold text-white-500 uppercase dark:text-white-400">Menu</h5>
            <button type="button" onclick="closeMenu()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Admissions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Academic</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Administration</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Research & Extension</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Others</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 group">
                            <span class="flex-1 ms-3 whitespace-nowrap text-white">MyWMSU</span>
                        </a>
                    </li>
                    <!-- Tablet Only Search Option -->
                    <li class="tablet-only-search">
                        <div class="sidebar-search" id="tablet-sidebar-search-toggle">
                            <span><i class="fa fa-search"></i></span>
                            <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <span>Search</span>
                        </div>
                    </li>
                    
                    <!-- Mobile Search Toggle Button -->
                    <li class="block md:hidden">
                        <button id="mobile-search-toggle" class="flex items-center w-full p-2 text-white rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <span>Search</span>
                        </button>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleMenu() {
        const button = document.getElementById('hamburger-button');
        const drawer = document.getElementById('drawer-navigation');
        
        button.classList.toggle('opened');
        button.setAttribute('aria-expanded', button.classList.contains('opened'));
        
        if (drawer.classList.contains('-translate-x-full')) {
            drawer.classList.remove('-translate-x-full');
        } else {
            drawer.classList.add('-translate-x-full');
        }
    }

    function closeMenu() {
        const button = document.getElementById('hamburger-button');
        const drawer = document.getElementById('drawer-navigation');
        
        button.classList.remove('opened');
        button.setAttribute('aria-expanded', 'false');
        drawer.classList.add('-translate-x-full');
    }

    // Search Dropdown Logic
    document.addEventListener('DOMContentLoaded', function() {
        const searchBtn = document.getElementById('search-toggle-btn');
        const dropdown = document.getElementById('search-dropdown');
        let isOpen = false;

        function openDropdown() {
            dropdown.classList.remove('hidden');
            isOpen = true;
            // Focus input
            const input = dropdown.querySelector('input');
            if (input) input.focus();
        }
        function closeDropdown() {
            dropdown.classList.add('hidden');
            isOpen = false;
        }
        searchBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });
        // Close on click outside
        document.addEventListener('mousedown', function(e) {
            if (isOpen && !dropdown.contains(e.target) && !searchBtn.contains(e.target)) {
                closeDropdown();
            }
        });
        // Close on esc key
        document.addEventListener('keydown', function(e) {
            if (isOpen && e.key === 'Escape') {
                closeDropdown();
            }
        });
        
        // Close on esc button click
        const escBtn = document.getElementById('search-esc-btn');
        if (escBtn) {
            escBtn.addEventListener('click', function() {
                closeDropdown();
            });
        }
    });

    // Mobile sidebar search toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileSearchToggle = document.getElementById('mobile-search-toggle');
        const mobileSearchDropdown = document.getElementById('mobile-search-dropdown');
        if (mobileSearchToggle && mobileSearchDropdown) {
            mobileSearchToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileSearchDropdown.classList.toggle('hidden');
            });
            // Optional: close on click outside
            document.addEventListener('mousedown', function(e) {
                if (!mobileSearchDropdown.contains(e.target) && !mobileSearchToggle.contains(e.target)) {
                    mobileSearchDropdown.classList.add('hidden');
                }
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const tabletSearchToggle = document.getElementById('tablet-sidebar-search-toggle');
        const tabletSearchInput = document.getElementById('tablet-sidebar-search-input');
        if (tabletSearchToggle && tabletSearchInput) {
            tabletSearchToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                tabletSearchInput.classList.toggle('hidden');
                if (!tabletSearchInput.classList.contains('hidden')) {
                    tabletSearchInput.querySelector('input').focus();
                }
            });
            document.addEventListener('mousedown', function(e) {
                if (!tabletSearchInput.contains(e.target) && !tabletSearchToggle.contains(e.target)) {
                    tabletSearchInput.classList.add('hidden');
                }
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar search for mobile/tablet
        const sidebarSearchToggles = [
            document.getElementById('tablet-sidebar-search-toggle'),
            document.getElementById('mobile-search-toggle')
        ].filter(Boolean);
        const searchDropdown = document.getElementById('search-dropdown');
        let isSearchOpen = false;

        function openSearchModal() {
            if (searchDropdown) {
                searchDropdown.classList.remove('hidden');
                isSearchOpen = true;
                // Focus input
                const input = searchDropdown.querySelector('input');
                if (input) input.focus();
            }
        }
        function closeSearchModal() {
            if (searchDropdown) {
                searchDropdown.classList.add('hidden');
                isSearchOpen = false;
            }
        }

        sidebarSearchToggles.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                openSearchModal();
            });
            btn.addEventListener('touchstart', function(e) {
                e.stopPropagation();
                openSearchModal();
            });
        });

        // Close on click/tap outside
        document.addEventListener('mousedown', function(e) {
            if (isSearchOpen && searchDropdown && !searchDropdown.contains(e.target) &&
                !sidebarSearchToggles.some(btn => btn && btn.contains(e.target))) {
                closeSearchModal();
            }
        });
        document.addEventListener('touchstart', function(e) {
            if (isSearchOpen && searchDropdown && !searchDropdown.contains(e.target) &&
                !sidebarSearchToggles.some(btn => btn && btn.contains(e.target))) {
                closeSearchModal();
            }
        });

        // Close on esc key
        document.addEventListener('keydown', function(e) {
            if (isSearchOpen && e.key === 'Escape') {
                closeSearchModal();
            }
        });

        // Close on esc button click/touch inside modal
        const escBtn = document.getElementById('search-esc-btn');
        if (escBtn) {
            escBtn.addEventListener('click', function() {
                closeSearchModal();
            });
            escBtn.addEventListener('touchstart', function(e) {
                e.preventDefault();
                closeSearchModal();
            });
        }
    });
</script>

<style>
    @media (max-width: 900px) {
        .sidebar-search {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 1.5rem;
            margin-left: 2rem;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
        }
        .sidebar-search input[type="text"] {
            background: #fff;
            color: #7C0A02;
            border: none;
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 1rem;
            margin-left: 8px;
            width: 120px;
        }
        .sidebar-search svg, .sidebar-search i {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 900px) and (min-width: 601px) {
        .tablet-only-search {
            display: list-item !important;
        }
        .sidebar-search {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem 0.75rem;
        }
        .sidebar-search-input {
            display: flex;
            align-items: center;
            margin-left: 2rem;
            margin-top: 0.5rem;
        }
        .sidebar-search-input input[type="text"] {
            background: #fff;
            color: #7C0A02;
            border: none;
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 1rem;
            width: 120px;
        }
        .sidebar-search svg, .sidebar-search i {
            font-size: 1.2rem;
        }
    }
    @media (max-width: 600px), (min-width: 901px) {
        .tablet-only-search {
            display: none !important;
        }
    }

    @media (max-width: 900px) {
        #search-dropdown {
            width: 95vw !important;
            max-width: 95vw !important;
            min-width: 0 !important;
            left: 50% !important;
            top: 8vh !important;
            height: auto !important;
            min-height: 200px;
            max-height: 80vh;
            border-radius: 1rem !important;
            padding: 1rem 0.5rem !important;
            overflow-y: auto;
            box-sizing: border-box;
        }
        #search-dropdown form {
            flex-direction: column !important;
            gap: 0.5rem;
        }
        #search-dropdown input[type="text"] {
            width: 100% !important;
            font-size: 1rem !important;
            margin: 0 !important;
        }
        #search-results {
            max-height: 40vh;
            overflow-y: auto;
        }
    }
    @media (max-width: 600px) {
        #search-dropdown {
            width: 99vw !important;
            max-width: 99vw !important;
            left: 50% !important;
            top: 4vh !important;
            padding: 0.5rem 0.25rem !important;
            font-size: 0.95rem !important;
        }
    }
</style>
