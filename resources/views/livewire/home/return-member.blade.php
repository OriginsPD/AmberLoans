<div class="w-11/12">

    @if(!$foundMember)


        <x-form wire:submit.prevent="selectedMember"
                @keydown.esc.window="isSlide = false; newCustomer = false; member = false;"
                grid="2" class="w-11/12">

            <x-slot name="title">

                <h1 class="w-full text-black text-center">

                    Search Enter Your Email Address

                </h1>

            </x-slot>

            <x-input.label for="customer.email" label="Enter Your Email">

                <x-input.text wire:model="customer.email" type="email"
                              :error="$errors->first('customer.email')" />

            </x-input.label>

            <x-input.submit type="submit">

                Search

            </x-input.submit>

        </x-form>



    @else

        <x-form wire:submit.prevent="makeRequest"
                @keydown.esc.window="isSlide = false; newCustomer = false; member = false;"
                grid="2" class="w-11/12">

            <x-slot name="title">

                <h1 class="w-full text-black text-center">

                    Book an Appointment

                </h1>

            </x-slot>

                <x-input.label for="loanType" label="Select Loan You Are Seeking">

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

    @endif

</div>
