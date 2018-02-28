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
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$picture}}" alt="" width="100%">
                        </div>
                        <div class="col-md-6">
                            <form action="{{ url('articles').'/'.$article->id }}" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-right">Article name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ $article->name }}">                                    
                                    </div>
                                    <!-- Check if there are any requesr error -->
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <!-- Showing the first error-->
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-right">Article price</label>
                                    <div class="col-md-6">
                                        <input type="number" name="price" class="form-control" value="{{ $article->price }}">
                                    </div>
                                    <!-- Check if there are any requesr error -->
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                            <!-- Showing the first error-->
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    
                                <div class="form-group row">
                                    <label for="desc" class="col-md-4 col-from-label text-right">Description</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="3" name="desc">{{ $article->desc }}</textarea>                                    
                                    </div>
                                    <!-- Check if there are any requesr error -->
                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback">
                                            <!-- Showing the first error-->
                                            <strong>{{ $errors->first('desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    
                                <div class="from-group row">
                                    <label for="picture" class="col-md-4 col-from-label text-right">New picture</label>                                
                                    <div class="col-md-6">
                                        <input type="file" name="picture">
                                    </div>
                                    <!-- Check if there are any requesr error -->
                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedback">
                                            <!-- Showing the first error-->
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-2 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                                {{ method_field('PUT')}}  
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection