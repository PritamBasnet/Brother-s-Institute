{{-- This section is for the icon and content --}}
<section class="section-top">
    <div class="bt_row1">
        <div class="social_links">
            <a href="/about" class="AboutUsLink" style="border-right: 1px solid gray;">about us </a>
            <a href="" class="AboutUsLink" style="border-right: 1px solid gray;">privacy policy</a>
            <a href="/contact" class="AboutUsLink" style="border-right: 1px solid gray;">contact</a>
            <a href="" class="AboutUsLink">email</a>
        </div>
        <div class="social_icons">
            <a href="https://www.facebook.com/brothersinstitute.com.np/"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.facebook.com/brothersinstitute.com.np/"><i class="fa-brands fa-facebook-messenger"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCOz0SyTZ1idH27bKq8_b5xg"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <img src="{{ asset('frontend/image/logo.png') }}" alt="" width="100%">
            </div>
            <ol class="nav_list">
                <li class="nav_item"><a href="/" class="nav_link">home</a></li>
                <li class="nav_item drop-down"><a href="#" class="nav_link">computer classes</a>
                    <ol class="DropDown-List">
                        <?php
                            $course = App\Models\Courses::take(7)->get();
                            ?>
                        @isset($course)
                            @foreach ($course as $data)
                                <li class="DropDown-Item" style="border-bottom: 0.2px dashed gray;"><a href="{{ route('frontend.detail',$data->slug) }}" class="DropDown-Link">{{ $data->title }}</a></li>
                            @endforeach
                        @endisset
                    </ol>
                </li>
                <li class="nav_item"><a href="/certicicate-code" class="nav_link">Certificate</a></li>
                <li class="nav_item"><a href="/contact" class="nav_link">Contact</a></li>
                <li class="nav_item"><a href="/about" class="nav_link">About Us</a></li>
                <li class="nav_item"><a href="#" class="nav_link"
                        style="border-right: 2px solid gray;">cmat&nbsp;&nbsp;&nbsp;</a></li>
                <li class="nav_item" style="position: relative;"><a href="#" class="nav_link">
                        <i class="fa-solid fa-magnifying-glass search_open" onclick="openSearch();"></i>
                        <i class="fa-solid fa-x search_close" style="display: none;"></i>
                    </a>
                    <div class="SearchBox">
                        <input type="text" class="SearchIt" placeholder=" Search">
                    </div>
                </li>
            </ol>
        </nav>
    </header>
</section>
