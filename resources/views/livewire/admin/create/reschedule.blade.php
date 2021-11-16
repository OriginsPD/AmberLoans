<div>

    <x-form wire:submit.prevent="{{ ($status) ? 'attended' : 'reBook' }}"
            class="w-10/12 h-auto mt-10 border border-gray-200" grid="2">

        <x-slot name="title">
        </x-slot>

        <x-input.label for="appointment_id" label="Select Appointment">

            <x-input.select wire:model.prevent="appointment_id"
                            field="appointment_id" keyType="1" :error="$errors->first('appointment_id')" >

                @forelse($bookAppointments as $bookAppointment)

                    <option value="{{ $bookAppointment->id }}"> {{ $bookAppointment->customer->first_nm }} {{ $bookAppointment->customer->last_nm }} </option>

                @empty

                    <option selected> No Data Found </option>

                @endforelse

            </x-input.select>

        </x-input.label>

        <x-input.label  for="status" label="Apply Status">

            <x-input.select wire:model.debounce.300ms="status"
                            field="Status"
                            :error="$errors->first('status')">

                <option value="0"> Reschedule</option>

                <option value="1"> Attended</option>

            </x-input.select>

        </x-input.label>

        @if($status === 0 || $status === null)

            <x-input.label for="set_date" label="Starting Value">

                <x-input.text wire:model.debounce.300ms="set_date" type="date"
                              :error="$errors->first('set_date')"/>

            </x-input.label>

            <x-input.label for="time_slot" label="Select Appointment Time Slot">

                <x-input.select wire:model.debounce.300ms="time_slot" field="Time Slot"
                                :error="$errors->first('time_slot')">

                    <option value="9:00 AM - 9:45 AM">9:00 AM - 9:45 AM</option>
                    <option value="10:00 AM - 10:45 AM"> 10:00 AM - 10:45 AM</option>
                    <option value="11:00 AM - 11:45 AM">11:00 AM - 11:45 AM</option>
                    <option value="12:00 PM - 12:45 PM">12:00 PM - 12:45 PM</option>
                    <option value="1:00 PM - 1:45 PM">1:00 PM - 1:45 PM</option>

                </x-input.select>

            </x-input.label>

        @endif

        <div class="flex items-end justify-end space-x-4 col-span-full">

            <x-input.submit @click.prevent="updateSchedule = false" color="red">

                Cancel

            </x-input.submit>

            <x-input.submit color="blue" type="submit">

                <span wire:loading.delay wire:loading.class="animate-spin">

                     <i class="far fa-spinner transform duration-300 text-white "></i>

                </span>

                Update Appointment

            </x-input.submit>

        </div>

    </x-form>

</div>
