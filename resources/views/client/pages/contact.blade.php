@extends('client.layout.main')

@section('content-client')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('client/img/photos/bg14.png') }}">
        <div class="container pt-18 pb-15 pt-md-20 pb-md-19 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <div class="post-category text-line text-white">
                            <a href="" class="text-reset" rel="category">Contact</a>
                        </div>
                        <!-- /.post-category -->
                        <h1 class="display-2 mb-4 text-white">Get In Touch</h1>

                        <!-- /.post-meta -->
                    </div>
                    <!-- /.post-header -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single mt-n17">
                        <div class="card">

                            <div class="card-body">
                                <div class="classic-view">
                                    <article class="post">
                                        <div class="post-content mb-5">
                                            <h2 class="display-4 mb-3 text-center">Drop Us a Line</h2>
                                            <p class="lead text-center mb-10">Reach out to us from our contact form and we
                                                will get back to you shortly.</p>
                                            <form class="contact-form" method="post" action="{{ url('contact') }}">
                                                @csrf
                                                <div class="row gx-4">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input id="form_name" type="text" name="first"
                                                                class="form-control" placeholder="Jane" required>
                                                            <label for="form_name">First Name *</label>

                                                        </div>
                                                    </div>
                                                    <!-- /column -->
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input id="form_lastname" type="text" name="last"
                                                                class="form-control" placeholder="Doe" required>
                                                            <label for="form_lastname">Last Name *</label>

                                                        </div>
                                                    </div>
                                                    <!-- /column -->
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input id="form_email" type="email" name="email"
                                                                class="form-control" placeholder="jane.doe@example.com"
                                                                required>
                                                            <label for="form_email">Email *</label>

                                                        </div>
                                                    </div>
                                                    <!-- /column -->
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input id="form_subject" type="text" name="subject"
                                                                class="form-control" placeholder="subject" required>
                                                            <label for="form_subject">Subject *</label>
                                                        </div>
                                                    </div>
                                                    <!-- /column -->
                                                    <div class="col-12">
                                                        <div class="form-floating mb-4">
                                                            <textarea id="form_message" name="description" class="form-control" placeholder="Your message" style="height: 150px"
                                                                required></textarea>
                                                            <label for="form_message">Message *</label>

                                                        </div>
                                                    </div>
                                                    <!-- /column -->
                                                    <div class="col-12 text-center">
                                                        @if (session('success'))
                                                            <div class="alert alert-success alert-dismissible fade show"
                                                                role="alert">
                                                                {{ session('success') }}
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @endif
                                                        <input type="submit"
                                                            class="btn btn-primary rounded-pill btn-send mb-3"
                                                            value="Send message">

                                                    </div>
                                                    <!-- /column -->
                                                </div>
                                                <!-- /.row -->
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
    </section>
@endsection
