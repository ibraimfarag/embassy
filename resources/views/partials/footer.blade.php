

<footer id="footer">
    <div class="container">
        <div class="col-md-3  col-sm-3">

                @if($lang=='en')
                    <h4>Website</h4>
                    <ul>
                        <li><a href="{{ url('/en/p/terms-of-use') }}">Terms of Use</a></li>
                        <li><a href="{{ url('/en/p/privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('/en/p/disclaimer') }}">Disclaimer</a></li>
                    </ul>
                @elseif($lang=='ar')
                    <h4>الصفحة</h4>
                    <ul>
                    <li><a href="{{ url('/ar/p/terms-of-use') }}">شروط الاستخدام</a></li>
                    <li><a href="{{ url('/ar/p/privacy-policy') }}">سياسة الخصوصية</a></li>
                    <li><a href="{{ url('/ar/p/disclaimer') }}">إخلاء المسؤولية</a></li>
                    </ul>
                @else
                    <h4>Website</h4>
                    <ul>
                    <li><a href="{{ url('/p/terms-of-use') }}">Nutzungsbedingungen</a></li>
                    <li><a href="{{ url('/p/privacy-policy') }}">Datenschutzrichtlinien</a></li>
                    <li><a href="{{ url('/p/disclaimer') }}">Disclaimer</a></li>
                    </ul>
                @endif
        </div>
        <div class="col-md-6  col-sm-6">
            @if($lang=='en')
                <a href="{{ url('/') }}/en/p/newsletter">Subscribe here for updates and our newsletter</a>
            @elseif($lang=='ar')
                <a href="{{ url('/') }}/ar/p/newsletter">سجل للحصول على أحدث الأخبار والنشرة الدورية</a>
            @else
                <a href="{{ url('/') }}/p/newsletter">Bitte registrieren Sie sich hier, um unseren Newsletter zu erhalten</a>
            @endif
            <!--<h4>Website</h4>
            <ul>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Disclamer</a></li>
            </ul>-->
        </div>
        <div class="col-md-3  col-sm-3">
            <ul class="socials">
                <li><a href="https://www.instagram.com/uaeinberlin/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/UAEinBerlin" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/UAEinBerlin/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a></li>
            </ul>
            <span id="copyright">
            @if($lang=='en')
				    ©Privacy policy / Rights <br/> Stand: August 2020
            @elseif($lang=='ar')
                    سياسة الخصوصية / الحقوق  
            @else
                ©Privacy policy / Rights <br/> Stand: August 2020
            @endif
					</span>
        </div>
    </div>
</footer>

<script src="{{ asset('public/js/vendor/jquery-1.11.2.min.js') }}"></script>

@if($lang=='ar')
    <!-- compiled and minified JavaScript -->
    <script
        src="https://cdn.rtlcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-B4D+9otHJ5PJZQbqWyDHJc6z6st5fX3r680CYa0Em9AUG6jqu5t473Y+1CTZQWZv"
        crossorigin="anonymous"></script>
@else
    <script src="{{ asset('public/js/vendor/bootstrap.min.js') }}"></script>
@endif

<script src="{{ asset('public/js/plugins.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>

<script src="{{ asset('public/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
<script>
    var appUrl = '{{url('/')}}';
    var fullUrl = '{{url()->current()}}';
    var lang = '{{$lang}}';
    var  currentPath = fullUrl.replace(appUrl,"");
    
    function updateUrl(){
        currentPath = window.location.href.replace(appUrl,"");
        
        if(lang=="en")
            currentPath = currentPath.replace('/en',"");
        else if(lang=="ar")
            currentPath = currentPath.replace('/ar',"");
        
        $('#deLang').attr('href',appUrl+currentPath);
        $('#enLang').attr('href',appUrl+'/en'+currentPath);
        $('#arLang').attr('href',appUrl+'/ar'+currentPath);
    }
    updateUrl();
</script>
@yield('js')

<script>
    var slidr = $('#slider').owlCarousel({
        animateOut: 'fadeOut',
        items:1,
        smartSpeed:450,
        dots: true,
        autoplay: true,
        loop: true
    });

    $('.slider-prev').on('click', function(e){ e.preventDefault(); slidr.trigger('prev.owl.carousel'); });
    $('.slider-next').on('click', function(e){ e.preventDefault(); slidr.trigger('next.owl.carousel'); });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>-->
</body>
</html>
