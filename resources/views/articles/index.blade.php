@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Articles list</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('article/create') }}" class="btn btn-success">Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Article name</th>
                                <th>Descreption</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->name }}</td>
                                <td>{{ $article->price }} DH</td>
                                <td>{{ $article->desc }}</td>
                                <td width="270px">
                                    <!--Call to article.show view -->
                                    <form action="{{ url('articles/'.$article->id) }}" method="POST">

                                        <!--Call to article.show view -->
                                        <a href="{{ url('articles/'.$article->id) }}" class="btn btn-primary">Show details</a>
                                        <!--Call to article.show view -->
                                        <a href="{{ url('articles/'.$article->id) .'/edit'}}" class="btn btn-warning">Edit</a>

                                        <!--Call to article.show view -->
                                        {{ method_field('DELETE')}}  
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" action="">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection