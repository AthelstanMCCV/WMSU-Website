    <nav class="fixed top-0 z-50 w-full bg-red-800 border-b border-red-700 dark:bg-red-800 dark:border-red-800">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-red-100 rounded-lg sm:hidden hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 dark:text-red-200 dark:hover:bg-red-800 dark:focus:ring-red-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
             </button>
            <a href="" class="flex ms-2 md:me-24">
              <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white dark:text-red-100">ADMIN DASHBOARD</span>
            </a>
          </div>
          <div class="flex items-center">
              <div class="flex items-center ms-3">
                <div>
                  <button type="button" class="flex text-sm bg-red-800 rounded-full focus:ring-1 focus:ring-red-300 dark:focus:ring-red-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="../images/OCHO.png" alt="User-Photo">
                  </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-200 rounded-sm shadow-lg dark:bg-white dark:divide-gray-200" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                    <p class="text-sm text-black dark:text-black" role="none">
                      Hans Lao
                    </p>
                    <p class="text-sm font-medium text-black truncate dark:text-black" role="none">
                      hanslao@wmsu.com
                    </p>
                  </div>
                  <ul class="py-1" role="none">
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-black dark:hover:bg-gray-100" role="menuitem">Admin Account</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-black dark:hover:bg-gray-100" role="menuitem">Management</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-black dark:hover:bg-gray-100" role="menuitem">Settings</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-black dark:hover:bg-gray-100" role="menuitem">Sign out</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>
    </nav>
    
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-red-800 border-red-700 sm:translate-x-0 dark:bg-red-800 dark:border-red-800" aria-label="Sidebar">
       <div class="h-full px-3 pb-4 overflow-y-auto bg-red-800 dark:bg-red-800">
          <ul class="space-y-2 font-medium">
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-700 dark:hover:bg-red-700 group">
                   <svg class="w-5 h-5 text-red-200 transition duration-75 dark:text-red-300 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                      <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                      <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                   </svg>
                   <span class="ms-3">Dashboard</span>
                </a>
             </li>
             <li>
              <button type="button" class="flex items-center w-full p-2 text-base text-red-100 transition duration-75 rounded-lg group hover:bg-red-700 dark:text-red-100 dark:hover:bg-red-800" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="shrink-0 w-5 h-5 text-red-200 transition duration-75 group-hover:text-white dark:text-red-300 dark:group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <rect x="3" y="7" width="13" height="13" rx="2" fill="#F3F6F8" stroke="currentColor" stroke-width="2"/>
                      <rect x="8" y="3" width="13" height="13" rx="2" fill="#F3F6F8" stroke="currentColor" stroke-width="2"/>
                      <path d="M10.5 9h6M10.5 12h6M10.5 15h6M5.5 11h6M5.5 14h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <polygon points="19,3 21,5 19,5" fill="#B0B6BA"/>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pages</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
              </button>
              <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                       <a href="/dashboard/homepage" class="flex items-center w-full p-2 text-red-100 transition duration-75 rounded-lg pl-11 group hover:bg-red-700 dark:text-red-100 dark:hover:bg-red-800">Homepage</a>
                    </li>
                    <li>
                       <a href="/dashboard/Research&Extension" class="flex items-center w-full p-2 text-red-100 transition duration-75 rounded-lg pl-11 group hover:bg-red-700 dark:text-red-100 dark:hover:bg-red-800">Research & Extension</a>
                    </li>
                    <li>
                       <a href="/dashboard/updates-page" class="flex items-center w-full p-2 text-red-100 transition duration-75 rounded-lg pl-11 group hover:bg-red-700 dark:text-red-100 dark:hover:bg-red-800">Updates Page</a>
                    </li>
              </ul>
           </li>
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-700 dark:hover:bg-red-700 group">
                   <svg class="shrink-0 w-5 h-5 text-red-200 transition duration-75 dark:text-red-300 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                   </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Notifications and Alerts</span>
                </a>
             </li>
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-700 dark:hover:bg-red-700 group">
                   <svg class="shrink-0 w-5 h-5 text-red-200 transition duration-75 dark:text-red-300 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                      <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                   </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">User Management</span>
                </a>
             </li>
             <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-red-700 group">
                   <svg class="shrink-0 w-5 h-5 text-red-200 transition duration-75 dark:text-red-300 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                      <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                      <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                   </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Audit Logs</span>
                </a>
             </li>
          </ul>
       </div>
    </aside>
    {{ $slot }}