    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Comments</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            @auth
                            <a href="{{ url('articles/'.$article->id.'/comments/create') }}" class="btn btn-success">Ajouter</a>
                            @endAuth
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Commentaire</th>
                                <th>date</th>
                                @auth
                                <th>Actions</th>
                                @endAuth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($article->comments as $comment)
                            <tr>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->text }}</td>
                                <td>{{ $comment->created_at }}</td>
                                @auth
                                <td width="270px">
                                    <!--Call to article.show view -->
                                    <form action="{{ url('articles/'.$article->id.'/comments/'.$comment->id) }}" method="POST">

                                        <!--Call to article.show view -->
                                        <a href="{{ url('articles/'.$article->id.'/comments/'.$comment->id) .'/edit'}}" class="btn btn-warning">Edit</a>

                                        <!--Call to article.show view -->
                                        {{ method_field('DELETE')}}  
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" action="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                @endAuth
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
