@extends('layouts.master')
@section('content')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                        <header>Chart</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
               <center>
                   {!! $chart->render() !!}

               </center>

            </div><!--end .col -->
            <div class="col-md-6 col-sm-6">
                <center>
                    {!! $case->render() !!}

                </center>

            </div>
            <div class="col-md-6 col-sm-6">
                <center>
                    {!! $caso->render() !!}

                </center>

            </div>
            <div class="col-md-6 col-sm-6">
                <center>
                    {!! $contacto->render() !!}

                </center>

            </div>

        </div><!--end .row -->
        {{--</div><!--end .section-body -->--}}
        {{--</section>--}}

@endsection