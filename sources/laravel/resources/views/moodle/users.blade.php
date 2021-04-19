@extends('layouts.layout')

@section('content')
    <div style="display: flex; align-items: center; flex-direction: column;">
        @isset($error)
            <div style="display: flex; justify-content: center; padding: 30px; background: rgba(255, 0, 0, .9); color: #fff;">{{ $error->getMessage() }}</div>
        @endisset

        <h1> Users </h1>

        <style>
            table, th, td {
                border: 1px solid black;
            }

            table {
                border-collapse: collapse;
                margin: 0 0 50px 0;
            }
            th, td {
                padding: 0 15px;
            }
        </style>

        @isset($users)
            <table>         
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['firstname'] }}</td>
                        <td>{{ $user['lastname'] }}</td>
                        <td>{{ $user['email'] }}</td>
                    </tr>
                @endforeach
            </table>
        @endisset

        <a href="{{ url('/') }}" class="text-lg px-6 text-gray-700 underline">Back</a>
    </div>
@endsection