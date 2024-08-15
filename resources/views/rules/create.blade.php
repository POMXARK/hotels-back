@extends('layouts.app')

@section('content')
    <h1>Создание правила</h1>
    <form action="{{ route('rules.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="agency_id" class="form-label">Агентство:</label>
            <select name="agency_id" id="agency_id" class="form-select">
                @foreach($agencies as $agency)
                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="text_for_manager" class="form-label">Текст для менеджера:</label>
            <textarea name="text_for_manager" id="text_for_manager" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Активно:</label>
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input">
        </div>
        <div class="mb-3">
            <label for="rule_conditions" class="form-label">Условия:</label>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="rule_conditions_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Выберите условия
                </button>
                <ul class="dropdown-menu" aria-labelledby="rule_conditions_dropdown">
                    @foreach($sqlQueries as $sqlQuery)
                        <li>
                            <label for="rule_condition_{{ $sqlQuery->id }}" class="w-100 d-block">
                                <input type="checkbox" name="rule_conditions[]" value="{{ $sqlQuery->id }}" id="rule_condition_{{ $sqlQuery->id }}">
                                {{ $sqlQuery->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
