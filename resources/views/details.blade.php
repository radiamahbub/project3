@extends('layouts.userLayout')

@section('title', $course->name . ' Details')

@push('css')
<style>
    /* Popover background and text */
    .popover {
      background-color: #f0f8ff; /* Light blue background */
      border: 2px solid #fae5d3 ; /* Blue border 74b7ff*/
      color: #333; /* Text color */
    }

    /* Popover title */
    .popover-header {
      background-color: #a9dfbf; /* Blue background  #007bff*/
      color: white; /* White text */
      font-weight: bold;
    }

    /* Popover arrow color */
    .popover.bs-popover-auto[data-popper-placement^="top"] .popover-arrow::before {
      border-top-color: #007bff;
    }
    .popover.bs-popover-auto[data-popper-placement^="bottom"] .popover-arrow::before {
      border-bottom-color: #007bff;
    }

    /* Popover content padding and font */
    .popover-body {
      padding: 10px;
      font-size: 14px;
    }

    /* enrollment */
    .enrollment-btn {
      font-size: 1.25rem;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }
    .enrollment-btn:hover {
      background-color: #7ebfeb;
      transform: scale(1.05);
    }
  </style>

@endpush

@section('content')

<section>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        {{-- <video src="{{ asset('video/basic.mp4') }}" width="600" height="380" style="object-fit: cover;" autoplay muted loop controls></video> --}}
                        <!-- Video Section -->
                    @if($course->video)
                        <video src="{{ asset($course->video) }}" width="600" height="380" style="object-fit: cover;" autoplay muted loop controls></video>
                    @else
                        <img class="img-fluid" src="{{ asset($course->image) }}" alt="{{ $course->name }}">
                    @endif
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">

                    <h1 class="mb-4" style="color:#b2f10b">{{ $course->name }}</h1>
                    <p class="mb-4" style="color:#ca680c"><img src="{{ asset('image/icons8-goal-70.png') }}">{{ $course->details }}</p>
                    <hr>
                    <p class="mb-4">আমাদের কোর্সসমূহের মাধ্যমে আপনার লক্ষ্য অর্জন করুন এবং নিজেকে শক্তিশালী করুন</p>
                    <p class="mb-4">আমরা প্রতিভাবান প্রশিক্ষকদের সাথে সেরা মডিউল অফার করি</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>বেসিক থেকে অ্যাডভান্সড লেভেল</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>অনলাইন ক্লাস</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>ক্লাস রেকর্ডিং এ লাইফটাইম এক্সেস</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>দক্ষ প্রশিক্ষক</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>সহজ ভর্তি</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>প্রফেশনাল সার্টিফিকেট</p>
                        </div>
                    </div>
                    @if(Auth::check() && Auth::user()->role === 'user')
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="text-start"><a class="btn btn-primary py-2 px-2 mt-2 enrollment-btn" href="{{ route('addStudent') }}" id="actionButton">এখনই ভর্তি হোন</a></p>
                    <p class="text-success fw-bold text-end me-3">&#2547;{{ $course->fee }} টাকা</p>
                    </div>
                    <hr>

                    @endif
                </div>
                <div>
                    <h6 class="section-title bg-white text-start text-primary pe-3 mb-4">কোর্সসমূহের বিস্তারিত । কতগুলো ক্লাস এবং কত দিন সময় লাগবে?</h6>
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><img src="{{ asset('image/icons8-start-64.png') }}"> ব্যাচ শুরু</h5>
                              <p class="card-text ps-3 fw-bold">{{ \Carbon\Carbon::parse($course->batch_start)->format('d M, Y') }}</p>
                              <h5 class="card-title"><img src="{{ asset('image/icons8-deadline-64.png') }}"> ভর্তি শেষ</h5>
                              <p class="card-text ps-3 fw-bold">{{ \Carbon\Carbon::parse($course->admission_end)->format('d M, Y') }}</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><img src="{{ asset('image/icons8-class-64.png') }}"> লাইভ ক্লাস</h5>
                              <p class="card-text ps-3 fw-bold"><i class="bi bi-calendar2-check-fill"></i> {{ $course->live_class_time }}</p>
                              <h5 class="card-title"><img src="{{ asset('image/icons8-relax-64.png') }}"> ভর্তি চলছে</h5>
                              <p class="card-text ps-3 fw-bold"><i class="bi bi-ui-checks-grid"></i> 1st Batch</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><img src="{{ asset('image/icons8-list-64.png') }}"> কতগুলো ক্লাস</h5>
                                <p class="card-text ps-3 fw-bold"><i class="bi bi-laptop-fill"></i> {{ $course->live_classes }} টি  লাইভ ক্লাস</p>
                                <p class="ps-3 fw-bold"><i class="bi bi-stack"></i> {{ $course->projects }} টি প্রজেক্টসহ</p>
                                <p class="text-info fw-bolder">Classes can be extended if needed<img src="{{ asset('image/icons8-trust-50.png') }}"></p>
                              </div>
                            </div>
                          </div>
                      </div>
                    <h6 class="section-title bg-white text-start text-primary pe-3 mt-2"> কিভাবে শিখবেন ?</h6>
                    <div class="row mb-3">
                        <div class="col-6 offset-0 g-0 ps-2">
                            <div class="card mt-3">
                                <h5 class="card-header"><img src="{{ asset('image/icons8-topic-70.png') }}">Topics</h5>
                                <div class="card-body">
                                  <ul class="list-unstyled">
                                    <li><i class="bi bi-check-square-fill ps-4" style="color: #d4efdf"></i><a class="text-black" href="{{asset('files/file1.pdf')}}"> Introduction To HTML, CSS & Integration With HTML<i class="bi bi-filetype-docx"></i></a></li>
                                    <li><i class="bi bi-check-square-fill ps-4" style="color: #d4efdf"></i><a class="text-black" href="{{asset('files/file2.pdf')}}"> Single Page / Landing Page & Multiple Page Website Concept<i class="bi bi-filetype-docx"></i></a></li>
                                    <li><i class="bi bi-check-square-fill ps-4" style="color: #d4efdf"></i><a class="text-black" href="{{asset('files/file3.pdf')}}"> CSS Animations & Implementation With Self Branding<i class="bi bi-filetype-docx"></i></i></a></li>
                                    <li><i class="bi bi-check-square-fill ps-4" style="color: #d4efdf"></i><a class="text-black" href="{{asset('files/file4.pdf')}}"> PSD To HTML & CSS Convert With Responsive<i class="bi bi-filetype-docx"></i></a></li>
                                    <li><i class="bi bi-check-square-fill ps-4" style="color: #d4efdf"></i><a class="text-black" href="{{asset('files/file5.pdf')}}"> Introduction To Bootstrap<i class="bi bi-filetype-docx"></i></a></li>
                                    <a class="mt-2 ps-4" style="color: #ca680c" data-bs-toggle="popover" data-bs-title="Chase Lucrative Ventures" data-bs-content="You have to enroll first!"><i class="bi bi-caret-right-fill"></i>See More</a>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 offset-0">
                            <div class="card m-3 pt-4">
                                <h3 class="ms-3">Google Classroom</h3>
                                <p class="ms-3">Seamlessly sync courses and assignments with Google Classroom.</p>
                                <ul class="list-unstyled ms-5">
                                    <li>✅ View Classroom</li>
                                    <li>✅ Manage Assignments</li>
                                    <li>✅ Sync Quiz Results</li>
                                </ul>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#googleClassroomModal">Connect to Google Classroom</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2 g-0">
                            <div class="card m-3">
                                <h5 class="card-header"><img src="{{ asset('image/icons8-quiz-100.png') }}"> Free Quiz: </h5>
                                <div class="card-body">
                                    <form>
                                        <ul class="list-unstyled ps-4">
                                            <li class="mb-3">
                                                <strong>1. What does HTML stand for?</strong><br>
                                                <input type="radio" name="q1" value="a"> a) Hyper Text Markup Language<br>
                                                <input type="radio" name="q1" value="b"> b) High Tech Machine Learning<br>
                                                <input type="radio" name="q1" value="c"> c) Home Tool Management Language
                                            </li>
                                            <li class="mb-3">
                                                <strong>2. Which HTML tag is used for creating a hyperlink?</strong><br>
                                                <input type="radio" name="q2" value="a"> a) &lt;link&gt;<br>
                                                <input type="radio" name="q2" value="b"> b) &lt;a&gt;<br>
                                                <input type="radio" name="q2" value="c"> c) &lt;href&gt;
                                            </li>
                                            <li class="mb-3">
                                                <strong>3. Which CSS property controls the text size?</strong><br>
                                                <input type="radio" name="q3" value="a"> a) font-style<br>
                                                <input type="radio" name="q3" value="b"> b) font-size<br>
                                                <input type="radio" name="q3" value="c"> c) text-size
                                            </li>
                                        </ul>
                                        <div class="text-center w-100" style="background-color: #c8dc94">
                                            <button type="submit" class="btn" data-bs-toggle="popover" data-bs-title="Assessment Form" data-bs-content="Wanna Perticipate?? Enroll Now!!">Submit Quiz</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--GoogleClassroom Modal -->
<div class="modal fade" id="googleClassroomModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Google Classroom Integration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Enroll to join our latest courses through Google Classroom!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{ route('addStudent') }}" class="btn btn-success">Join Classroom</a>
        </div>
      </div>
    </div>
  </div>

<!-- Authentication Check Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="authModalLabel">Notification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="authModalBody">
          Checking authentication...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="#" id="authModalAction" class="btn btn-primary">Proceed</a>
        </div>
      </div>
    </div>
  </div>


@endsection

@push('js')
<script>
    document.getElementById("actionButton").addEventListener("click", function(event) {
      event.preventDefault();
      const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
      const modalBody = document.getElementById("authModalBody");
      const modalAction = document.getElementById("authModalAction");

      if (isAuthenticated) {
        modalBody.textContent = "Proceed to enrollment!";
        modalAction.textContent = "Continue";
        modalAction.href = "{{ route('addStudent') }}";
      } else {
        modalBody.textContent = "You have to login first!";
        modalAction.textContent = "Login";
        modalAction.href = "{{ route('login') }}";
      }
      new bootstrap.Modal(document.getElementById("authModal")).show();
    });
  </script>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl =>
      new bootstrap.Popover(popoverTriggerEl, {
        container: 'body',
        trigger: 'hover'
      })
    );
  </script>
@endpush


{{-- <script>
    document.getElementById("actionButton").addEventListener("click", function(event) {
        // Check if the user is authenticated using JavaScript
        @if(Auth::check())
            // Perform the action here (e.g., redirect, submit form, etc.)
            alert("Proceed to enrollment!");
        @else
            // If not authenticated, show the notification
            event.preventDefault();  // Prevent button action
            alert("You have to login first!");
            window.location.href = "{{ route('login') }}"; // Redirect to the login page
        @endif
    });
</script> --}}
