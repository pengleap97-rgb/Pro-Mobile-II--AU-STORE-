<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>បញ្ជីសៀវភៅ - Glassmorphism Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;700&display=swap');

        :root {
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-primary: #ffffff;
            --accent-green: #00d97e;
            --accent-warning: #ffb822;
            --accent-danger: #f5365c;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%), url('https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=2070') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Kantumruy Pro', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
        }

        .main-container {
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 30px;
            margin-top: 50px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        h2.text-primary {
            color: var(--text-primary) !important;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .btn-success {
            background-color: rgba(0, 217, 126, 0.2);
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            color: var(--accent-green);
            font-weight: bold;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: rgba(0, 217, 126, 0.4);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 217, 126, 0.4);
        }

        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            overflow: hidden;
        }

        .table-hover {
            color: var(--text-primary);
            margin-bottom: 0;
        }

        .table-dark {
            background-color: rgba(0, 0, 0, 0.3) !important;
        }

        /* បន្ថែមស្ទីលសម្រាប់ប៊ូតុង និង Padding */
        .btn-action-group {
            display: flex !important;
            gap: 12px !important; /* គម្លាតរវាងប៊ូតុងនីមួយៗ */
            justify-content: center;
            align-items: center;
        }

        .btn-glass {
            border-radius: 12px !important;
            backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border) !important;
            transition: all 0.2s ease;
            padding: 8px 18px !important; /* Padding លើ-ក្រោម 8px និង ឆ្វេង-ស្តាំ 18px */
            font-size: 14px !important;
            display: inline-flex !important;
            align-items: center;
            text-decoration: none !important;
        }

        .btn-glass i {
            margin-right: 6px;
        }

        .btn-info-glass { background: rgba(23, 162, 184, 0.15) !important; color: #00e5ff !important; }
        .btn-info-glass:hover { background: rgba(23, 162, 184, 0.35) !important; color: white !important; }

        .btn-warning-glass { background: rgba(255, 184, 34, 0.15) !important; color: var(--accent-warning) !important; }
        .btn-warning-glass:hover { background: rgba(255, 184, 34, 0.35) !important; color: white !important; }

        .btn-danger-glass { background: rgba(245, 54, 92, 0.15) !important; color: var(--accent-danger) !important; }
        .btn-danger-glass:hover { background: rgba(245, 54, 92, 0.35) !important; color: white !important; }

        .btn-action-group form {
            margin: 0;
            display: flex;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container shadow-lg">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary">
                <h2 class="text-primary m-0"><i class="fas fa-book-open me-2"></i>បញ្ជីសៀវភៅទាំងអស់</h2>
                <a href="{{ route('books.create') }}" class="btn btn-success px-4 py-2">
                    <i class="fas fa-plus me-2"></i>បន្ថែមសៀវភៅថ្មី
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card glass-card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>ចំណងជើង</th>
                                <th>អ្នកនិពន្ធ</th>
                                <th>តម្លៃ</th>
                                <th>ថ្ងៃបោះពុម្ព</th>
                                <th class="text-center">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td class="ps-4">{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>${{ number_format($book->price, 2) }}</td>
                                <td>{{ $book->published_date->format('Y-m-d') }}</td>
                                <td>
                                    <div class="btn-action-group">
                                        <a href="{{ route('books.show', $book->id) }}" class="btn-glass btn-info-glass">
                                            <i class="fas fa-eye"></i> View
                                        </a>

                                        <a href="{{ route('books.edit', $book->id) }}" class="btn-glass btn-warning-glass">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-glass btn-danger-glass">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>