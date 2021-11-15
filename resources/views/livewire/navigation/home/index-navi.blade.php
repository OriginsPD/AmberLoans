<div x-data="{ isOpen: false, isLoan: @entangle('isLoan') }"
     class="absolute w-screen z-20 py-2 bg-transparent  h-20">

    <div class="px-4 mx-auto sm:pr-0 w-screen">

        <div class="flex items-center justify-between px-4 h-16">

            <div class="flex items-center justify-between w-full space-x-10">

                <div>

                    <img src="{{ asset('logo/Amber.png') }}" class="w-44 py-2 h-16 "/>

                </div>

                <nav class="hidden text-sm text-white font-medium space-x-8 lg:flex">

                    <a href="">About Us</a>

                    <x-dropdown.links>

                        @forelse($loans as $loan)

                            <a  href="#"
                               class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{ $loan->name }}
                            </a>

                        @empty

                            <a href="#"
                               class="block px-4 py-3 text-sm text-white capitalize transition-colors duration-200 transform hover:bg-gray-50 hover:bg-opacity-20 dark:hover:bg-gray-700 dark:hover:text-white">
                                No Loans Added
                            </a>

                        @endforelse


                    </x-dropdown.links>

                    <a @click.prevent="isOpen = !isOpen"
                       href="#">Requirements</a>

                    <a href="">Contact Us</a>

                </nav>

            </div>

            <div class="sm:hidden z-30 relative right-0 ">

                <button class="p-2 text-gray-100 hover:bg-green-500
                hover:bg-opacity-75 rounded-lg" type="button">

                    <span class="sr-only">Open menu</span>

                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewbox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <x-modal alpName="isOpen"
             @keydown.esc.window="isOpen = false"
             class="bg-green-800 flex z-50">

        @include('requirements')

    </x-modal>

    <x-modal alpName="isLoan" x-trap.noscroll
             @keydown.esc.window="isLoan = false"
             class="bg-white z-50">


           <livewire:home.loan-page />


    </x-modal>


</div>
