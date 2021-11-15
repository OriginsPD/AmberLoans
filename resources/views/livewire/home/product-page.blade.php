<div class="bg-white">


    <aside
        class="p-3 text-center sticky z-10 overflow-hidden top-0 shadow-xl bg-gradient-to-r from-green-500 via-green-400 to-green-600 bg-opacity-70">
        <p class="text-sm font-medium text-xl italic text-white capitalize">

            Secure Your Future With Our width range of Loans

        </p>
    </aside>


    <div class="bg-gray-900">
        <div class="px-4 py-16 mx-auto max-w-screen-xl space-y-8 sm:px-6 lg:px-8">


            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

                @forelse($loans as $loan)

                <div class="block p-8 border transition duration-300 ease-in-out transform hover:scale-105 border-gray-800 shadow-xl rounded-xl" href="">

                    <i class="fas fa-coins text-4xl text-blue-400"></i>

                    <h3 class="mt-3 text-xl font-bold text-white">{{ $loan->name }}</h3>

                    <div class="mt-4 text-sm text-gray-300">

                        <p class="mt-4 text-gray-300">
                            Loans Starting at ${{ number_format($loan->start_value,2) }}
                        </p>

                        <ul class="list-disc p-3">

                            <li> Up to ${{ number_format($loan->end_value,2) }} in loans </li>
                            <li> {{ $loan->duration }} Months to Repaid </li>

                        </ul>

                    </div>
                </div>

                @empty


                @endforelse

            </div>


            <div class="text-center">

                <a wire:click.prevent="seeMore" class="inline-block px-5 py-3 text-sm font-medium text-white bg-blue-500 rounded-lg" href="">

                    See More

                </a>

            </div>

        </div>

    </div>


</div>
