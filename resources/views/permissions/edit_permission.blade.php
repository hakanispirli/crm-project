@extends('master')
@section('dashboard')
    <div class="flex items-center rounded bg-[url('../images/menu-heade.jpg')] bg-cover bg-center bg-no-repeat p-3.5 text-white">
        <span class="ltr:pr-2 rtl:pl-2 ml-3 mr-3">
            <strong class="ltr:mr-1 rtl:ml-1">
            İzin Bilgileri Düzenle
            </strong>
        </span>
    </div>
    <div class="panel lg:col-span-2 mt-5">
        <div class="mb-5">
            <form action="{{ route('update.permission') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $permission->id }}">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2">
                    <div class="mb-2 ml-3 mr-3">
                        <label>İzin Adı</label>
                        <input type="text" class="form-input" name="name" value="{{ $permission->name }}">
                    </div>
                    <div class="mb-2 ml-3 mr-3">
                        <label>İzin Grup Adı</label>
                        <input type="text" class="form-input" name="group_name" value="{{ $permission->group_name }}">
                    </div>
                    <div class="mb-2 mr-3">
                        <button type="submit" class="btn btn-primary mt-6 ml-3 mr-3">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    group_name: {
                        required: 'Lütfen Bir Roller Seçiniz!',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>


    <script type="text/javascript">
        $('#checkboxMain').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true)
            } else {
                $('input[type=checkbox]').prop('checked', false)
            }
        });
    </script>
@endsection
