
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="resources/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
    </head>
    

<style>
  body {
                font-family: 'Nunito';
            }
  li {
      list-style: none;
      margin: 20px 0 20px 0;
  }

  a {
      text-decoration: none;
  }

  .sidebar {
      width: 180px;
      height: 100vh;
      position: fixed;
      margin-left: -300px;
      transition: 0.4s;
  }

  .active-main-content {
      margin-left: 180px;
  }

  .active-sidebar {
      margin-left: 0;
  }

  #main-content {
      transition: 0.4s;
  }
</style>
    <body>
      <div>
        <div class="sidebar p-4 bg-primary" id="sidebar">
          <h4 class="mb-5 text-white">ADMIN</h4>
          <li>
            <a class="text-white" href="">
              <i class="bi bi-house mr-2"></i>
              Dashboard
            </a>
          </li>
        </div>
      </div>
      <section class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
          <i class="bi bi-list"></i>
        </button>
        <div class="card mt-5">
          <div class="card mt-5">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <form class="form-inline" action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-2 ml-1 @error('firstname') is-invalid @enderror"
                                            name="firstname" style="width:15rem;" placeholder="Masukan nama depan">
                                        @error('firstname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="text" class="form-control mb-2 ml-1 @error('lastname') is-invalid @enderror"
                                            name="lastname" style="width:15rem;" placeholder="Masukan nama belakang">
                                        @error('lastname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="text" class="form-control mb-2 ml-1 @error('jabatan') is-invalid @enderror"
                                            name="jabatan" style="width:15rem;" placeholder="Masukan jabatan">
                                        @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="email" class="form-control mb-2 ml-1 @error('email') is-invalid @enderror"
                                            name="email" style="width:15rem;" placeholder="Masukan email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="text" class="form-control mb-2 ml-1 @error('rumah') is-invalid @enderror"
                                            name="rumah" style="width:15rem;" placeholder="Masukan alamat rumah">
                                        @error('rumah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="text" class="form-control mb-2 ml-1 @error('perusahaan') is-invalid @enderror"
                                            name="perusahaan" style="width:15rem;" placeholder="Masukan nama perusahaan">
                                        @error('perusahaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
        
                                        <input type="number" class="form-control mb-2 ml-1 @error('phone') is-invalid @enderror"
                                            name="phone" style="width:15rem;" placeholder="Masukan no telepon">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Depan</th>
                                    <th scope="col">Nama Belakang</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat Rumah</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">QR Code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->firstname }}</td>
                                    <td>{{ $data->lastname }}</td>
                                    <td>{{ $data->jabatan }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->rumah }}</td>
                                    <td>{{ $data->perusahaan }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                    <a id="btn-generate"onclick="generateQr({{ $data->id }})" class="btn btn-primary mb-2">Generate</a>
                                    <td class="">
                                        <a href="{{ route('generate.edit', ['id'=>$data->id]) }}" class="btn btn-primary mb-2">edit
                                        </a>
                                        <form action="{{ route('generate.destroy', ['id'=>$data->id]) }}" method="post"
                                            class="d-none" id="form-delete-{{ $data->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="btn btn-primary mb-2" onclick="deleteQr('{{ $data->id }}')">hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="qr-code-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-5" id="qr-code-image">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script>
            function deleteQr(id) {
            if(confirm('Anda Akan Menghapus Data Ini?')){
                $(`#form-delete-${id}`).submit()
            }
            }

            function generateQr(id) {
                let url = '{{ route('generate.qr', ':id') }}';
                $.ajax({
                    type: 'get',
                    cache: false,
                    url: url.replace(':id', id),
                    dataType:'text',
                    contentType: "text/svg; charset=utf-8",
                    success: function (response) {
                        console.log(response)
                        $('#qr-code-modal').appendTo('body').modal('show');
                        $('#qr-code-image').html(response)
                        // qrCode.outerHTML += response;
                    },error : function (error) {
                        console.log(error)
                    }
                })
            }
        </script>
          </div>
        </div>
      </section>
</body>
<script>
  // event will be executed when the toggle-button is clicked
  document.getElementById("button-toggle").addEventListener("click", () => {

      // when the button-toggle is clicked, it will add/remove the active-sidebar class
      document.getElementById("sidebar").classList.toggle("active-sidebar");

      // when the button-toggle is clicked, it will add/remove the active-main-content class
      document.getElementById("main-content").classList.toggle("active-main-content");
  });
</script>

</html>