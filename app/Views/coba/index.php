<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>

    <table id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Jenis Kelamin</th>
                <th>ALamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    "url": 'http://localhost:8080/coba/data',
                    'type': 'POST',
                    'error': e => console.log(e)
                },

                columnDefs: [{
                    targets: 0,
                    orderable: false
                }, ],
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "jenis_kelamin"
                    },
                    {
                        "data": "alamat"
                    },
                    {
                        render: () => {
                            return "TEst";
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>