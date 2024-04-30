<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" hreflang="e" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @livewireStyles
    <style>
        div.scroll {
        margin: 4px, 4px;
        padding: 4px;
        background-color: rgb(239, 239, 239);
        /* width: 500px; */
        height: 300px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: justify;
    }
    div.card1{
        background-color: #1986a12c;
    }
    </style>

    <title>{{ $title ?? '' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" hreflang="e">
</head>

<body>
    {{ $slot }}
    @livewireScripts

    <script>
        // success
        Livewire.on('success', data=>{
            console.log(data[0].pesan)
            var alert_success = document.getElementById('alert-success')
            var alertShow = bootstrap.Modal.getOrCreateInstance(alert_success)
            document.getElementById('message-success').innerHTML = data[0].pesan
            alertShow.show()
        })

        // error
        Livewire.on('error', data=>{
            console.log(data[0].pesan)
            var alert_success = document.getElementById('alert-error')
            var alertShow = bootstrap.Modal.getOrCreateInstance(alert_success)
            document.getElementById('message-error').innerHTML = data[0].pesan
            alertShow.show()
        })
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
