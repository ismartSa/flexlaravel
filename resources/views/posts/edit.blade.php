@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="display-4">@lang('interface.texts.welcome',['name'=> \Auth::user()->name])</div>
            <div class="col-md-8">
                     <div class="card">

                             <div class="card-header">{{__('update new Post')}}</div>
                             <div class="card-body">

                                  <form action="{{route('posts.update',$post->id)}}" method="post">
                                      {{method_field ('PUT')}}
                                     @csrf
                                     <div class="form-group row">
                                         <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                                         <div class="col-md-6">
                                             <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{$post->subject}}">

                                             @if ($errors->has('subject'))
                                                 <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                             @endif
                                         </div>
                                 </div>
                                      <div class="form-group row">
                                         <label for="post_massage" class="col-md-4 col-form-label text-md-right">{{ __('Post massage') }}</label>

                                         <div class="col-md-6">
                                             <textarea id="post_massage" type="text" class="form-control{{ $errors->has('post_massage') ? ' is-invalid' : '' }}" name="post_massage">{{ $post->post_massage}}</textarea>

                                             @if ($errors->has('post_massage'))
                                                 <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_massage') }}</strong>
                                        </span>
                                             @endif
                                         </div>
                                 </div>
                                      <div class="form-group row mb-0">
                                          <div class="col-md-6 offset-md-4">
                                              <button type="submit" class="btn btn-primary">
                                                  {{ __('Submit') }}
                                              </button>
                                          </div>
                                      </div>
                                 </form>
                            </div>

                     </div>
            </div>
    </div>
</div>
@endsection
