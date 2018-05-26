@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
       <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Article {{ $article->id }}</h2>
                        </div>
                        @if (Auth::check())
                        <div class="col-md-6 text-right">
                            <form action="{{ url('articles/'.$article->id) }}" method="POST">

                                <!--Call to article.show view -->
                                <a href="{{ url('articles/'.$article->id) .'/edit'}}" class="btn btn-warning">Edit</a>

                                <!--Call to article.show view -->
                                {{ method_field('DELETE')}}  
                                {{ csrf_field() }}
                                <button class="btn btn-danger" action="">
                                    Delete
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$picture}}" alt="" width="100%">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Article name</label>
                                <div class="col-md-6">
                                    <h3>{{ $article->name }}</h3>                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Article price</label>
                                <div class="col-md-6">
                                    <p>{{$article->price}} DH</p>                                   
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Description</label>
                                <div class="col-md-6">
                                    <p>{{$article->desc}}</p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection