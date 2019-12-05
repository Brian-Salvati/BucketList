$(document).ready(function() {
    $('.data_table').Tabledit({
        url: 'includes/liveedit.inc.php',
        deleteButton: true,
        saveButton: false,
        autoFocus: false,
        editButton: true,
        addButton: true,
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
            },
            add: {
                class: 'btn btn-xs btn-default',
                html: '<span class="fa fa-plus"></span> Add',
                action: 'add'
            }
        },
        columns: {
            identifier: [0, 'iid'],
            editable: [[1, 'iname'], [2, 'notes'], [3, 'cmpl']]
        },
        onDraw: function() {
            console.log('onDraw()');
        },
        onSuccess: function(data, textStatus, jqXHR) {
            console.log('onSuccess(data, textStatus, jqXHR)');
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onAlways: function() {
            console.log('onAlways()');
        },
        onAjax: function(action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
        },
        hideIdentifier: false,
    });

    $("#button_add_row").click(function() { 
        var tableditTableName = '#data_table';  // Identifier of table
        var newID = parseInt($(tableditTableName + " tr:last").attr("id")) + 1; 
        var clone = $("table tr:last").clone(); 
        $(".tabledit-span", clone).text(""); 
        $(".tabledit-input", clone).val(""); 
        clone.appendTo("table"); 
        $(tableditTableName + " tbody tr:last").attr("id", newID); 
        $(tableditTableName + " tbody tr:last td .tabledit-span.tabledit-identifier").text(newID); 
        $(tableditTableName + " tbody tr:last td .tabledit-input.tabledit-identifier").val(newID); 
        $(tableditTableName + " tbody tr:last td:last .tabledit-edit-button").trigger("click");
    });
});