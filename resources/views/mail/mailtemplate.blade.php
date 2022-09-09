<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Rumah Kreatif</title>
</head>
<body>

  @if($details['status'] == "ditolak")

    <p>Hallo <b>{{$details['nama']}}</b> berikut ini adalah permintaan akun anda :</p>
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$details['nama']}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$details['email']}}</td>
      </tr>
      
      
    </table>
    <p>Atas permohonan maaf permintaan akun anda ditolak. Terimakasih <b>{{$details['nama']}}</b> telah mendaftar.</p>

    @elseif($details['status'] == "diverifikasi")
    <p>Hallo <b>{{$details['nama']}}</b> berikut ini adalah akun Anda:</p>
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$details['nama']}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$details['email']}}</td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td>{{$details['password']}}</td>
      </tr>
      <tr>
        <td>Link</td>
        <td>:</td>
        <td>
            <a href="{{url('login')}}">Silahkan Login Disini</a>
        </td>
      </tr>
    </table>
    <p>Terimakasih <b>{{$details['nama']}}</b> telah mendaftar silahkan login pada link login diatas.</p>
    @endif
</body>
</html>