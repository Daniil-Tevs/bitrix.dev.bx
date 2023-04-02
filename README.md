#Модуль Tasks для третьего модуля Битрикс Университета
##Описание: 
Проект полностью собран на базе bitrix framework. Сам модуль находится в папке local/modules/up.tasks
##Инструкция по установке
0) скопировать папку up.tasks в свой проект
1) создать базу данных для проекта или выбрать существующую
2) установить модуль Tasks (в marketplace, установленные решения)
3) выбрать в качестве шаблона сайта - Tasks template
##Системные требования:
* Windows 7,10,11
* PHP 7.4
* Apache 2.4
##Функционал - путь в адресной строке
* просмотр всех задач    - / или /tasks/
* добавление задачи      - /tasks/create/
* редактирование задачи  - /tasks/edit/{id}/
* поиск по задачам       - /?title="название" (поиск происходит с помощью поля на главной странице)
* удаление задачи        - /tasks/delete/
##Какие поля есть у задачи?
* название
* описание
* дата создания
* приоритет - Hight(высокий), Medium(средний), Low(низкий)
##Фичи:
* в зависимости от приоритета заголовок задачи будет окрашен в цвет: красный - Hight, синий - Medium, зелёный - Low