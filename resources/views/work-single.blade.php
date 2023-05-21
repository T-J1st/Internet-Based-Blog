@include('head')

    <!-- Start Banner Hero -->
    <div id="work_single_banner" class="bg-light w-100">
        <div class="container-fluid text-light d-flex justify-content-center align-items-center border-0 rounded-0 p-0 py-5">
            <div class="banner-content col-lg-8 m-lg-auto text-center py-5 px-3">
                <h1 class="banner-heading h2 pb-5 typo-space-line-center">{{$data->title}}
                </h1>
                <h3 class="h4 pb-2 light-300">{{$data->descr}}</h3>
                <p class="banner-footer light-300">
                    {{$data->detail}}
                </p>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Work Sigle -->
    <section class="container py-5">

        <div class="row pt-5">
            <div class="worksingle-content col-lg-8 m-auto text-left justify-content-center">
                <h2 class="worksingle-heading h3 pb-3 light-300 typo-space-line">{{$data->title}}</h2>
                <p class="worksingle-footer py-3 text-muted light-300">
                    {!! $data->contents !!}
                </p>
            </div>
        </div><!-- End Blog Cover -->
        <!-- Start Comment -->
        <div class="row justify-content-center">
            <div class="worksingle-comment-heading col-8 m-auto pb-3">
                <h4 class="h5">Comments (There are <strong>{{$num_com}}</strong> Comment at the moment)</h4>
            </div>
        </div>
    @foreach($comment as $cm)
        <div class="row pb-4">
            <div class="worksingle-comment-body col-md-8 m-auto">
                <div class="d-flex">
                    <div>
                        <img class="rounded-circle" src="./assets/img/team-05.jpg" style="width: 50px;">
                    </div>
                    <div class="comment-body">
                        <div class="comment-header d-flex justify-content-between ms-3">
                            <div class="header text-start">
                                <h5 class="h6">{{$setting->company}}</h5>
                                <p class="text-muted light-300">{{$cm->created_at}}</p>
                            </div>
                            <a href="#" class="text-decoration-none text-secondary">Rate: {{$cm->rate}}</a>
                        </div>
                        <div class="footer">
                            <div class="card-body border ms-3 light-300">
                                {{$cm->comment}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Comment -->
        @endforeach

        <div class="row pb-4">
            @if($message = Session::get("info"))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="worksingle-comment-footer col-lg-8 m-auto">
                <h4 class="h5">Leave Comment</h4>
                <form class="col-md-12 m-auto" method="POST" action="/comment" role="form">
                    @csrf
                    <input type="hidden" class="form-control form-control-lg light-300" id="inputname" name="blog_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputmessage">Your Review</label>
                        <textarea class="form-control form-control-lg light-300" id="inputmessage" name="review" placeholder="Review" rows="5"></textarea>
                    </div>

                    <div class="row py-4">
                        <div class="col-lg-6">
                            <label class="pb-2 light-300" for="inputname">Subject</label>
                            <input type="text" class="form-control form-control-lg light-300" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-lg-6">
                            <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputemail">Rate</label>
                            <select class="form-control form-control-lg light-300" name="rate">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row pt-2">
                        <div class="col-md-12 col-10 text-end">
                            <button type="submit" class="btn btn-secondary text-white px-md-4 px-2 py-md-3 py-1 radius-0 light-300">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- End Comment Form -->


    </section>
    <!-- End Work Sigle -->

    <!-- Start Related Post -->
    <article class="container-fluid bg-light">
        <div class="container">
            <div class="worksingle-related-header row">
                <h1 class="h2 py-5">Related Post</h1>
                <div class="col-md-12 text-left justify-content-center">
                    <div class="row gx-5">


                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-01.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>5
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>3
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-02.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">App Development</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Tempor incididunt ut labore et dolore.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>11
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>9
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-03.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Consectetur adipiscing elit.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>31
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>2
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </article>
    <!-- End Related Post -->
@include("footer")
