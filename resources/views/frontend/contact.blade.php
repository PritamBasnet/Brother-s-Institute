@extends('frontend.layout.master')
{{-- for styling --}}
@section('f-style')
    <style>
        .br-form {
            height: 40px;
            width: 440px;
            background-color: #eaebf4;
            position: relative;
            border: 1.5px solid var(--blue);
            border-radius: 4px;
            margin: 28px 0;
        }

        .input-br {
            background-color: transparent;
            border: none;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .input-br:focus~.br-label,
        .input-br:valid~.br-label {
            transform: translateY(-28px);
            color: var(--orange);
        }

        .br-label {
            position: absolute;
            left: 4px;
            top: 10px;
            font-size: 12px;
            transition: 0.3s;
            pointer-events: none;
        }

        .form-active>.br-label {
            transform: translateY(-28px);
        }

        .input-br:focus {
            outline: none;
            background: white;
        }

        .input-br:focus~span {
            color: green;
        }

        .about-headingtxt::after {
            height: 2px;
            width: 10%;
            content: "";
            display: block;
            background-color: var(--blue);
        }

        .contactForm-Btn {
            height: 50px;
            width: 150px;
            background-color: var(--blue);
            color: white;
            border: none;
            border-radius: 4px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .contactForm-Btn:hover {
            background-color: #0f1f83;
        }

        .success-wrapper {
            height: 90px;
            width: 350px;
            position: fixed;
            right: 0;
            background: white;
            /* border: 1px solid red; */
            top: 80%;
            z-index: 12;
            animation: toggle 0.3s 1;

        }

        @keyframes toggle {
            0% {
                transform: translateX(350px);
            }

            100% {
                transform: translateX(0px);
            }
        }

        .span-highligt {
            width: 2px;
            height: 100%;
            background-color: chartreuse;
            display: inline-block;
            left: 0;
            top: 0;
            z-index: 2;
            position: absolute;
        }

        .wrapper-success {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100%;
            width: 100%;
            position: absolute;
            background-color: white;
            top: 0;
            /* background-color: rebeccapurple; */
        }

        .Heading-Success {
            font-size: 1rem;
        }

        .bottom-hightlight {
            height: 3px;
            width: 0%;
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            animation-delay: 0.3s;
            animation: slow 3s 1;

        }

        @keyframes slow {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }
        .Description-Group{
            width: 100%;
            background-color: #eaebf4;
            border: 1.5px solid var(--blue);
            border-radius: 4px;
            position: relative;
        }
        .input-br-des
        {
            position: relative;
            width: 100%;
            /* background: none; */
            background-color: transparent;
            border: none;
            z-index: 2;

        }
        .Description-Label{
            position: absolute;
            left: 4px;
            top: 10px;
            font-size: 12px;
            transition: 0.3s;
            pointer-events: none;
            /* z-index: 2; */
            color: black;

        }
        .input-br-des:focus{
            outline: none;
        }
        .input-br-des:focus~.Description-Label,
        .input-br-des:valid~.Description-Label {
            transform: translateY(-28px);
            color: var(--orange);
        }
    </style>
@endsection
{{-- end styling --}}
@section('f-content')
    @if (Session('Success'))
        <div class="success-wrapper">
            <div class="wrapper-success">
                <i class="fa-solid fa-circle-check"></i>
                <span class="Heading-Success">{{ Session('Success') }}</span>
            </div>
            <span class="span-highligt"></span>
            <span class="bottom-hightlight"></span>
        </div>
    @endif
    <section>
        <div class="container" style="padding: 80px 0;">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 class="about-headingtxt">Contact Us</h2>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="br-form">
                            <input type="text" name="f_name" class="input-br" required>
                            <label for="" class="br-label">First Name</label>
                        </div>
                        <div class="br-form">
                            <input type="text" name="l_name" class="input-br" required>
                            <label for="" class="br-label">Last Name</label>
                        </div>
                        <div class="br-form">
                            <input type="text" name="email" class="input-br" required>
                            <label for="" class="br-label">Email</label>
                        </div>
                        <div class="br-form">
                            <input type="number" name="phone" class="input-br" required>
                            <label for="" class="br-label">Phone num</label>
                        </div>
                        <div class="Description-Group">
                            <textarea name="info" placeholder="" width="440px" class="input-br-des" id="" cols="30"
                            rows="10"></textarea>
                            <label class="Description-Label">Description</label>
                        </div>
                        {{-- <div class="br-form" style="height: 80px !important;" >
                            <input type="text" class="input-br" required>
                            <label for="" class="br-label">More info</label>
                        </div> --}}
                        <button type="submit" class="contactForm-Btn">Send</button>
                    </form>
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('img/95852-contact.gif') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script>
        const ToggleWrapper = document.querySelector('.success-wrapper');

        function makingout() {
            setInterval(() => {
                ToggleWrapper.style.display = "none";
            }, 3200)
        };
        makingout();
    </script>
@endsection
