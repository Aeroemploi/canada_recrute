<style>
    /* Right-aligned section inside the top navigation */
    .topnav-right {
        float: right;
    }
</style>
<div class="topnav-right">
    <a href="{{ route('switch', ['lang' => (app()->getLocale() == 'en')? 'en' : 'fr']) }}">{{ (app()->getLocale() == 'en')? 'FR' : 'EN' }}</a>
</div>
