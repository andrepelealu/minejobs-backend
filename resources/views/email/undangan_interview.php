<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
'nama_lowongan'     => $detailIklan,
            'perusahaan'        => $detailPerusahaan,
            'tanggal'           =>$req->tanggal_interview,
            'waktu_mulai'       =>$req->waktu_mulai,
            'waktu_selesai'     =>$req->waktu_selesai,
            'metode_interview'  =>$req->metode_interview


    <br>
    Selamat ! Kamu mendapatkan undangan interview dari {{$perusahaan}}
    <br>
    {{$nama_lowongan}}
    {{$tanggal}}
    {{$waktu_mulai}}
    {{$waktu_selesai}}
    {{$metode_interview}}
    <br>

    <a href="{{ url('user/verify', $verification_code)}}">Confirm my email address </a>

    <br/>
</div>

</body>
</html>