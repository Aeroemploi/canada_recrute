@extends('emails/layouts/emailTemplate')

@section('content')
    <div class="header">
        <h1>
            Auray Sourcing
        </h1>
    </div>
    <div class="container">
        # Welcome  {!! $user_array['user_name'] !!},<br>

        We thank you for your subscription of the canada recruit events.<br />
        Nous vous remerçions de vous êtes inscrit pour l'événement canada recrute.<br />


        Regards,
    </div>
    <div class="footer">
        &copy; 2018All right reserved to Auray Sourcing
    </div>
@endsection
