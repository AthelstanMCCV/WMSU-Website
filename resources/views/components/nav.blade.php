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
                <a class="navLinks hover:font-extrabold duration-150 ease-in-out" href="" id="Home">Home</a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="About Us">About Us <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="Admissions">Admissions <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="Academic">Academic <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="Administration">Administration <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="Res & Ext">Res & Ext <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
                <a class="navLinks group hover:font-extrabold duration-150 ease-in-out" href="" id="Other">Others <img class="ml-1 group-hover:rotate-180 duration-150 ease-in-out" src="{{ asset('images/Expand Arrow.png') }}" alt=""></a>
            </div>
            <a class="MyWmsuBtn inter-regular text-xs py-2 px-7 ml-5 bg-[#BD0F03] border border-white text-white hover:bg-white hover:text-[#BD0F03] hover:border-[#BD0F03] duration-300 ease-in-out" href="/register">MyWMSU</a>
        </div>

        <div class="fixed top-[80px] md:top-[98px] right-8 z-50">
            <button class="bg-[white] hover:bg-[white] text-white px-5 md:px-7 py-2 rounded-b-[100px] shadow-lg transition-all duration-300 ease-in-out transform hover:translate-y-2">
                <img src="{{ asset('images/search-icon.png') }}" alt="Search" class="h-2.5 w-2.5 md:h-3 md:w-3 -mt-1">
            </button>
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
        <div id="drawer-navigation" class="fixed top-[72px] left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-red-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
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
</script>