@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$thread ->title}}</div>

                    <div class="panel-body">

                        {{$thread ->body}}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread -> replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if (auth()->check())
            <div class="row" style="padding-bottom:50px">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" action="{{$thread->path() . '/replies'}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control"
                                      placeholder="Enter something to say" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        @else

            <p class="text-center">Please<a href="{{ route('login') }}"> Sign in</a> to use this forum!</p>

        @endif
    </div>


@endsection
