@extends('frontend.layout.master')
@section('f-style')
    <style>
        /* making an variable for the colors  */
        :root {
            --blue: #2b388f;
            --orange: #ef532c;
        }

        .about-headingtxt {
            display: inline-block;
        }

        .about-headingtxt::after {
            height: 2px;
            width: 10%;
            content: "";
            display: block;
            background-color:var(--blue) ;
        }

        .about-paragraph {
            font-size: 14px;
            color: gray;
            padding: 20px 0;
        }
        .about-image{
            height: auto;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }
        .about-magic{
            display: inline-block;
            position: absolute;
            opacity: 0.5;
            background-color: var(--blue);
            height: 0%;
            width: 100%;
            bottom: 0;
            left: 0;
            transition: 0.5s ease;

        }
        .about-image:hover > .about-magic{
            height: 100%;
        }
    </style>
@endsection
@section('f-content')
    {{-- about us section image and content --}}
    <section>
        <div class="container" style="padding: 60px 0;">
            <div class="row">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('frontend/image/about.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-md-4 col-12">
                    <h2 class="about-headingtxt">About Brother's Institute</h2>
                    <p class="about-paragraph">It is the best Professional computer training center in Itahari, Nepal.
                        BROTHER’S is the better place for Diploma, Computer Operator, graphics designing, web designing,
                        programming, multimedia, hardware , networking etc. It’s Primary Focus goes to Provide Professional
                        carrier and job related skills that required for any people or organizations.. Quality is the main
                        thing that brother’s Provides.
                        <br>
                        BROTHER’S is Committed to Student Satisfaction we have created a very friendly learning environment
                        with the latest computer hardware and software technologies. Whether you are new to the computer
                        industry or are looking to improve your skills, we have the right course for you.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- end --}}
    <section>
        <div class="container" style="padding: 20px 0;">
            <h2 class="about-headingtxt">Providing The Best Education</h2>
            <div class="row" style="padding: 20px 0;">
                <div class="col-md-4 col-12">
                    <div class="about-image">
                        <img src="{{ asset('frontend/image/aboutimg.jpg') }}" alt="" width="100%">
                        <span class="about-magic"></span>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="about-image">
                        <img src="{{ asset('frontend/image/aboutimg2.jpg') }}" alt="" width="100%">
                        <span class="about-magic"></span>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="about-image">
                        <img src="{{ asset('frontend/image/aboutimg3.jpg') }}" alt="" width="100%">
                        <span class="about-magic"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section></section>
@endsection
