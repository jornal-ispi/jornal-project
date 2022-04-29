@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr />
            <h3>Portefólio</h3>
            <hr />
        </div>

        <div class="col-md-3">
            <a href="#">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('assets/img/img3.png') }}" alt="" style="height: 10em;" />
                    <div class="card-body">
                        <p class="card-title">Facebook</p>
                        <p class="card-text">

                        </p>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="https://www.youtube.com/channel/UCT90bUtGQu8BOinV3dwAELg">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('assets/img/img1.png') }}" alt="" style="height: 10em;" />
                    <div class="card-body">
                        <p class="card-title">Youtube</p>
                        <p class="card-text">

                        </p>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="#">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('assets/img/img2.jpg') }}" alt="" style="height: 10em;" />
                    <div class="card-body">
                        <p class="card-title">Instagram</p>
                        <p class="card-text">

                        </p>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-3">
            <a href="https://api.whatsapp.com/send?phone=244937023710">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('assets/img/img4.png') }}" alt="" style="height: 10em;" />
                    <div class="card-body">
                        <p class="card-text">Whatsapp</p>
                        <p class="card-text">

                        </p>

                    </div>
                </div>
            </a>
        </div>


    </div>

@endsection
