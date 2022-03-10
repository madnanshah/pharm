$(function () {
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.all') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'salt', name: 'salt'},
            {data: 'manufacturer', name: 'manufacturer'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});