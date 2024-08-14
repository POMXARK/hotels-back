@extends('layouts.app')

@section('content')
    <h1>Список правил</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Агентство</th>
            <th>Название</th>
            <th>Текст для менеджера</th>
            <th>Активно</th>
            <th>Условия</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rules as $rule)
            <tr>
                <td>{{ $rule->agency->name }}</td>
                <td>{{ $rule->name }}</td>
                <td>{{ $rule->text_for_manager }}</td>
                <td>{{ $rule->is_active? 'Да' : 'Нет' }}</td>
                <td>
                    @foreach($rule->ruleConditions as $condition)
                        {{ $condition->sqlQuery->name }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('rules.edit', $rule->id) }}" class="btn btn-primary">Редактировать</a>
                    <form action="{{ route('rules.destroy', $rule->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
