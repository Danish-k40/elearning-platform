@extends('layouts.app')

<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <h1>Learning Today,<br>Leading Tomorrow</h1>
        <h2>We are team of talented designers making websites with Bootstrap</h2>
        <a href="" class="btn-get-started">Get Started</a>
    </div>
</section>

<main id="main">

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</li>
                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                            mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-6 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{$userCount}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Students</p>
                </div>

                <div class="col-lg-6 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ count($courses) }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Courses</p>
                </div>



            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Courses</h2>
                <p>Popular Courses</p>
            </div>

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @forelse ($courses as $course)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch courceCard">
                    <div class="course-item">
                        <img src="{{ $course['courseImgUrl'] }}" class="img-fluid" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ $course['cefr_score_description'] }}</h4>
                            </div>

                            <h3><a href="course-details.html">{{ $course['name'] }}</a></h3>
                            <p>{{ $course['headline'] }}</p>
                            <div class="trainer d-flex justify-content-between align-items-center">


                                <div class="trainer-profile d-flex align-items-center">
                                    <button type="button" class="btn" style="background-color: #33338e; color: white" data-bs-toggle="modal" data-bs-target="#loginModal">Start Learning</button>  
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                    @for ($i = 0; $i <= ($course['rating'] ?? 0); $i++) <span id="boot-icon" class="bi bi-star-fill" style="font-size: 1rem; color: rgb(255, 210, 48);"></span>
                                        @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>

        </div>

        <!-- Modal -->





        <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-horizontal" action="{{ route('login') }}" method="POST" onsubmit="login(this)">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1">

                            </div>


                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <a onclick="openRegisterForm()">create an account</a>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>






    </section><!-- End Popular Courses Section -->


    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" action="{{ route('register') }}" method="POST" onsubmit="register(this)">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                        @error('password_confirmation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-3 d-grid">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</main>

@push('scripts')
<script>
    $(() => {})


    const openLoginForm = async () => {
        $('#loginModal').modal('show');
    }

    const openRegisterForm = async () => {
        $('#loginModal').modal('hide');
        $('#registerModal').modal('show');
    }

    const register = async (form) => {
        event.preventDefault();
        var formElements = new FormData(form);
        $('.invalid-feedback').remove();

        let url = form.action;
        let data = getForm(form);

        const res = await $.post(`${url}`, data)
            .then((result) => {
                window.location.href = "{{ route('dashboard') }}";
            })
            .catch((err) => {
                if (err.status === 422) {
                    formValidationError(form, err.responseJSON.errors);
                }
            });
    };


    const login = async (form) => {
        event.preventDefault();
        var formElements = new FormData(form);
        $('.invalid-feedback').remove();

        let url = form.action;
        let data = getForm(form);

        const res = await $.post(`${url}`, data)
            .then((result) => {
                window.location.href = "{{ route('dashboard') }}";
            })
            .catch((err) => {
                if (err.status === 422) {
                    formValidationError(form, err.responseJSON.errors);
                }
            });
    };
</script>
@endpush