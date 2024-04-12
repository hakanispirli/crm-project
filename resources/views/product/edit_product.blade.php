@extends('master')
@section('dashboard')
    <div class="flex items-center rounded bg-[url('../images/menu-heade.jpg')] bg-cover bg-center bg-no-repeat p-3.5 text-white">
        <span class="ltr:pr-2 rtl:pl-2 ml-3 mr-3">
            <strong class="ltr:mr-1 rtl:ml-1">
            Ürün Ekle Formu
            </strong>
        </span>
    </div>
    <div class="panel lg:col-span-2 mt-5">
        <div class="mb-5">
            <form action="{{ route('update.products') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2">
                    <div class="mb-2 ml-3 mr-3">
                        <label>Ürün Adı</label>
                        <input type="text" class="form-input" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Marka</label>
                        <select name="brand_id" class="form-select text-white-dark">
                            <option selected="" disabled>Lütfen bir marka seçiniz</option>
                            @foreach ($brand as $marka)
                                <option value="{{ $marka->id }}" {{ $product->brand_id == $marka->id ? 'selected' : '' }}>
                                    {{ $marka->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Stok Adedi</label>
                        <input type="text" class="form-input" name="stock" value="{{ $product->stock }}" required>
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Alış Fiyatı</label>
                        <input type="text" class="form-input" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Açıklamalar</label>
                        <textarea class="form-input" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary mt-6 ml-3 mr-3">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
