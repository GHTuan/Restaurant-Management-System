<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .page-item {
            cursor: pointer;
        }
    </style>
</head>
<?php
require('View/admin/layouts/navbar.php');
?>

<body>
    <div class="container-fluid">
        <h1>Accounts Management</h1>
        <div class="d-flex justify-content-between">
            <ul class="pagination">
                <li class="page-item active" id="user-account"><span class="page-link">User Accounts</span></li>
                <li class="page-item" id="admin-account"><span class="page-link">Admin Accounts</span></li>
            </ul>
            <button id="add-account" class="btn btn-primary" onclick="addAccount()">Add Account</button>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-form">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submit">Submit</button>
                </div>

            </div>
        </div>
    </div>


    <script>
        let currentAccountList = null;
        let currentMode = null;

        const loadAccountList = (data, type) => {
            if (data.length == 0) {
                return;
            }
            const thead = document.querySelector('thead tr');
            const tbody = document.querySelector('tbody');
            thead.innerHTML = '';
            tbody.innerHTML = '';
            const keys = Object.keys(data[0]);
            keys.forEach((key) => {
                thead.innerHTML += `<th>${key}</th>`;
            });
            thead.innerHTML += '<th>Action</th>';
            data.forEach((item) => {
                let row = '<tr>';
                keys.forEach((key) => {
                    if (key === 'AccessLevel')
                    {
                        if (item[key] == 0) row += `<td style="color: red;">Blocked</td>`;
                        else row += `<td style="color: green;">Unrestricted</td>`;
                    }
                    else row += `<td>${item[key]}</td>`;
                });
                const id = item[Object.keys(item)[0]];
                row += `<td>
                    <button class="btn btn-primary" onclick="editAccount('${type}', ${id})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger" onclick="deleteAccount('${type}', ${id})"><i class="fa-regular fa-trash-can"></i></button>
                </td>`
                row += '</tr>';
                tbody.innerHTML += row;
            });
            currentAccountList = data;
            currentMode = type;
        }

        const renderEditForm = (data) => {
            $("#modal-title").text('Edit Account');
            const form = document.querySelector('#edit-form');
            form.innerHTML = '';
            const keys = Object.keys(data);
            keys.forEach((key) => {
                let disabled = '';
                if (key == Object.keys(data)[0]) {
                    disabled = 'disabled';
                }
                if (key === 'AccessLevel') {
                    const isBlocked = data[key] == 0 ? 'selected' : '';
                    const isUnrestricted = data[key] == 1 ? 'selected' : '';
                    form.innerHTML += `<div class="mb-3">
                        <label for="${key}" class="form-label">${key}</label>
                        <select class="form-select" id="${key}">
                            <option value="1" ${isUnrestricted} style="color: green;">Unrestricted</option>
                            <option value="0" ${isBlocked} style="color: red;">Blocked</option>
                        </select>
                    </div>`;
                    return;
                }
                else
                {
                    form.innerHTML += `<div class="mb-3">
                        <label for="${key}" class="form-label">${key}</label>
                        <input type="text" class="form-control" id="${key}" value="${data[key]}" ${disabled}>
                    </div>`;
                }
            });
        }
        const renderAddAccountForm = () => {
            $("#modal-title").text('Add Account');
            const form = document.querySelector('#edit-form');
            form.innerHTML = '';
            const keys = Object.keys(currentAccountList[0]);
            keys.shift();
            keys.forEach((key) => {
                if (key === 'AccessLevel'){
                    form.innerHTML += `<div class="mb-3">
                        <label for="${key}" class="form-label">${key}</label>
                        <select class="form-select" id="${key}">
                            <option value="1" style="color: green;">Unrestricted</option>
                            <option value="0" style="color: red;">Blocked</option>
                        </select>
                    </div>`;
                    return;
                }
                else 
                {
                    form.innerHTML += `<div class="mb-3">
                        <label for="${key}" class="form-label">${key}</label>
                        <input type="text" class="form-control" id="${key}">
                    </div>`;
                }
            });
        }

        const addAccount = () => {
            renderAddAccountForm();
            $("#submit").unbind('click');
            $("#submit").click(() => {
                const data = {};
                const keys = Object.keys(currentAccountList[0]);
                keys.forEach((key) => {
                    if (key != Object.keys(currentAccountList[0])[0]) {
                        data[key] = $(`#${key}`).val();
                    }
                });
                console.log("Adding data is going to send: ", data);
                $.post('APISelection.php', {
                    api: 'accountManagement',
                    action: 'addAccount',
                    type: currentMode,
                    data: data
                }).done((response) => {
                    console.log("Receive data when sending addAccount action: ",response);
                    if (response.message == 'Success') {
                        $('#myModal').modal('hide');
                        if (currentMode == 'user') {
                            loadUserAccounts();
                        } else {
                            loadAdminAccounts();
                        }
                    }
                }).fail((response) => {
                    console.log("Fail: ", response.responseText);
                });
            });
            $('#myModal').modal('show');
        }

        const editAccount = (type, id) => {
            const account = currentAccountList.find((item) => item[Object.keys(item)[0]] == id);
            renderEditForm(account);
            $("#submit").unbind('click');
            $("#submit").click(() => {
                const data = {};
                const keys = Object.keys(account);
                keys.forEach((key) => {
                    if (key != Object.keys(account)[0]) {
                        data[key] = $(`#${key}`).val();
                    }
                });
                console.log("Editing data is going to send: ", data);
                $.post('APISelection.php', {
                    api: 'accountManagement',
                    action: 'editAccount',
                    type: type,
                    id: id,
                    data: data
                }).done((response) => {
                    if (response.message == 'Success') {
                        console.log("Edit success")
                        $('#myModal').modal('hide');
                        if (type == 'user') {
                            loadUserAccounts();
                        } else {
                            loadAdminAccounts();
                        }
                    }
                }).fail((response) => {
                    console.log("Fail: ", response.responseText);
                });
            });
            $('#myModal').modal('show');
        }

        const deleteAccount = (type, id) => {
            $.post('APISelection.php', {
                api: 'accountManagement',
                action: 'deleteAccount',
                type: type,
                id: id
            }).done((response) => {
                if (response.message == 'Success') {
                    if (type == 'user') {
                        loadUserAccounts();
                    } else {
                        loadAdminAccounts();
                    }
                }
            }).fail((response) => {
                console.log("Fail: ", response.responseText);
            });
        }

        const loadUserAccounts = () => {
            $.post('APISelection.php', {
                api: 'accountManagement',
                action: 'getUserAccounts'
            }).done((response) => {
                loadAccountList(response.data, 'user');
            })
        }

        const loadAdminAccounts = () => {
            $.post('APISelection.php', {
                api: 'accountManagement',
                action: 'getAdminAccounts'
            }).done((response) => {
                loadAccountList(response.data, 'admin');
            })
        }
        loadUserAccounts();
        $("#user-account").click(() => {
            $("#user-account").addClass("active");
            $("#admin-account").removeClass("active");
            loadUserAccounts();
        });

        $("#admin-account").click(() => {
            $("#admin-account").addClass("active");
            $("#user-account").removeClass("active");
            loadAdminAccounts();
        });
    </script>
</body>

</html>