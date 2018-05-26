@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Formulaire de creation
                    </div>
                    <div class="card-body">
                        <form action="{{ url('articles/'.$idArticle.'/comments') }}" method="post">
                
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-from-label text-right">Commentaire</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" name="text" required></textarea>                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-2 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection