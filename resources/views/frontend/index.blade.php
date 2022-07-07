@extends('frontend.layout.master')
@section('f-content')
    <section>
        <div class="row sweeper-me" id="scroll-hero" style="padding: 20px 0;">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url('{{ asset('frontend/image/backgrond1.jpg') }}');">
                    </div>
                    <div class="swiper-slide" style="background-image:url('{{ asset('frontend/image/background2.jpg') }}');">
                    </div>
                    <div class="swiper-slide" style="background-image:url('{{ asset('frontend/image/background3.jpg') }}');">
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-container" style="padding: 20px 0;">
            <i class="fa-solid fa-arrow-left swiper-button-next-icon"></i>
            <i class="fa-solid fa-arrow-right swiper-button-prev-icon"></i>
        </div>
    </section>
    {{-- let make the section for the courses --}}
    <section>
        <div class="row" style="background-color: #eaebf4; padding:60px 0;">
            <div class="row CoursesRow">
                <h2 class="Text-Courses" style="padding: 10px 0;">Computer Classes</h2>
                <br>
                <?php
                $course = App\Models\Courses::take(6)->get();
                ?>
                @isset($course)
                    @foreach ($course as $data)
                        <div class="col-md-4 col-12" style="padding-top: 20px;" data-aos="fade-up" data-aos-duration="3000">
                            <div class="course-box">
                                <a href="{{ route('frontend.detail',$data->slug) }}">
                                    <img src="{{ asset('backend/images/' . $data->image) }}" alt="" width="100%"
                                        class="Course-image">
                                    <span class="course-heading">{{ $data->title }}</span>
                                    <span class="course-paragraph">{{ $data->short_description }}</span>
                                    <span class="Course-Price">{{ $data->price }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="Btn-Course">
                <a class="course-btn">View All Courses</a>
            </div>
        </div>
    </section>
    {{-- let us make the section for the news --}}
    <section>
        <div class="row" style="padding:60px;">
            <div class="col-md-6 col-12">
                <div class="Latest-Wrapper">
                    <h2 class="Latest-Heading">Latest News</h2>
                    <ol class="Latest-List">
                        <?php
                        $notice = App\Models\Latest::take(7)->get();
                        ?>
                        @isset($notice)
                            @foreach ($notice as $data)
                                <li class="Latest-Item">{{ $data->notice }}</li>
                                <hr>
                            @endforeach
                        @endisset
                    </ol>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <iframe style="padding: 20px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14262.35563309709!2d87.2802645!3d26.6616417!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x776bbebd659e123e!2sBrother&#39;s%20Institute!5e0!3m2!1sen!2snp!4v1656791339311!5m2!1sen!2snp"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    {{-- let us make the animated counter section --}}
    <section style="padding: 80px 0;" class="sectionWorkdata">
        <div class="row counter-section">
            <?php
            $increment = App\Models\increment::take(1)->get();
            ?>
            @isset($increment)
                @foreach ($increment as $data)
                    <div class="col-md-3 col-12">
                        <h1 class="counter-number" data-number="{{ $data->num_1 }}">0+</h1>
                        <p>{{ $data->sec_1 }}</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <h1 class="counter-number" data-number="{{ $data->num_2 }}">0+</h1>
                        <p>{{ $data->sec_2 }}</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <h1 class="counter-number" data-number="{{ $data->num_3 }}">0+</h1>
                        <p>{{ $data->sec_3 }}</p>
                    </div>
                    <div class="col-md-3 col-12">
                        <h1 class="counter-number" data-number="{{ $data->num_4 }}">0+</h1>
                        <p>{{ $data->sec_4 }}</p>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>
@endsection
