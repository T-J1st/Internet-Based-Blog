@section("title",$setting->title)
@section("descr",$setting->description)
@section("keyword",$setting->keyword)
@section("keyword",\Illuminate\Support\Facades\Storage::url($setting->image))
@include('head')
<!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light">
        <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>

                </ol>s
                <div class="carousel-inner">
                    @php
                    $i=0
                    @endphp
                    @foreach($sliderdata as $rs)
                        @if ($i == 0)
                            <div class="carousel-item active">
                        @else
                                    <div class="carousel-item">
                        @endif
                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    {{$rs->title}}
                              </h1>
                                <p class="banner-body text-muted py-3 mx-0 px-0">
                                    {{$rs->detail}}
                              </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="/blogsingle/{{$rs->id}}" role="button">Read Now</a>
                            </div>
                        </div>
                    </div>
                        @php
                            $i=1
                        @endphp
                    @endforeach

                </div>

                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->



    <!-- Start Service -->
    <section class="service-wrapper py-3">

    <!-- Start View Work -->
    <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-box bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">Great transformations successful</h3>
                    <p class="light-300">Quis ipsum suspendisse ultrices gravida.</p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="#" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">View Our Work</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End View Work -->

    <!-- Start Recent Work -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Recent Blogs</h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">
                @foreach($bloglist as $bl)
                <!-- Start Recent Work -->
                <div class="col-md-4 mb-3">
                    <a href="/blogsingle/{{$bl->id}}" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="{{Storage::url($bl->image)}}" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                <h3 class="card-title light-300">{{$bl->title}}</h3>
                                <p class="card-text">{{$bl->detail}}</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End Recent Work -->

@include("footer")
