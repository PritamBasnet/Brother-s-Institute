{{-- let make the footer --}}
<section>
    <footer class="footer">
        <div class="row">
            <div class="col-md-3 col-12" style="display: flex; flex-direction:column;">
                <img src="{{ asset('frontend/image/logo.png') }}" alt="" width="100%" class="Footer-logo">
                <p class="Footer-para">We are the best computer institution.</p>
            </div>
            <div class="col-md-3 col-12" style="display: flex; flex-direction:column;">
                <h2 class="Footer-Heading">Quick Links</h2>
                <a href="/" class="Footer-Hypers">Home</a>
                <a href="/contact" class="Footer-Hypers">Contact</a>
                <a href="/certicicate-code" class="Footer-Hypers">Certificate</a>
                <a href="/about" class="Footer-Hypers">About  Us</a>
            </div>
            <div class="col-md-3 col-12" style="display: flex; flex-direction:column;">
                <h2 class="Footer-Heading">Computer Classes</h2>
                <?php
                    $link = App\Models\Courses::take(7)->get();
                ?>
                @isset($link)
                    @foreach ($link as $data)
                        <a href="{{ route('frontend.detail',$data->slug) }}" class="Footer-Hypers">{{ $data->title }}</a>
                    @endforeach
                @endisset
            </div>
            <div class="col-md-3 col-12" style="display: flex; flex-direction:column;">
                <h2 class="Footer-Heading">Contact Us</h2>
                <a href="" class="Footer-Hypers"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;+987653456</a>
                <a href="" class="Footer-Hypers"><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;brother@gmail.com</a>
                <div class="social_icons" style="padding: 0;">
                    <a href="https://www.facebook.com/brothersinstitute.com.np/"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.facebook.com/brothersinstitute.com.np/"><i class="fa-brands fa-facebook-messenger"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCOz0SyTZ1idH27bKq8_b5xg"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-12">
                <span class="Footer-para">@2022 Brother's Institute-All Right Reserve</span>
            </div>
            <div class="col-md-2 col-12"></div>
            <div class="col-md-6 col-12">
                <span class="Footer-para" style="float: right;">Designed By:- Pritam Basnet</span>
            </div>
        </div>
    </footer>
</section>
