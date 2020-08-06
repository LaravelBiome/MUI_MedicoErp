@extends('layouts.app', ['activePage' => 'patient_details', 'titlePage' => __('Manage patient')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card" style="margin-top: 80px"><!--thecard-->
                <div class="card-header card-header-primary">
                    <h4 class="card-title">modifier le patient</h4>
                    <p class="card-category">Renseigner les informations</p>
                        <!--UTILS NAV-->
                            <div class="card-actions text-left">
                                <button type="button" rel="tooltip" class="btn btn-dark btn-round" onclick="window.location='{{ url('patient') }}'">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </div><!--End Nav Util-->
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>['PatientsController@update', $posts->id],'method'=>'POST' ,  'files' => true , 'enctype' => 'multipart/form-data']) !!}
                        <div class="row" style="margin: 30px">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('lname','Nom',['class'=>'bmd-label-floating'])}}
                                    {{Form::text('lname', $posts->lname , ['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('fname','Prenom',['class'=>'bmd-label-floating'])}}
                                    {{Form::text('fname', $posts->fname , ['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('age','Age',['class'=>'bmd-label-floating'])}}
                                    {{Form::number('age', $details->age , ['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row" style="margin: 30px">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('matricule','Matricule',['class'=>'bmd-label-floating'])}}
                                    {{Form::text('matricule', $posts->matricule , ['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('height','Taille cm',['class'=>'bmd-label-floating'])}}
                                    {{Form::number('height', $details->height , ['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div><!---end row matricule height---->
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::file('patient_image') !!}
                            </div><!--end col image -->
                        </div><!--end row image--->
                        <div class="row"  style="margin: 30px">
                            <div class="col-md-12">
                                <div class="form-group">
                                        {{Form::label('description','Description',['class'=>'bmd-label-floating'])}}
                                        {!!Form::textarea('description',$posts->description, ['class'=>'form-control','id'=>'article-ckeditor','cols'=>'80', 'row'=>'10'])!!}
                                </div><!--formGrou^p-->
                            </div><!--end col-->
                        </div><!--end row-->
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-round pull-right'])}}
                    {!! Form::close() !!}<!--end form-->
                </div><!--end body card-->
            </div><!--end card-->
        </div><!--end row-->
    </div><!--end container---->
</div><!---end content--->

@endsection
