<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>បន្ថែមសៀវភៅថ្មី - Liquid Glass Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;600&display=swap');

        /* ការបង្កើត Background មានចលនាបែបទឹកហូរ (Liquid Background) */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Kantumruy Pro', sans-serif;
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

        /* ផ្ទាំងកញ្ចក់រាវ (Liquid Glass Card) */
        .liquid-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            padding: 50px;
            width: 100%;
            max-width: 600px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        h2 {
            font-weight: 600;
            text-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 8px;
        }

        /* ស្ទីលសម្រាប់ Input បែបកញ្ចក់ */
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 15px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            box-shadow: none;
        }

        /* ប្តូរពណ៌ placeholder */
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* ប៊ូតុងបញ្ជូនទិន្នន័យ */
        .btn-submit {
            background: white;
            color: #333;
            border: none;
            border-radius: 15px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 15px;
            padding: 12px;
            text-align: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        /* បំបាត់ Icon ខ្មៅក្នុង Input Date */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.6;
        }
    </style>
</head>
<body>

<div class="liquid-card">
    <h2><i class="fas fa-plus-circle me-2"></i> បន្ថែមសៀវភៅថ្មី</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ចំណងជើងសៀវភៅ</label>
            <input type="text" name="title" class="form-control" placeholder="បញ្ចូលចំណងជើង..." required>
        </div>

        <div class="mb-3">
            <label class="form-label">ឈ្មោះអ្នកនិពន្ធ</label>
            <input type="text" name="author" class="form-control" placeholder="បញ្ចូលឈ្មោះអ្នកនិពន្ធ..." required>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label">តម្លៃ ($)</label>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">ថ្ងៃបោះពុម្ព</label>
                <input type="date" name="published_date" class="form-control" required>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save me-2"></i> រក្សាទុកទិន្នន័យ
            </button>
            <a href="{{ route('books.index') }}" class="btn btn-back">
                ត្រឡប់ក្រោយ
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>