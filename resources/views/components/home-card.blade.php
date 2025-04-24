<!-- Card Container -->
<div class="flex flex-col w-72 group sm:w-auto">
    <!-- Mobile and Desktop Container -->
    <div class="sm:block bg-white sm:bg-transparent rounded-lg sm:rounded-none shadow-[0_3px_10px_rgb(0,0,0,0.2)] sm:shadow-none p-4 sm:p-0">
        <!-- Image Container -->
        <img class="border-2 border-[#BD0F03] w-[250px] h-[250px] sm:size-72 mx-auto sm:mx-0 transition-transform duration-300 ease-in-out hover:scale-110 sm:hover:scale-100 object-cover" 
             src="{{ $homeCardImg }}" 
             alt="">
        
        <!-- Content Container -->
        <div class="homeCardContent mt-4 sm:mt-5 text-center sm:text-left">
            <p class="inter-medium capitalize text-[#7C0A02] text-xl sm:text-2xl leading-6 text-center sm:text-left">{{ $homeCardTitle }}</p>
            <p class="inter-light text-sm sm:text-[14px] leading-4 mt-2 text-justify px-2 sm:px-0 sm:text-left">{{ $homeCardBody }}</p>
            <p class="text-[#7C0A02] inter-medium tracking-tighter mt-3 sm:mt-2">Read More ></p>
        </div>
    </div>
</div>

 