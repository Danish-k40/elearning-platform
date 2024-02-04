@extends('layouts.app')

@section('content')
<main id="main">
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            @if(empty($course->module)) 

            <div class="congratulation-area text-center mt-5">
                <div class="container">
                    <div class="congratulation-wrapper">
                        <div class="congratulation-contents center-text">
                            <div class="congratulation-contents-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <h4 class="congratulation-contents-title"> Congratulations! </h4>
                            <p class="congratulation-contents-para"> Your completed this course successfully. </p>
                            <div class="btn-wrapper mt-4">
                                <a href="{{route('dashboard')}}" class="cmn-btn btn-bg-1"> Go to Home </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else
                <div class="section-title" style="margin-top: 30px">
                    <h3>Module {{$course->module->module}}</h3>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <video id="videoPlayer" width="100%" height="315" controls>
                                <source src="{{$course->module->link}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                <div style="float: right; margin-top: 30px">
                    <button type="button" class="btn btn-success" onclick="next('{{$course->course_id}}', '{{$course->vedio_id}}')">Next</button>
                </div>
            @endif

        </div>
    </section>
</main>

<script>

    const next = async (course_id, vedio_id) => {
        var url = `{{ route('get.next.module') }}`;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        try {
            const res = await $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    course_id: course_id,
                    vedio_id: vedio_id,
                }
            });
            
            if (res.status) {
                location.reload()
            } else {
                notifyError(res.message);
            }
        } catch (err) {
            notifyError(err.responseJSON.message);
        }
    };
    
</script>
@endsection
