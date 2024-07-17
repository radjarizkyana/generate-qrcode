<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <form class="form-inline" action="{{ route('generate.update', $data->id) }}" method="POST">
                  @method('PATCH')
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="firstname" placeholder="Masukan nama depan" value="{{ old('fisrtname', $data->firstname) }}">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="text" class="form-control" name="lastname" placeholder="Masukan nama belakang" value="{{ old('lastname', $data->lastname) }}">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="text" class="form-control" name="jabatan" placeholder="Masukan jabatan" value="{{ old('jabatan', $data->jabatan) }}">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="email" class="form-control" name="email" placeholder="Masukan email" value="{{ old('email', $data->email) }}">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="text" class="form-control" name="rumah" placeholder="Masukan rumah" value="{{ old('rumah', $data->rumah) }}">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="text" class="form-control" name="perusahaan" placeholder="Masukan perusahaan" value="{{ old('perusahaan', $data->perusahaan) }}">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="phone" placeholder="Masukan no telepon" value="{{ old('phone', $data->phone) }}">
                      </div>
                    <button type="submit" class="btn btn-primary ml-1 mb-2" onclick="editQr('{{ $data->id }}')">Edit</button>
                    <a class="btn btn-primary ml-1 mb-2" href="/">Cancel</a>
                  </form>
            </div>
        </div>

        <script>
          function editQr(id) {
            if(confirm('Anda Akan Edit Data Ini?')){
                $(`#form-edit-${id}`).submit()
            }
            }
        </script>
</body>
</html>