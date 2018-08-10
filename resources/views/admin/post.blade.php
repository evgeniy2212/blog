@extends('layouts.main')

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{ asset('img/post-bg.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-0">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="meta">Posted by {{ $article->user->name }} on {{ $article->created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    @include ('msg')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-0">
                <p>{{ $article->text }}</p>
                    {{ Form::model($article, array('route' => array('article.update', $article->id), 'method' => 'PUT')) }}
                    <div class="form-group">
                        <div class="col-xs-offset-1">
                            <strong>Title:</strong><br>{!! Form::text('title') !!}<br><br>
                        </div>
                        <div class="col-xs-offset-1">
                            <strong>Article:</strong><br>{!! Form::textarea('text') !!}<br><br>
                        </div>
                        <div class="col-xs-3 col-xs-offset-1">
                            {!! Form::submit('Update Article', ['class' => ' btn btn-warning']) !!}
                            {{ Form::close() }}
                        </div>

                        <div class="col-xs-3 col-xs-offset-4">
                            {{ Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                            {{--<div class="col-xs-offset-1">--}}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {{ Form::close() }}
                    </div>
            </div>
            <div class="col-xs-4">
                <h3>Comments:</h3>
                    @foreach($article->comments as $comment)
                            <div class="row">
                                <div class="col-xs-12 col-xs-offset-0">
                                    {{ $comment->text }}
                                    <div class="comment-date">by {{ $comment->user->name}} on {{ $comment->created_at }}</div>
                                </div>
                                <div class="col-xs-4">
                                    {{ Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'DELETE', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        <hr>
                    @endforeach

                    {{ Form::open(['route' => ['admin.store', 'article_id' => $article->id], 'method' => 'POST', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                    {!! Form::textarea('text', null, ['class' => 'form-control','cols' => '20', 'rows' => '10']) !!}
                    <br>
                    {!! Form::submit('Feedback', ['class' => 'btn btn-primary']) !!}
                    {{ Form::close() }}
            </div>


        </div>
    </div>
</article>

@endsection
