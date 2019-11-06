$(document).ready(function() {
    $('#data_table').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'iid'],
            editable: [[1, 'iname'], [2, 'notes'], [3, 'cmpl']]
        },
        hideIdentifier: false,
        url: 'includes/liveedit.inc.php'
    });
});