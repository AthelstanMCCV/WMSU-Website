<x-head>
    <x-slot:navbar>
        <x-nav />
    </x-slot:navbar>
    
    <!-- WMSU HERO SECTION  -->
    @if(isset($sections['Homepage Hero']))
        <section class="hero-section-cont relative w-screen h-screen">
            <div class="homepage-video-container relative">
                <video id="delayedVideo" class="homepage-background-video h-screen w-screen notPlaying object-cover" muted loop>
                    <source src="{{ asset('images/WMSU profile 2024.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-gradient-to-r from-[#7b1305] via-[#7C0A02] to-[#7b1305] opacity-70"></div>
                @foreach($sections['Homepage Hero'] as $section)
                    <div class="absolute inset-0 flex items-center justify-start flex-col">
                        <div class="upperNavDivider"></div>
                        <div class="text-center text-white my-4 px-4">
                            <p name='HPHeroTitleUpper' class="text-4xl md:text-6xl lg:text-8xl uppercase inter-bold leading-21 ">
                                {{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroTitleUpper')->content ?? '' }}
                                <br /> 
                                <span name='HPHeroTitleLower'>
                                    {{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroTitleLower')->content ?? '' }}
                                </span>
                            </p>
                            <p name='HPHeroSubTitle' class="inter-extralight uppercase text-lg md:text-xl lg:text-2xl mt-4">{{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroSubTitle')->content ?? '' }}</p>
                        </div>
                        <div class="lowerNavDivider"></div>
                        <a href="" class="text-xl md:text-2xl uppercase px-8 md:px-[65px] py-2 my-5 border border-white text-white rounded-[20px] bg-[#BD0F03] hover:bg-white hover:border-[#BD0F03] hover:text-[#BD0F03] duration-300 ease-in-out">
                            <span name='HpCTABtn' class="font-bold">{{ $sections['Homepage Hero']->firstWhere('description', 'HpCTABtn')->content ?? '' }}</span>
                        </a>
                        <img class="motion-safe:animate-bounce mt-5 w-8 h-8 md:w-10 md:h-10" src="{{ asset('images/down-arrow.png')}}" alt="">
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    
    
    <!-- WMSU NEWS SECTION -->
    <section class="w-screen h-auto md:h-[50rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="w-full h-full mt-5 px-4 md:px-14">
            <div class="newsTitleCont flex items-center justify-between w-full h-20">
                <div class="hidden md:block w-1/3"></div>
                <p class="newsTitle uppercase text-[#7C0A02] inter-bold text-3xl md:text-5xl w-full md:w-1/3 text-center">wmsu news</p>
                <div class="hidden md:flex flex-col w-1/3 h-full items-end justify-end">
                    <div class="flex flex-col items-end group cursor-pointer">
                        <img class="size-7 group-hover:rotate-45 duration-300 ease-in-out" src="{{asset('images/plus.png')}}" alt="">
                        <p class="uppercase inter-medium tracking-tighter text-sm md:text-base">more articles</p>
                    </div>
                </div>
            </div>

            <!-- Mobile and Tablet Carousel -->
            <div class="lg:hidden relative overflow-hidden mt-0 sm:mt-12">
                <div id="newsCarousel" class="flex transition-transform duration-300 ease-in-out">
                    <!-- News Item 1 -->
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="relative bg-white rounded-lg sm:rounded-none shadow-[0_3px_10px_rgb(0,0,0,0.2)] sm:shadow-none sm:shadow-[0_4px_15px_rgba(0,0,0,0.3)] overflow-hidden">
                            <div class="h-48 sm:h-64 bg-gray-50 flex items-center justify-center">
                                <img src="{{ asset('images/news1.png') }}" alt="News 1" class="w-full h-auto max-h-48 sm:max-h-64 object-contain">
                            </div>
                            <div class="p-4 sm:p-6 sm:mt-4">
                                <h3 class="text-xl sm:text-2xl font-bold text-[#7C0A02] mb-2 sm:mb-4">WMSU Ranks Among Top Universities in the Philippines</h3>
                                <p class="text-sm sm:text-base text-gray-700 mb-3 sm:mb-5">Western Mindanao State University (WMSU) has been recognized as one of the top universities in the country, highlighting its commitment to quality education, research, and community development.</p>
                                <a href="#" class="text-[#7C0A02] text-lg sm:text-xl font-medium hover:text-[#BD0F03] transition-colors duration-300">Read More <span class="ml-1">&gt;</span></a>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 2 -->
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="relative bg-white rounded-lg sm:rounded-none shadow-[0_3px_10px_rgb(0,0,0,0.2)] sm:shadow-none sm:shadow-[0_4px_15px_rgba(0,0,0,0.3)] overflow-hidden">
                            <div class="h-48 sm:h-64 bg-gray-50 flex items-center justify-center">
                                <img src="{{ asset('images/news2.png') }}" alt="News 2" class="w-full h-auto max-h-48 sm:max-h-64 object-contain">
                            </div>
                            <div class="p-4 sm:p-6 sm:mt-4">
                                <h3 class="text-xl sm:text-2xl font-bold text-[#7C0A02] mb-2 sm:mb-4">WMSU Launches New Research Initiatives</h3>
                                <p class="text-sm sm:text-base text-gray-700 mb-3 sm:mb-5">The university introduces groundbreaking research programs aimed at addressing regional development challenges and fostering innovation.</p>
                                <a href="#" class="text-[#7C0A02] text-lg sm:text-xl font-medium hover:text-[#BD0F03] transition-colors duration-300">Read More <span class="ml-1">&gt;</span></a>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 3 -->
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="relative bg-white rounded-lg sm:rounded-none shadow-[0_3px_10px_rgb(0,0,0,0.2)] sm:shadow-none sm:shadow-[0_4px_15px_rgba(0,0,0,0.3)] overflow-hidden">
                            <div class="h-48 sm:h-64 bg-gray-50 flex items-center justify-center">
                                <img src="{{ asset('images/news3.png') }}" alt="News 3" class="w-full h-auto max-h-48 sm:max-h-64 object-contain">
                            </div>
                            <div class="p-4 sm:p-6 sm:mt-4">
                                <h3 class="text-xl sm:text-2xl font-bold text-[#7C0A02] mb-2 sm:mb-4">WMSU Expands International Partnerships</h3>
                                <p class="text-sm sm:text-base text-gray-700 mb-3 sm:mb-5">New collaborations with international institutions open up opportunities for student exchange and joint research programs.</p>
                                <a href="#" class="text-[#7C0A02] text-lg sm:text-xl font-medium hover:text-[#BD0F03] transition-colors duration-300">Read More <span class="ml-1">&gt;</span></a>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 4 -->
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="relative bg-white rounded-lg sm:rounded-none shadow-[0_3px_10px_rgb(0,0,0,0.2)] sm:shadow-none sm:shadow-[0_4px_15px_rgba(0,0,0,0.3)] overflow-hidden">
                            <div class="h-48 sm:h-64 bg-gray-50 flex items-center justify-center">
                                <img src="{{ asset('images/news4.png') }}" alt="News 4" class="w-full h-auto max-h-48 sm:max-h-64 object-contain">
                            </div>
                            <div class="p-4 sm:p-6 sm:mt-4">
                                <h3 class="text-xl sm:text-2xl font-bold text-[#7C0A02] mb-2 sm:mb-4">WMSU Achieves Excellence in Academic Programs</h3>
                                <p class="text-sm sm:text-base text-gray-700 mb-3 sm:mb-5">Multiple programs receive national accreditation, reinforcing WMSU's commitment to educational excellence.</p>
                                <a href="#" class="text-[#7C0A02] text-lg sm:text-xl font-medium hover:text-[#BD0F03] transition-colors duration-300">Read More <span class="ml-1">&gt;</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop News Grid -->
                <div class="hidden lg:grid newsItems grid-cols-4 gap-4 mt-7">
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
    <section class="w-screen h-auto md:h-[50rem] flex flex-col justify-start items-center"> 
        <div class="w-[2px] h-[110px] bg-[#BD0F03] block sm:block md:hidden lg:block"></div>
        <div class="w-full h-full mt-5 px-4 md:px-14">
            <div class="flex flex-col items-center justify-center w-full h-20">
                <p class="newsTitle uppercase text-[#7C0A02] inter-bold text-3xl sm:text-4xl md:text-5xl text-center">research archives</p>
            </div>
            <!-- Mobile and Tablet View (hidden on desktop) -->
            <div class="block md:hidden">
                <div class="flex flex-col mt-8 space-y-6">
                    <div class="w-full h-[200px] sm:h-[300px]">
                        <img class="w-full h-full object-cover shadow-[0_4px_15px_rgba(0,0,0,0.2)]" src="{{ asset('images/research.png')}}" alt="">
                    </div>
                    <div class="flex flex-col space-y-4 sm:space-y-6 px-2">
                        <h2 class="inter-semibold capitalize text-[#7C0A02] text-2xl sm:text-3xl leading-tight">
                            Artificial Intelligence in Education: Improving Learning Through Smart Tutoring Systems
                        </h2>
                        <p class="inter-medium capitalize text-sm sm:text-base">
                            Lead Researcher: Engr. John Dela Cruz, College of Computing Studies
                        </p>
                        <p class="inter-light text-sm sm:text-base tracking-tighter sm:leading-relaxed">
                            As artificial intelligence (AI) continues to reshape various industries, its role in education has become increasingly significant. This study explores the implementation of AI-powered Smart Tutoring Systems (STS) to enhance student learning experiences. By leveraging machine learning algorithms, natural language processing, and adaptive learning models, these systems provide personalized guidance tailored to each student's learning pace and comprehension level.
                        </p>
                        <div class="pt-4 sm:pt-6">
                            <p class="inter-medium tracking-tight text-sm sm:text-base">Published: December 2023</p>
                            <p class="flex gap-2 text-[#7C0A02] text-xl sm:text-2xl inter-medium tracking-tight mt-2">
                                Read More 
                                <span class="transition-transform duration-300 group-hover:translate-x-2"> > </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop View (hidden on mobile/tablet) -->
            <div class="hidden md:flex mt-8">
                <div class="flex flex-col justify-between">
                    <div class="pr-14 flex flex-col gap-4">
                        <p class="inter-semibold capitalize text-[#7C0A02] text-4xl">Artificial Intelligence in Education: Improving Learning Through Smart Tutoring Systems</p>
                        <p class="inter-medium capitalize text-base">Lead Researcher: Engr. John Dela Cruz, College of Computing Studies</p>
                        <p class="inter-light text-base tracking-tighter">As artificial intelligence (AI) continues to reshape various industries, its role in education has become increasingly significant. This study explores the implementation of AI-powered Smart Tutoring Systems (STS) to enhance student learning experiences. By leveraging machine learning algorithms, natural language processing, and adaptive learning models, these systems provide personalized guidance tailored to each student's learning pace and comprehension level.</p>
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
    <section class="w-screen h-auto md:h-[40rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="px-4 md:px-14 relative w-full h-full bg-no-repeat bg-cover bg-center mt-5" style="background-image: url('{{asset('images/news2-long.png')}}')">
            <div class="absolute inset-0 bg-gradient-to-r from-[#7C0A02] to-[#7C0A02] opacity-70"></div>
            <div class="relative flex flex-col md:flex-row z-10 h-full items-center justify-center py-8 md:py-0">
                <div class="text-white inter-extrabold uppercase text-4xl md:text-6xl lg:text-9xl w-full md:w-5/12 text-center md:text-left">
                    <p>About</p>
                    <p class="pl-0 md:pl-20">WMSU</p>
                </div>
                <div class="w-full md:w-2/12 h-0.5 md:h-full flex justify-center items-center my-4 md:my-0">
                    <div class="w-full md:w-0.5 h-0.5 md:h-5/6 bg-white"></div>
                </div>
                <div class="text-white w-full md:w-5/12 flex flex-col gap-4 md:gap-20 px-4 md:px-0">
                    <p class="inter-extralight text-lg md:text-2xl lg:text-3xl text-center md:text-left">Learn how WMSU shapes future leaders, explore our rich history, and become part of a vibrant academic community.</p>
                    <div class="flex flex-col gap-2">
                        <p class="inter-semibold text-lg md:text-xl flex justify-between">History of WMSU <span>></span></p>
                        <p class="inter-semibold text-lg md:text-xl flex justify-between">Leadership and Governance <span>></span></p>
                        <p class="inter-semibold text-lg md:text-xl flex justify-between">Mission and Vision <span>></span></p>
                        <p class="inter-semibold text-lg md:text-xl flex justify-between">WMSU in the Community <span>></span></p>
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
            <img src="{{ asset('../images/OCHO.png') }}" alt="President" class="w-full h-full object-cover object-center">
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
                            <span class="text-2xl transform transition-transform duration-300 group-hover:rotate-45">+</span>
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
                            <span class="text-2xl transform transition-transform duration-300 group-hover:rotate-45">+</span>
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
            <h1 class="text-4xl font-bold text-[#7C0A02] mb-12 text-center">SERVICES</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mx-auto px-4">
                <!-- Freshman Online Pre-Admission -->
                <div class="relative bg-gray-100 rounded-[2rem] p-8 h-[200px] group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                    <!-- Icon Container -->
                    <div class="absolute -top-2 -right-2 w-24 h-24">
                        <div class="absolute inset-0 bg-[#FFE5E5] rounded-tl-[2rem] rounded-bl-[2rem] rounded-br-[2rem] rounded-tr-[0.5rem] transform rotate-45"></div>
                        <div class="absolute inset-[15%] bg-[#7C0A02] rounded-tl-[1.5rem] rounded-bl-[1.5rem] rounded-br-[1.5rem] rounded-tr-[0.5rem] transform rotate-45 flex items-center justify-center">
                            <img src="{{ asset('images/freshman-icon.png') }}" alt="Freshman Online Pre-Admission" class="w-10 h-10 object-contain transform -rotate-45">
                        </div>
                    </div>
                    <div class="absolute bottom-8">
                        <h3 class="text-xl font-bold text-gray-800">Freshman Online Pre-Admission</h3>
                    </div>
                </div>
    
                <!-- Online Registration -->
                <div class="relative bg-gray-100 rounded-[2rem] p-8 h-[200px] group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                    <div class="absolute -top-2 -right-2 w-24 h-24">
                        <div class="absolute inset-0 bg-[#FFE5E5] rounded-tl-[2rem] rounded-bl-[2rem] rounded-br-[2rem] rounded-tr-[0.5rem] transform rotate-45"></div>
                        <div class="absolute inset-[15%] bg-[#7C0A02] rounded-tl-[1.5rem] rounded-bl-[1.5rem] rounded-br-[1.5rem] rounded-tr-[0.5rem] transform rotate-45 flex items-center justify-center">
                            <img src="{{ asset('images/Old Student-icon.png') }}" alt="Online Registration" class="w-10 h-10 object-contain transform -rotate-45">
                        </div>
                    </div>
                    <div class="absolute bottom-8">
                        <h3 class="text-xl font-bold text-gray-800">Online Registration<br/>(Old Student)</h3>
                    </div>
                </div>
    
                <!-- Online Advising -->
                <div class="relative bg-gray-100 rounded-[2rem] p-8 h-[200px] group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                    <div class="absolute -top-2 -right-2 w-24 h-24">
                        <div class="absolute inset-0 bg-[#FFE5E5] rounded-tl-[2rem] rounded-bl-[2rem] rounded-br-[2rem] rounded-tr-[0.5rem] transform rotate-45"></div>
                        <div class="absolute inset-[15%] bg-[#7C0A02] rounded-tl-[1.5rem] rounded-bl-[1.5rem] rounded-br-[1.5rem] rounded-tr-[0.5rem] transform rotate-45 flex items-center justify-center">
                            <img src="{{ asset('images/Advising-icon.png') }}" alt="Online Advising" class="w-10 h-10 object-contain transform -rotate-45">
                        </div>
                    </div>
                    <div class="absolute bottom-8">
                        <h3 class="text-xl font-bold text-gray-800">Online Advising</h3>
                    </div>
                </div>
    
                <!-- Online Enlistment -->
                <div class="relative bg-gray-100 rounded-[2rem] p-8 h-[200px] group cursor-pointer hover:shadow-lg transition-shadow duration-300">
                    <div class="absolute -top-2 -right-2 w-24 h-24">
                        <div class="absolute inset-0 bg-[#FFE5E5] rounded-tl-[2rem] rounded-bl-[2rem] rounded-br-[2rem] rounded-tr-[0.5rem] transform rotate-45"></div>
                        <div class="absolute inset-[15%] bg-[#7C0A02] rounded-tl-[1.5rem] rounded-bl-[1.5rem] rounded-br-[1.5rem] rounded-tr-[0.5rem] transform rotate-45 flex items-center justify-center">
                            <img src="{{ asset('images/Enlistment-icon.png') }}" alt="Online Enlistment" class="w-10 h-10 object-contain transform -rotate-45">
                        </div>
                    </div>
                    <div class="absolute bottom-8">
                        <h3 class="text-xl font-bold text-gray-800">Online Enlistment</h3>
                    </div>
                </div>
    
                <!-- More Services Button -->
                <div class="relative bg-[#7C0A02] rounded-[1rem] p-8 h-[200px] flex items-center justify-center cursor-pointer hover:bg-[#8B0000] transition-colors duration-300">
                    <div class="text-center">
                        <span class="text-5xl font-bold text-white">+</span>
                        <p class="text-white font-bold mt-2">MORE</p>
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

        <!-- Footer Content -->
        <div class="container mx-auto px-4 relative z-10">
            <!-- Footer Links Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-16">
                <!-- About Section -->
                <div class="text-center sm:border-r border-white/20">
                    <h3 class="text-xl sm:text-2xl font-bold mb-4">ABOUT</h3>
                    <ul class="space-y-2">
                        <li class="hover:text-red-200 cursor-pointer">Mission</li>
                        <li class="hover:text-red-200 cursor-pointer">Vision</li>
                        <li class="hover:text-red-200 cursor-pointer">History</li>
                        <li class="hover:text-red-200 cursor-pointer">Quality Policy</li>
                        <li class="hover:text-red-200 cursor-pointer">University Function</li>
                    </ul>
                </div>

                <!-- Resources Section -->
                <div class="text-center sm:border-r border-white/20">
                    <h3 class="text-xl sm:text-2xl font-bold mb-4">RESOURCES</h3>
                    <ul class="space-y-2">
                        <li class="hover:text-red-200 cursor-pointer">Downloadables</li>
                    </ul>
                </div>

                <!-- Quick Links Section -->
                <div class="text-center">
                    <h3 class="text-xl sm:text-2xl font-bold mb-4">QUICK LINKS</h3>
                    <ul class="space-y-2">
                        <li class="hover:text-red-200 cursor-pointer">Transparency Seal</li>
                        <li class="hover:text-red-200 cursor-pointer">Board Of Regents</li>
                        <li class="hover:text-red-200 cursor-pointer">Administrative Officials</li>
                    </ul>
                </div>
            </div>

            <!-- University Name and Logo -->
            <div class="text-center mb-8">
                <h2 class="text-xl sm:text-2xl font-bold">WESTERN MINDANAO STATE</h2>
                <h2 class="text-xl sm:text-2xl font-bold mb-6">UNIVERSITY</h2>
                <img src="{{ asset('images/wmsu-logo.png') }}" alt="WMSU Logo" class="h-16 sm:h-20 mx-auto mb-8">
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
            <div class="flex justify-center gap-6 mb-12">
                <a href="#" class="hover:opacity-80">
                    <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" class="w-6 h-6 sm:w-8 sm:h-8">
                </a>
                <a href="#" class="hover:opacity-80">
                    <img src="{{ asset('images/youtube-icon.png') }}" alt="Youtube" class="w-6 h-6 sm:w-8 sm:h-8">
                </a>
                <a href="#" class="hover:opacity-80">
                    <img src="{{ asset('images/tiktok-icon.png') }}" alt="Tiktok" class="w-6 h-6 sm:w-8 sm:h-8">
                </a>
                <a href="#" class="hover:opacity-80">
                    <img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram" class="w-6 h-6 sm:w-8 sm:h-8">
                </a>
            </div>

            <!-- Logos Section -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 md:gap-0 mb-12">
                <!-- Left Side Logos -->
                <div class="flex flex-row md:flex-col items-center gap-4 md:mr-9 flex-wrap justify-center">
                    <img src="{{ asset('images/foi.png') }}" alt="FOI" class="w-16 h-12 sm:w-20 sm:h-16">
                    <img src="{{ asset('images/arta.png') }}" alt="ARTA" class="w-16 h-12 sm:w-20 sm:h-16">
                    <img src="{{ asset('images/philgeps.png') }}" alt="Philgeps" class="w-16 h-12 sm:w-20 sm:h-16">
                </div>

                <!-- Center Logo -->
                <div class="mx-0 md:mx-7">
                    <img src="{{ asset('images/republika.png') }}" alt="Republika" class="w-40 h-40 sm:w-48 sm:h-48">
                </div>

                <!-- Right Side Logos -->
                <div class="flex flex-row md:flex-col items-center gap-4 md:ml-9 flex-wrap justify-center">
                    <img src="{{ asset('images/aaccup.png') }}" alt="AACCUP" class="w-16 h-12 sm:w-20 sm:h-16">
                    <img src="{{ asset('images/pts.png') }}" alt="PTS" class="w-16 h-12 sm:w-20 sm:h-16">
                    <img src="{{ asset('images/citizens-charter.png') }}" alt="Citizen Charter" class="w-16 h-12 sm:w-20 sm:h-16">
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center text-sm sm:text-base">
                <p class="mb-1">Copyright © 2025 Western Mindanao State University</p>
                <p>All rights reserved</p>
            </div>
        </div>
    </footer>
</section>
</x-head>