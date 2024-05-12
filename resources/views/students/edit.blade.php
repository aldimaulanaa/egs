@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Siswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                </div>
                <div class="form-group">
                    <label for="class">Kelas:</label>
                    <select class="form-control" id="class" name="class" required>
                        <option value="9" {{ $student->class == '9' ? 'selected' : '' }}>Kelas 9</option>
                        <option value="10" {{ $student->class == '10' ? 'selected' : '' }}>Kelas 10</option>
                        <option value="11" {{ $student->class == '11' ? 'selected' : '' }}>Kelas 11</option>
                        <option value="12" {{ $student->class == '12' ? 'selected' : '' }}>Kelas 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1" {{ $student->status == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $student->status == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
