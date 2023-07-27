@extends('layouts.principal')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p style="text-align: center;">
                                {!! $mensaje !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection