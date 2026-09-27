<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>កែប្រែព័ត៌មានសៀវភៅ - Liquid Glass Style</title>
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
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 550px;
            color: white;
        }

        .card-header-custom {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        h4 {
            font-weight: 600;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
        }

        /* ស្ទីលសម្រាប់ Input បែបកញ្ចក់ */
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 15px;
            padding: 12px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #fff;
            color: white;
            box-shadow: none;
        }

        /* ប្តូរពណ៌ placeholder ឱ្យស */
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* ស្ទីលសម្រាប់ប៊ូតុង */
        .btn-update {
            background: #fff;
            color: #333;
            border: none;
            border-radius: 15px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-update:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 15px;
            padding: 12px;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
    </style>
</head>
<body>

<div class="liquid-card">
    <div class="card-header-custom">
        <h4><i class="fas fa-edit me-2"></i> កែប្រែព័ត៌មានសៀវភៅ</h4>
    </div>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ចំណងជើងសៀវភៅ</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ឈ្មោះអ្នកនិពន្ធ</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-4 row">
            <div class="col-md-6">
                <label class="form-label">តម្លៃ ($)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $book->price }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">ថ្ងៃបោះពុម្ព</label>
                <input type="date" name="published_date" class="form-control" value="{{ $book->published_date->format('Y-m-d') }}" required>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-update">
                <i class="fas fa-save me-2"></i> រក្សាទុកការកែប្រែ
            </button>
            <a href="{{ route('books.index') }}" class="btn btn-cancel">
                បោះបង់
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>