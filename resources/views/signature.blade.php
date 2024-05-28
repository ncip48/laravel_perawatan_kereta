<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Tanda Tangan</title>
    <link rel="stylesheet" href="<?= asset('templates/source/assets/plugins/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= asset('css/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= asset('css/custom.css') ?>" />
    <style>
        h3 {
            font-weight: normal;
        }

        .border-dash {
            background: grey;
            text-align: center;
            background: linear-gradient(to right, orange 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(blue 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(to right, green 50%, rgba(255, 255, 255, 0) 0%), linear-gradient(red 50%, rgba(255, 255, 255, 0) 0%);
            background-position: top, right, bottom, left;
            background-repeat: repeat-x, repeat-y;
            background-size: 15px 1px, 1px 15px;
        }
    </style>
</head>

<body class="vh-100 d-flex flex-column justify-content-between">
    <div class="container-fluid">
        @if ($signature)
            <h3 class="pt-4">Signature <b>Valid</b> <i class="bi bi-check-circle-fill text-warning"></i></h3>
            <h3 class="pb-3">Checksheet ini telah ditandatangani secara <i><u>digital</u></i> oleh:
                {{ $signature->user->name }}</h3>
            <hr />
        @else
            <h3 class="pt-4">Signature <b>Invalid</b> <i class="bi bi-x-circle-fill text-danger"></i></h3>
            <h3 class="pb-3">Checksheet ini <i><u>tidak dapat</u></i> diverifikasi</h3>
            <hr />
        @endif
    </div>

    @if ($signature)
        <footer class="">
            <div class="px-3 py-2 border-dash">
                <small><i>Halaman ini merupakan halaman verifikasi tanda tangan digital yang secara sah dan telah
                        diverifikasi oleh sistem. </i></small>
            </div>
        </footer>
    @endif
</body>

</html>
