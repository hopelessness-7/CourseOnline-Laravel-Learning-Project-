$(document).ready(function() {
$('#myTable').dataTable( {
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json"
    },
    "columnDefs":[
            {
                // На каком столбце убрать фильтрацию (начинаем счет с 0)
                "targets":[4],
                "orderable":false,
            },
    ],
    "pageLength": 10
});
} );
