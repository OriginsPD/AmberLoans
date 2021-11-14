<div class="w-full">

    <x-form wire:submit.prevent="createLoan" class="w-10/12 h-auto border border-gray-200" grid="2">

        <x-slot name="title">
        </x-slot>

        <x-input.label colspan="col-span-full" for="loan.name" label="Name of Loan">

            <x-input.text wire:model.debounce.300ms="loan.name" type="text"
                          :error="$errors->first('loan.name')" />

        </x-input.label>

        <x-input.label for="loan.start_value" label="Starting Value">

            <x-input.text wire:model.debounce.300ms="loan.start_value" type="number"
                          :error="$errors->first('loan.start_value')" />

        </x-input.label>

        <x-input.label for="loan.end_value" label="End Value">

            <x-input.text wire:model.debounce.300ms="loan.end_value" type="number"
                          :error="$errors->first('loan.end_value')" />

        </x-input.label>

        <x-input.label for="loan.loan_percentage" label="Loan Percentage">

            <x-input.select wire:model.debounce.300ms="loan.loan_percentage" field="Percentage"
                            :error="$errors->first('loan.loan_percentage')" >

                <option value="60">60%</option>
                <option value="65">65%</option>
                <option value="70">70%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="85">85%</option>
                <option value="90">90%</option>

            </x-input.select>

        </x-input.label>

        <x-input.label for="loan.duration" label="Duration In Months">

            <x-input.text wire:model.debounce.300ms="loan.duration" type="number"
                          :error="$errors->first('loan.duration')" />

        </x-input.label>

        <x-input.label for="loan.monthly_payment" label="Payment Percentage">

            <x-input.select wire:model.debounce.300ms="loan.monthly_payment" field="Percentage"
                            :error="$errors->first('loan.monthly_payment')" >

                <option value="6">6%</option>
                <option value="7.5">7.5%</option>
                <option value="8">8%</option>
                <option value="8.5">8.5%</option>
                <option value="9">9%</option>
                <option value="9.22">9.22%</option>
                <option value="10">10%</option>
                <option value="15">15%</option>

            </x-input.select>

        </x-input.label>

        <div class="flex items-end justify-end space-x-4 col-span-full">

            <x-input.submit @click.prevent="isLoans = false" color="red">
                Cancel
            </x-input.submit>

            <x-input.submit color="green">

                <span wire:loading wire:loading.class="animate-spin">

                    <i class="far fa-spinner transform duration-300 text-white "></i>

                </span>
                Create Loan

            </x-input.submit>

        </div>

    </x-form>

</div>
