@component('mail::message')
# Hello {{ $invite_name }},
<span>
{{ $inviter_name }} dari SMKN 4 KUNINGAN telah mengundang anda.
Silahkan klik tombol di bawah ini. 
tautan ini akan kadaluarsa dalam 2 jam, Hubungi kami jika anda memerlukan tautan baru.
</span>

<img style="max-width: 100px; height: 100px; display: block; margin: 0 auto;" 
src="{{ asset('img/logo.png') }}" alt="logo.png">

@component('mail::button', ['url' => url($accept_url)])
Accept Invitation
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
