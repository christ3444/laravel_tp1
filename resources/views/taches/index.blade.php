
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs">
            <a name="" id="" class="btn btn-primary m-4"  href="{{route('taches.create') }}"role="button">ajouter une tache</a>
        </div>
        <div class="col-xs">
            <a name="" id="" class="btn btn-basic m-4"  href="{{route('taches.en-cours') }}"role="button">liste des taches</a>
        </div>
        <div class="col-xs">
            <a name="" id="" class="btn btn-success m-4"  href="{{route('taches.accompli') }}"role="button">Taches acomplies</a>
        </div>
    </div>
</div>



<div class="container">
{{$datas->links() }}
    <div class="row">
        <div class="col-md-12">
@foreach ($datas as $data)

<div class="alert alert-{{ $data->accompli ? 'success' : 'danger' }}" role="alert">

        <div class="row">
            <div class="col-sm">
            <small>
                creer {{$data->created_at->from() }}
            
            </small>
            <details>
            <summary>
                <strong> {{ $data->titre }}</strong>
            </summary>   
                {{ $data->description }}
                <small>
               expire le {{$data->expiration }}
            
            </small>
                </details>
            </div>
            <div class="col-sm form-inline justify-content-end my-1">
                @if($data->accompli== 0)
                <form action="{{route('taches.update', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success mx-1 my-1" role="button"> <i class="fa fa-check"></i>accomplie</button>
            </form>
            @else
            <form action="{{route('taches.update', $data->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit"name="id" value="{{ $data->id }}" class="btn btn-warning mx-1 my-1" role="button"> <i class="fa fa-times">non accomplie </i></button>
            </form> 
            @endif
            <a name="" id="" class="btn btn-info mx-1 my-1" href="{{route('taches.edit', $data->id) }}" role="button" >Modifier </a>
            <form action="{{route('taches.destroy', $data->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-1 my-1" role="button"> <i class="fa fa-trash"></i> supprimer</button>
            </form>
           
            </div>
            
        </div>


</div>

@endforeach


        </div>
    </div>
</div>
@endsection