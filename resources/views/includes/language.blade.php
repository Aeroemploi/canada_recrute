
<a href="{{ route('switch', ['lang' => (app()->getLocale() == 'en')? 'fr' : 'en']) }}">{{ (app()->getLocale() == 'en')? 'FR' : 'EN' }}</a>

