@extends('frontend.layouts.app'.config('theme_layout'))

@push('after-styles')
    <style>
        .section-title-2 h2:after {
            background: #ffffff;
            bottom: 0px;
            position: relative;
        }
        .couse-pagination li.active {
            color: #333333 !important;
            font-weight: 700;
        }
        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #c7c7c7;
            background-color: white;
            border: none;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #333333;
            background-color: white;
            border: none;
        }
        ul.pagination {
            display: inline;
            text-align: center;
        }
    </style>
@endpush

@section('content')

    <!-- Breadcrumb -->
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold">{{ env('APP_NAME') }} <span>{{ $teacher->full_name }}</span></h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Teacher Details Section -->
    <section id="teacher-details" class="teacher-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="teacher-details-content mb45">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="teacher-details-img">
                                    <img style="height: 100px" src="{{ $teacher->picture }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="teacher-details-text">
                                    <div class="section-title-2 mb-2 headline text-left">
                                        <h2>{{ $teacher->first_name }} <span>{{ $teacher->last_name }}</span></h2>
                                    </div>

                                    <div class="teacher-address">
                                        <div class="address-details ul-li-block">
                                            <ul class="d-inline-block w-100">
                                                <li class="d-inline-block w-100">
                                                    <div class="addrs-icon">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <div class="add-info">
                                                        <span>{{ $teacher->email }}</span>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block w-100">
                                                    <div class="addrs-icon">
                                                        <i class="fas fa-comments"></i>
                                                    </div>
                                                    <div class="add-info">
                                                        <a href="{{ route('admin.messages', ['teacher_id' => $teacher->id]) }}">
                                                            <span> @lang('labels.frontend.teacher.send_now') <i class="fa fa-arrow-right text-primary"></i></span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Courses Taught by Teacher -->
                    <div class="about-teacher mb45">
                        <div class="section-title-2 mb-0 headline text-left">
                            <h2>@lang('labels.frontend.teacher.courses_by_teacher')</h2>
                        </div>
                        @if(count($courses) > 0)
                            <div class="row">
                                @foreach($courses as $course)
                                    <x-course-card :course="$course" />
                                @endforeach
                            </div>
                            <div class="couse-pagination text-center ul-li">
                                {{ $courses->links() }}
                            </div>
                        @else
                            <p>@lang('labels.general.no_data_available')</p>
                        @endif
                    </div>
                </div>

                @include('frontend.layouts.partials.right-sidebar')

            </div>
        </div>
    </section>

@endsection
