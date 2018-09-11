<style>
    /* Right-aligned section inside the top navigation */
    .topnav-right {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .topnav-right a {
        color: #000000;
        font-size: 18px;
    }
</style>
<div class="topnav-right">
    <a href="{{ route('switch', ['lang' => (app()->getLocale() == 'en')? 'fr' : 'en']) }}">{{ (app()->getLocale() == 'en')? 'FR' : 'EN' }}</a>
</div>
