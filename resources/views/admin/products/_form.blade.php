<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name', $product->name ?? '') }}">
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="text" name="price" class="form-control"
        value="{{ old('price', $product->price ?? '') }}">
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Brand</label>
    <select name="brand_id" class="form-control">
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}"
                {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Image</label>

    <input type="file"
           name="image"
           class="form-control"
           id="imageInput"
           accept="image/*">

    @php
        $imageUrl = isset($product) && $product->image
            ? asset('storage/' . $product->image)
            : '';
    @endphp

   <div class="mt-2">
    <small class="text-muted">Preview:</small><br>

    <img id="previewImage"
         src="{{ $imageUrl }}"
         width="120"
         class="border rounded p-1 {{ $imageUrl ? '' : 'd-none' }}">
</div>
</div>

{{-- JS Preview --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('previewImage');

    if (input && preview) {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none'); // ✅ FIX
                };

                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush