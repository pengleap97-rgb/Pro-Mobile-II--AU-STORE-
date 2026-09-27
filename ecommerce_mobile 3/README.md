# E-Commerce Mobile

Flutter client for the Laravel 12 e-commerce API.

## Run with the Laravel backend

Start Laravel first:

```bash
cd /path/to/Untitled
php artisan serve --host=127.0.0.1 --port=8000
```

Then verify the API from the Mac:

```bash
curl http://127.0.0.1:8000/api/v1/settings
```

Expected: JSON with `success: true`.

### iOS Simulator

```bash
flutter run --dart-define=API_BASE_URL=http://127.0.0.1:8000/api/v1
```

### Android Emulator

```bash
flutter run --dart-define=API_BASE_URL=http://10.0.2.2:8000/api/v1
```

### Physical phone

Use your Mac's LAN IP, for example:

```bash
flutter run --dart-define=API_BASE_URL=http://192.168.1.10:8000/api/v1
```

Also start Laravel with `--host=0.0.0.0` for a physical device.

## Seeded login

After running the Laravel migrations/seeders, the seeded accounts use:

- `admin@ecommerce.test` / `password`
- `rithy.sok@example.com` / `password`
- `kalyan.keo@example.com` / `password`
- vendor accounts from the Laravel seeder / `password`

## Authentication fixes in this build

- Android INTERNET permission is enabled.
- Android local HTTP is allowed for development.
- iOS local HTTP is allowed for development.
- Vendor registration now sends the required `shop_name`.
- Registration password validation matches the backend's 8-character minimum.
- API errors now surface Laravel validation messages instead of hiding them.
