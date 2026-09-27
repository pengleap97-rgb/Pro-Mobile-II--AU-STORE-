import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../providers/cart_provider.dart';
import '../../screens/cart/cart_screen.dart';
import '../theme/app_theme.dart';

class CartBadgeButton extends StatelessWidget {
  final Color? color;

  const CartBadgeButton({super.key, this.color});

  @override
  Widget build(BuildContext context) {
    final count = context.watch<CartProvider>().itemCount;
    return IconButton(
      tooltip: 'Shopping cart',
      onPressed: () {
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (_) => const CartScreen(showBackButton: true),
          ),
        );
      },
      icon: Badge(
        isLabelVisible: count > 0,
        label: Text('$count'),
        backgroundColor: AppColors.primary,
        textColor: Colors.white,
        child: Icon(
          Icons.shopping_bag_outlined,
          color: color ?? AppColors.textDark,
        ),
      ),
    );
  }
}
