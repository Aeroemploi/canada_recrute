@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Auray Sourcing
        @endcomponent
    @endslot

    {{-- Body --}}
    # Bienvenue  {!! $user['user_name'] !!},<br>

    Nous vous remerçions de vous êtes inscrit pour l'événement canada recrute.<br />


    Cordialement,

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        &copy; 2018 Tous les droits réservé à Auray Sourcing
        @endcomponent
    @endslot
@endcomponent
