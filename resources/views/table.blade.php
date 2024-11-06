@extends('layout')

@section('title', 'Table')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Паспортные данные</th>
                <th>Голос</th>
                <th>Подпись</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allFiles as $file)
                <tr>
                    @foreach ($file as $info)
                        <td>{{ $info }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection