@include("components.head")


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-center text-white"><h2 class="mb-0">Edit Product</h2></div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ Route('updateProduct') }}">
                        @csrf
                        <input type="hidden" name="product_id" id="" value="{{ $product->ItemId }}">
                        <div class="mb-3 row">
                            <label for="Nama_Product" class="col-md-4 col-form-label text-md-end">Product Name</label>
                            <div class="col-md-6">
                                <input id="Nama_Product" type="text" class="form-control @error('Nama_Product') is-invalid @enderror" name="Nama_Product" value="{{ $product->Nama_Product }}" required autocomplete="Nama_Product" autofocus>
                                @error('Nama_Product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Price" class="col-md-4 col-form-label text-md-end">Price</label>
                            <div class="col-md-6">
                                <input id="Price" type="text" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ $product->Price }}" required autocomplete="Price">
                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <textarea id="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" required>{{ $product->Description }}</textarea>
                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Stock" class="col-md-4 col-form-label text-md-end">Stock</label>
                            <div class="col-md-6">
                                <input id="Stock" type="number" class="form-control @error('Stock') is-invalid @enderror" name="Stock" value="{{ $product->Stock }}" required>
                                @error('Stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="CategoryID" class="col-md-4 col-form-label text-md-end">Category</label>
                            <div class="col-md-6">
                                <select id="CategoryID" class="form-control @error('CategoryID') is-invalid @enderror" name="CategoryID" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->CategoryID == $category->id ? 'selected' : '' }}>{{ $category->Category_Name }}</option>
                                    @endforeach
                                </select>
                                @error('CategoryID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Img_Detail_1" class="col-md-4 col-form-label text-md-end">Image 1</label>
                            <div class="col-md-6">
                                <input id="Img_Detail_1" type="file" class="form-control @error('Img_Detail_1') is-invalid @enderror" name="Img_Detail_1">
                                @if ($product->Img_Detail_1)
                                    <img src="{{ asset('storage/' . $product->Img_Detail_1) }}" width="100px">
                                @endif
                                @error('Img_Detail_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Img_Detail_2" class="col-md-4 col-form-label text-md-end">Image 2</label>
                            <div class="col-md-6">
                                <input id="Img_Detail_2" type="file" class="form-control @error('Img_Detail_2') is-invalid @enderror" name="Img_Detail_2">
                                @if ($product->Img_Detail_2)
                                    <img src="{{ asset('storage/' . $product->Img_Detail_2) }}" width="100px">
                                @endif
                                @error('Img_Detail_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Img_Detail_3" class="col-md-4 col-form-label text-md-end">Image 3</label>
                            <div class="col-md-6">
                                <input id="Img_Detail_3" type="file" class="form-control @error('Img_Detail_3') is-invalid @enderror" name="Img_Detail_3">
                                @if ($product->Img_Detail_3)
                                    <img src="{{ asset('storage/' . $product->Img_Detail_3) }}" width="100px">
                                @endif
                                @error('Img_Detail_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
