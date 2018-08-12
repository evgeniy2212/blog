@extends('admin.main')
@section('content')
    <div class="container">
        @include ('msg')
        <div class="row">

                @foreach($articles as $article)
                <div class="col-xs-5 col-xs-offset-2">
                    <div class="post-preview">
                        <a href="{{ route('admin.show', $article->id) }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                                {{--{{ $article->id }}--}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $article->desc }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by {{ $article->user->name }} {{ $article->created_at }}</p>
                    </div>
                    <hr>
                </div>
                <div class="col-xs-2">
                    {{ Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                    <div class="form-group">
                        <div class="col-xs-offset-5">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                    <div class="col-xs-1">
                        <a href="{{ route('admin.show', $article->id) }}" class="btn btn-warning">Update article</a>
                    </div>
                @endforeach
            <div class="col-xs-12 col-xs-offset-2">
                {{ $articles->links() }}
            </div>

        </div>
    </div>
@endsection