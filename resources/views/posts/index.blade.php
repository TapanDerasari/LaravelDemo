@extends('layouts.app')
@section('title','Posts')
@section('breadcrumb',Breadcrumbs::render('posts'))
@section('content')
    <div class="container">
        @can('Create Post')
            <div class="float-right">
                <a href="{{route('posts.create')}}">Create Post</a>
            </div>
        @endcan
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                    @foreach ($posts as $post)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                    <p class="teaser">
                                        {{  str_limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection