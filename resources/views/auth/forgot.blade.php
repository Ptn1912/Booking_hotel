@component('mail::message')
    <p>Hello {{ $user->name }},</p>

        <tr>
            @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent
        </tr>
        <tr>
    <p>In case you have any issues recovering your password, please contact us.</p></tr>

   <tr> Thanks<br/></tr>
    {{ config('app.name') }}
@endcomponent

