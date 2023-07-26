@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pegawa.create') }}"> Input Pegawai</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Jabatan</th>
            <th width="280px"class="text-center">Umur</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pegawa as $pegawai)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pegawai->pegawai_nama }}</td>
            <td>{{ $pegawai->pegawai_jabatan }}</td>
            <td>{{ $pegawai->pegawai_alamat }}</td>
            <td>{{ $pegawai->pegawai_umur }}</td>
            <td class="text-center">
                <form action="{{ route('pegawa.destroy',$pegawai->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('pegawa.show',$pegawai->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('pegawa.edit',$pegawai->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $pegawa->links() !!}

@endsection