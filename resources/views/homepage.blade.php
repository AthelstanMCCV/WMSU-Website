<x-head>
    <x-slot:navbar>
        <x-nav />
    </x-slot:navbar>

   <!-- Search Icon -->
   
<!--bg-[#7C0A02] hover:bg-[#BD0F03]-->
    <!-- WMSU HERO SECTION  -->
    <section class="hero-section-cont relative w-screen h-screen">
        <div class="homepage-video-container relative">
            <video id="delayedVideo" class="homepage-background-video h-screen w-screen notPlaying object-cover" muted loop>
                <source src="{{ asset('images/WMSU profile 2024.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-r from-[#7b1305]  via-[#7C0A02] to-[#7b1305] opacity-70"></div>
            <div class="absolute inset-0 flex items-center justify-start flex-col">
                <div class="upperNavDivider"></div>
                <div class="text-center text-white my-4">
                    <p class="text-8xl uppercase inter-bold">Western Mindanao</p>
                    <p class="text-8xl uppercase inter-bold -mt-4">State University</p>
                    <p class="inter-extralight uppercase text-xl">Your Future Starts Here: Learn, Innovate, Lead at WMSU!</p>
                </div>
                <div class="lowerNavDivider"></div>
                <a href="" class="text-2xl uppercase px-[65px] py-2 my-5 border border-white text-white rounded-tr-[35px] rounded-bl-[35px] hover:bg-[#BD0F03] duration-300 ease-in-out">apply</a>
                <img class="motion-safe:animate-bounce mt-5" src="{{ asset('images/down-arrow.png')}}" alt="">
            </div>
        </div>
    </section>

    <!-- WMSU NEWS SECTION -->
    <section class="w-screen h-[50rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="w-full h-full mt-5 px-14">
            <div class="newsTitleCont flex items-center justify-between w-full h-20">
                <div class="w-1/3"></div>
                <p class="newsTitle uppercase text-[#7C0A02] inter-bold text-5xl w-1/3 text-center">wmsu news</p>
                <div class="flex flex-col w-1/3 h-full items-end justify-end">
                    <div class="flex flex-col items-end group cursor-pointer">
                        <img class="size-7 group-hover:rotate-45 duration-300 ease-in-out" src="{{asset('images/plus.png')}}" alt="">
                        <p class="uppercase inter-medium tracking-tighter">more articles</p>
                    </div>
                </div>
            </div>

            <div class="newsItems flex justify-between mt-7">
                @for($i = 0; $i < 4; $i++)
                    <x-home-card>
                        <x-slot:homeCardImg>{{ asset('images/news1.png') }}</x-slot:homeCard>
                        <x-slot:homeCardTitle>WMSU Ranks Among Top Universities in the Philippines</x-slot:homeCardTitle> 
                        <x-slot:homeCardBody>Western Mindanao State University (WMSU) has been recognized as one of the top universities in the country, highlighting its commitment to quality education, research, and community development.</x-slot:homeCardBody>
                    </x-home-card>
                @endfor
            </div>
        </div>
    </section>
    
    <!-- RESEARCH ARCHIVES SECTION -->
    <section class="w-screen h-[50rem] flex flex-col justify-start items-center"> 
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="w-full h-full mt-5 px-14">
            <div class="flex flex-col items-center justify-center w-full h-20">
                <p class="newsTitle uppercase text-[#7C0A02] inter-bold text-5xl text-center">research archives</p>
            </div>
            <div class="flex mt-8">
                <div class="flex flex-col justify-between">
                    <div class="pr-14 flex flex-col gap-4">
                        <p class="inter-semibold capitalize text-[#7C0A02] text-4xl">Artificial Intelligence in Education: Improving Learning Through Smart Tutoring Systems</p>
                        <p class="inter-medium capitalize text-base ">Lead Researcher: Engr. John Dela Cruz, College of Computing Studies</p>
                        <p class="inter-light text-base tracking-tighter ">As artificial intelligence (AI) continues to reshape various industries, its role in education has become increasingly significant. This study explores the implementation of AI-powered Smart Tutoring Systems (STS) to enhance student learning experiences. By leveraging machine learning algorithms, natural language processing, and adaptive learning models, these systems provide personalized guidance tailored to each student's learning pace and comprehension level.</p>
                    </div>
                    <div class="">
                        <p class="inter-medium tracking-tight">Published: December 2023</p>
                        <p class="flex gap-2 text-[#7C0A02] text-3xl inter-medium tracking-tight mt-2">Read More <span> > </span></p>
                    </div>
                </div>
                <img class="border-2 border-[#7C0A02]" src="{{ asset('images/research.png')}}" alt="">
            </div>
        </div>
    </section>

    <!-- ABOUT WMSU SECTION -->
    <section class="w-screen h-[40rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="px-14 relative w-full h-full bg-no-repeat bg-cover bg-center mt-5" style="background-image: url('{{asset('images/news2-long.png')}}')">
            <div class="absolute inset-0 bg-gradient-to-r from-[#7C0A02] to-[#7C0A02] opacity-70"></div>
            <div class="relative flex z-10 h-full items-center justify-center">
                <div class="text-white inter-extrabold uppercase text-9xl w-5/12">
                    <p>About</p>
                    <p class="pl-20">WMSU</p>
                </div>
                <div class="w-2/12 h-full flex justify-center items-center">
                    <div class="w-0.5 h-5/6 bg-white"></div>
                </div>
                <div class="text-white w-5/12 flex flex-col gap-20">
                    <p class="inter-extralight text-3xl">Learn how WMSU shapes future leaders, explore our rich history, and become part of a vibrant academic community.</p>
                    <div class="flex flex-col gap-2">
                        <p class="inter-semibold text-xl flex justify-between">History of WMSU <span>></span></p>
                        <p class="inter-semibold text-xl flex justify-between">Leadership and Governance <span>></span></p>
                        <p class="inter-semibold text-xl flex justify-between">Mission and Vision <span>></span></p>
                        <p class="inter-semibold text-xl flex justify-between">WMSU in the Community <span>></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="PresCorner bg-gray-100"></section>
    <!-- Line Divider -->
   <section class="w-screen h-[130px] flex flex-col justify-start items-center">
    <div class="w-[2px] h-[110px] bg-[#BD0000]"></div>
    <div class="w-full h-full mt-5"></div>
   </section>

    <!-- President's Corner Section -->
    <section class="flex flex-col md:flex-row max-w-full mb-8 mt-4">
        <!-- Left: Image Section -->
        <div class="md:w-[45%] min-h-[300px] md:h-auto bg-gray-100 overflow-hidden">
            <img src="{{ asset('images/OCHO.png') }}" alt="President" class="w-full h-full object-cover object-center">
        </div>

        <!-- Right: Content Section -->
        <div class="md:w-[55%] md:pl-32 pr-8">
            <h2 class="text-[2.5rem] font-bold text-[#7c0a02] mb-10 ml-8">PRESIDENT'S CORNER</h2>

            <!-- Reports List -->
<!--Spacing/Distance of reports item -->
            <div class="space-y-12 ml-8">
                <!-- Report Items -->
                <div class="flex items-center justify-between group cursor-pointer">
                    <div>
                        <p class="text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
        <!--Update 2 6:30 PM 4/21/25(adding/editing hover effect)-->
        <!-- Report list hover effect -->
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 1st Quarter 2024</span>
                        </p>
                        <p class="text-sm text-gray-500">April 11, 2024</p>
                    </div>
                    <span class="text-[#7c0a02] text-2xl group-hover:translate-x-2 transition-transform duration-200">&gt;</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer">
                    <div>
                        <p class="text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
        <!-- Report list hover effect -->
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 1st Quarter 2023</span>
                        </p>
                        <p class="text-sm text-gray-500">April 11, 2024</p>
                    </div>
        <!-- Hover effect for the '>' (moving) -->
                    <span class="text-[#7c0a02] text-2xl group-hover:translate-x-2 transition-transform duration-200">&gt;</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer">
                    <div>
                        <p class="text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
        <!-- Report list hover effect -->
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Final Report</span>
                        </p>
                        <p class="text-sm text-gray-500">April 11, 2024</p>
                    </div>
        <!-- Hover effect for the '>' (moving) -->
                    <span class="text-[#7c0a02] text-2xl group-hover:translate-x-2 transition-transform duration-200">&gt;</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer">
                    <div>
                        <p class="text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
        <!-- Report list hover effect -->
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 4th Quarter</span>
                        </p>
                        <p class="text-sm text-gray-500">April 11, 2024</p>
                    </div>
        <!-- Hover effect for the '>' (moving) -->
                    <span class="text-[#7c0a02] text-2xl group-hover:translate-x-2 transition-transform duration-200">&gt;</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer">
                    <div>
                        <p class="text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report Year 2</span>
                        </p>
                        <p class="text-sm text-gray-500">April 11, 2024</p>
                    </div>
        <!-- Hover effect for the '>' (moving) -->
                    <span class="text-[#7c0a02] text-2xl group-hover:translate-x-2 transition-transform duration-200">&gt;</span>
                </div>
            </div>
        </div>
    </section>
    
<!--Update 3 3:35 PM (Start of Campus Section) -->
    <!-- WMSU Campuses Section -->
<section class="w-screen h-[100px] flex flex-col justify-start items-center">
    <div class="w-[2px] h-[110px] bg-[#BD0000]"></div>
    <div class="w-full mt-5 px-4"></div>
</section>

    <section class="CampusCont mb-8">
        <h1 class="CampusContTitle text-4xl font-bold text-red-800 mb-6 text-center">WMSU CAMPUSES</h1>
<!--(Campuses Imgs Cont)-->
        <div class="CampusImgCont grid md:grid-cols-2 gap-1">
            <!-- Zamboanga Del Sur Campus -->
            <div class="relative group overflow-hidden rounded-lg shadow-lg">
 <!--(Img cont, animation/When hovered, img zoom in)-->
                <div class="relative h-[400px] overflow-hidden">
<!--(Img for zc, on the left side)-->
                    <img src="{{ asset('images/ZDS.png') }}" alt="Zamboanga Del Sur Campus" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 transition-all duration-1 bg-gradient-to-b from-transparent via-black/50 to-white/80 group-hover:opacity-0"></div>
<!--(Black bg appeared when not hovered)-->
                    <div class="absolute inset-0 transition-all duration-500 bg-white/50 group-hover:opacity-0"></div>
<!--The Zamboanga City Text and the Show More is placed in the center -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 text-white">
<!--(Text hover effect)-->
                        <h2 class="ZDSText text-3xl font-bold text-red-500 mb-2 z-10 group-hover:text-white transition-colors duration-300">ZAMBOANGA<br/>DEL SUR</h2>
                        <button class="flex items-center space-x-2 text-black group-hover:text-red-500 transition-colors duration-300 z-10">
                            <span class="text-lg font-semibold">SHOW MORE</span>
                            <span class="text-2xl group-hover:translate-x-2 transition-transform duration-300">+</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Zamboanga Sibugay Campus -->       
 <!--(Img container)-->
            <div class="relative group overflow-hidden rounded-lg shadow-lg">
 <!--(Img cont, animation/When hovered, img zoom in)-->
                <div class="relative h-[400px] overflow-hidden">
<!--(Img for zc, on the left side)-->
                    <img src="{{ asset('images/ZS.png') }}" alt="Zamboanga Sibugay Campus"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 transition-all duration-500 bg-gradient-to-b from-transparent via-black/50 to-white/80 group-hover:opacity-0"></div>
<!--(Black bg appeared when not hovered)-->
                    <div class="absolute inset-0 transition-all duration-500 bg-white/50 group-hover:opacity-0"></div>
<!--The Zamboanga Sibugay Text and the Show More is placed in the center -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 text-white">
<!--(Text hover effect)-->
                        <h2 class="ZSText text-3xl font-bold text-red-500 mb-2 z-10 group-hover:text-white transition-colors duration-300">ZAMBOANGA<br/>SIBUGAY</h2>
                        <button class="flex items-center space-x-2 text-black group-hover:text-red-500 transition-colors duration-300 z-10">
                            <span class="text-lg font-semibold">SHOW MORE</span>
                            <span class="text-2xl group-hover:translate-x-2 transition-transform duration-300">+</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WMSU Services Section -->
<section class="w-screen h-[130px] flex flex-col justify-start items-center">
    <div class="w-[2px] h-[110px] bg-[#BD0000]"></div>
    <div class="w-full mt-5 px-4"></div>
</section>
    <section class="ServicesCont py-16 bg-white">
        <h1 class="text-4xl font-bold text-red-800 mb-12 text-center">SERVICES</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mx-auto">
            <!-- Freshman Online Pre-Admission -->
            <div class="bg-gray-100 rounded-lg p-8 relative group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                <img src="{{ asset('images/freshman-icon.png') }}" alt="Freshman Online Pre-Admission" class="w-8 h-8 object-cover">
                </div>
                <h3 class="text-xl font-semibold text-center text-gray-800">Freshman Online Pre-Admission</h3>
            </div>

            <!-- Online Registration -->
            <div class="bg-gray-100 rounded-lg p-8 relative group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                <img src="{{ asset('images/Old Student-icon.png') }}" alt="Online Registration" class="w-8 h-8 object-cover">
                </div>
                <h3 class="text-xl font-semibold text-center text-gray-800">Online Registration<br/>(Old Student)</h3>
            </div>

            <!-- Online Advising -->
            <div class="bg-gray-100 rounded-lg p-8 relative group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                <img src="{{ asset('images/Advising-icon.png') }}" alt="Online Advising" class="w-8 h-8 object-cover">
                </div>
                <h3 class="text-xl font-semibold text-center text-gray-800">Online Advising</h3>
            </div>

            <!-- Online Enlistment -->
            <div class="bg-gray-100 rounded-lg p-8 relative group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                <img src="{{ asset('images/Enlistment-icon.png') }}" alt="Online Enlistment" class="w-8 h-8 object-cover">
                </div>
                <h3 class="text-xl font-semibold text-center text-gray-800">Online Enlistment</h3>
            </div>

            <!-- More Services Button -->
            <div class="bg-red-800 rounded-lg p-8 flex items-center justify-center cursor-pointer hover:bg-red-900 transition-colors duration-300">
                <div class="text-center">
                    <span class="text-4xl font-bold text-white">+</span>
                    <p class="text-white font-semibold mt-2">MORE</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="relative text-white py-12">
        <!-- Background Image with Red Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/CTE.jpg') }}" alt="Footer Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#7c0a02] opacity-90"></div>
        </div>

        <!-- Top Footer Content -->
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-8 relative">
                <!-- About Section -->
                <div class="text-center relative">
                    <h3 class="text-xl font-bold mb-4">ABOUT</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="hover:text-red-200 cursor-pointer">Mission</li>
                        <li class="hover:text-red-200 cursor-pointer">Vision</li>
                        <li class="hover:text-red-200 cursor-pointer">History</li>
                        <li class="hover:text-red-200 cursor-pointer">Quality Policy</li>
                        <li class="hover:text-red-200 cursor-pointer">University Function</li>
                    </ul>
                    <!-- Vertical Line - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute right-0 top-0 h-full w-[1px] bg-white/30"></div>
                </div>

                <!-- Resources Section -->
                <div class="text-center relative">
                    <h3 class="text-xl font-bold mb-4">RESOURCES</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="hover:text-red-200 cursor-pointer">Downloadables</li>
                    </ul>
                    <!-- Vertical Line - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute right-0 top-0 h-full w-[1px] bg-white/30"></div>
                </div>

                <!-- Quick Links Section -->
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">QUICK LINKS</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="hover:text-red-200 cursor-pointer">Transparency Seal</li>
                        <li class="hover:text-red-200 cursor-pointer">Board Of Regents</li>
                        <li class="hover:text-red-200 cursor-pointer">Administrative Officials</li>
                    </ul>
                </div>
            </div>

            <!-- WMSU Logo and Name -->
            <div class="flex flex-col items-center justify-center pt-8">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 md:mb-4 font-['Inter'] text-center">WESTERN MINDANAO STATE</h2>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-4 md:mb-6 font-['Inter'] text-center">UNIVERSITY</h3>
                <img src="{{ asset('images/wmsu-logo.png') }}" alt="WMSU Logo" class="h-12 md:h-16 mb-6">
            </div>

            <!-- Contact Information -->
            <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 text-sm mb-6">
                <div class="flex items-center hover:text-red-200">
                    <a href="mailto:wmsu@wmsu.edu.ph" class="text-white hover:text-red-200 transition-colors duration-300">
                        <img src="{{ asset('images/ic_outline-email.png') }}" alt="Email" class="w-4 h-4 object-cover mr-2 inline">
                        <span>wmsu@wmsu.edu.ph</span>
                    </a>
                </div>
                <div class="flex items-center hover:text-red-200">
                    <a href="tel:991-1771" class="text-white hover:text-red-200 transition-colors duration-300">
                        <img src="{{ asset('images/famicons_call.png') }}" alt="Call" class="w-4 h-4 object-cover mr-2 inline">
                        <span>991-1771</span>
                    </a>
                </div>
                <div class="flex items-center hover:text-red-200">
                    <a href="#" class="text-white hover:text-red-200 transition-colors duration-300">
                        <img src="{{ asset('images/tabler_world.png') }}" alt="World" class="w-4 h-4 object-cover mr-2 inline">
                        <span>ISO 9001:2015</span>
                    </a>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="text-white hover:text-red-200 transition-colors duration-300">
                    <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" class="w-6 h-6 object-cover">
                </a>
                <a href="#" class="text-white hover:text-red-200 transition-colors duration-300">
                    <img src="{{ asset('images/youtube-icon.png') }}" alt="Youtube" class="w-6 h-6 object-cover">
                </a>
                <a href="#" class="text-white hover:text-red-200 transition-colors duration-300">
                    <img src="{{ asset('images/tiktok-icon.png') }}" alt="Tiktok" class="w-6 h-6 object-cover">
                </a>
                <a href="#" class="text-white hover:text-red-200 transition-colors duration-300">
                    <img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram" class="w-6 h-6 object-cover">
                </a>
            </div>

            <!-- Copyright -->
            <div class="text-center text-sm border-t border-white/30 pt-6">
                <p>Copyright © 2025 Western Mindanao State University</p>
                <p>All rights reserved</p>
            </div>
        </div>
    </footer>
</section>
</x-head> 