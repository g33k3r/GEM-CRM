@extends('layout')
@section('content')
        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab p-0">

                <div class="container-fluid  p-0" >
                    <!-- Page-Title -->
                     <div class="top-box">
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">

                                <h4 class="page-title text-white font-30 mb-2 mt-2">Calendar</h4>
                                    <p class="text-white">Your complete view of upcoming jobs and follow-ups</p>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>

                     </div>

                    <div class="card mb-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;border:6px solid white;">
                        <div class="card-body" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color: #F1F5F9">
                        <div class="row">
                             <div class="col-lg-2">
                               <div class="card">

                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                    <div class="datepicker-container mb-4">
                                      <div id="inlineDatePicker"></div>
                                      </div>
                                     </div>
                                    <span class="h4 fw-bold">Today</span>


                                    <ul class="list-unstyled mb-0" id="todayEventsList">
                                        @if(isset($todayEvents) && count($todayEvents) > 0)
                                            @foreach($todayEvents as $event)
                                                <li class="list-item mt-3 fw-semibold d-flex justify-content-between align-items-center today-event-item" 
                                                    style="cursor: pointer;"
                                                    data-event-type="{{ $event['type'] ?? '' }}"
                                                    data-job-id="{{ $event['job_id'] ?? '' }}"
                                                    data-client-id="{{ $event['client_id'] ?? '' }}">
                                                    <span>
                                                        <i class="fas fa-circle font-10 me-2" style="color:{{ $event['color'] ?? '#8FDCB2' }}"></i>{{ $event['title'] }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="list-item mt-3 fw-semibold d-flex justify-content-center align-items-center">
                                                <span class="text-muted">No events scheduled for today</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-10">
                            <div class="card">
                                 <!-- <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Hospital Survey</h4>
                                        </div>
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   This Month<i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">This Year</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-body">
                                    <div id='calendar2'></div>
                                </div>
                            </div>
                        </div>

                    </div><!--end row-->

                        </div>
                    </div>

                </div><!-- container -->

                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                    </div><!--end offcanvas-body-->
                </div>

            </div>
            <!-- end page content -->
        </div>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Add click handlers to today's events
      document.querySelectorAll('.today-event-item').forEach(function(item) {
        item.addEventListener('click', function() {
          const eventType = this.getAttribute('data-event-type');
          const jobId = this.getAttribute('data-job-id');
          const clientId = this.getAttribute('data-client-id');
          
          if (eventType === 'job' && jobId) {
            window.location.href = '{{ url('/') }}/jobs/' + jobId;
          } else if (clientId) {
            window.location.href = '{{ url('/') }}/clients/' + clientId;
          }
        });
      });

      const dateDisplay = document.getElementById("selectedDate");

      flatpickr("#inlineDatePicker", {
        inline: true,            // Always visible
        dateFormat: "Y-m-d",     // 2025-11-04 format
        defaultDate: "today",    // Set default to today
        onChange: function(selectedDates, dateStr) {
          dateDisplay.textContent = `Selected Date: ${dateStr}`;
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar2');
        if (calendarEl) {
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: false, // hide the default header
                events: function(info, successCallback, failureCallback) {
                    // Fetch events from the API endpoint
                    fetch('{{ url('/') }}/api/calendar-events')
                        .then(response => response.json())
                        .then(data => {
                            successCallback(data);
                        })
                        .catch(error => {
                            console.error('Error fetching calendar events:', error);
                            failureCallback(error);
                        });
                },
                datesSet: function() {
                    updateCustomToolbar(calendar);
                },
                eventClick: function(info) {
                    // Handle event click - navigate to job or client view
                    if (info.event.extendedProps.type === 'job' && info.event.extendedProps.job_id) {
                        window.location.href = '{{ url('/') }}/jobs/' + info.event.extendedProps.job_id;
                    } else if (info.event.extendedProps.client_id) {
                        window.location.href = '{{ url('/') }}/clients/' + info.event.extendedProps.client_id;
                    }
                }
            });
            calendar.render();

            function updateCustomToolbar(calendar) {
                let toolbar = document.querySelector('.fc-toolbar-custom');
                if (!toolbar) {
                    toolbar = document.createElement('div');
                    toolbar.classList.add('fc-toolbar-custom');
                    calendarEl.prepend(toolbar);
                }
                const title = calendar.view.title;
                toolbar.innerHTML = `
                <div class="custom-toolbar">
                    <span class="nav-arrow" id="prevMonth"><i class="ti ti-arrow-left" style="color:#90A1B9"></i></span>
                    <span class="month-title">${title}</span>
                    <span class="nav-arrow" id="nextMonth"><i class="ti ti-arrow-right" style="color:#90A1B9"></i></span>
                </div>
            `;
                document.getElementById('prevMonth').addEventListener('click', () => calendar.prev());
                document.getElementById('nextMonth').addEventListener('click', () => calendar.next());
            }
        }
    });
  </script>

@endsection
