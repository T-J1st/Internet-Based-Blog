@include('head')

    <!-- Start Banner Hero -->
    <section class="bg-light w-100">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <div class="col-lg-6 text-start">
                    <h1 class="h2 py-5 text-primary typo-space-line">About Us</h1>
                    <p class="light-300">
                        {!! $setting->aboutus !!}
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="./assets/img/banner-img-02.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->

    <!-- Start Contact -->
    <section class="banner-bg bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-4 p-3">
                    <form action="#" method="get"><h1 class="h2 text-center">Stay up to date with us</h1>
                    <div class="input-group py-3">

                        <input name="email" type="text" class="form-control form-control-lg rounded-pill rounded-end" id="email" placeholder="Your Email" aria-label="Your Email">
                        <button class="btn btn-secondary text-white btn-lg rounded-pill rounded-start px-lg-4" type="submit">Subsribe</button>
                    </div>
                    <p class="text-center light-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->


@include("footer")
