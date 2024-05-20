<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="description"
        content="Payoprint support Apps - Temukan kehebatan Aplikasi Dukungan Payoprint. Sederhanakan proses pencetakan Anda, kelola laporan, dan tingkatkan alur kerja Anda dengan aplikasi inovatif kami.">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ $title ?? 'Payoprint Support Apps' }}</title>
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

    <title>{{ $title ?? 'Payoprint Support Apps' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.webp') }}">
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
</body>

</html>
