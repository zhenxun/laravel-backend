<footer class="footer">
    <div class="container">
    <span>{!! Session::has('footer-text')? Session::get('footer-text'):config('global.footer') !!}</span>
    </div>
</footer>
