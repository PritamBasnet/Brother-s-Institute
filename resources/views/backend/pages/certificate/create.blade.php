@extends('backend.layout.master')
@section('b-style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->

    <style>
        .course-section {
            width: 90%;
            background-color: white;
            height: fit-content;
            padding: 20px;
            border-radius: 5px 0px 5px 5px;
            margin: auto;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .course-heading {
            font-size: 2rem;
            text-align: center;
        }

        .course-heading::after {
            height: 2px;
            width: 30px;
            content: "";
            display: block;
            margin: auto;
            background-color: cornflowerblue;
        }

        .course-field {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .course-input {
            height: 45px;
            border: none;
            background-color: gainsboro;
            width: 80%;
            font-family: sans-serif;
            border-radius: 3px;
        }

        .course-input:focus {
            outline: none;
            outline: 1.5px solid cornflowerblue;
        }

        .course-btn {
            height: 45px;
            width: 140px;
            border: none;
            color: white;
            background-color: cornflowerblue;
            border-radius: 8px 0px 8px 8px;
        }

        .course-btn:hover {
            background-color: rgb(86, 140, 240);
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
    </style>
@endsection
@section('b-content')
    <section class="course-section">
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
        <form action="{{ route('certificate.store') }}" method="POST" class="course-form" enctype="multipart/form-data">
            @csrf
            <h1 class="course-heading animate__animated animate__rubberBand">Upload Certificate</h1>
            <div class="course-field">
                <label for="" class="course-label">Name</label>
                <input type="text" name="name" id="" class="course-input" value="{{ old('name') }}">
                @error('name')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="course-field">
                <label for="" class="course-label">Certificate Code</label>
                <input type="number" name="certificate_no" id="" class="course-input" value="{{ old('certificate_no') }}">
                @error('certificate_no')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="course-field">
                <label for="" class="course-label">Certificate Pic</label>
                <input type="file" name="image" id="" value="{{ old('image') }}">
                @error('image')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="course-field">
                <label for="" class="course-label">Date of Birth</label>
                <input type="date" name="birth" id="" class="course-input" value="{{ old('birth') }}">
                @error('birth')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="course-field">
                <textarea id="summernote" name="description">
                    {{ old('description') }}
                </textarea>
                @error('description')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="course-field">
                <button class="course-btn animate__animated" type="submit">Upload</button>
            </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Enter the description',
            tabsize: 2,
            height: 100
        });
        const ToggleWrapper = document.querySelector('.success-wrapper');

        function makingout() {
            setInterval(() => {
                ToggleWrapper.style.display = "none";
            }, 3200)
        };
        makingout();
    </script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
@endsection
