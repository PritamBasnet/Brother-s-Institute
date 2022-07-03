<div class="wrapper_cover">
    <div class="Siderbar-Wrapper">
        <span class="pipe pipe1"></span>
        <span class="pipe pipe-n"></span>
        <span class="pipe pipe2"></span>
    </div>
</div>
<section class="Side-Bar">
    <ol class="SideBar-List">
        <li class="SideBar-Item"><a href="/" class="SideBar-Link">Home</a></li>
        <li class="SideBar-Item drop-down"><a href="#" class="SideBar-Link">computer classes</a>
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
        <li class="SideBar-Item"><a href="/certicicate-code" class="SideBar-Link">Certificate</a></li>
        <li class="SideBar-Item"><a href="/contact" class="SideBar-Link">Contact</a></li>
        <li class="SideBar-Item"><a href="/about" class="SideBar-Link">About Us</a></li>
        <li class="SideBar-Item"><a href="" class="SideBar-Link">CMAT</a></li>

    </ol>
</section>
