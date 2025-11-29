<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Contact Form</title>
</head>
<body style="font-family: Arial, sans-serif; line-height:1.6;">

    <h2 style="color:#007bff;">📩 Pesan Baru dari Website GadgetZone</h2>

    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Telepon:</strong> {{ $data['telepon'] }}</p>
    <p><strong>Subjek:</strong> {{ $data['subjek'] }}</p>

    <p style="margin-top:20px;"><strong>Pesan:</strong></p>
    <div style="background:#f1f1f1; padding:15px; border-radius:8px;">
        {{ $data['pesan'] }}
    </div>

</body>
</html>
