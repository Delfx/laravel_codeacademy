<form action="{{ route('update', $product->id) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input class="form-control" name="name" id="nameData" value="{{ $product->name }}" placeholder="Name">
    </div>

    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="description" class="form-label">Product description</label>
        <textarea class="form-control" name="description" id="productDescription" rows="3">{{ $product->description }}</textarea>
    </div>

    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="name" class="form-label">Category</label>
        <select name="categories" class="form-select" aria-label="Select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    @error('categories')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="identifier" class="form-label">Identifier</label>
        <input type="text" class="form-control" name="identifier" id="createProductDescription"
            value="{{ $product->identifier }}">
    </div>


    @error('identifier')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- <a href="{{ route('update', $product->id) }}" class="btn btn-primary">
        Update
    </a> --}}

    <button type="submit" class="btn btn-primary">Update</button>
</form>
