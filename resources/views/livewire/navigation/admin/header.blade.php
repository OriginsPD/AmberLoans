<div x-data="{ isLoans: false, isRequest: false, updateSchedule: false, isReview: false }"
     x-on:close-modal.window="isLoans = false; isRequest = false; updateSchedule = false; isReview = false"
     class="border-b z-30 border-gray-100 sticky
      top-0 shadow bg-gray-50">

    <x-alerts :message="session()->get('success')"/>

    <div class="flex items-center justify-between h-16 px-4 mx-auto screen-2xl sm:px-6 lg:px-8">

        <div class="flex items-center justify-between space-x-4">

            <div class="mt-1">
                <button @click.prevent="isSlide = !isSlide" class="flex  flex-shrink-0">

                    <i class="fas fa-bars"></i>

                </button>
            </div>

            <div>

                    <span
                        class="text-2xl italic font-extrabold tracking-widest uppercase rounded-lg">

                        {{ config('app.name') }}

                    </span>

            </div>

            <nav x-data="{ isText: 't1' }"
                @click.prevent="isSlide = false"
                 class="items-end absolute  right-4 mr-6 justify-end pl-8 ml-8 text-sm font-medium space-x-2 md:flex">

                <div class="hidden lg:block space-x-2 ">

                    <a wire:click.prevent="$emit('home')"
                       class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg

                     hover:text-white border shadow hover:bg-teal-500 "

                       href="{{ route('Admin.dashboard') }}">

                        <i class="fas fa-home text-lg"></i>

                    </a>

                    <a @click.prevent="isLoans = !isLoans"
                       @mouseover="isText = 't2'"
                       @mouseleave="isText = 't1'"
                       class="px-4 group py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg

                     hover:text-white border shadow hover:bg-teal-500 "

                       href="#">

                        <i class="far fa-hand-holding-usd text-lg"></i>

                        <span
                            :class="isText === 't2' ? '' : 'hidden'"
                            class="pl-2 transition transform duration-500 ease-in-out"
                        > Create Loans</span>

                    </a>

                    <a @click.prevent="isRequest = !isRequest"
                       @mouseover="isText = 't3'"
                       @mouseleave="isText = 't1'"
                       class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg

                     hover:text-white border shadow hover:bg-teal-500 "

                       href="#">

                        <i class="far fa-hands-usd text-lg "></i>

                        <span
                            :class="isText === 't3' ? '' : 'hidden'"
                            class="pl-2 transition transform duration-500 ease-in-out"
                        > Requests </span>

                    </a>

                    <a @click.prevent="updateSchedule = !updateSchedule"
                       @mouseover="isText = 't4'"
                       @mouseleave="isText = 't1'"
                       class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg

                     hover:text-white border shadow hover:bg-teal-500 "

                       href="#">

                        <i class="far fa-calendar-alt text-lg"></i>

                        <span
                            :class="isText === 't4' ? '' : 'hidden'"
                            class="pl-2 transition transform duration-500 ease-in-out"
                        > Update Appointment </span>

                    </a>

                    <a @click.prevent="isReview = !isReview"
                       @mouseover="isText = 't5'"
                       @mouseleave="isText = 't1'"
                       class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg

                     hover:text-white border shadow hover:bg-teal-500 "

                       href="#">

                        <i class="fas fa-star text-lg"></i>

                        <span
                            :class="isText === 't5' ? '' : 'hidden'"
                            class="pl-2 transition transform duration-500 ease-in-out"
                        > Interview Review </span>

                    </a>

                    <a wire:click.prevent="logout"
                       class="px-4 py-2 mt-2 text-sm text-white font-semibold bg-red-600 rounded-lg

                      border shadow hover:bg-red-500 "

                       href="#">

                        Logout

                    </a>

                </div>

                <div class="sm:flex flex md:flex lg:hidden">

                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 "
                       href="#">Search</a>

                    <x-dropdown.dropNavi title="Links">

                        <x-link.mega>
                            <x-slot name="icon">

                                <i class="fad fa-chart-network text-lg"></i>

                            </x-slot>

                            {{ __('Dashboard') }}

                        </x-link.mega>

                        <x-link.mega href="{{ route('login') }}">
                            <x-slot name="icon">

                                <i class="far fa-sign-out-alt text-lg"></i>

                            </x-slot>

                            {{ __('Logout') }}

                        </x-link.mega>


                    </x-dropdown.dropNavi>


                </div>

            </nav>

        </div>

    </div>

    <x-modal class="z-30" alpName="isLoans">

        <div @keydown.esc.window="isLoans = false"
             x-on:close-modal.window="isLoans = false"
             class="flex flex-col w-full h-full overflow-auto">

            <div class="w-full px-4 text-center my-4">

                <h1
                    class="text-3xl pb-2 font-extrabold text-transparent sm:text-6xl bg-clip-text
                       bg-gradient-to-r from-green-300 via-teal-500 to-green-600 border-b-2 border-gray-300">
                    New Loan Offers
                </h1>

            </div>

            @livewire('admin.create.create-loans')

        </div>

    </x-modal>

    <x-modal class="z-30" alpName="isRequest">

        <div @keydown.esc.window="isRequest = false"
             x-on:close-modal.window="isRequest = false"
             class="flex flex-col w-full h-full overflow-auto">

            <div class="w-full px-4 text-center my-2">

                <h1
                    class="text-3xl pb-2 font-extrabold text-transparent sm:text-6xl bg-clip-text
                       bg-gradient-to-r from-green-300 via-teal-500 to-green-600 border-b-2 border-gray-300">
                    Plan Interviews
                </h1>

            </div>

            @livewire('admin.create.create-request')

        </div>

    </x-modal>

    <x-modal class="z-30" alpName="updateSchedule">

        <div @keydown.esc.window="updateSchedule = false"
             x-on:close-modal.window="updateSchedule = false"
             class="flex flex-col w-full h-full overflow-auto">

            <div class="w-full px-4 text-center my-4">

                <h1
                    class="text-3xl pb-4 font-extrabold italic text-transparent sm:text-6xl bg-clip-text
                       bg-gradient-to-r from-green-300 via-teal-500 to-green-600 border-b-2 border-gray-300">
                    Update Interview Appointment
                </h1>

            </div>

            @livewire('admin.create.reschedule')

        </div>

    </x-modal>

    <x-modal class="z-30" alpName="isReview">

        <div
             x-on:close-modal.window="isReview = false"
             class="flex flex-col w-full h-full overflow-auto">

            <div class="w-full px-4 sticky top-0 z-10 bg-white text-center my-2">

                <h1
                    class="text-lg pb-2 font-extrabold text-transparent sm:text-6xl bg-clip-text
                       bg-gradient-to-r from-green-300 via-teal-500 to-green-600 border-b-2 border-gray-300">
                    Interview Review
                </h1>

            </div>

            @livewire('admin.create.interview-review')

        </div>

    </x-modal>


</div>

