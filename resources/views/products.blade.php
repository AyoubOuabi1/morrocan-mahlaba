@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>

             @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><img src="{{ asset('images/'.$product->image) }}" height="40px" width="50px" alt="Image"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form method="POST" action="{{ route('updateRole') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $product->id }}">
                            <button type="submit" name="submit" data-id="{{ $product->id }}" class="btn btn-success acceptAdmin"  >Accept</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('deleteUser') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
