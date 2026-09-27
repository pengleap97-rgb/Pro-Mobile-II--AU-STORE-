import 'package:flutter/material.dart';
import '../theme/app_theme.dart';

class AppSurface extends StatelessWidget {
  final Widget child;
  final EdgeInsetsGeometry padding;
  final EdgeInsetsGeometry? margin;
  final Color? color;
  final BorderRadius borderRadius;
  final bool elevated;

  const AppSurface({
    super.key,
    required this.child,
    this.padding = const EdgeInsets.all(16),
    this.margin,
    this.color,
    this.borderRadius = const BorderRadius.all(Radius.circular(18)),
    this.elevated = false,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: margin,
      padding: padding,
      decoration: BoxDecoration(
        color: color ?? AppColors.card,
        borderRadius: borderRadius,
        border: Border.all(color: AppColors.border),
        boxShadow: elevated
            ? const [
                BoxShadow(
                  color: Color(0x1218212B),
                  blurRadius: 16,
                  offset: Offset(0, 7),
                ),
              ]
            : null,
      ),
      child: child,
    );
  }
}
