<!-- component -->
<div @keydown.esc.window="isSlide = false"
<div @keydown.alt.left.window="isSlide = false"
     @keydown.alt.right.window="isSlide = true"
     :class="isSlide ? 'translate-x-0' : '-translate-x-96'"
     class="md:flex flex-col fixed transform transform ease-in-out duration-300
            border-r border-gray-100 shadow z-30 md:flex-row h-screen">

    <div
        class="flex flex-col w-full md:w-64 h-full text-gray-700 bg-gray-50 flex-shrink-0">

        <nav class="flex-grow md:block mt-8 px-4 pb-4 md:pb-0 md:overflow-y-auto">

            <x-link.side>

                {{ __('Dashboard') }}

            </x-link.side>

            <x-link.side>

                {{ __('Customers') }}

            </x-link.side>

            <x-dropdown title="Loans Details">

                <x-link.side>

                    {{ __('View Loans Information') }}
                </x-link.side>

                <x-link.side>

                    {{ __('Loan Request Information') }}
                </x-link.side>

                <x-link.side>

                    {{ __('Schedule Appointments') }}
                </x-link.side>

            </x-dropdown>

        </nav>

    </div>

</div>
