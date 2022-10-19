@extends('layouts.app')
@section('content')
<form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row ">
            <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <input type="number" name="price" Placeholder="Price"class="form-control">
                </div>

                <br>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>

                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
            </div>

        </form>

@endsection