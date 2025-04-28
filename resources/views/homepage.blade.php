<x-head>
    <x-slot:navbar>
        <x-nav />
    </x-slot:navbar>
    
    @if(isset($sections['Homepage Hero']) && $sections['Homepage Hero']->isNotEmpty())
    <section class="hero-section-cont relative w-screen h-screen">
        <div class="homepage-video-container relative">
            @php
                $heroSection = $sections['Homepage Hero']->firstWhere('description', 'HeroVideo');
            @endphp
    
            @if($heroSection && $heroSection->imagePath)
                @if(Str::endsWith($heroSection->imagePath, ['.mp4', '.webm', '.ogg']))
                    <video id="delayedVideo" class="homepage-background-video h-screen w-screen notPlaying object-cover" muted loop>
                        <source src="{{ asset('storage/' . $heroSection->imagePath) }}" type="video/mp4">
                    </video>
                @elseif(Str::endsWith($heroSection->imagePath, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                    <img src="{{ asset('storage/' . $heroSection->imagePath) }}" alt="Hero Media" class="homepage-background-video h-screen w-screen object-cover">
                @endif
            @endif
    
            <div class="absolute inset-0 bg-gradient-to-r from-[#7b1305] via-[#7C0A02] to-[#7b1305] opacity-70"></div>
    
            <div class="absolute inset-0 flex items-center justify-start flex-col">
                <div class="upperNavDivider"></div>
                <div class="text-center text-white my-4 px-4">
                    <p class="text-4xl md:text-6xl lg:text-8xl uppercase inter-bold leading-21 ">
                        {{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroTitleUpper')->content ?? '' }}
                        <br /> 
                        <span>
                            {{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroTitleLower')->content ?? '' }}
                        </span>
                    </p>
                    <p class="inter-extralight uppercase text-lg md:text-xl lg:text-2xl mt-4">
                        {{ $sections['Homepage Hero']->firstWhere('description', 'HPHeroSubTitle')->content ?? '' }}
                    </p>
                </div>
    
                <div class="lowerNavDivider"></div>
    
                <a href="#" class="text-xl md:text-2xl uppercase px-8 md:px-[65px] py-2 my-5 border border-white text-white rounded-[20px] bg-[#BD0F03] hover:bg-white hover:border-[#BD0F03] hover:text-[#BD0F03] duration-300 ease-in-out">
                    <span class="font-bold">
                        {{ $sections['Homepage Hero']->firstWhere('description', 'HpCTABtn')->content ?? '' }}
                    </span>
                </a>
    
                <img class="motion-safe:animate-bounce mt-5 w-8 h-8 md:w-10 md:h-10" src="{{ asset('images/down-arrow.png')}}" alt="">
            </div>
        </div>
    </section>
    @endif
    
 
    <!-- WMSU NEWS SECTION -->
    <section class="w-screen h-auto md:h-[50rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="w-full h-full mt-5 md:px-4">
            <div class="newsTitleCont flex items-center justify-between w-full h-20">
                <div class="hidden md:block w-1/3"></div>
                <p class="newsTitle uppercase text-[#7C0A02] inter-bold text-5xl w-full md:w-1/3 text-center">wmsu news</p>
                <div class="hidden md:flex flex-col w-1/3 h-full items-end justify-end">
                    <div class="flex flex-col items-end group cursor-pointer mr-5">
                        <img class="size-7 group-hover:rotate-45 duration-300 ease-in-out" src="{{asset('images/plus.png')}}" alt="">
                        <p class="uppercase inter-medium tracking-tighter text-sm md:text-base">more articles</p>
                    </div>
                </div>
            </div>
    
            <!-- Swiper Container -->
            <div class="w-full mt-8">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @for($i = 0; $i < 4; $i++)
                            <div class="swiper-slide">
                                <x-home-card>
                                    <x-slot:homeCardImg>{{ asset('images/news1.png') }}</x-slot:homeCardImg>
                                    <x-slot:homeCardTitle>WMSU Ranks Among Top Universities in the Philippines</x-slot:homeCardTitle> 
                                    <x-slot:homeCardBody>Western Mindanao State University (WMSU) has been recognized as one of the top universities in the country, highlighting its commitment to quality education, research, and community development.</x-slot:homeCardBody>
                                </x-home-card>
                            </div>
                        @endfor
                    </div>

                    <!-- Optional Navigation -->
                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>
    </section>
    
    
    <!-- RESEARCH ARCHIVES SECTION -->
    @if($latestNews->isNotEmpty())
    <section class="w-screen h-auto md:h-[50rem] flex flex-col justify-start items-center"> 
        <div class="w-[2px] h-[110px] bg-[#BD0F03] block lg:block"></div>
    
        <div class="w-full h-full mt-5">
            <div class="bg-[#7C0A02] lg:bg-transparent px-4 py-8 lg:p-0">
                <div class="flex flex-col items-center justify-center w-full mb-10">
                    <p class="newsTitle uppercase text-white lg:text-[#7C0A02] inter-bold text-3xl sm:text-4xl lg:text-5xl text-center mb-6 lg:mb-0">
                        Research & Extension
                    </p>
                </div>
    
                <div class="max-w-[300px] mx-auto lg:max-w-none lg:mx-0 lg:px-14">
                    {{-- Mobile Layout --}}
                    <div class="lg:hidden">
                        <div class="bg-white p-1">
                            <img src="{{ asset('storage/' . ($latestNews['RENewsImg']->imagePath ?? 'images/default.png')) }}" alt="Research" class="w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-white text-xl font-bold text-center mt-6 mb-6 px-4">
                            {{ $latestNews['RENewsTitle']->content ?? 'Latest Research Title' }}
                        </h3>
                        <div class="flex justify-center">
                            <button class="bg-[#BD0F03] text-white px-6 py-2 rounded-tr-[35px] rounded-bl-[35px]">
                                LEARN MORE >
                            </button>
                        </div>
                    </div>
    
                    {{-- Desktop Layout --}}
                    <div class="hidden lg:flex lg:justify-between mt-8">
                        <div class="flex flex-col justify-between">
                            <div class="pr-14 flex flex-col gap-4">
                                <p class="inter-semibold capitalize text-[#7C0A02] text-4xl">
                                    {{ $latestNews['RENewsTitle']->content ?? 'Latest Research Title' }}
                                </p>
                                <p class="inter-medium capitalize text-base">
                                    {{ \Carbon\Carbon::parse($latestNews['RENewsDate']->content)->format('d F, Y') }}
                                    <span>|</span>
                                    <span>{{ $latestNews['RENewsLocation']->content ?? 'Location not available' }}</span>
                                </p>
                                <p class="inter-light text-base tracking-tighter pr-33">
                                    {{ $latestNews['RENewsContent']->content ?? 'Content coming soon.' }}
                                </p>
                            </div>
                            <div>
                                <p class="flex gap-2 text-[#7C0A02] text-3xl inter-medium tracking-tight mt-2 cursor-pointer">
                                    Read More <span> > </span>
                                </p>
                            </div>
                        </div>
                        <img class="border-2 border-[#7C0A02] w-[550px] h-[490px] object-cover" src="{{ asset('storage/' . ($latestNews['RENewsImg']->imagePath ?? 'images/default.png')) }}" alt="Research Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ABOUT WMSU SECTION -->
    <section class="w-screen h-auto md:h-[40rem] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0F03]"></div>
        <div class="px-4 md:px-14 relative w-full h-full bg-no-repeat bg-cover bg-center mt-5" style="background-image: url('{{ asset('images/news2-long.png') }}')">
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
              <p class="inter-extralight text-lg md:text-2xl lg:text-3xl text-center md:text-left">
                Learn how WMSU shapes future leaders, explore our rich history, and become part of a vibrant academic community.
              </p>
      
              <div class="flex flex-col gap-2">
                <div class="group relative cursor-pointer">
                  <p class="inter-semibold text-lg md:text-xl flex justify-between">
                    History of WMSU <span>></span>
                  </p>
                  <div class="absolute left-0 bottom-0 h-[2px] w-0 bg-white transition-all duration-500 ease-in-out group-hover:w-full"></div>
                </div>
                <div class="group relative cursor-pointer">
                  <p class="inter-semibold text-lg md:text-xl flex justify-between">
                    Leadership and Governance <span>></span>
                  </p>
                  <div class="absolute left-0 bottom-0 h-[2px] w-0 bg-white transition-all duration-500 ease-in-out group-hover:w-full"></div>
                </div>
                <div class="group relative cursor-pointer">
                  <p class="inter-semibold text-lg md:text-xl flex justify-between">
                    Mission and Vision <span>></span>
                  </p>
                  <div class="absolute left-0 bottom-0 h-[2px] w-0 bg-white transition-all duration-500 ease-in-out group-hover:w-full"></div>
                </div>
                <div class="group relative cursor-pointer">
                  <p class="inter-semibold text-lg md:text-xl flex justify-between">
                    WMSU in the Community <span>></span>
                  </p>
                  <div class="absolute left-0 bottom-0 h-[2px] w-0 bg-white transition-all duration-500 ease-in-out group-hover:w-full"></div>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </section>
      

    <section class="PresCorner bg-gray-100"></section>
    <!-- Line Divider -->
   <section class="w-screen h-[130px] flex flex-col justify-start items-center">
    <div class="w-[2px] h-[110px] bg-[#BD0000]"></div>
   </section>

    <!-- President's Corner Section -->
    <section class="flex flex-col md:flex-row max-w-full mb-8 mt-4">
        <!-- Left: Image Section -->
        <div class="md:w-[45%] min-h-[250px] sm:min-h-[350px] md:min-h-[300px] md:h-auto bg-gray-100 overflow-hidden">
            <img src="{{ asset('../images/OCHO.png') }}" alt="President" class="w-full h-full object-cover sm:object-contain md:object-cover rounded-tr-[35px] rounded-bl-[35px]">
        </div>

        <!-- Right: Content Section -->
        <div class="md:w-[55%] md:pl-32 pr-13">
            <h2 class="text-[2rem] sm:text-[2.2rem] md:text-[2.5rem] font-bold text-[#7c0a02] mb-6 sm:mb-8 md:mb-10 ml-8">PRESIDENT'S CORNER</h2>

            <!-- Reports List -->
            <div class="space-y-8 sm:space-y-10 md:space-y-12 ml-8">
                <!-- Report Items -->
                <div class="flex items-start justify-between group cursor-pointer">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-base sm:text-lg md:text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                                <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 1st Quarter 2024</span>
                            </p>
                            <span class="text-[#7c0a02] text-xl sm:text-2xl group-hover:translate-x-2 transition-transform duration-200 ml-4">&gt;</span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">April 11, 2024</p>
                    </div>
                </div>

                <div class="flex items-start justify-between group cursor-pointer">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-base sm:text-lg md:text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                                <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 1st Quarter 2023</span>
                            </p>
                            <span class="text-[#7c0a02] text-xl sm:text-2xl group-hover:translate-x-2 transition-transform duration-200 ml-4">&gt;</span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">April 11, 2024</p>
                    </div>
                </div>

                <div class="flex items-start justify-between group cursor-pointer">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-base sm:text-lg md:text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                                <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Final Report</span>
                            </p>
                            <span class="text-[#7c0a02] text-xl sm:text-2xl group-hover:translate-x-2 transition-transform duration-200 ml-4">&gt;</span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">April 11, 2024</p>
                    </div>
                </div>

                <div class="flex items-start justify-between group cursor-pointer">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-base sm:text-lg md:text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                                <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report 4th Quarter</span>
                            </p>
                            <span class="text-[#7c0a02] text-xl sm:text-2xl group-hover:translate-x-2 transition-transform duration-200 ml-4">&gt;</span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">April 11, 2024</p>
                    </div>
                </div>

                <div class="flex items-start justify-between group cursor-pointer">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-base sm:text-lg md:text-lg text-gray-900 font-medium group-hover:text-[#7c0a02] transition-colors duration-200 relative">
                                <span class="relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:origin-left after:scale-x-0 after:bg-[#7c0a02] after:transition-transform after:duration-300 group-hover:after:scale-x-100">President's Report Year 2</span>
                            </p>
                            <span class="text-[#7c0a02] text-xl sm:text-2xl group-hover:translate-x-2 transition-transform duration-200 ml-4">&gt;</span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">April 11, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="w-screen h-[130px] flex flex-col justify-start items-center">
        <div class="w-[2px] h-[110px] bg-[#BD0000]"></div>
    </section>
    
    <section class="wmsu-campuses-cont">
        <div class="main-page-titles-cont">WMSU CAMPUSES</div>
        <div class="camp-cont"> 
            <div class="camp-cont-left"> 
                <div class="camp-text"> 
                    <div class="camp-text-title">ZAMBOANGA DEL SUR</div>
                    <div class="camp-text-mix">
                        <div class="camp-text-plus">+</div>
                        <div class="camp-text-show">SHOW MORE</div>
                    </div>
                </div>
            </div>
            <div class="camp-cont-mid"></div>
            <div class="camp-cont-right"> 
                <div class="camp-text"> 
                    <div class="camp-text-title">ZAMBOANGA SIBUGAY</div>
                    <div class="camp-text-mix">
                    <div class="camp-text-plus">+</div>
                    <div class="camp-text-show">SHOW MORE</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="line-page-div"></section>
    
    <section class="wmsu-services-cont">
        <div class="main-page-titles-cont">SERVICES</div>
        <div class="services-cont">
            <div class="services-logo-cont">
                <div class="square-cont">
                    <div class="square-raindrop">
                        <div class="square-outer"></div>
                        <div class="square-inner"></div>
                        <div class="square-icon">
                            <img src="{{ asset('images/Freshman-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="square-text">Freshman Online Pre-Admission</div>
                </div>
            </div>
            <div class="services-logo-cont">
                <div class="square-cont">
                    <div class="square-raindrop">
                        <div class="square-outer"></div>
                        <div class="square-inner"></div>
                        <div class="square-icon">
                            <img src="{{asset('images/Old Student-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="square-text">Online Registration (Old Student)</div>
                </div>
            </div>
            <div class="services-logo-cont">
                <div class="square-cont">
                    <div class="square-raindrop">
                        <div class="square-outer"></div>
                        <div class="square-inner"></div>
                        <div class="square-icon">
                            <img src="{{asset('images/Advising-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="square-text">Online Advising</div>
                </div>
            </div>
            <div class="services-logo-cont">
                <div class="square-cont">
                    <div class="square-raindrop">
                        <div class="square-outer"></div>
                        <div class="square-inner"></div>
                        <div class="square-icon">
                            <img src="{{asset('images/Enlistment-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="square-text">Online Enlistment</div>
                </div>
            </div>
            <div class="services-rectangle-cont">
                <div class="rectangle-text">
                    <div class="rectangle-text-hide">WMSU<br>SERVICES</div>
                    <div class="rectangle-center-group">
                        <span class="rectangle-plus">+</span>
                        <span class="rectangle-more">MORE</span>
                    </div>
                    <div class="rectangle-close-group">
                        <span class="rectangle-plus">+</span>
                        <span class="rectangle-more">MORE</span>
                    </div>
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
                    <h3 class="text-xl sm:text-2xl font-bold mb-4">GOVERNMENT LINKS</h3>
                    <ul class="space-y-2">
                        <li class="hover:text-red-200 cursor-pointer">Office of the President</li>
                        <li class="hover:text-red-200 cursor-pointer">Office of the Vice President</li>
                        <li class="hover:text-red-200 cursor-pointer">Senate of the Philippines</li>
                        <li class="hover:text-red-200 cursor-pointer">House of the Representatives</li>
                        <li class="hover:text-red-200 cursor-pointer">Supreme Court</li>
                        <li class="hover:text-red-200 cursor-pointer">Court of Appeals</li>
                        <li class="hover:text-red-200 cursor-pointer">Sandiganbayan</li>
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

<script>
var swiper = new Swiper(".swiper", {
  slidesPerView: "auto",
  centeredSlides: true,
  grabCursor: true,
  breakpoints: {
    769: {
      slidesPerView: 4,
      centeredSlides: false,
    }
  }
});
  </script>