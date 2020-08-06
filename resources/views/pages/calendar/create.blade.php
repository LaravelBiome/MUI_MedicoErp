@extends('layouts.app', ['activePage' => 'calendar', 'titlePage' => __('create event')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 col-md-offset-2" style="padding: 3%">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                 <!--UTILS NAV-->
                                <div class="card-actions text-left">
                                    <button type="button" rel="tooltip" class="btn btn-dark btn-round" onclick="window.location='{{ url('calendar') }}'">
                                        <i class="material-icons">arrow_back</i>
                                    </button>
                                </div><!--End Nav Util-->
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="{{action('EventsController@store')}}">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="event_title" class="bmd-label-floating">Event title</label>
                                                        <input type="text" class="form-control" name="event_title" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="start_date">start date</label>
                                                        <input type="datetime-local" class="form-control" name="start_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="end_date">End date</label>
                                                        <input type="datetime-local" class="form-control" name="end_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Add event">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end card-->
            </div><!---end collumn--->
        </div><!--end row-->
    </div><!---end container---->
</div><!---end content-->
@endsection


