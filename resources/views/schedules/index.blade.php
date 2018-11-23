@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Schedules')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">List Of Schedules</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">Schedules</li>
    </ol>
</div>


<div class="col-lg-12">
    @if (count($errors) > 0)
    <div id="notificationError" class="alert alert-danger">
        <strong>Ocurrió un problema con tus datos de entrada</strong><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('message.nivel'))

    <div class="alert alert-{{ session('message.nivel') }} alert-dismissible" role="alert">
        <div class="m-alert__icon">
            <i class="fa fa-{{ session('message.icon') }}"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                {{ session('message.title') }}
            </strong>
            {{ session('message.content') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
    @endif
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card card-default color-palette-box">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tag"></i>
                    Manage Schedules
                </h3>
            </div>

            <div class="card-body">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#failedschedules">Failed Schedules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#goodschedules">Good Schedules</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active container" id="failedschedules">
                        <table class="table table-condensed" id="failedschedulestabla" width="100%">
                            <thead  width="100%">
                                <tr>
                                    <th style="width:3%">ID</th>
                                    <th style="width:7%">Origin</th>
                                    <th style="width:7%">Destination</th>
                                    <th style="width:5%">Carrier</th>
                                    <th style="width:5%">Vessel</th>
                                    <th style="width:3%">Voyage</th>
                                    <th style="width:20%">Route Type</th>
                                    <th style="width:10%">Via</th>
                                    <th style="width:10%">Etd</th>
                                    <th style="width:10%">Eta</th>
                                    <th style="width:10%">Transit Time</th>
                                    <th style="width:5%">Options</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane  container" id="goodschedules">
                        <table class="table table-condensed" id="goodschedulestabla" width="100%">
                            <thead  width="100%">
                                <tr>
                                    <th style="width:3%">ID</th>
                                    <th style="width:7%">Origin</th>
                                    <th style="width:7%">Destination</th>
                                    <th style="width:5%">Carrier</th>
                                    <th style="width:5%">Vessel</th>
                                    <th style="width:3%">Voyage</th>
                                    <th style="width:20%">Route Type</th>
                                    <th style="width:10%">Via</th>
                                    <th style="width:10%">Etd</th>
                                    <th style="width:10%">Eta</th>
                                    <th style="width:10%">Transit Time</th>
                                    <th style="width:5%">Options</th>
                                </tr>
                            </thead>
                        </table>    

                    </div>
                
                </div>


            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop