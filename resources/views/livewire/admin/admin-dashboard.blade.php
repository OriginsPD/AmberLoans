<div x-data="{ isDash: @entangle('isDash'), isRequest: @entangle('isRequest') }"
     @click.prevent="isSlide = false"
     class=" relative h-auto bg-gray-300 h-auto justify-center inset-0">

    <x-alerts :message="session()->get('success')"/>

    <!-- Stats Of Loans -->
    <div
        class="text-center sticky top-16 py-1 z-20 bg-white bg-opacity-65 w-screen overflow-hidden ">

        <div class="px-4 py-2 mx-auto w-screen sm:px-6 lg:px-4">

            <ul class="border-2 bg-teal-500 w-full border-white grid grid-cols-2 rounded lg:grid-cols-4">

                <li class="p-2 border border-white ">

                    <p class="text-2xl font-extrabold text-white"> {{ $allLoans }} </p>

                    <p class="mt-1 text-lg text-white italic font-medium">Offered Loans</p>

                </li>


                <li class="p-2 border border-white">

                    <p class="text-2xl font-extrabold text-white"> {{ $loans->count() }} </p>

                    <p class="mt-1 text-lg text-white italic font-medium">Customer</p>

                </li>

                <li class="p-2 border border-white">

                    <p class="text-2xl font-extrabold text-white">{{ $loanRequest }}</p>

                    <p class="mt-1 text-lg text-white italic font-medium">Loan Request</p>

                </li>

                <li class="p-2 border border-white">

                    <p class="text-2xl font-extrabold text-white">10+</p>

                    <p class="mt-1 text-lg text-white italic font-medium">Approved Loans</p>

                </li>

            </ul>

        </div>

    </div>


    <div x-show="isDash"
         x-transition.duration.300ms
         x-transition.out.opacity.80.duration.300ms
         class="w-screen mx-auto mt-20 p-3">

        <x-table class="w-full h-full" title="All Loans">

            <x-slot name="headerBtn">

                <div class="flex" x-data="{ isSearch: false }">

                    <div x-show="isSearch"
                         x-transition.duration.300ms class="-mt-2">
                        <x-input.text wire:model="search"
                                      placeholder="Search.." class="h-8"/>
                    </div>

                    <x-table.button.top @click.prevent="isSearch = !isSearch"
                                        class="bg-teal-500 my-2">

                        Search <i class="far fa-search pl-2"></i>

                    </x-table.button.top>

                </div>


            </x-slot>

            <x-slot name="head">

                <x-table.head> Loan Name</x-table.head>

                <x-table.head> Equity Financed</x-table.head>

                <x-table.head> Maximum Value</x-table.head>

                <x-table.head></x-table.head>

            </x-slot>

            @forelse($loans as $loan)

                <x-table.row>


                    <x-table.cell class="transition duration-300 ease-in"> {{ $loan->name }} </x-table.cell>

                    <x-table.cell class="text-center transition duration-300 ease-in"> {{ $loan->loan_percentage }}%
                    </x-table.cell>

                    <x-table.cell class="transition duration-300 ease-in">
                        $ {{ number_format($loan->end_value,2) }} </x-table.cell>

                    <x-table.cell class="transition duration-300 ease-in">

                        <x-table.button.action class="bg-green-500">

                            View

                        </x-table.button.action>

                    </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="4"> No Data Found</x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row>

                <x-table.cell colspan="4" class="text-center font-semibold text-blue-600">

                    <a wire:click.prevent="seeMore"
                       href="#" class="hover:underline pb-1">

                        See More

                    </a>

                </x-table.cell>

            </x-table.row>


        </x-table>


    </div>

    <div x-show="isRequest"
         x-transition.duration.300ms
         x-transition.out.opacity.80.duration.300ms
         class="w-screen mx-auto mt-20 p-3">

        <x-table class="w-full h-full" title="All Loans">

            <x-slot name="headerBtn">

                <div class="flex" x-data="{ isSearch: false }">

                    <div x-show="isSearch"
                         x-transition.duration.300ms class="-mt-2">
                        <x-input.text wire:model="search"
                                      placeholder="Search.." class="h-8"/>
                    </div>

                    <x-table.button.top @click.prevent="isSearch = !isSearch"
                                        class="bg-teal-500 my-2">

                        Search <i class="far fa-search pl-2"></i>

                    </x-table.button.top>

                </div>


            </x-slot>

            <x-slot name="head">

                <x-table.head> Username</x-table.head>

                <x-table.head> Loan Name</x-table.head>

                <x-table.head> Status </x-table.head>

                <x-table.head> Approved Date </x-table.head>

                <x-table.head> Approved By </x-table.head>

                <x-table.head></x-table.head>

            </x-slot>

            @forelse($requestLoans as $requestLoan)

                <x-table.row>


                    <x-table.cell class="transition duration-300 ease-in"> {{ $requestLoan->customer->first_nm }} {{ $requestLoan->customer->last_nm }} </x-table.cell>

                    <x-table.cell class="transition duration-300 ease-in"> {{ $requestLoan->loan->name }} </x-table.cell>

                    <x-table.cell class="text-center transition duration-300 ease-in"> {{ ($requestLoan->status === 0) ? 'Pending' : 'Accepted' }}
                    </x-table.cell>

                    <x-table.cell class="transition duration-300 ease-in">
                        {{ $requestLoan->approve_date }}
                    </x-table.cell>

                    <x-table.cell class="transition duration-300 ease-in">
                        {{ $requestLoan->approved_by }}
                    </x-table.cell>


                    <x-table.cell class="transition duration-300 ease-in">

                        <x-table.button.action class="bg-green-500">

                            View

                        </x-table.button.action>

                    </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="6"> No Data Found</x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row>

                <x-table.cell colspan="4" class="text-center font-semibold text-blue-600">

                    <a wire:click.prevent="seeMore"
                       href="#" class="hover:underline pb-1">

                        See More

                    </a>

                </x-table.cell>

            </x-table.row>


        </x-table>


    </div>


</div>
