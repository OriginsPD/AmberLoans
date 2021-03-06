<div class="w-full">

    <x-form wire:submit.prevent="bookAppointment" class="w-10/12 h-auto border border-gray-200" grid="2">

        <x-slot name="title">
        </x-slot>

        <x-input.label colspan="col-span-full" for="appointment.customer_id" label="Select Customer To Make Appointment">

            <x-input.select wire:model.debounce.300ms="appointment.customer_id"
                           field="customer"
                            :error="$errors->first('appointment.customer_id')" >

                @forelse($requestLoans as $requestLoan)

                    <option value="{{ $requestLoan->customer_id }}"> {{ $requestLoan->customer->first_nm }} {{ $requestLoan->customer->last_nm }} </option>

                @empty

                    <option selected> No Data Found </option>

                @endforelse

            </x-input.select>

        </x-input.label>

        <x-input.label for="appointment.set_date" label="Starting Value">

            <x-input.text wire:model.debounce.300ms="appointment.set_date" type="date"
                          :error="$errors->first('appointment.set_date')" />

        </x-input.label>

        <x-input.label for="appointment.time_slot" label="Select Appointment Time Slot">

            <x-input.select wire:model.debounce.300ms="appointment.time_slot" field="Time Slot"
                            :error="$errors->first('appointment.time_slot')" >

                <option value="9:00 AM - 9:45 AM">9:00 AM - 9:45 AM </option>
                <option value="10:00 AM - 10:45 AM"> 10:00 AM - 10:45 AM </option>
                <option value="11:00 AM - 11:45 AM">11:00 AM - 11:45 AM </option>
                <option value="12:00 PM - 12:45 PM">12:00 PM - 12:45 PM </option>
                <option value="1:00 PM - 1:45 PM">1:00 PM - 1:45 PM </option>

            </x-input.select>

        </x-input.label>

        <div class="flex items-end justify-end space-x-4 col-span-full">

            <x-input.submit @click.prevent="isRequest = false" color="red">
                Cancel
            </x-input.submit>

            <x-input.submit color="blue">

                <span wire:loading.delay.longer wire:loading.class="animate-spin">

                    <i class="far fa-spinner transform duration-300 text-white "></i>

                </span>

                Plan Interview

            </x-input.submit>

        </div>

    </x-form>

</div>
