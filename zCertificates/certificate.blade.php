<!-- resources/views/certificates/certificate.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .certificate {
            position: relative;
            width: 100%;
            height: 600px;
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
        .course-name {
            font-size: 24px;
            font-weight: bold;
        }
        .user-name {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="content">
            <div class="course-name">{{ $course->name }}</div>
            <div class="user-name">{{ $user->name }}</div>
        </div>
    </div>
</body>
</html>
  