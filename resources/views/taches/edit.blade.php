@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
        <div class="col-md-6">
            <div class="card justify-content-center">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Modification de la tache  <span class="badge badge-dark">#id : {{$tache->id}} </span></h4>
                </div>
                <div class="card-body">
                    <form action="{{route('taches.modif', $tache->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Titre</label>
                            <input type="text" name="name" value="{{$tache->name}}" class="form-control" id="name" aria-describedby="nameHelp">
                           
                        </div>
                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="date" name="expiration" value="{{$tache->name}}"  class="form-control" id="expiration" aria-describedby="nameHelp">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text"  value="{{$tache->description}}"  name="description" class="form-control" id="description" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Decrivez votre tache.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>
           

@endsection
