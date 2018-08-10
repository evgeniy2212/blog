@extends('layouts.main')
@section('content')
    <div class="container">
        @include ('msg')
        <div class="row">
            {{ Form::open(array('url'       => '/sort-date',
                                'before'    => 'csrf',
                                'method'    => 'post',
                                ))
            }}
            <div class="form-group row">
                <p>{{ Form::label('By publication date') }}</p>
                <div class="col-xs-4">
                    {{ Form::select('date', array('DESC' => 'New', 'ASC' => 'Older',), 'DESC', ['class' => 'form-control col-xs-4']) }}
                </div>
                <div class="col-xs-1">
                    {{ Form::submit('Sort',array('class' => 'btn btn-success pull-right') ) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="{{ route('article.show', $article->id) }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                                {{--{{ $article->id }}--}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $article->desc }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by {{ $article->user()->get()->get(0)->name }} {{ $article->created_at }}</p>
                        {{--<div class="col-xs-offset-1">--}}
                            {{--<a href="{{ route('comments', $article->id) }}"> Comments </a>--}}
                        {{--</div>--}}
                        {{--<a href="{{ route('comments', $article->id) }}"> Comments </a>--}}
                    </div>
                    <hr>
                @endforeach
                {{ $articles->appends(array())->links() }}
            <!-- Pager -->
                {{--<ul class="pager">--}}
                {{--<li class="next">--}}

                {{--<a href="#">Older Posts &rarr;</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
@endsection