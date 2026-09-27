import 'package:flutter/foundation.dart';

class ApiConstants {
  // Android Emulator reaches the host machine through 10.0.2.2.
  static String get baseUrl {
    const configuredUrl = String.fromEnvironment('API_BASE_URL');
    if (configuredUrl.isNotEmpty) return configuredUrl;

    if (!kIsWeb && defaultTargetPlatform == TargetPlatform.android) {
      return 'http://10.0.2.2:8000/api/v1';
    }

    return 'http://127.0.0.1:8000/api/v1';
  }

  static const String loginEndpoint = '/auth/login';
  static const String registerEndpoint = '/auth/register';
  static const String meEndpoint = '/auth/me';
  static const String logoutEndpoint = '/auth/logout';
  static const String settingsEndpoint = '/settings';
  static const String bannersEndpoint = '/banners';
  static const String categoriesEndpoint = '/categories';
  static const String productsEndpoint = '/products';
}
