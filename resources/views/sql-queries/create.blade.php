<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL-запросы</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Создать SQL-запрос</h1>
    <form id="query-form">
        @csrf
        <div class="form-group">
            <label for="name">Название запроса</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="select-table">SELECT</label>
            <select id="select-table" name="select-table" class="form-control">
                <option value="">Выберите таблицу</option>
            </select>
            <select id="select-field" name="select-field" class="form-control">
                <option value="">Выберите поле</option>
            </select>
        </div>
        <div class="form-group">
            <label for="where-table">WHERE</label>
            <select id="where-table" name="where-table" class="form-control">
                <option value="">Выберите таблицу</option>
            </select>
            <select id="where-field" name="where-field" class="form-control">
                <option value="">Выберите поле</option>
            </select>
            <select id="operator" name="operator" class="form-control">
                <option value="=">=</option>
                <option value="<>">&lt;&gt;</option>
                <option value=">">&gt;</option>
                <option value="<">&lt;</option>
                <option value=">=">&gt;=</option>
                <option value="<=">&lt;=</option>
            </select>
            <input type="text" id="value" name="value" class="form-control" placeholder="Введите значение">
        </div>
        <button type="submit" class="btn btn-primary">Создать запрос</button>
    </form>
    <div id="queries-list"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectTable = document.getElementById('select-table');
        const selectField = document.getElementById('select-field');
        const whereTable = document.getElementById('where-table');
        const whereField = document.getElementById('where-field');
        const queryForm = document.getElementById('query-form');
        const queriesList = document.getElementById('queries-list');

        fetch('/tables')
            .then(response => response.json())
            .then(data => {
                data.forEach(table => {
                    let tableName = Object.values(table)[0]
                    const option = document.createElement('option');
                    option.value = tableName;
                    option.textContent = tableName;
                    selectTable.appendChild(option);
                    whereTable.appendChild(option.cloneNode(true));
                });
            });

        selectTable.addEventListener('change', function() {
            fetch(`/fields?table=${selectTable.value}`)
                .then(response => response.json())
                .then(data => {
                    selectField.innerHTML = '';
                    data.forEach(field => {
                        let _field = field['Field']
                        const option = document.createElement('option');
                        option.value = _field;
                        option.textContent = _field;
                        selectField.appendChild(option);
                    });
                });
        });

        whereTable.addEventListener('change', function() {
            fetch(`/fields?table=${whereTable.value}`)
                .then(response => response.json())
                .then(data => {
                    whereField.innerHTML = '';
                    data.forEach(field => {
                        let _field = field['Field']
                        const option = document.createElement('option');
                        option.value = _field;
                        option.textContent = _field;
                        whereField.appendChild(option);
                    });
                });
        });

        queryForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(queryForm);
            fetch('/sql-queries', {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    console.log('response', response)
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('data', data)
                    const queryHtml1 = `
                    <div class="query">
                        <h2>${data.name}</h2>
                        <p>${data.description}</p>
                        <p>SELECT: ${data.selectTable}.${data.selectField}</p>
                        <p>WHERE: ${data.whereTable}.${data.whereField} ${data.operator} ${data.value}</p>
                    </div>
                `;
                    const queryHtml = `
                    <div class="query">
                        <br/>
                        <p>${data.query}</p>
                    </div>
                `;

                    queriesList.innerHTML += queryHtml;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
</body>
</html>
