<!-- Card Container -->
<div class="w-full h-full max-w-xs flex justify-center">
    <div class="flex flex-col w-80 lg:w-80 h-full group sm:w-auto shadow-[0_3px_10px_rgb(0,0,0,0.1)]">
        <!-- Mobile and Desktop Container -->
        <div class="flex flex-col items-center lg:w-full h-full">
            <!-- Image Container -->
            <div class="border-2 border-[#BD0F03] size-72 mx-auto sm:mx-0 overflow-hidden relative">
                {!! $homeCardImg !!}
            </div>
            
            <!-- Content Container -->
            <div class="h-[50%] w-full px-4 flex flex-col justify-between">
                <div class="homeCardContent w-full h-full mt-4 sm:mt-5 sm:text-left">
                    <p class="inter-medium capitalize text-[#7C0A02] text-xl sm:text-2xl leading-6 lg:text-left break-words line-clamp-3">{{ $homeCardTitle }}</p>
                    <p class="inter-light text-sm sm:text-[14px] leading-4 mt-4 sm:text-left break-words line-clamp-4">{{ $homeCardBody }}</p>
                </div>
                <p class="text-[#7C0A02] inter-medium tracking-tighter mt-3 sm:mt-2 mb-4">Read More ></p>
            </div>
        </div>
    </div>
    </div>