@extends('layouts.admin')
@section('isinya')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Mahasiswa
            </div>
            <div class="card-body">
               <form action="{{ url('mahasiswa', []) }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="my-input">Nim</label>
                        <input id="my-input" class="form-control" type="text" name="nim" value="{{ old('nim') }}">
                        <span class="text-danger">{{ $errors->first('nim') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nama</label>
                        <input id="my-input" class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Jurusan</label>
                        <select id="my-select" class="form-control" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                            @foreach ( $list_sp as $a )
                                <option value="{{ $a }}" @selected($a==old('jurusan'))>{{ $a }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nomor Hp</label>
                        <input id="my-input" class="form-control" type="text" name="nomor_hp" 
                        value="{{ old('nomor_hp') }}">
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                    </div>
               <form>
            </div>
            <div class="card-footer">
                <button type="sumbit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
        
    </div>
</div>
@endsection