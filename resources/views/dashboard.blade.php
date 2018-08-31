@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
<div class="display-4">@lang('interface.texts.welcome',['name'=> \Auth::user()->name])</div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-success" href="{{route('posts.create')}}">{{__('Create Posts')}}</a>
                    <hr>


                    {{--we can add All massage in file one ..--}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errors') }}
                        </div>
                    @endif


                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify">
        @foreach($userPost as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$post->subject}}</div>

                <div class="card-body">
                    {{$post->post_massage}}

                </div>
                <div class="card bg-dark-footer">
                    <a class="btn btn-success" href="{{route('posts.edit', $post->id)}}">{{__('Edit Post')}}</a>
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        {{method_field ('DELETE')}}
                        {{csrf_field ()}}
                        <button  onclick="return confirm({{__('Are you sure to delete this item?')}})" class="btn btn-danger" type="submit">{{__('Delete Post')}}</button>

                    </form>

                </div>
            </div>
        <br />
        </div>
        @endforeach
    </div>
</div>
@endsection
