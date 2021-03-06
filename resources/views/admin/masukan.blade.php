@extends('layouts.app')
@section('content')
<div class="col" style="margin-bottom:9% ;">
    <h2>Kritik dan saran</h2>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Pengirim</th>
            <th>Email</th>
            <th>Judul artikel</th>
            <th>Isi pesan</th>
        </tr>
        @foreach($masukan as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->user_name }}</td>
            <td>{{ $m->user_email }}</td>
            <td><a href="/artikel/read/{{ $m->artikel_id }}">{{ $m->artikel_judul }}</a></td>
            <td>{{ $m->isi_pesan }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection