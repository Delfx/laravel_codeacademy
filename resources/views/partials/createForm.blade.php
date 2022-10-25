<form action="/store" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input class="form-control" name="name" id="nameData" value="{{ fake()->words(2, true) }}" placeholder="Name">
    </div>

    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="description" class="form-label">Product description</label>
        <textarea class="form-control" name="description" id="productDescription" rows="3">{{ fake()->paragraph(2) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Category</label>
        <select name="categories" class="form-select" aria-label="Select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="identifier" class="form-label">Identifier</label>
        <input type="text" class="form-control" name="identifier" id="createProductDescription"
            value="{{ fake()->ean13() }}" placeholder="{{ fake()->ean13() }}">
    </div>

    <button type="Save" class="btn btn-primary">Submit</button>
</form>
