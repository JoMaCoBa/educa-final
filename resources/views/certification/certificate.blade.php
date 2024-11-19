<!-- resources/views/certificates/certificate.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>
        @page {
            margin: 0; /* Eliminar márgenes del PDF */
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('images/certificate_background.png') }}');
            background-size: cover; /* Ajustar la imagen al tamaño completo */
            background-repeat: no-repeat;
            background-position: center;
        }
        .certificate {
            position: relative;
            width: 100%;
            height: 500px;
            background-image: url('{{ public_path('images/Certificate.png') }}');
            background-size: cover;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
        }
        .user-name {
            font-size: 20px;
            margin-top: 50px;
        }
        .course-name {
            font-size: 24px;
            font-weight: bold;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="content">
            <div class="user-name">{{ $user->name }}</div>
            <div class="course-name">{{ $course->name }}</div>
        </div>
    </div>
</body>
</html>
