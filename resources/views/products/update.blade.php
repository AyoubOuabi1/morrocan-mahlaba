@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('update Product') }}</div>

                <div class="card-body justify-content-center">
                     <img src="{{ asset('images/' . $product->image) }}" height="180px" alt="Product Image">
                    <form action="{{ route('updateProduct', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">Update Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
