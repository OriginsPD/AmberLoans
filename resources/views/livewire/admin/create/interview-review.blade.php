<div x-data="{ isChecklist: true,
                isAccept: false,
                isCheck1: false,
                isCheck2: false,
                isCheck3: false,
                isCheck4: false,
                isCheck5: false,
                isCheck6: false,
                isCheck7: false,
                isCheck8: false,
                isCheck9: false
                }"
     x-on:show-accept.window="isAccept = true"
     x-on:show-form.window="isChecklist = false"

     @keydown.esc.window="isReview = false;
                isChecklist = true;
                isAccept = false;
                isCheck1 = false;
                isCheck2 = false;
                isCheck3 = false;
                isCheck4 = false;
                isCheck5 = false;
                isCheck6 = false;
                isCheck7 = false;
                isCheck8 = false;
                isCheck9 = false;"

     x-on:close-modal.window="isReview = false;
                isChecklist = true;
                isAccept = false;
                isCheck1 = false;
                isCheck2 = false;
                isCheck3 = false;
                isCheck4 = false;
                isCheck5 = false;
                isCheck6 = false;
                isCheck7 = false;
                isCheck8 = false;
                isCheck9 = false; ">

    <x-table x-show="isChecklist"
             class="w-full h-full -mt-2 " title="Requirements Checklist">

        <x-slot name="headerBtn">

            <x-table.button.top x-show="isAccept"
                                wire:click.prevent="activeLoan"
                                class="bg-green-500 flex ">

                Accept Applicant <i class="fas fa-vote-nay my-1 pl-2"></i>

            </x-table.button.top>

            <x-table.button.top wire:click.prevent="rejectLoan"
                class="bg-red-500 flex ">

                Reject Applicant <i class="fas fa-vote-nay my-1 pr-2"></i>

            </x-table.button.top>


        </x-slot>

        <x-slot name="head">

            <x-table.head> Check Box</x-table.head>

            <x-table.head> Requirements</x-table.head>

            <x-table.head></x-table.head>


        </x-slot>

        <x-table.row>

            <x-table.cell
                class="border border-gray-300
">


                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck1 = true"
                       :class="isCheck1 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck1 ? 'line-through' : '' "
                    class=" italic">Salaried applicants: Job letter and last two months pay slips.
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck2 = true"
                       :class="isCheck2 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">

            </x-table.cell>

            <x-table.cell class="border border-gray-300
">
                <li :class="isCheck2 ? 'line-through' : '' "
                    class=" italic">Print out of savings/current account transactions for at least 12 months.
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck3 = true"
                       :class="isCheck3 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck3 ? 'line-through' : '' "
                    class=" italic">Self-employed: Financial statements prepared by a Certified Chartered Accountant
                    &amp; stamped.
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck4 = true"
                       :class="isCheck4 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>


            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck4 ? 'line-through' : '' "
                    class=" italic">Tax Registration (TRN) Card and Valid ID (Driver’s Licence, Passport, Voter’s ID or
                    Amber Loans
                    ID).
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck5 = true"
                       :class="isCheck5 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck5 ? 'line-through' : '' "
                    class=" italic">Passport size photograph.
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck6 = true"
                       :class="isCheck6 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck6 ? 'line-through' : '' "
                    class=" italic">Recent utility or any other bill in member’s name with current address (Proof of
                    Address).
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck7 = true"
                       :class="isCheck7 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck7 ? 'line-through' : '' "
                    class=" italic">Signed Sales Agreement.
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck8 = true"
                       :class="isCheck8 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck8 ? 'line-through' : '' "
                    class=" italic">Current Valuation (done in the last year) by one of our Approved Validators
                </li>

            </x-table.cell>

        </x-table.row>

        <x-table.row>

            <x-table.cell class="border border-gray-300
">

                <input wire:click.prevent="checked" type="button" id="check1" @click.prevent="isCheck9 = true"
                       :class="isCheck9 ? 'hidden' : ''"
                       class="px-3 py-1 border border-gray-500">


            </x-table.cell>

            <x-table.cell class="border border-gray-300
">

                <li :class="isCheck9 ? 'line-through' : '' "
                    class=" italic">Updated property tax receipt and most recent water bill.
                </li>

            </x-table.cell>

        </x-table.row>


    </x-table>


    @if($activeloan)

        <x-form wire:submit.prevent="gaveLoan">
            <x-slot name="title">
            </x-slot>

            <x-input.label for="customer_id" label="Select Customer">

                <x-input.select wire:model.debounce.300ms="customer_id"
                                field="customer_id" :error="$errors->first('customer_id')">

                    @forelse($Requests as $Request)

                        <option
                            value="{{ $Request->customer_id }}"> {{ $Request->customer->first_nm }} {{ $Request->customer->last_nm }} </option>

                    @empty

                    @endforelse

                </x-input.select>

            </x-input.label>

            @if($customer_id)

                <x-input.label for="loan_value" label="Requested Loan Amount">

                    <x-input.select wire:model.debounce.300ms="loan_value"
                                    :error="$errors->first('loan_value')">

                        @foreach($loopAppoints as $loopAppoint)

                            <div hidden> {{  $amount = $RequestLoans->loan->start_value * $loopAppoint }} </div>

                            <option @if($loop->last)

                                    {{ $amount = $RequestLoans->loan->end_value }} @endif

                                    value="{{ $amount * $RequestLoans->loan->loan_percentage }}">

                                {{ $amount * $RequestLoans->loan->loan_percentage }}

                            </option>

                        @endforeach

                    </x-input.select>

                </x-input.label>

                <x-input.label for="payment_value" label="Monthy Payment">

                    <x-input.text readonly
                                  value="{{ number_format($loan_value * $RequestLoans->loan->monthly_payment,2) }}"/>

                </x-input.label>

            @endif

            <x-input.submit color="blue">

                <span wire:loading.delay.longer wire:loading.class="animate-spin">

                    <i class="far fa-spinner transform duration-300 text-white "></i>

                </span>

                Accept Loan

            </x-input.submit>

        </x-form>


    @endif

    @if($rejectloan)

        <x-form wire:submit.prevent="deniedLoan">
            <x-slot name="title">
            </x-slot>

            <x-input.label for="customer_id" label="Select Customer">

                <x-input.select wire:model.debounce.300ms="customer_id"
                                field="customer_id" :error="$errors->first('customer_id')">

                    @forelse($Requests as $Request)

                        <option
                            value="{{ $Request->customer_id }}"> {{ $Request->customer->first_nm }} {{ $Request->customer->last_nm }} </option>

                    @empty

                    @endforelse

                </x-input.select>

            </x-input.label>

            <x-input.submit color="red">

                <span wire:loading.delay.longer wire:loading.class="animate-spin">

                    <i class="far fa-spinner transform duration-300 text-white "></i>

                </span>

                Reject Loan

            </x-input.submit>

        </x-form>


    @endif

</div>
