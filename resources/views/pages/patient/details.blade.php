@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('Patient posts')])

@section('content')
            <div class="content"> <!----------!!!!!THE CONTENT!!!!!------------>
                <div class="container-fluid"> <!----------!!!!!RESPONSIVE CONTAINER!!!!!------------>
                    <div class="row"> <!----------!!!!!A ROW for THE CONTENT!!!!!------------>
                        <div class="col-md-12" style="margin-top: 40px"><!--Description card overview-->
                            <div class="card card-profile">
                                  <!--UTILS NAV-->
                                <div class="card-actions text-right">
                                    <a href="{{url('patient')}}" class="btn btn-dark btn-round" style="color: aliceblue ; font-size: 3px " ><i class="material-icons" style="font-size: 10px">arrow_back</i></a>
                                    <a href="{{$posts->id}}/edit" style="font-size: 3px ; color:aliceblue" class="btn btn-success btn-round"><i class="material-icons" style="font-size: 10px" >edit</i></a>
                                    <!---here for delete x_x -->
                                    {!!Form::open(['action'=>['PatientsController@destroy', $posts->id],'method'=>'POST', 'class'=>'pull-right' ])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::button('<i class="material-icons" style="font-size: 10px" >close</i>',['type'=>'submit','class'=>'btn btn-danger btn-round' , 'style'=>'font-size : 3px'])}}
                                    {!!Form::close()!!}
                                </div><!--End Nav Util--->
                                <!-----PATIENT AVATAR----->
                                    <div class="card-avatar"><!--set a picture --->
                                        <a href='/storage/images/patient_images/{{$details->patient_image}}'>
                                        <img class="img" src='/storage/images/patient_images/{{$details->patient_image}}' />
                                        </a>
                                    </div>
                                <!-----BODY HEADER CARD--->
                                <div class="card-body">
                                    <h6 class="card-category text-gray">enregistrer le  : {{$posts->created_at}} </h6>
                                    <h6 class="card-category text-gray">mis a jour le  : {{$posts->updated_at}} </h6>
                                    <h4 class="card-title">{{$posts->lname}} {{$posts->fname}}</h4>
                                    <p class="card-description">
                                        {!!$posts->description!!}
                                    </p>
                                </div><!--end card body--->
                            </div><!--end card -->
                        </div><!--end col-->
                        <!--Card detail-->
                        <div class="col-md-12" style="margin-top: 40px"> <!----------!!!!!OTHER DESCRIPTION TABLE!!!!!------------>
                            <div class="card"><!----------!!!!!CARD DETAILS!!!!!------------>
                                <div class="card-header card-header-primary"><!----------!!!!!CARD HEADER!!!!!------------>
                                    <h4 class="card-title">Profile</h4>
                                    <p class="card-category">{{$posts->matricule}}</p>
                                </div>
                                <!--BODY : =>-->
                                <div class="card-body"><!----------!!!!!BODY FIRST ROW , nom prenom , matricule !!!!!------------>
                                    <!--first name last name-->
                                    <div class="row">
                                        <div class="col-md-6"><!--First name Col-->
                                            <div class="row">
                                                <div class="col-md-6"><!---COl-->
                                                    <h6><span class="tim-note">Prenom : </span></h6>
                                                </div><!--endCol-->
                                                <div class="col-md-6"><!---COl-->
                                                    <div class="tim-typo">
                                                        <p>{{$posts->lname}}</p>
                                                    </div>
                                                </div><!--endCol-->
                                            </div><!--end row prenom-->
                                        </div><!--end Col-->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6"><!---COl-->
                                                    <h6><span class="tim-note">Nom : </span></h6>
                                                </div><!--endCol-->
                                                <div class="col-md-6"><!---COl-->
                                                    <div class="tim-typo">
                                                        <p>{{$posts->fname}}</p>
                                                    </div>
                                                </div><!--endCol-->
                                            </div><!--end row nom-->
                                        </div><!--end Col nom-->
                                    </div><!---end row first name last name , age-->
                                    <!--matricule--->
                                    <div class="row">
                                        <div class="col-md-6"><!---COl-->
                                            <h6><span class="tim-note">Matricule</span></h6>
                                        </div><!--endCol-->
                                        <div class="col-md-6"><!---description COl-->
                                            <div class="tim-typo">
                                                <p>{{$posts->matricule}}</p>
                                            </div>
                                        </div><!--endCol-->
                                    </div><!--end row description-->
                                    <!--Description-->
                                    <div class="row">
                                        <div class="col-md-6"><!---description COl-->
                                            <h6><span class="tim-note">Description</span></h6>
                                        </div><!--endCol-->
                                        <div class="col-md-6"><!---description COl-->
                                            <div class="tim-typo">
                                                <p>{!!$posts->description!!}</p>
                                            </div>
                                        </div><!--endCol-->
                                    </div><!--end row description-->
                                </div><!--end card content body-->
                            </div><!--end card-->
                        </div><!--end col 8 details infos-->
                        <div class="col-md-12" style="margin-top: 40px"> <!----------!!!!!COLL 12 , age , taille!!!!!------------>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">more details</h4>
                                </div><!--end header--->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6"><!---COl-->
                                                    <h6><span class="tim-note">Age : </span></h6>
                                                </div><!--endCol-->
                                                <div class="col-md-6"><!---COl-->
                                                    <div class="tim-typo">
                                                        <p>{{$details->age}} ans</p>
                                                    </div>
                                                </div><!--endCol-->
                                            </div><!--end row age-->
                                        </div><!--end Col age-->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6"><!---COl-->
                                                    <h6><span class="tim-note">Taille : </span></h6>
                                                </div><!--endCol-->
                                                <div class="col-md-6"><!---COl-->
                                                    <div class="tim-typo">
                                                        <p>{{$details->height}} cm</p>
                                                    </div>
                                                </div><!--endCol-->
                                            </div><!--end row taille-->
                                        </div><!--end Col taille-->
                                    </div><!---end Row , age , taille -->
                                </div><!---end card BODY--->
                            </div><!--end card--->
                        </div><!--- end col12 , more infos---->
                    </div><!--end row-->
                </div><!--end container---->
            </div><!---end content--->
@endsection
