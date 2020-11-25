@extends('layouts.app')

@section('content')
    @php
        /** @var App\Models\BlogPost $item */
        $editAction = $item->exists ? route('blog.admin.posts.update', $item->id) : route('blog.admin.posts.store');
        $editMethod = $item->exists ? 'PATCH' : 'POST';
    @endphp
    <div class="container">
        @include ('blog.admin.posts.includes.result_messages')

        <form method="POST" action="{{ $editAction }}">
            @csrf
            @method($editMethod)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.posts.includes.post_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.posts.includes.post_edit_add_col')
                </div>
            </div>
        </form>

        @if ($item->exists)
        <br>
        <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
            @csrf
            @method('DELETE')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-block">
                        <div class="card-body ml-auto">
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
        @endif
    </div>
@endsection
