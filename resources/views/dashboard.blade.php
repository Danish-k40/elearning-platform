@extends('layouts.app')

<main id="main">

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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="addToCart('{{$course['id']}}')">Start Learning</button>
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
        </div>


    </section><!-- End Popular Courses Section -->
</main>

@push('scripts')
<script>
    $(() => {})

    const addToCart = async (id) => {
        var url = `{{ route('add.course') }}`;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        try {
            const res = await $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    id: id
                }
            });
            
            if (res.status) {
                notifySuccess(res.message);
            } else {
                notifyError(res.message);
            }
        } catch (err) {
            notifyError(err.responseJSON.message);
        }
    };

</script>
@endpush