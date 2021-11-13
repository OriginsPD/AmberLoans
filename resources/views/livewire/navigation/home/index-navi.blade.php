<div class="absolute sticky z-40 py-2 bg-transparent  h-20">

    <div class="px-4 mx-auto sm:pr-0 max-w-screen-2xl">

        <div class="flex items-center justify-between h-16">

            <div class="flex items-center space-x-10">

                <img src="{{ asset('logo/Amber.png') }}" class="w-44 py-2 h-16 "/>

                <nav class="hidden text-sm text-white font-medium space-x-8 lg:flex">

                    <a href="">About Us</a>

                    <x-dropdown.links>

                        <a href="#" class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                            Settings
                        </a>

                        <a href="#" class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                            Keyboard shortcuts
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#" class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                            Company profile
                        </a>

                        <a href="#" class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                            Team
                        </a>

                    </x-dropdown.links>

                    <a href="">Requirements</a>

                    <a href="">Contact Us</a>

                </nav>

            </div>

{{--            <div class="items-center justify-end text-black  hidden space-x-8 sm:flex">--}}

{{--                <a href="" class="text-sm font-medium">0123456789</a>--}}

{{--                <a--}}
{{--                    href=""--}}
{{--                    class="inline-flex items-center h-16 px-12 text-xs font-bold tracking-widest--}}
{{--                           text-gray-900 uppercase bg-white">--}}

{{--                    Get in touch--}}

{{--                </a>--}}

{{--            </div>--}}

            <div class="sm:hidden">

                <button class="p-2 text-gray-100 bg-gray-800 rounded-lg" type="button">

                    <span class="sr-only">Open menu</span>

                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewbox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

</div>
