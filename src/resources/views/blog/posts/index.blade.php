@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col">
            <h1>Posts</h1>
            <hr>
            <table class="table table-striped">
                <thead class="bg-dark text-white">
                <tr>
                    <th>№</th>
                    <th>Title</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

