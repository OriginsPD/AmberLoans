<div x-data="{ isBook: false, customer: true, isSlide: @entangle('slide'), newCustomer: @entangle('newCustomer') ,member: @entangle('member')  }"
     x-on:close-modal.window="isBook = false; customer = true; isSlide = false"
     class="absolute inset-x-0 z-30 bottom-0 ">

    <x-alerts :status="session('status')" :message="session('success')" />

    <div class="px-4 py-12 mx-auto max-w-screen-xl sm:px-6 lg:px-8">

        <div class="w-full flex flex-col">

            <h1 class="text-5xl italic font-extrabold sm:text-8xl">
                Amber Loans
            </h1>

            <div>

                <p class="mt-2">
                    Want to come see us?
                    Book an Appointment
                </p>

                <a @click.prevent="isBook = !isBook" href="#"
                   class="relative inline-block px-12 py-3 mt-8 transition transform origin-left scale-x-full hover:bg-white hover:text-green-900
                            overflow-hidden border-2 border-white transition-colors">

                        <span
                            class="absolute inset-0 transform "></span>


                    <span class="relative text-sm font-medium tracking-widest uppercase">
                            Book Appointment

                         </span>

                </a>

            </div>

        </div>

    </div>

    <x-modal alpName="isBook"
             class="bg-green-600 flex bg-opacity-75 z-50">

        <button @click="isBook = false; customer = true; isSlide = false"
            class="absolute top-0 right-0 px-2 m-1 py-1 hover:bg-gray-600 hover:bg-opacity-60 text-white" >

            <i class="fas fa-times text-white text-lg"></i>

        </button>

        <div x-show="customer"
             x-transition.duration.300ms
             :class="isSlide ? '-translate-x-full' : '-translate-x-0' "
             class="flex space-x-6 absolute px-4 transform transition duration-300">


            <div class="w-1/2  mx-auto overflow-hidden bg-white rounded-lg shadow-lg">

                <div class="px-4 py-2">

                    <h1 class="text-3xl font-bold text-gray-800 uppercase dark:text-white">New Customer</h1>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>

                </div>

                <img class="object-cover w-full h-48 mt-2"
                     src="https://cdn.pixabay.com/photo/2020/02/18/08/35/finance-4858797_960_720.jpg" alt="NIKE AIR">

                <div class="flex items-center justify-between px-4 border border-gray-200 py-2 bg-green-500">

                    <h1 class="text-lg font-bold text-white"></h1>

                    <button wire:click.prevent="newCustomer"
                            class="px-2 py-1 text-xs font-semibold shadow-lg text-gray-900 uppercase transition-colors
                                   duration-200 transform bg-white rounded hover:bg-gray-200">

                        Begin Appointment

                    </button>

                </div>

            </div>


            <div class="w-1/2 mx-auto overflow-hidden bg-white rounded-lg shadow-lg">
                <div class="px-4 py-2">
                    <h1 class="text-3xl font-bold text-gray-800 uppercase dark:text-white">Member</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>
                </div>

                <img class="object-cover w-full h-48 mt-2"
                     src="https://cdn.pixabay.com/photo/2018/08/17/14/26/piggy-3612929_960_720.jpg" alt="NIKE AIR">

                <div class="flex items-center justify-between px-4 border border-gray-200 py-2 bg-green-500">

                    <h1 class="text-lg font-bold text-white"></h1>

                    <button wire:click.prevent="returnMember"
                            class="px-2 py-1 text-xs font-semibold shadow-lg text-gray-900 uppercase transition-colors
                                   duration-200 transform bg-white rounded hover:bg-gray-200">

                        Begin Appointment

                    </button>

                </div>

            </div>

        </div>

        @if($newCustomer)


            @livewire('home.create-customer')

        @endif

        @if($member)

            @livewire('home.return-member')

        @endif


    </x-modal>

</div>
