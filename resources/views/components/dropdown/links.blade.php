<div x-data="{ open: false }"
     @mouseleave="open=false">

    <a  @mouseover="open=true"
        href="#" class="flex">

        Loans

        <svg
            :class="open ? 'rotate-180' : 'rotate-0'"
            class="w-5 h-5 transform transition duration-300 mx-1" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                fill="currentColor"></path>
        </svg>

    </a>


    <div x-show="open"

        class="absolute z-10 w-56 py-2 overflow-hidden bg-gray-600 bg-opacity-60 rounded-n-md shadow-xl dark:bg-gray-800">

        {{ $slot }}

    </div>

</div>
