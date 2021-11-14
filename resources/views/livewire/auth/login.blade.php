<div class="flex absolute z-40 justify-center items-center inset-0">

    <x-form wire:submit.prevent="authUser" class="w-8/12" grid="1">

        <x-slot name="title">

            <h2 class="text-2xl italic font-extrabold
                       text-center pb-4 text-green-700 uppercase">

                Loans Officer Login

            </h2>

            <hr class="pb-8"/>

        </x-slot>

        <x-input.label for="email" label="Email Address">

            <x-input.text wire:model.lazy="user.email" type="email"/>

        </x-input.label>

        <x-input.label for="password" label="Password">

            <x-input.text wire:model.lazy="password" type="password"/>

        </x-input.label>

        <div class="col-span-full">

            <div class="grid grid-cols-1 gap-3 ">

                    @foreach ($errors->all() as $message)

                        <div class=" flex text-red-500 font-semibold">

                            <i class="fas fa-exclamation-circle mt-0.5 pr-3"></i>

                            {{ $message }}

                        </div>

                    @endforeach

            </div>

        </div>

        <x-input.submit color="green">

            Login

        </x-input.submit>

    </x-form>

</div>
