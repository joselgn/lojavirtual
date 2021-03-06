@section('conteudo-slide')

    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <a href="{{ url('/') }}"><img style="width:100%" src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/1.png') }}" alt="special offers"/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="{{ url('/') }}"><img style="width:100%" src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/2.png') }}" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="{{ url('/') }}"><img src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/3.png') }}" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="{{ url('/') }}"><img src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/4.png') }}" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="{{ url('/') }}"><img src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/5.png') }}" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="{{ url('/') }}"><img src="{{ asset('libraries/bootstrap-shop/themes/images/carousel/6.png') }}" alt=""/></a>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

@endsection
