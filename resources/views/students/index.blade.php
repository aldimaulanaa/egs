@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Siswa</h1>
    <table id="students-table" class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
                <td>
                    <input type="checkbox" class="toggle-status" data-id="{{ $student->id }}" {{ $student->status ? 'checked' : '' }}>
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#students-table').DataTable();
        $('.toggle-status').change(function() {
            var studentId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;
            $.ajax({
                url: '/students/' + studentId + '/update-status',
                type: 'PUT',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
