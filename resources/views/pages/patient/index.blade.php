@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('Patient list')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title ">Listes des patients</h4>
                            <p class="card-category">listes des patients ordonée par ordre chronologique</p>
                            <p> total de patients / {{DB::table('patient_lists')->where('user_id','=', auth()->user()->id)->count()}}</p>
                        </div>
                        <!----add patient----->
                        <div class="col-md-12">
                            <button class="btn btn-default btn-sm btn-round pull-right">
                                <a href="patient/create" style="color:white"><i class="material-icons">add</i></a>
                            </button>
                        </div>

                        <!-----ACtivate search fields NOT YET !!!------->
                        <script>
                            function SearchFieald () {
                                document.getElementById("myButtonSearch").style.display = "none";
                                document.getElementById("myFormSearch").style.display ="inline";
                            }
                        </script>
                        <!-----ANimated Button TESTING----->
                        <div class="col-md-12">
                            <div id="myButtonSearch">
                                <span class="btn-group pull-right">
                                    <button class="btn btn-default btn-sm btn-round pull-right" onclick="SearchFieald()">
                                        <i class="material-icons">search</i>
                                    </button>
                                    <a href="{{url('patient')}}" class="btn btn-dark btn-round pull-right" style="color: aliceblue ; font-size: 3px ; " >
                                        <i class="material-icons" style="font-size: 15px">assignment_ind</i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <!---Fliters- To animate-->
                        <div class="col-md-12">
                            <div id="myFormSearch" style="display: none" >
                                <form action="/filter" method="get" >
                                    <!----Input research--->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group form-info label-floating ">
                                                <label class="bmd-label-floating">search by first name</label>
                                                <input type="search" name="filterFname" class="form-control" style="color: aliceblue">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-info label-floating ">
                                                <label class="bmd-label-floating">search by last name</label>
                                                <input type="search" name="filterLname" class="form-control" style="color: aliceblue">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-info label-floating ">
                                                <label class="bmd-label-floating">search by GUID</label>
                                                <input type="search" name="filterGuid" class="form-control" style="color: aliceblue">
                                            </div>
                                        </div>
                                    </div><!----End inputs Row----->
                                    <!----subumit filter---->
                                    <span class="btn-group ">
                                        <button type="submit" class="btn btn-default btn-sm btn-round pull-right ">
                                            <i class="material-icons">search</i>
                                        </button>
                                        <a href="{{url('patient')}}" class="btn btn-dark btn-round pull-right" style="color: aliceblue ; font-size: 3px ; " >
                                            <i class="material-icons" style="font-size: 15px">assignment_ind</i>
                                        </a>
                                    </span>
                                </form><!------ end Filter form----->
                            </div><!-------end of my Custom DIv---------->
                        </div><!-----end col filters ----->
                    </div><!---end header card row ---->
               </div><!--end of the header card-->
               <!----cheking for patient lists--->
                @if (count($posts) > 0)
                    @foreach ($posts as $item)
                        <!--display list--->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th class="text-center">matricule</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$item->matricule}}</td>
                                            <td>{{$item->lname}}</td>
                                            <td>{{$item->fname}}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-info btn-link"  >
                                                    <a href="patient_details/{{$item->id}}" style="color:#007FFF"><i class="material-icons">person</i></a>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-success btn-link"><!--!!!-->
                                                    <a href="patient/{{$item->id}}/edit" style="color:green"><i class="material-icons">edit</i></a>
                                                </button>
                                                    {!!Form::open(['action'=>['PatientsController@destroy', $item->id],'method'=>'POST', 'class'=>'pull-right'])!!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::button('<i class="material-icons">close</i>',['type'=>'submit','class'=>'btn btn-danger btn-link'])}}
                                                    {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--end table class--->
                        </div><!--end list-->
                    @endforeach
                    {{$posts->links()}}
                    @else
                    <!---display warn - no posts found--->
                        <div class="alert alert-warning" style="margin:15px ; padding-top: 30px ">
                            <div class="container-fluid">
                                <div class="alert-icon">
                                    <i class="material-icons" style="color:white">warning</i>
                                </div>
                                <b>No posts found : </b> <p>il semblerais que vous n'avez aucun patient</p>
                            </div>
                        </div>
                @endif
           </div><!--end card-->
       </div><!---end collumn--->
      </div><!--end row-->
    </div><!---end container---->
  </div><!---end content-->
@endsection
