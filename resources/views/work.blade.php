@include('head')


    <!-- Start Our Work -->
    <section class="container py-5">
        <div class="row justify-content-center my-5">
            <div class="filter-btns shadow-md rounded-pill text-center col-auto">
                @foreach($category as $ct)
                <a class="btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active"  href="{{route('blogcategory',['id'=>$ct->id])}}">{{$ct->title}}</a>
                @endforeach
            </div>
        </div>

        <div class="row projects gx-lg-5">
            @foreach($blog as $bg)
            <a href="/blogsingle/{{$bg->id}}" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business">
                <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                    <img class="card-img-top" src="{{Storage::url($bg->image)}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">{{$bg->title}}</h5>
                        <p class="card-text light-300 text-dark">
                            {{$bg->description}}
                        </p>
                        <span class="text-decoration-none text-primary light-300">
                              Read more <i class='bx bxs-hand-right ms-1'></i>
                          </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row">
            <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary text-white">Previous</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-light">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">2</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary text-white">Next</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Work -->

@include("footer")
