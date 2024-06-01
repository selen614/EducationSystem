@extends('header')

@section('content')

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach ($admins as $admin)
        <tr>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
        </tr>
    @endforeach
</table>

@endsection