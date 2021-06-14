@extends('layout')
@section('content')
    @if(Session::has("success"))
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-success">
                    Voto computado com sucesso!
                </div>
            </div>
        </div>

    @endif

    @if($poll->closes_at->isPast())
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-warning">
                    Enquete encerrada.
                </div>
            </div>
        </div>
        @elseif($poll->starts_at->isFuture())
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-warning">
                    Enquete iniciará em {{$poll->starts_at->format('d/m/Y')}}
                </div>
            </div>
        </div>
    @else
        <poll-component :poll="{{json_encode($poll)}}" :options="{{json_encode($options)}}"></poll-component>

    @endif
@endsection
