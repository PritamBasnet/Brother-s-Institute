@extends('frontend.layout.master')
@section('f-style')
    <style>
        .Certicate-Content {
            height: auto;
            width: 100%;
        }

        .Certicate-Section {
            width: 100%;
        }

        .Certificate-Container {
            padding: 40px 0;
        }
        .Human_check{
            height: 14px !important;
            width: 14px !important;
            margin-top: 4px;
        }
        .Certificate-Btn{
            height: 45px;
            width: 140px;
            border-radius: 8px 8px 0px 8px;
            border:none;
            background-color: #2b388f;
            color: white;
            transition: 0.3s linear;
        }
        .Certificate-Btn:hover
        {
            background-color: #162581;

        }
    </style>
@endsection
@section('f-content')
    <div class="container Certificate-Container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="Certicate-Content">
                    <form action="{{ route('certificate.search') }}" method="GET" enctype="multipart/form-data">
                        <div class="form-group" style="padding: 20px;">
                            <label for="">Certificate Code</label>
                            <input type="text" name="search" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group" style="padding: 20px;">
                            <label for="">Date and Birth</label>
                            <input type="date" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group" style="padding: 20px;">
                            <input type="checkbox" class="Human_check">
                            <span class="text text-info">I am not Robot</span>
                        </div>
                        <div class="form-group" style="padding: 20px;">
                            <button class="Certificate-Btn" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="Certicate-Section">
                    <img src="{{ asset('frontend/image/certificate.gif') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
@endsection
