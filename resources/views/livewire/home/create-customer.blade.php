<div class="w-11/12">

    <x-form wire:submit.prevent="addCustomer"
            @keydown.esc.window="isSlide = false; newCustomer = false; member = false;"
            grid="2" class="w-11/12">

        <x-slot name="title">

            <h1 class="w-full text-black text-center">

                Book an Appointment

            </h1>

        </x-slot>

        <x-input.label for="customer.first_nm" label="First Name">

            <x-input.text wire:model.debounce.300ms="customer.first_nm" type="text"
                          :error="$errors->first('customer.first_nm')"/>

        </x-input.label>

        <x-input.label for="customer.last_nm" label="Last Name">

            <x-input.text wire:model.debounce.300ms="customer.last_nm" type="text"
                          :error="$errors->first('customer.last_nm')"/>

        </x-input.label>

        <x-input.label  for="customer.email" label="Email">

            <x-input.text wire:model.debounce.300ms="customer.email" type="email"
                          :error="$errors->first('customer.email')"/>

        </x-input.label>

        <x-input.label  for="customer.contact_no" label="Contact Number">

            <x-input.text wire:model.debounce.300ms="customer.contact_no" type="tel"
                          :error="$errors->first('customer.contact_no')"/>

        </x-input.label>


        <x-input.label  for="loanType" label="Select Loan You Are Seeking">

            <x-input.select wire:model.debounce.300ms="loanType"
                            field="name" :option="$loans"
                            :error="$errors->first('loanType')"/>

        </x-input.label>


        <x-input.submit color="green" class="disabled:opacity-80">

                    <span wire:loading.delay
                          wire:loading.class="animate-spin">

                        <i class="fad fa-spinner transform transition duration-300"></i>

                    </span>

            Request Appointment

        </x-input.submit>

    </x-form>


</div>
