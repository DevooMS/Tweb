$("#dataTable").DataTable({
    "order": [],
    "ajax": {
        url: '/api/myData',
        dataSrc: ''
    },
    columns: [ ... ]
});