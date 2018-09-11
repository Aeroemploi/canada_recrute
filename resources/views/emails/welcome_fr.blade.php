@extends('emails/layouts/emailTemplate')

@section('content')
    <div class="header">
        <h1>
            Auray Sourcing
        </h1>
    </div>
    <div class="container">
        {{-- Body --}}
        # Bienvenue  {!! $user_array['user_name'] !!},<br>

        Nous vous remerçions de vous êtes inscrit pour l'événement canada recrute.<br />

        Cordialement,
    </div>
    <div class="footer">
        &copy; 2018 Tous les droits réservé à Auray Sourcing
    </div>
@endsection
