### Сms сервис для создания/изменения правил валидации

[Описание тестового задания](https://github.com/POMXARK/hotels-back/blob/develop/docs/task.md)

[Соглашение о коммитах](https://teletype.in/@valyushitskiy/conventional-commits)


Схема данных:
- rules (правила валидации)
- - agencies (агентства)
- - agency_hotel_options
- - - hostels (отели)
- - - - hostel_agreements
- - - - - companies (компании)
- - - - cities (города)
- - - - - countries (страны)
- - rule_conditions (список условий)
- - - sql_queries (список запросов условий)

    
![me](https://github.com/POMXARK/hotels-back/blob/develop/docs/notification.gif)
![me](https://github.com/POMXARK/hotels-back/blob/develop/docs/rules_crud.gif)
![me](https://github.com/POMXARK/hotels-back/blob/develop/docs/db.png)


#### Исправить стиль кода
```sh
php ./vendor/bin/php-cs-fixer fix
```
