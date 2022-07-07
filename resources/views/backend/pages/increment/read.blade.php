@extends('backend.layout.master')
@section('b-style')
    <link rel="stylesheet" href="{{ asset('backend/css/mobile.css') }}">
    <script defer src="{{ asset('backend/js/app.js') }}"></script>
    <style>
        .section-table {
            width: 95%;
            height: fit-content;
            padding: 20px;
            background-color: white;
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
            background-color: cornflowerblue;
            content: "";
            display: block;
            margin: auto;
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

        .Table-Image {
            height: 180px;
            width: 220px;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endsection
@section('b-content')
    @if (Session('update'))
        <div class="success-wrapper">
            <div class="wrapper-success">
                <i class="fa-solid fa-circle-check" style="color:#0093E9 ;"></i>
                <span class="Heading-Success">{{ Session('update') }}</span>
            </div>
            <span class="span-highligt" style="background-color: #0093E9;"></span>
            <span class="bottom-hightlight"></span>
        </div>
    @endif
    @if (Session('delete'))
        <div class="success-wrapper">
            <div class="wrapper-success">
                <i class="fa-solid fa-circle-check" style="color: red;"></i>
                <span class="Heading-Success">{{ Session('delete') }}</span>
            </div>
            <span class="span-highligt" style="background-color: red;"></span>
            <span class="bottom-hightlight"></span>
        </div>
    @endif
    <section class="section-table">
        <h1 class="course-heading animate__animated animate__rubberBand">Course Table</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Section 1</th>
                    <th scope="col">Section 2</th>
                    <th scope="col">Section 3</th>
                    <th scope="col">Section 4</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($increment)
                    @foreach ($increment as $data)
                    <tr>
                        <td>{{ $data->sec_1 }}
                            <br>
                            {{ $data->num_1 }}
                        </td>
                        <td>
                            {{ $data->sec_2 }}
                            <br>
                            {{ $data->num_2 }}
                        </td>
                        <td>
                            {{ $data->sec_3 }}
                            <br>
                            {{ $data->num_3 }}
                        </td>
                        <td>
                            {{ $data->sec_4 }}
                            <br>
                            {{ $data->num_4 }}
                        </td>
                        <td>
                            <a href="{{ route('incre.delete',$data->id) }}"
                                class="BtnDelete btn btn-danger animate__animated"><i class="fa-solid fa-trash"></i></a>
                            <a href="{{ route('incre.edit',$data->id) }}" class="BtnEdit btn btn-info animate__animated"><i
                                    class="fa-solid fa-pen"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </section>
    <script>
        const ToggleWrapper = document.querySelector('.success-wrapper');

        function makingout() {
            setInterval(() => {
                ToggleWrapper.style.display = "none";
            }, 3200)
        };
        makingout();
        // For the edit and delete button
        const BtnDelete = document.querySelectorAll('.BtnDelete');
        const BtnEdit = document.querySelectorAll('.BtnEdit');
        for (const button of BtnDelete) {
            button.addEventListener("mouseover", () => {
                button.classList.add('animate__rubberBand');
            });
            button.addEventListener("mouseout", () => {
                button.classList.remove('animate__rubberBand');
            });
        }
        for (const button of BtnEdit) {
            button.addEventListener("mouseover", () => {
                button.classList.add('animate__rubberBand');
            });
            button.addEventListener("mouseout", () => {
                button.classList.remove('animate__rubberBand');
            });
        }
    </script>
@endsection
