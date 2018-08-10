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
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-lg-offset-0">
                <p>{{ $article->text }}</p>
            </div>

            <div class="col-xs-4">
                <h3>Comments:</h3>
                {{--@foreach($digits as $digit)--}}
                    {{--{{ $digit[0]->name }}--}}
                {{--@endforeach--}}
                @foreach($article->comments as $comment)
                    <div class="row">
                        <div class="col-xs-12 col-xs-offset-0">
                            {{ $comment->text }}
                            <div class="comment-date">by {{ $comment->user->name}} on {{ $comment->created_at }}</div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @guest
                    <p>Чтобы оставить комментарий, <a href="{{ url('/login') }}">Войдите</a> или <a href="{{ url('/login') }}">Зарегистрируйтесь!</a>!</p>
                @else
                {{ Form::open(['route' => ['comment.store', 'article_id' => $article->id, 'user_id' => Auth::user()->id],  'method' => 'POST', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                {{--{!! Form::label('text', 'Comment:') !!}--}}
                {{--<div class="col-xs-offset-1">--}}
                {!! Form::textarea('text', null, ['class' => 'form-control','cols' => '20', 'rows' => '10']) !!}
                {{--</div>--}}
                {{--<div class="col-xs-offset-4">--}}
                <br>
                {!! Form::submit('Feedback', ['class' => 'btn btn-primary']) !!}
                {{--</div>--}}
                {{ Form::close() }}
                @endguest
            </div>

        </div>
    </div>
</article>
@endsection
