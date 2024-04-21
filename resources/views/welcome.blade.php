@extends('masterblade.master')

@section('content')
<div class="container">
    <h1 class="text-center">Product Search</h1>
    
    <!-- Search and Filter Form -->
    <form action="{{ route('getAllItems') }}" method="GET">
        <div class="row">
            <div class="col-md-3">
                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-3">
                <!-- Minimum Price Input -->
                <div class="form-group">
                    <label for="min_price">Minimum Price:</label>
                    <input type="number" class="form-control" name="min_price" id="min_price" value="{{ request('min_price') }}">
                </div>
            </div>
            <div class="col-md-3">
                <!-- Maximum Price Input -->
                <div class="form-group">
                    <label for="max_price">Maximum Price:</label>
                    <input type="number" class="form-control" name="max_price" id="max_price" value="{{ request('max_price') }}">
                </div>
            </div>
            <div class="col-md-3">
                <!-- Sort Input -->
                <div class="form-group">
                    <label for="sort">Sort By Price:</label>
                    <select class="form-control" name="sort" id="sort">
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <ul class="list-group mt-4">
        @foreach ($items as $product)
            <li class="list-group-item">{{ $product['prodName'] }} - RM{{ $product['prodPrice'] }}</li>
        @endforeach
    </ul>
</div>

@endsection