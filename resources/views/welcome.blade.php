<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Share Files</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>

<body style="background-color: rgb(5, 3, 3);">
    <h2 style="text-align: center; color: rgb(116, 6, 6);">E-ARSIP INTERNAL</h2>
    <ul class="nav nav-tabs mt-1" style="margin-right: 100px; margin-left: 100px; border-bottom-color: greenyellow;" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="background-color: rgb(22, 212, 22); border-color: black;"><i
                    class="fas fa-file"></i> Semua</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="biasa-tab" data-bs-toggle="tab" data-bs-target="#biasa-tab-pane" type="button"
                role="tab" aria-controls="biasa-tab-pane" aria-selected="false"><i class="fas fa-file-alt"></i>
                Berkas Biasa</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="rapat-tab" data-bs-toggle="tab" data-bs-target="#rapat-tab-pane" type="button"
                role="tab" aria-controls="rapat-tab-pane" aria-selected="false"><i
                    class="fas fa-file-powerpoint"></i> Berkas Rapat</button>
        </li>
    </ul>
    <div class="tab-content" style="margin-right: 100px; margin-left: 100px;" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">

            @if (Session::has('warning'))
                <div class="alert alert-dark alert-dismissible fade show" role="alert" style="background-color: black; border-color: greenyellow; color: rgb(22, 212, 22);">
                    <strong>ERROR!</strong> {{ Session::pull('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="background-color: rgb(22, 212, 22);"></button>
                </div>
            @elseif(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: black; border-color: greenyellow; color: rgb(22, 212, 22);">
                    <strong>BERHASIL!</strong> {{ Session::pull('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="background-color: rgb(22, 212, 22);"></button>
                </div>
            @endif

            <button type="button" class="btn btn-dark btn-sm"
                style="float: right; margin-bottom: 5px; margin-top: 5px; color: rgb(22, 212, 22); font-weight: bold" data-bs-toggle="modal"
                data-bs-target="#AddModal">
                <i class="fas fa-upload"></i> Unggah Berkas
            </button>

            <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: black; border-color: rgb(22, 212, 22); margin-top: 10%;">
                        <div class="modal-header" style="border-bottom-color: greenyellow;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: rgb(22, 212, 22);"><i class="fas fa-upload"></i> Unggah
                                berkas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('files-store') }}" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label style="color: rgb(22, 212, 22)">Nama Bidang</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="bidang_id" class="form-control" style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                                <option value="">-------</option>
                                                @foreach (Helpers::Bidang() as $bidang)
                                                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label style="color: rgb(22, 212, 22)">Kategori Berkas</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kategori" class="form-control" style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                                <option value="">--------</option>
                                                <option value="biasa">Biasa</option>
                                                <option value="rapat">Rapat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label style="color: rgb(22, 212, 22)">Berkas</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="berkas" class="form-control" required style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer" style="border-top-color: greenyellow;">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="color: rgb(22, 212, 22);"><i
                                    class="fas fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-dark btn-sm" style="color: rgb(22, 212, 22);"><i class="fas fa-save"></i>
                                Unggah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped" style="border-color: greenyellow;">
                <thead style="color: rgb(22, 212, 22);">
                    <tr style="text-align: center;">
                        <th>#</th>
                        <th>Nama Berkas</th>
                        <th>Bidang</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Di Upload Oleh</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td style="color: rgb(22, 212, 22);">{{ $loop->iteration }}</td>
                            <td style="color: rgb(22, 212, 22);">{{ Helpers::getName($file->nama_files) }}</td>
                            <td style="color: rgb(22, 212, 22);">{{ $file->Bidang->nama_bidang }}</td>
                            <td style="text-align: center; color: rgb(22, 212, 22);">{{ $file->kategori }}</td>
                            <td style="color: rgb(22, 212, 22);">{{ Helpers::GetDate($file->created_at) }}</td>
                            <td style="color: rgb(22, 212, 22);">{{ $file->diupload_oleh }}</td>
                            <td style="text-align: center;">
                                <div class="btn-group">
                                    <a href="{{ asset($file->nama_files) }}" class="btn btn-dark btn-sm" style="color: rgb(22, 212, 22); font-weight: bold">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" style="color: rgb(22, 212, 22); font-weight: bold"
                                        data-bs-target="#EditModal{{ $loop->iteration }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" style="color: rgb(22, 212, 22); font-weight: bold"
                                        data-bs-target="#HapusModal{{ $loop->iteration }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="EditModal{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="EditModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background-color: black; border-color: rgb(22, 212, 22); margin-top: 10%;">
                                    <div class="modal-header" style="border-bottom-color: greenyellow;">
                                        <h1 class="modal-title fs-5" id="EditModalLabel" style="color: rgb(22, 212, 22);"><i
                                                class="fas fa-upload"></i> Perbaharui
                                            Berkas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('files-update', $file->id) }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label style="color: rgb(22, 212, 22);">Nama Bidang</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select name="bidang_id" class="form-control" style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                                            <option value="">-------</option>
                                                            @foreach (Helpers::Bidang() as $bidang)
                                                                <option value="{{ $bidang->id }}"
                                                                    {{ $bidang->id == $file->bidang_id ? 'selected' : '' }}>
                                                                    {{ $bidang->nama_bidang }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label style="color: rgb(22, 212, 22);">Kategori Berkas</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select name="kategori" class="form-control" style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                                            <option value="">--------</option>
                                                            <option value="biasa"
                                                                {{ $file->kategori == 'biasa' ? 'selected' : '' }}>
                                                                Biasa</option>
                                                            <option value="rapat"
                                                                {{ $file->kategori == 'rapat' ? 'selected' : '' }}>
                                                                Rapat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label style="color: rgb(22, 212, 22);">Berkas</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="file" name="berkas" class="form-control" style="background-color: black; color: rgb(22, 212, 22); border-color: greenyellow;">
                                                        <p style="font-size: 12px; color: rgb(255, 0, 0);">File Lama :
                                                            {{ Helpers::GetName($file->nama_files) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer" style="border-top-color: greenyellow;">
                                        <button type="button" class="btn btn-secondary btn-sm" style="color: rgb(22, 212, 22)"
                                            data-bs-dismiss="modal"><i class="fas fa-times"></i>
                                            Batal</button>
                                        <button type="submit" class="btn btn-dark btn-sm" style="color: rgb(22, 212, 22)"><i
                                                class="fas fa-save"></i>
                                            Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="HapusModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="HapusModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" style="margin-top: 14%;">
                                <div class="modal-content" style="background-color: black; border-color: greenyellow;">
                                    <div class="modal-header" style="border-bottom-color: greenyellow;">
                                        <h1 class="modal-title fs-5" id="HapusModalLabel" style="color: rgb(22, 212, 22);">Hapus berkas?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="text-align: center;">
                                            <a href="{{ route('files-destroy', $file->id) }}" class="btn btn-danger">
                                                <i class="fas fa-check"></i> Ya, Hapus
                                            </a>
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i> Tidak
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                {{ $files->links() }}
            </table>
        </div>
        <div class="tab-pane fade" id="biasa-tab-pane" role="tabpanel" aria-labelledby="biasa-tab" tabindex="0">
            Comming Soon</div>
        <div class="tab-pane fade" id="rapat-tab-pane" role="tabpanel" aria-labelledby="rapat-tab" tabindex="0">
            Cooming Soon</div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
</body>

</html>
