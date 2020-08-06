@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('Add patient')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card" style="margin-top: 80px"><!--thecard-->
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Ajouter un patient</h4>
                    <p class="card-category">Renseigner les informations</p>
                        <!--UTILS NAV-->
                        <div class="card-actions text-left">
                            <button type="button" rel="tooltip" class="btn btn-dark btn-round" onclick="window.location='{{ url('patient') }}'">
                                <i class="material-icons">arrow_back</i>
                            </button>
                        </div><!--End Nav Util-->
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>'PatientsController@store','method'=>'POST' , 'files' => true , 'enctype' => 'multipart/form-data' ]) !!}
                        <div class="row" style="margin: 30px">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('lname','Nom',['class'=>'bmd-label-floating'])}}
                                    {{Form::text('lname','', ['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('fname','Prenom',['class'=>'bmd-label-floating'])}}
                                    {{Form::text('fname','', ['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('age','Age',['class'=>'bmd-label-floating'])}}
                                    {{Form::number('age','', ['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row" style="margin: 30px">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('matricule','Matricule',['class'=>'bmd-label-floating'])}}
                                    @php
                                        function getGUID()
                                        {
                                            if (function_exists('com_create_guid'))
                                            {
                                                return com_create_guid();
                                            }else
                                            {
                                                mt_srand((double)microtime()*10000);
                                                $charid = strtoupper(md5(uniqid(rand(), true)));
                                                $hyphen = chr(45);// "-"
                                                $uuid = chr(123)// "{"
                                                .substr($charid, 0, 8).$hyphen
                                                .substr($charid, 8, 4).$hyphen
                                                .substr($charid,12, 4).$hyphen
                                                .substr($charid,16, 4).$hyphen
                                                .substr($charid,20,12)
                                                .chr(125);// "}"
                                                return $uuid;
                                            }
                                        }
                                        $GUID = getGUID();
                                    @endphp
                                    {!!Form::text('matricule',$GUID, ['class'=>'form-control'])!!}
                                </div>
                            </div><!---matricule COl-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('height','Taille cm',['class'=>'bmd-label-floating'])}}
                                    {{Form::number('height','', ['class'=>'form-control'])}}
                                </div>
                            </div><!--height col--->
                            <div class="col-md-4">
                                        {!! Form::file('patient_image' , ['class'=>'btn btn-dark btn-round']) !!}
                            </div><!--end col image -->
                        </div><!----row----->
                        <div class="row"  style="margin: 30px">
                            <div class="col-md-12">
                                <div class="form-group">
                                        {{Form::label('description','Description',['class'=>'bmd-label-floating'])}}
                                        {{Form::textarea('description',' ', ['class'=>'form-control','id'=>'article-ckeditor','cols'=>'80', 'row'=>'10'])}}
                                </div><!--formGrou^p-->
                            </div><!--end col-->
                        </div><!--end row-->
                        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-round pull-right'])}}
                    {!! Form::close() !!}<!--end form-->
                </div><!--end body card-->
            </div><!--end card-->
        </div><!--end row-->
    </div><!--end container---->
</div><!---end content--->
<!---Super editor--->
@endsection

