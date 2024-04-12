@extends('master')
@section('dashboard')
    <div class="flex items-center rounded bg-[url('../images/menu-heade.jpg')] bg-cover bg-center bg-no-repeat p-3.5 text-white">
        <span class="ltr:pr-2 rtl:pl-2 ml-3 mr-3">
            <strong class="ltr:mr-1 rtl:ml-1">
            Sanatçı Bilgileri Düzenle
            </strong>
        </span>
    </div>
    <div class="panel lg:col-span-2 mt-5">
        <div class="mb-5">
            <form action="{{ route('update.artist') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $artist->id }}">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2">
                    <div class="mb-2 ml-3 mr-3">
                        <label>Sanatçı Adı ve Soyadı</label>
                        <input type="text" class="form-input" name="artist_name" value="{{ $artist->artist_name }}">
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Sanatçı Email</label>
                        <input type="text" class="form-input" name="artist_email" value="{{ $artist->artist_email }}">
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>Sanatçı Telefon</label>
                        <input type="text" class="form-input" name="artist_telefon" value="{{ $artist->artist_telefon }}">
                    </div>
                    <div class="mb-2 mr-3">
                        <button type="submit" class="btn btn-primary mt-6 ml-3 mr-3">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
