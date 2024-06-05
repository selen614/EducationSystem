@extends('header')

@section('title', 'TOP')

@section('content')

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
    </tr>
</table>

@endsection