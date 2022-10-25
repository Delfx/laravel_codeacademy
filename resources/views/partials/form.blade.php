<form action="/" method="get">

    <div class="mb-3">
        <label for="searchField" class="form-label">Datalist example</label>
        <input class="form-control" name="searchField" id="exampleDataList" value="" placeholder="Type to search...">
    </div>

    <div class="mb-3">
        <select name="filterByCategories" class="form-select" aria-label="Default select example">
            <option selected>Filter By Category</option>
            @foreach ($productCategories as $productCategory)
                <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <select name="filterByPrice" class="form-select" aria-label="Default select example">
            <option selected>Filter by price</option>
            @foreach ($filersProducts as $filerProduct)
                <option value="{{ $filerProduct }}">{{ $filerProduct }}</option>
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/" class="btn btn-danger">Reset</a>
        <a href="/create" class="btn btn-warning">Create</a>
        <a href={{ route('order')}} class="btn btn-secondary">Orders</a>
</form>
