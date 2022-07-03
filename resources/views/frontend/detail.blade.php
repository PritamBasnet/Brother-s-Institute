@extends('frontend.layout.master')
@section('f-style')
<style>
    .detail-1row{
        padding: 20px 0;
        display: flex;
        justify-content: center;
        height: fit-content;
    }
    .Detail-heading{
        font-size: 2rem;
        text-align: center;
    }
    .detail-para{
        font-size: 14px;
        text-align: center;
        color: gray;
        display: block;
    }
    .detail-image{
        object-fit: cover;
        object-position: top;
    }
</style>
@endsection
@section('f-content')
    <div class="container">
        <div class="row detail-1row">
            <h2 class="Detail-heading">{{ $detail->title }}</h2>
            <span class="detail-para">{{ $detail->short_description }}</span>
            <span class="detail-para">rs:-{{ $detail->price }}</span>
            <img src="{{ asset('backend/images/'.$detail->image) }}" alt="" class="detail-image" width="80%" height="600px" style="padding: 15px;">
            <div class="detail-description">
                {!! $detail->editordata !!}
            </div>
        </div>
    </div>
@endsection
