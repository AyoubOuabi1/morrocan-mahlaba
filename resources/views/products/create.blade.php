@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('saveProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="form-group">
                    <label for="image">Image:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>
            </form>

        </div>
    </div>
@endsection
