@component('mail::message')
    # Dear Mr/Ms. {{ $details['name'] }}

    We would like to inform you of that Interview for the loan you have requested has been set

    You are Required to Be in Branch on {{ $details['date'] }} At {{ $details['time'] }}

    Make the Necessary arrangements for the Interview visit our website to view
    Documents needed for the Interview before the day of the interview

    Due Note at missing the interview will lead to you having to apply again

    @component('mail::button', ['url' => '127.0.0.1:8000'])
        View Requirement
    @endcomponent


    Thanks,
    {{ config('app.name') }}
@endcomponent
