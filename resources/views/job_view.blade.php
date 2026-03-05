@extends('layout')
@section('content')

    <div class="page-wrapper">
        <div class="page-content-tab p-0">
            <div class="container-fluid  p-0">
                <div class="top-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row align-items-center">
                                    <div class="col-lg-9">
                                        <h4 class="page-title text-white font-30 mb-3 mt-2">{{ $job->client->office_name ?? 'N/A' }}</h4>
                                        <p class="text-white mb-1"><i class="ti ti-mail"></i>: {{ $job->client->doctor_name ?? 'N/A' }}</p>
                                        <p class="text-white mb-1"><i class="ti ti-phone"></i>: {{ $job->client->office_number ?? 'N/A' }}</p>
                                        <p class="text-white mb-1">
                                            <i class="ti ti-home"></i>: {{ $job->client->address ?? 'N/A' }}{{ $job->client->suite ? ', Suite ' . $job->client->suite : '' }}{{ $job->client->city ? ', ' . $job->client->city : '' }}{{ $job->client->state ? ', ' . $job->client->state : '' }}{{ $job->client->zip_code ? ' ' . $job->client->zip_code : '' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row align-items-center">
                                            <div class="col-lg-10 text-lg-end">
                                                @php
                                                    $statusText = ucfirst(str_replace('_', ' ', $job->job_status ?? 'pending'));
                                                @endphp
                                                <button type="button" class="btn btn-mystyle dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false" style="width:fit-content!important">{{ $statusText }} <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item update-job-status" href="#" data-status="pending" data-job-id="{{ $job->id }}">Pending</a>
                                                    <a class="dropdown-item update-job-status" href="#" data-status="in_progress" data-job-id="{{ $job->id }}">In Progress</a>
                                                    <a class="dropdown-item update-job-status" href="#" data-status="completed" data-job-id="{{ $job->id }}">Completed</a>
                                                    <a class="dropdown-item update-job-status" href="#" data-status="cancelled" data-job-id="{{ $job->id }}">Cancelled</a>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <a href="#" type="button" class="dropdown-toggle btn-mystyle" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 6px 6px;">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 6.75C11.5858 6.75 11.25 6.41421 11.25 6C11.25 5.58579 11.5858 5.25 12 5.25C12.4142 5.25 12.75 5.58579 12.75 6C12.75 6.41421 12.4142 6.75 12 6.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12C12.75 12.4142 12.4142 12.75 12 12.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M12 18.75C11.5858 18.75 11.25 18.4142 11.25 18C11.25 17.5858 11.5858 17.25 12 17.25C12.4142 17.25 12.75 17.5858 12.75 18C12.75 18.4142 12.4142 18.75 12 18.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item edit-client-btn" href="#" data-client-id="{{ $job->client->id }}"><i class="ti ti-pencil" style="margin-right:5px"></i> Edit</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-trash" style="margin-right:5px"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;">
                    <div class="card-body" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Clinic Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">Compressors</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">Filters</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings2" role="tab" aria-selected="false">Amalgam Separator</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings3" role="tab" aria-selected="false">Sterilizer</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings4" role="tab" aria-selected="false">Notes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings5" role="tab" aria-selected="false">Others</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body h-100">
                                        <div class="tab-content">
                                            <div class="tab-pane p-3 active" id="home" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Office
                                                                    Name</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->office_name ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Doctor's
                                                                    Name</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->doctor_name ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Address</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->address ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Zip Code</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->zip_code ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Office
                                                                    Number</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->office_number ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Last DOS</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->last_dos ? $job->client->last_dos->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Suite</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->suite ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">City</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->city ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">State</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->state ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="profile" role="tabpanel">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="comp-a">
                                                        <span>
                                                            Compressor A
                                                        </span>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Model</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_a_model ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Serial
                                                                    Number</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_a_serial ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">OEM Parts &
                                                                    Costs
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_a_oem ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance
                                                                    Day</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_a_initial ? $job->client->compressor_a_initial->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Last
                                                                    Maintenance
                                                                    Completed</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_a_last ? $job->client->compressor_a_last->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance
                                                                    Day</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       id="job_compressor_a_next_display"
                                                                       value="{{ $job->client->compressor_a_next ? $job->client->compressor_a_next->format('m/d/Y') : '' }}" disabled>
                                                                <input type="hidden" id="job_compressor_a_next_value"
                                                                       value="{{ $job->client->compressor_a_next ? $job->client->compressor_a_next->format('Y-m-d') : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days
                                                                    Remaining</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       id="job_compressor_a_days_display" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="comp-b">
                                                        <span>
                                                            Compressor B
                                                        </span>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Model</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_b_model ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Serial
                                                                    Number</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_b_serial ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">OEM Parts &
                                                                    Costs
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_b_oem ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance
                                                                    Day</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_b_initial ? $job->client->compressor_b_initial->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Last
                                                                    Maintenance
                                                                    Completed</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->compressor_b_last ? $job->client->compressor_b_last->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance
                                                                    Day</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       id="job_compressor_b_next_display"
                                                                       value="{{ $job->client->compressor_b_next ? $job->client->compressor_b_next->format('m/d/Y') : '' }}" disabled>
                                                                <input type="hidden" id="job_compressor_b_next_value"
                                                                       value="{{ $job->client->compressor_b_next ? $job->client->compressor_b_next->format('Y-m-d') : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days
                                                                    Remaining</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       id="job_compressor_b_days_display" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="settings" role="tabpanel">
                                                <div class="par-b">
                                                    <div class="filter-a">
                                                        <span>Water Sediment Filter</span>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Initial
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->water_filter_initial ? $job->client->water_filter_initial->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Next
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->water_filter_next ? $job->client->water_filter_next->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Days
                                                                        Remaining
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->water_filter_days ?? '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Maintenance
                                                                        Completed
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->water_filter_completed ? ucfirst($job->client->water_filter_completed) : '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Water Sediment Filter Maintenance
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->water_filter_maintenance ? ucfirst($job->client->water_filter_maintenance) : '' }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="par-b">
                                                    <div class="filter-a">
                                                        <span>Silver Filter</span>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Initial
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->silver_filter_initial ? $job->client->silver_filter_initial->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Next
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->silver_filter_next ? $job->client->silver_filter_next->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Days
                                                                        Remaining
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->silver_filter_days ?? '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Silver Filter Maintenance
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->silver_filter_maintenance ? ucfirst($job->client->silver_filter_maintenance) : '' }}" disabled>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="par-b">
                                                    <div class="filter-a">
                                                        <span>Cavitron Filter</span>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Initial
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->cavitron_filter_initial ? $job->client->cavitron_filter_initial->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Next
                                                                        Maintenance Day
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->cavitron_filter_next ? $job->client->cavitron_filter_next->format('m/d/Y') : '' }}" disabled>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Days
                                                                        Remaining
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->cavitron_filter_days ?? '' }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-3">
                                                                <div class="col-lg-6">
                                                                    <h4 class="card-title fw-bold"
                                                                        style="color:#45556C;font-size:17px">Cavitron Filter Maintenance
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control my-input"
                                                                           value="{{ $job->client->cavitron_filter_maintenance ? ucfirst($job->client->cavitron_filter_maintenance) : '' }}" disabled>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="settings2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Model
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->amalgam_model ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial Amalgam
                                                                    Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->amalgam_initial ? $job->client->amalgam_initial->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next Amalgam
                                                                    Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->amalgam_next ? $job->client->amalgam_next->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->amalgam_days ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Amalgam Separator Maintenance
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->amalgam_maintenance ? ucfirst($job->client->amalgam_maintenance) : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="settings3" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Model
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_model ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Initial
                                                                    Maintenance
                                                                    Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_initial ? $job->client->sterilizer_initial->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_days ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Next
                                                                    Maintenance
                                                                    Day
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_next ? $job->client->sterilizer_next->format('m/d/Y') : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Days Remaining
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_days2 ?? '' }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-lg-6">
                                                                <h4 class="card-title fw-bold"
                                                                    style="color:#45556C;font-size:17px">Sterilizer Maintenance
                                                                </h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control my-input"
                                                                       value="{{ $job->client->sterilizer_maintenance ? ucfirst($job->client->sterilizer_maintenance) : '' }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="settings4" role="tabpanel">
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary mb-3 note-btn" data-client-id="{{ $job->client_id }}">
                                                        <i class="ti ti-plus" style="margin-right:5px"></i>Add New Note
                                                    </button>
                                                </div>
                                                <div id="notes-container">
                                                    @forelse($notes ?? [] as $note)
                                                    <div class="d-flex gap-3 align-items-start mb-3 note-item" data-note-id="{{ $note->id }}">
                                                        <div class="note-icon">
                                                            <span>
                                                                <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 0C0.839467 0 0 0.839465 0 1.875V19.125C0 20.1605 0.839466 21 1.875 21H14.625C15.6605 21 16.5 20.1605 16.5 19.125V11.25C16.5 9.17893 14.8211 7.5 12.75 7.5H10.875C9.83947 7.5 9 6.66053 9 5.625V3.75C9 1.67893 7.32107 0 5.25 0H1.875ZM3.75 13.5C3.75 13.0858 4.08579 12.75 4.5 12.75H12C12.4142 12.75 12.75 13.0858 12.75 13.5C12.75 13.9142 12.4142 14.25 12 14.25H4.5C4.08579 14.25 3.75 13.9142 3.75 13.5ZM4.5 15.75C4.08579 15.75 3.75 16.0858 3.75 16.5C3.75 16.9142 4.08579 17.25 4.5 17.25H8.25C8.66421 17.25 9 16.9142 9 16.5C9 16.0858 8.66421 15.75 8.25 15.75H4.5Z" fill="#155DFC"/>
                                                                    <path d="M9.22119 0.315905C10.018 1.23648 10.5 2.43695 10.5 3.75V5.625C10.5 5.83211 10.6679 6 10.875 6H12.75C14.0631 6 15.2635 6.48204 16.1841 7.27881C15.2962 3.87988 12.6201 1.20377 9.22119 0.315905Z" fill="#155DFC"/>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="w-100">
                                                            <p class="mb-0">Note Added By
                                                                <span class="fw-bold">{{ $note->user->name ?? 'Unknown' }}</span>
                                                            </p>
                                                            <div class="d-flex gap-1 align-items-center mb-2">
                                                                <p class="mb-0">{{ $note->created_at->format('m/d/Y') }}</p>
                                                                <span>
                                                                    <i class="ti ti-circle" style="color: #E2E8F0;font-size: 8px;"></i>
                                                                </span>
                                                                <p class="mb-0">
                                                                    {{ $note->created_at->format('h:i A') }}
                                                                </p>
                                                            </div>
                                                            <div style="background: #e8e8e8;padding: 10px;">
                                                                {{ $note->note }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <div class="text-center py-5">
                                                        <p class="text-muted">No notes added yet. Click "Add New Note" to add one.</p>
                                                    </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="tab-pane p-3" id="settings5" role="tabpanel">
                                                <div class="text-end mb-3">
                                                    <button type="button" class="btn btn-primary add-other-item-btn" data-client-id="{{ $job->client_id }}">
                                                        <i class="ti ti-plus" style="margin-right:5px"></i>Add New
                                                    </button>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table" id="datatable_2">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Added on</th>
                                                            <th>Item Name</th>
                                                            <th>Item Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($otherData ?? [] as $item)
                                                            <tr>
                                                                <td>
                                                                    <span class="tble-clr">{{ $item['created_at']->format('m/d/Y') }}</span>
                                                                    <p class="mb-0 tble-time">{{ $item['created_at']->format('h:i A') }}</p>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="tble-clr">{{ $item['name'] }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $itemType = collect($otherItems ?? [])->firstWhere('id', $item['item_type_id']);
                                                                    @endphp
                                                                    <span class="tble-clr">{{ $itemType['name'] ?? 'N/A' }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="#" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M7.99996 8.66659C8.36815 8.66659 8.66663 8.36811 8.66663 7.99992C8.66663 7.63173 8.36815 7.33325 7.99996 7.33325C7.63177 7.33325 7.33329 7.63173 7.33329 7.99992C7.33329 8.36811 7.63177 8.66659 7.99996 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M12.6666 8.66659C13.0348 8.66659 13.3333 8.36811 13.3333 7.99992C13.3333 7.63173 13.0348 7.33325 12.6666 7.33325C12.2984 7.33325 12 7.63173 12 7.99992C12 8.36811 12.2984 8.66659 12.6666 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M3.33329 8.66659C3.70148 8.66659 3.99996 8.36811 3.99996 7.99992C3.99996 7.63173 3.70148 7.33325 3.33329 7.33325C2.9651 7.33325 2.66663 7.63173 2.66663 7.99992C2.66663 8.36811 2.9651 8.66659 3.33329 8.66659Z" stroke="#90A1B9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item view-other-item-btn" href="#" data-item-id="{{ $item['id'] }}"><i class="ti ti-eye" style="margin-right:5px"></i> View</a>
                                                                        <a class="dropdown-item" href="#"><i class="ti ti-trash" style="margin-right:5px"></i> Delete</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center py-4">
                                                                    <p class="text-muted mb-0">No items added yet. Click "Add New" to add one.</p>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title fw-bold" style="border-bottom: 2px solid #F1F5F9;padding-bottom: 12px;font-size:17px">Job Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-6">
                                                <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Job
                                                    ID /
                                                    Reference #</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-input" value="JOB-{{ str_pad($job->id, 6, '0', STR_PAD_LEFT) }}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-6">
                                                <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">
                                                    Service
                                                    Type</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-input"
                                                       value="{{ $job->service_type ?? '' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-6">
                                                <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">
                                                    Visit
                                                    Date</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-input"
                                                       value="{{ $job->visit_date ? $job->visit_date->format('m/d/Y') : '' }}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-6">
                                                <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">
                                                    Assigned
                                                    Worker</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-input"
                                                       value="{{ $job->worker->name ?? 'N/A' }}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-6">
                                                <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Job
                                                    Status</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-input"
                                                       value="{{ ucfirst(str_replace('_', ' ', $job->job_status ?? 'pending')) }}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="margin-top-200">
                                            <a href="#" type="buttom" class="btn btn-primary w-100 mb-3 mark-completed-btn"
                                               style="padding: 13px 3px;" data-job-id="{{ $job->id }}">Mark as
                                                completed</a>
                                            <a href="#" type="buttom" class="btn btn-light w-100 reschedule-visit-btn" data-job-id="{{ $job->id }}" data-current-date="{{ $job->visit_date ? $job->visit_date->format('Y-m-d') : '' }}">Reschedule Visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Add Note Modal -->
<div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addNoteModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add New Note</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="addNoteForm">
                    @csrf
                    <input type="hidden" name="client_id" id="note_client_id">
                    <div class="mb-3">
                        <label for="note_text" class="form-label fw-bold" style="color:#45556C;font-size:17px">Note</label>
                        <textarea name="note" id="note_text" class="form-control" rows="10" placeholder="Type your note here..." required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addNoteForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Add Note</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle "Add New Note" button click
        $(document).on('click', '.note-btn', function(e) {
            e.preventDefault();
            const clientId = $(this).data('client-id');

            if (!clientId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Client ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Set client ID in form
            $('#note_client_id').val(clientId);

            // Reset form
            $('#addNoteForm')[0].reset();
            $('#note_client_id').val(clientId);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('addNoteModal'));
            modal.show();
        });

        // Handle note form submission
        $('#addNoteForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: '{{ url('/notes') }}',
                method: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addNoteModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Add new note to the notes container
                        const noteHtml = `
                            <div class="d-flex gap-3 align-items-start mb-3 note-item" data-note-id="${response.note.id}">
                                <div class="note-icon">
                                    <span>
                                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 0C0.839467 0 0 0.839465 0 1.875V19.125C0 20.1605 0.839466 21 1.875 21H14.625C15.6605 21 16.5 20.1605 16.5 19.125V11.25C16.5 9.17893 14.8211 7.5 12.75 7.5H10.875C9.83947 7.5 9 6.66053 9 5.625V3.75C9 1.67893 7.32107 0 5.25 0H1.875ZM3.75 13.5C3.75 13.0858 4.08579 12.75 4.5 12.75H12C12.4142 12.75 12.75 13.0858 12.75 13.5C12.75 13.9142 12.4142 14.25 12 14.25H4.5C4.08579 14.25 3.75 13.9142 3.75 13.5ZM4.5 15.75C4.08579 15.75 3.75 16.0858 3.75 16.5C3.75 16.9142 4.08579 17.25 4.5 17.25H8.25C8.66421 17.25 9 16.9142 9 16.5C9 16.0858 8.66421 15.75 8.25 15.75H4.5Z" fill="#155DFC"/>
                                            <path d="M9.22119 0.315905C10.018 1.23648 10.5 2.43695 10.5 3.75V5.625C10.5 5.83211 10.6679 6 10.875 6H12.75C14.0631 6 15.2635 6.48204 16.1841 7.27881C15.2962 3.87988 12.6201 1.20377 9.22119 0.315905Z" fill="#155DFC"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="w-100">
                                    <p class="mb-0">Note Added By <span class="fw-bold">${response.note.user_name}</span></p>
                                    <div class="d-flex gap-1 align-items-center mb-2">
                                        <p class="mb-0">${response.note.created_at}</p>
                                        <span><i class="ti ti-circle" style="color: #E2E8F0;font-size: 8px;"></i></span>
                                        <p class="mb-0">${response.note.created_at_time}</p>
                                    </div>
                                    <div style="background: #e8e8e8;padding: 10px;">${response.note.note}</div>
                                </div>
                            </div>
                        `;

                        // Remove empty message if exists
                        $('#notes-container .text-center').remove();

                        // Prepend new note to container
                        $('#notes-container').prepend(noteHtml);

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Note added successfully!',
                            confirmButtonColor: '#155DFC'
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to add note';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when modal is closed
        $('#addNoteModal').on('hidden.bs.modal', function () {
            $('#addNoteForm')[0].reset();
        });

        // Function to calculate days remaining from today to next maintenance day
        function calculateDaysRemaining(nextMaintenanceDate) {
            if (!nextMaintenanceDate) {
                return '';
            }
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const nextDate = new Date(nextMaintenanceDate);
            nextDate.setHours(0, 0, 0, 0);

            const diffTime = nextDate - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            return diffDays >= 0 ? diffDays : 0;
        }

        // Calculate days remaining for Compressor A and B on page load
        function updateJobCompressorDaysRemaining() {
            // Compressor A
            const compressorANext = $('#job_compressor_a_next_value').val();
            if (compressorANext) {
                const daysA = calculateDaysRemaining(compressorANext);
                $('#job_compressor_a_days_display').val(daysA !== '' ? daysA + ' days' : '');
            }

            // Compressor B
            const compressorBNext = $('#job_compressor_b_next_value').val();
            if (compressorBNext) {
                const daysB = calculateDaysRemaining(compressorBNext);
                $('#job_compressor_b_days_display').val(daysB !== '' ? daysB + ' days' : '');
            }
        }

        // Calculate on page load
        updateJobCompressorDaysRemaining();

        // Function to update job status
        function updateJobStatus(jobId, newStatus) {
            $.ajax({
                url: '{{ url('/jobs') }}/' + jobId + '/status',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    job_status: newStatus
                },
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Job status updated successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated status
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to update job status';
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        }

        // Handle status dropdown item clicks
        $(document).on('click', '.update-job-status', function(e) {
            e.preventDefault();
            const newStatus = $(this).data('status');
            const jobId = $(this).data('job-id');
            const statusText = $(this).text().trim();

            Swal.fire({
                title: 'Confirm Status Update',
                text: 'Are you sure you want to change the job status to "' + statusText + '"?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#155DFC',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    updateJobStatus(jobId, newStatus);
                }
            });
        });

        // Handle "Mark as completed" button click
        $(document).on('click', '.mark-completed-btn', function(e) {
            e.preventDefault();
            const jobId = $(this).data('job-id');

            Swal.fire({
                title: 'Mark as Completed',
                text: 'Are you sure you want to mark this job as completed?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#155DFC',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, mark as completed!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    updateJobStatus(jobId, 'completed');
                }
            });
        });

        // Handle "Reschedule Visit" button click
        $(document).on('click', '.reschedule-visit-btn', function(e) {
            e.preventDefault();
            const jobId = $(this).data('job-id');
            const currentDate = $(this).data('current-date');

            // Set the job ID and current visit date in the modal
            $('#reschedule_job_id').val(jobId);
            $('#reschedule_visit_date').val(currentDate);

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('rescheduleVisitModal'));
            modal.show();
        });

        // Handle Reschedule Visit form submission
        $('#rescheduleVisitForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const jobId = $('#reschedule_job_id').val();
            const visitDate = $('#reschedule_visit_date').val();

            if (!visitDate) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please select a visit date',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            $.ajax({
                url: '{{ url('/jobs') }}/' + jobId + '/visit-date',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    visit_date: visitDate
                },
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('rescheduleVisitModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Visit date updated successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated date
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to update visit date';
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when modal is closed
        $('#rescheduleVisitModal').on('hidden.bs.modal', function () {
            $('#rescheduleVisitForm')[0].reset();
        });

        // Handle "Add New" button click for Other Items
        $(document).on('click', '.add-other-item-btn', function(e) {
            e.preventDefault();
            const clientId = $(this).data('client-id');

            if (!clientId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Client ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Set client ID in form
            $('#other_item_client_id').val(clientId);

            // Reset form
            $('#addOtherItemForm')[0].reset();
            $('#other_item_client_id').val(clientId);
            $('#dynamic-fields-container').empty();

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('addOtherItemModal'));
            modal.show();
        });

        // Handle Item Type change - fetch and generate dynamic fields
        $('#other_item_type').on('change', function() {
            const itemId = $(this).val();
            const container = $('#dynamic-fields-container');

            if (!itemId) {
                container.empty();
                return;
            }

            // Show loading
            container.html('<div class="text-center py-3"><i class="ti ti-loader-2 spin"></i> Loading fields...</div>');

            $.ajax({
                url: '{{ url('/get-item-fields') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    item_id: itemId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        container.empty();

                        if (response.fields.length === 0) {
                            container.html('<div class="alert alert-info">No custom fields configured for this item type.</div>');
                            return;
                        }

                        // Generate fields based on type
                        response.fields.forEach(function(field) {
                            let fieldHtml = '';
                            const fieldName = 'field_' + field.id;
                            const fieldId = 'field_' + field.id;

                            switch(field.type) {
                                case 'Free Text':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'date':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="date" name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'boolean':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_yes" value="Yes">
                                                        <label class="form-check-label" for="${fieldId}_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_no" value="No">
                                                        <label class="form-check-label" for="${fieldId}_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'select':
                                    let selectOptions = '';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            selectOptions += `<option value="${value}">${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                                    <option value="">Select ${field.name}</option>
                                                    ${selectOptions}
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'multi select':
                                    let multiSelectOptions = '';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            multiSelectOptions += `<option value="${value}">${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}[]" id="${fieldId}" class="form-control my-input" multiple>
                                                    ${multiSelectOptions}
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple options</small>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                default:
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}">
                                            </div>
                                        </div>
                                    `;
                            }

                            container.append(fieldHtml);
                        });
                    } else {
                        container.html('<div class="alert alert-danger">' + (response.message || 'Error loading fields') + '</div>');
                    }
                },
                error: function(xhr) {
                    container.html('<div class="alert alert-danger">Error loading fields. Please try again.</div>');
                }
            });
        });

        // Handle Other Item form submission
        $('#addOtherItemForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: '{{ url('/other-data') }}',
                method: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addOtherItemModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Item added successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated data
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to add item';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when modal is closed
        $('#addOtherItemModal').on('hidden.bs.modal', function () {
            $('#addOtherItemForm')[0].reset();
            $('#dynamic-fields-container').empty();
        });

        // Handle "View" button click for Other Items
        $(document).on('click', '.view-other-item-btn', function(e) {
            e.preventDefault();
            const itemId = $(this).data('item-id');

            if (!itemId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Item ID not found',
                    confirmButtonColor: '#155DFC'
                });
                return;
            }

            // Reset form
            $('#viewOtherItemForm')[0].reset();
            $('#view-dynamic-fields-container').empty();
            $('#view_other_item_type').prop('disabled', true);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('viewOtherItemModal'));
            modal.show();

            // Fetch item data
            $.ajax({
                url: '{{ url('/other-data') }}/' + itemId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success && response.otherData) {
                        const data = response.otherData;

                        // Set form values
                        $('#view_other_data_id').val(data.id);
                        $('#view_other_item_name').val(data.name);
                        $('#view_other_item_type').val(data.item_type_id);

                        // Generate fields with values
                        const container = $('#view-dynamic-fields-container');
                        container.empty();

                        if (data.fields.length === 0) {
                            container.html('<div class="alert alert-info">No custom fields configured for this item type.</div>');
                            return;
                        }

                        data.fields.forEach(function(field) {
                            let fieldHtml = '';
                            const fieldName = 'field_' + field.id;
                            const fieldId = 'view_field_' + field.id;
                            const fieldValue = field.value || '';

                            switch(field.type) {
                                case 'Free Text':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'date':
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="date" name="${fieldName}" id="${fieldId}" class="form-control my-input" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'boolean':
                                    const yesChecked = fieldValue === 'Yes' ? 'checked' : '';
                                    const noChecked = fieldValue === 'No' ? 'checked' : '';
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_yes" value="Yes" ${yesChecked}>
                                                        <label class="form-check-label" for="${fieldId}_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="${fieldName}" id="${fieldId}_no" value="No" ${noChecked}>
                                                        <label class="form-check-label" for="${fieldId}_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'select':
                                    let selectOptions = '<option value="">Select ' + field.name + '</option>';
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            const selected = value === fieldValue ? 'selected' : '';
                                            selectOptions += `<option value="${value}" ${selected}>${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}" id="${fieldId}" class="form-control my-input">
                                                    ${selectOptions}
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                case 'multi select':
                                    let multiSelectOptions = '';
                                    const selectedValues = Array.isArray(fieldValue) ? fieldValue : (fieldValue ? [fieldValue] : []);
                                    if (field.values && Array.isArray(field.values)) {
                                        field.values.forEach(function(value) {
                                            const selected = selectedValues.includes(value) ? 'selected' : '';
                                            multiSelectOptions += `<option value="${value}" ${selected}>${value}</option>`;
                                        });
                                    }
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <select name="${fieldName}[]" id="${fieldId}" class="form-control my-input" multiple>
                                                    ${multiSelectOptions}
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple options</small>
                                            </div>
                                        </div>
                                    `;
                                    break;

                                default:
                                    fieldHtml = `
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="${fieldId}" class="form-label fw-bold" style="color:#45556C;font-size:17px">${field.name}</label>
                                                <input type="text" name="${fieldName}" id="${fieldId}" class="form-control my-input" placeholder="Enter ${field.name}" value="${fieldValue}">
                                            </div>
                                        </div>
                                    `;
                            }

                            container.append(fieldHtml);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Failed to load item data',
                            confirmButtonColor: '#155DFC'
                        });
                        modal.hide();
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load item data: ' + (xhr.responseJSON?.message || 'Unknown error'),
                        confirmButtonColor: '#155DFC'
                    });
                    modal.hide();
                }
            });
        });

        // Handle View/Edit Other Item form submission
        $('#viewOtherItemForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize();
            const itemId = $('#view_other_data_id').val();

            $.ajax({
                url: '{{ url('/other-data') }}/' + itemId,
                method: 'POST',
                data: formData + '&_method=PUT',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('viewOtherItemModal'));
                        if (modal) {
                            modal.hide();
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Item updated successfully!',
                            confirmButtonColor: '#155DFC'
                        }).then(() => {
                            // Reload page to show updated data
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to update item';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            const errorMessages = [];
                            for (let field in errors) {
                                errorMessages.push(errors[field][0]);
                            }
                            errorMessage = errorMessages.join('<br>');
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                        confirmButtonColor: '#155DFC'
                    });
                }
            });
        });

        // Reset form when view modal is closed
        $('#viewOtherItemModal').on('hidden.bs.modal', function () {
            $('#viewOtherItemForm')[0].reset();
            $('#view-dynamic-fields-container').empty();
            $('#view_other_item_type').prop('disabled', true);
        });
    });
</script>

<!-- View/Edit Other Item Modal -->
<div class="modal fade" id="viewOtherItemModal" tabindex="-1" aria-labelledby="viewOtherItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="viewOtherItemModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">View/Edit Item</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="viewOtherItemForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="other_data_id" id="view_other_data_id">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="view_other_item_name" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Name</label>
                            <input type="text" name="item_name" id="view_other_item_name" class="form-control my-input" placeholder="Enter item name" required disabled style="background-color: #f5f5f5; cursor: not-allowed;">
                        </div>
                        <div class="col-lg-6">
                            <label for="view_other_item_type" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Type</label>
                            <select name="item_type_id" id="view_other_item_type" class="form-control my-input" required disabled style="background-color: #f5f5f5; cursor: not-allowed;">
                                <option value="">Select Item Type</option>
                                @foreach($otherItems ?? [] as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="view-dynamic-fields-container"></div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="viewOtherItemForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Reschedule Visit Modal -->
<div class="modal fade" id="rescheduleVisitModal" tabindex="-1" aria-labelledby="rescheduleVisitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="rescheduleVisitModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Reschedule Visit</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="rescheduleVisitForm">
                    @csrf
                    <input type="hidden" name="job_id" id="reschedule_job_id" value="{{ $job->id }}">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="reschedule_visit_date" class="form-label fw-bold" style="color:#45556C;font-size:17px">Visit Date</label>
                            <input type="date" name="visit_date" id="reschedule_visit_date" class="form-control my-input" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="rescheduleVisitForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Update Visit Date</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Other Item Modal -->
<div class="modal fade" id="addOtherItemModal" tabindex="-1" aria-labelledby="addOtherItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="addOtherItemModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Add Item</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px 32px;">
                <form id="addOtherItemForm">
                    @csrf
                    <input type="hidden" name="client_id" id="other_item_client_id">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="other_item_name" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Name</label>
                            <input type="text" name="item_name" id="other_item_name" class="form-control my-input" placeholder="Enter item name" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="other_item_type" class="form-label fw-bold" style="color:#45556C;font-size:17px">Item Type</label>
                            <select name="item_type_id" id="other_item_type" class="form-control my-input" required>
                                <option value="">Select Item Type</option>
                                @foreach($otherItems ?? [] as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="dynamic-fields-container"></div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="addOtherItemForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Add Item</button>
            </div>
        </div>
    </div>
</div>

@endsection
