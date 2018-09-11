@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Auray Sourcing
        @endcomponent
    @endslot

    {{-- Body --}}
    # Welcome  {!! $user['user_name'] !!},<br>

    We thank you for your subscription of the canada recruit events.<br />
    Nous vous remerçions de vous êtes inscrit pour l'événement canada recrute.<br />


    Regards,

    {{-- Footer --}}
    @slot('footer')
    @component('mail::footer')
    &copy; 2018 Tous les droits réservé à Auray Sourcing
@endcomponent
@endslot
@endcomponent
