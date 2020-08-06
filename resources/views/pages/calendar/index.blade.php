@extends('layouts.app', ['activePage' => 'calendar', 'titlePage' => __('Calendar overview')])
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid" style="z-index: +3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 col-md-offset-1" >
                        <div class=" card-calendar" style="padding: 2%">
                            <div class="card-content" class="ps-child">
                                <div id="fullCalendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 col-md-offset-2" style="padding: 3%">
                        <div class="panel panel-primary" style="margin-top: 20px;">
                            <div class="panel-heading">
                                <!--UTILS NAV-->
                                <div class="card-actions text-left">
                                  <button type="button" rel="tooltip" class="btn btn-dark btn-round" onclick="window.location='{{ url('calendar/create') }}'">
                                      <i class="material-icons">add</i>
                                  </button>
                                </div><!--End Nav Util-->
                          </div>
                         <!--   <div class="panel-heading">MY Event Details</div> -->
                            <div class="panel-body" >
                                {!! $calendar_details->calendar() !!}
                            </div>
                        </div>
                    </div>
                </div><!--end card-->
            </div><!---end llumn--->
        </div><!--end row-->
    </div><!---end container---->
</div><!---end content-->
@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
<script src="{{ asset('material') }}/js/myapp.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       MyCalendar.initFullCalendar();
    });
</script>

{!! $calendar_details->script() !!}

@endsection
