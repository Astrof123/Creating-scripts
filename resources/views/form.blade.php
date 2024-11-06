@extends('layout')

@section('title', 'Form Super Form')

@section('content')

    <form method="POST" action="/form">
        @csrf()

        <h1>Голосование</h1>

        <label class="titleInputText">
            Ваше ФИО:<br>
            <input type="text" name="name" id="" value="{{ old('name') }}">
        </label>
        @error('name')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Ваша почта:<br>
            <input type="text" name="email" id="" value="{{ old('email') }}">
        </label>
        @error('email')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Ваш номер телефона:<br>
            <input type="text" name="phone" id="" value="{{ old('phone') }}">
        </label>
        @error('phone')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror


        <label class="titleInputText">
            Ваши паспортные данные:<br>
            <input type="text" name="passport" id="" value="{{ old('passport') }}">
        </label>
        @error('passport')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror

        <label class="titleInputText">
            За кого вы голосуете:<br>
            <select name="president">
                <option value="Олифиренко" {{ old('president') == "Олифиренко" ? "selected" : ""}}>Максим Олифиренко</option>
                <option value="Шорников" {{ old('president') == "Шорников" ? "selected" : ""}}>Дэни Шорников</option>
                <option value="Валеев" {{ old('president') == "Валеев" ? "selected" : ""}}>Глеб Валеев</option>
            </select>
        </label>
        @error('president')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror

        <div class="wrapper_privacy">
            <label class="titleInputText privacy_label">
                Подпись:
                <input type="checkbox" name="privacy" id="" {{old('privacy') ? 'checked' : ""}}>
            </label>
            @error('privacy')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit">Send</button>
    </form>
@endsection