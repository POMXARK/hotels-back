<div id="notifications-block"></div>

<script defer>
    function updateNotificationCount() {
        fetch('/notifications/count', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                const notificationCountElement = document.getElementById('notification-count');
                const notificationMenu = document.getElementsByClassName('dropdown-menu');
                const notificationToggleMenu = document.getElementsByClassName('dropdown-toggle');
                notificationCountElement.textContent = `Уведомления (${data.count})`;

                // Добавляем класс disabled, если количество уведомлений равно 0
                if (data.count === 0) {
                    notificationMenu[0].classList.remove('show');
                    notificationToggleMenu[0].classList.remove('show');
                    notificationCountElement.classList.add('disabled');
                } else {
                    notificationCountElement.classList.remove('disabled');
                }
            })
            .catch(error => console.error(error));
    }

    function getNotifications() {
        fetch('/notifications', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                const notificationsBlock = document.getElementById('notifications-block');
                notificationsBlock.innerHTML = '';

                if (data.length > 0) {
                    // Создаем выпадающее окно
                    const alertBlock = document.createElement('div');
                    alertBlock.classList.add('alert', 'alert-info');
                    alertBlock.innerHTML = `
                <ul class="list-group" id="notifications-list"></ul>
            `;
                    notificationsBlock.appendChild(alertBlock);

                    // Добавляем уведомления в выпадающее окно
                    const notificationsList = document.getElementById('notifications-list');
                    data.forEach(notification => {
                        const notificationElement = document.createElement('li');
                        notificationElement.classList.add('list-group-item');
                        notificationElement.innerHTML = `
                    <strong>${notification.data.agency_name}</strong>: ${notification.data.rule_text}
                    <div class="float-right">
                        ${notification.read_at === null? `
                            <button class="btn btn-sm btn-primary" onclick="markAsRead('${notification.id}')">Отметить как прочитанное</button>
                        ` : `
                            <button class="btn btn-sm btn-danger" onclick="deleteNotification('${notification.id}')">Удалить</button>
                        `}
                    </div>
                `;
                        notificationsList.appendChild(notificationElement);
                    });
                }
            })
            .catch(error => console.error(error));
    }

    function markAsRead(id) {
        fetch(`/notifications/${id}/mark-as-read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                const notificationElement = document.getElementById(`notification-${id}`);
                const button = notificationElement.querySelector('button');
                button.textContent = 'Удалить';
                button.classList.remove('btn-primary');
                button.classList.add('btn-danger');
                button.onclick = () => deleteNotification(id);
            })
            .catch(error => console.error(error))
            .finally(() => {
                getNotifications()
                updateNotificationCount()
            }); // вызов функции getNotifications после завершения запроса
    }

    function deleteNotification(id) {
        fetch(`/notifications/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                const notificationElement = document.getElementById(`notification-${id}`);
                notificationElement.remove();
                if (document.getElementById('notifications-list').children.length === 0) {
                    document.querySelector('.alert').remove();
                }
            })
            .catch(error => console.error(error))
            .finally(() => {
                getNotifications()
                updateNotificationCount()
            }); // вызов функции getNotifications после завершения запроса
    }

    setInterval(updateNotificationCount, 10000); // 10000 миллисекунд = 1 минута
    setInterval(getNotifications, 10000); // 10000 миллисекунд = 1 минута

    getNotifications(); // вызов функции сразу после загрузки страницы
    updateNotificationCount(); // вызов функции сразу после загрузки страницы
</script>

<style>
    .disabled {
        pointer-events: none;
        opacity: 0.5;
        cursor: not-allowed;
    }

    .btn-disabled {
        background-color: #ccc;
        border-color: #ccc;
        color: #666;
        pointer-events: none;
    }
</style>

<script>
    // // код для открытия уведомлений
    // document.addEventListener('DOMContentLoaded', function() {
    //     const notificationBell = document.querySelector('.notification-bell');
    //     const notificationDropdown = document.querySelector('.notification-dropdown');
    //
    //     notificationBell.addEventListener('click', function() {
    //         notificationDropdown.classList.toggle('show');
    //     });
    // });
    //
    // // код для закрытия уведомлений
    // document.addEventListener('click', function(event) {
    //     if (!notificationDropdown.contains(event.target) &&!notificationBell.contains(event.target)) {
    //         notificationDropdown.classList.remove('show');
    //     }
    // });
</script>

