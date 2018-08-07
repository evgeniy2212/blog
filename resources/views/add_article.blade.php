@extends('layouts.main')
@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{ asset('img/post-bg.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        {{--<h1>{{ $post_id[0]->title }} _ {{ $post_id[0]->id }}</h1>--}}
                        {{--<span class="meta">Posted by {{ $post_id[0]->author }} on {{ $post_id[0]->created_at }}</span>--}}
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
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-2">
                    {{ Form::open(['route' => ['article.store','user_id' => Auth::user()->id], 'method' => 'POST', 'class' => 'form-horizontal', 'before' => 'csrf']) }}
                    <div class="form-group">
                        <div class="col-xs-offset-1">
                            <strong>Title:</strong><br>{!! Form::text('title') !!}<br><br>
                        </div>
                        <div class="col-xs-offset-1">
                            <strong>Article:</strong><br>{!! Form::textarea('text') !!}<br><br>
                        </div>
                        <div class="col-xs-offset-4">
                            {!! Form::submit('Add Article', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection

