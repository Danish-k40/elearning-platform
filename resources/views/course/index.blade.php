@extends('layouts.app')

<main id="main">
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $item)
                                  @php
                                      $status = $item->history->where('status', 1)->first() ? 'On Going' : 'Completed';
                                  @endphp
                                  <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->course_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$status}}</td>
                                    <td><a href="{{route('view.course', ['id' => $item->course_name])}}"><i class="bi bi-eye"></i></a></td>
                                  </tr>
                                @empty
                                <tr>
                                    
                                </tr>
                                @endforelse
                              
                             
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>