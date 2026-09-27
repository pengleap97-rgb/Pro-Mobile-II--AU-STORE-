<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ព័ត៌មានលម្អិតនៃសៀវភៅ - Liquid Glass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Kantumruy Pro', sans-serif;
            /* Liquid Background Animation */
            background: linear-gradient(45deg, #f39c12, #e74c3c, #9b59b6, #3498db, #2ecc71);
            background-size: 400% 400%;
            animation: liquid-bg 15s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes liquid-bg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .liquid-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 50px;
            width: 100%;
            max-width: 700px;
            color: white;
            position: relative;
        }

        .info-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 10px;
        }

        .price-tag {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 20px;
            padding: 12px 30px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
            text-align: center;
        }

        .btn-back:hover {
            background: white;
            color: #333;
            transform: translateY(-2px);
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

<div class="liquid-card">
    <div class="icon-circle">
        <i class="fas fa-book"></i>
    </div>
    
    <h2 class="mb-4 font-weight-bold">ព័ត៌មានលម្អិតនៃសៀវភៅ</h2>

    <div class="row">
        <div class="col-md-7">
            <div class="info-label">ចំណងជើងសៀវភៅ</div>
            <div class="info-value">{{ $book->title }}</div>

            <div class="info-label">អ្នកនិពន្ធ</div>
            <div class="info-value">{{ $book->author }}</div>

            <div class="info-label">ថ្ងៃបោះពុម្ពផ្សាយ</div>
            <div class="info-value">
                <i class="far fa-calendar-alt me-2"></i>
                {{ $book->published_date->format('d F, Y') }}
            </div>
        </div>
        
        <div class="col-md-5 text-md-end text-start">
            <div class="info-label">តម្លៃលក់</div>
            <div class="price-tag">${{ number_format($book->price, 2) }}</div>
        </div>
    </div>

    <div class="mt-5 d-flex gap-3">
        <a href="{{ route('books.index') }}" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i> ត្រឡប់ក្រោយ
        </a>
        <a href="{{ route('books.edit', $book->id) }}" class="btn-back" style="background: rgba(241, 196, 15, 0.3);">
            <i class="fas fa-edit me-2"></i> កែប្រែទិន្នន័យ
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>