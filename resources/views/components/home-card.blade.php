<!-- Card Container -->
<div class="w-full max-w-xs flex justify-center">
<div class="flex flex-col w-72 lg:w-80 group sm:w-auto shadow-[0_3px_10px_rgb(0,0,0,0.1)]">
    <!-- Mobile and Desktop Container -->
    <div class="flex flex-col items-center lg:w-80">
        <!-- Image Container -->
        <div class="border-2 border-[#BD0F03] size-72 mx-auto sm:mx-0 overflow-hidden relative">
            {!! $homeCardImg !!}
        </div>
        
        <!-- Content Container -->
        <div class="homeCardContent w-full mt-4 sm:mt-5 sm:text-left lg:px-4">
            <p class="inter-medium capitalize text-[#7C0A02] text-xl sm:text-2xl px-2 lg:px-0 text-center leading-6 lg:text-left">{{ $homeCardTitle }}</p>
            <p class="inter-light text-sm sm:text-[14px] leading-4 mt-2 text-justify px-2 sm:px-0 sm:text-left">{{ $homeCardBody }}</p>
            <p class="text-[#7C0A02] inter-medium tracking-tighter mt-3 sm:mt-2">Read More ></p>
        </div>
    </div>
</div>
</div>