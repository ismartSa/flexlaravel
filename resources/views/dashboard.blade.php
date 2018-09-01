@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="display-7 align-items-center">
                @lang('interface.texts.welcome',['name'=> \Auth::user()->name])
            </div>

             @include('includes.massage')
            <br />
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-success" href="{{route('posts.create')}}">{{__('Create Posts')}}</a>
                    <hr>




                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="display-4">
        {{__('All Posts ')}}
    </div>
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
                        <button  onclick="return confirm('{{__('Are you sure to delete this item?')}}')" class="btn btn-danger" type="submit">{{__('Delete Post')}}</button>

                    </form>

                </div>
            </div>
        <br />
        </div>
        @endforeach
    </div>
   {{--for delete --}}
    @if(count($userTrashedPosts))
        <div class="display-4">
            {{__('Delete Posts ')}}
        </div>
    <div class="row justify">

        @foreach($userTrashedPosts as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$post->subject}}</div>

                <div class="card-body">
                    {{$post->post_massage}}

                </div>
                <div class="card bg-dark-footer">

                    <form action="{{route('posts.restore', $post->id)}}" method="post">
                        {{method_field ('PUT')}}
                        {{csrf_field ()}}
                        <button  onclick="return confirm('{{__('Are you sure to restore this item?')}}')" class="btn btn-dark" type="submit">{{__('Restore Post')}}</button>

                    </form>
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        {{method_field ('DELETE')}}
                        {{csrf_field ()}}
                        <button  onclick="return confirm('{{__('Are you sure to delete this item?')}}')" class="btn btn-danger" type="submit">{{__('Delete Post')}}</button>

                    </form>

                </div>
            </div>
        <br />
        </div>
        @endforeach
    </div>
        @else
        <div class="alert alert-info" role="alert">
            {{__('No Posts Deleted , try again !!  ')}}
        </div>

      @endif

</div>
@endsection
