<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta  name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('titulo')
        </title>
        <style>
            body, hr, pre, table{
                background-color: #282a36 !important;
                color: #1bf !important;
                border-color: rgb(97, 118, 126) !important;
            }
        </style>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- favicon -->
        <link href= {{ asset('./img/favicon.jpg') }} rel="shortcut icon" type="image/jpg">
        <!-- [if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <!-- cabeçalho e navegação -->
            @include('layout/cabecalho')

            <!-- conteúdo -->
            @yield('conteudo')

            <!-- rodapé -->
            @include('layout/rodape')
        </div>

        {{-- ********************************************************************************* --}}
        {{--                                    JAVASCRIPT                                     --}}
        {{-- ********************************************************************************* --}}
        <script>

            var container_1 = document.querySelector('#completeModal');
            var modal_1 = new bootstrap.Modal(container_1);

            var container_2 = document.querySelector('#updateModal');
            var modal_2 = new bootstrap.Modal(container_2);




            var get_token = document.querySelector('meta[name="csrf-token"]');

            var _token = get_token.getAttribute('content');

            document.addEventListener('DOMContentLoaded', function (event)
            {
                displayData();
            });

            function displayData()
            {
                var displayData='true';

                var json = JSON.stringify
                ({
                    'displaySend' : displayData
                });

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ url("/display") }}', true);

                xhr.setRequestHeader("Content-type", "application/json");

                xhr.setRequestHeader('x-csrf-token', _token);

                xhr.send(json);

                // xhr.responseType = 'json';

                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState === 4 && xhr.status === 200)
                    {
                        console.log(xhr);

                        var tabela=document.querySelector('#displayDataTable').innerHTML = xhr.response;
                    }
                }
            }

            function adduser()
            {
                var nameAdd=document.querySelector('#completename').value;
                var emailAdd=document.querySelector('#completemail').value;
                var mobileAdd=document.querySelector('#completemobile').value;
                var placeAdd=document.querySelector('#completeplace').value;

                var json = JSON.stringify
                ({
                    'nameSend':nameAdd,
                    'emailSend':emailAdd,
                    'mobileSend':mobileAdd,
                    'placeSend':placeAdd
                });

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ url("/insert") }}', true);

                xhr.setRequestHeader("Content-type", "application/json");

                xhr.setRequestHeader('x-csrf-token', _token);

                xhr.send(json);

                // xhr.responseType = 'json';

                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState === 4 && xhr.status === 200)
                    {
                        console.log(xhr);

                        modal_1.hide();

                        displayData();
                    }
                }
            }

            function DeleteUser(deleteid)
            {
                var json = JSON.stringify
                ({
                    'deleteSend' : deleteid
                });

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ url("/delete") }}', true);

                xhr.setRequestHeader("Content-type", "application/json");

                xhr.setRequestHeader('x-csrf-token', _token);

                xhr.send(json);

                // xhr.responseType = 'json';

                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState === 4 && xhr.status === 200)
                    {
                        displayData();
                    }
                }
            }

            function GetDetails(updateid)
            {
                document.querySelector('#hiddendata').value=updateid;

                var json = JSON.stringify
                ({
                    'updateidSend' : updateid
                });

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ url("/update") }}', true);

                xhr.setRequestHeader("Content-type", "application/json");

                xhr.setRequestHeader('x-csrf-token', _token);

                xhr.send(json);

                xhr.responseType = 'json';

                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState === 4 && xhr.status === 200)
                    {
                        var userid=xhr.response;

                        console.log(userid);

                        document.querySelector('#updatename').value=userid.name;
                        document.querySelector('#updatemail').value=userid.email;
                        document.querySelector('#updatemobile').value=userid.mobile;
                        document.querySelector('#updateplace').value=userid.place;
                    }
                }

                modal_2.show();
            }

            function updateDetails()
            {
                var hiddendata=document.querySelector('#hiddendata').value; // ID
                var updatename=document.querySelector('#updatename').value;
                var updatemail=document.querySelector('#updatemail').value;
                var updatemobile=document.querySelector('#updatemobile').value;
                var updateplace=document.querySelector('#updateplace').value;

                var json = JSON.stringify
                ({
                    'hiddendataSend':hiddendata,
                    'updatenameSend':updatename,
                    'updatemailSend':updatemail,
                    'updatemobileSend':updatemobile,
                    'updateplaceSend':updateplace
                });

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ url("/update") }}', true);

                xhr.setRequestHeader("Content-type", "application/json");

                xhr.setRequestHeader('x-csrf-token', _token);

                xhr.send(json);

                // xhr.responseType = 'json';

                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState === 4 && xhr.status === 200)
                    {
                        modal_2.hide();

                        displayData();
                    }
                }
            }

        </script>
        {{-- ********************************************************************************* --}}

    </body>
</html>
