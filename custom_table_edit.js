$(document).ready(function() {
    $('.data_table').Tabledit({
        deleteButton: true,
        saveButton: true,
        autoFocus: false,
        editButton: true,
        buttons: {
            edit: {
                class: 'btn btn-sm btn-primary',
                html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-danger',
                html: '<span class="glyphicon glyphicon-trash"></span> &nbsp DELETE',
                action: 'delete'
            },
            confirm: {
                class: 'btn btn-sm btn-default',
                html: 'Are you sure?'
            }
        },
        columns: {
            identifier: [0, 'iid'],
            editable: [[1, 'iname'], [2, 'notes'], [3, 'cmpl']]
        },
        hideIdentifier: false,
        url: 'includes/liveedit.inc.php'
    });
});