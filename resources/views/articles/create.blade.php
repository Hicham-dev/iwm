@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Creation form
                    </div>
                    <div class="card-body">
                        <form action="{{url('articles')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Article name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required>                                    
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-right">Article price</label>
                                <div class="col-md-6">
                                    <input type="number" name="price" class="form-control" required>
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-from-label text-right">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" name="desc" required></textarea>                                    
                                </div>
                            </div>
                
                            <div class="from-group row">
                                <label for="picture" class="col-md-4 col-from-label text-right">Picture</label>                                
                                <div class="col-md-6">
                                    <input type="file" name="picture" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-2 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        Add
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