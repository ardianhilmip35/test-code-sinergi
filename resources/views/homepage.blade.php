@extends('nav')

@section('title', 'Home')

@section('content')
    <div class="container-fluid" style=" margin-top: 100px; margin-bottom: 192px;">
        <h2 class="text-start mb-4 ps-5 fw-bold">Selamat datang, {{ Auth::user()->name }}</h2>
        <div class="row-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end pe-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('tambahdata') }}" method="POST">
                                @csrf

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kode_kebun" class="form-label">Kode Kebun</label>
                                            <input type="text" class="form-control" id="kode_kebun" name="kode_kebun" placeholder="Kode Kebun">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_kebun" class="form-label">Nama Kebun</label>
                                            <input type="text" class="form-control" id="nama_kebun" name="nama_kebun" placeholder="Nama Kebun">
                                        </div>
                                        <div class="mb-3">
                                            <label for="luas" class="form-label">Luas</label>
                                            <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-md-4 mt-lg-4 px-lg-5">
            <table class="table table-striped">
                <thead class="table-primary text-center" >
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Kode Kebun</th>
                        <th scope="col">Nama Kebun</th>
                        <th scope="col">Luas Kebun</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_kebun }}</td>
                        <td>{{ $item->nama_kebun }}</td>
                        <td>{{ $item->luas }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <!-- Button trigger modal -->
                                    <a type="button" value="{{ $item->id }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1-{{ $item->id }}">
                                        Edit
                                    </a>

                                
                                <a href="{{ url('hapusdata', $item->id) }}"><button class="btn btn-danger" type="button">Delete</button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        @foreach ($data as $edit)
        <div class="modal fade" id="exampleModal1-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-start">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/edit/'.$edit->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="kode_kebun" class="form-label">Kode Kebun</label>
                                    <input type="text" class="form-control" id="kode_kebun" name="kode_kebun" placeholder="Kode Kebun" value="{{ $edit->kode_kebun }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kebun" class="form-label">Nama Kebun</label>
                                    <input type="text" class="form-control" id="nama_kebun" name="nama_kebun" placeholder="Nama Kebun" value="{{ $edit->nama_kebun }}">
                                </div>
                                <div class="mb-3">
                                    <label for="luas" class="form-label">Luas</label>
                                    <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas" value="{{ $edit->luas }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
        
        <div class="row-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end pe-5">
                <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <button class="btn btn-danger" type="button">Logout</button>
                </a>
                                    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

