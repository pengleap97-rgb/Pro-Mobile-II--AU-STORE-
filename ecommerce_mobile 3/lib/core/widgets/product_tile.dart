import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../models/product_model.dart';
import '../theme/app_theme.dart';

class ProductTile extends StatelessWidget {
  final ProductModel product;
  final bool isWishlisted;
  final VoidCallback? onTap;
  final VoidCallback? onWishlistToggle;
  final bool compact;

  const ProductTile({
    super.key,
    required this.product,
    this.isWishlisted = false,
    this.onTap,
    this.onWishlistToggle,
    this.compact = false,
  });

  @override
  Widget build(BuildContext context) {
    final image = product.imageUrl;
    final oldPrice = product.discountPrice;
    final tag = product.tag ?? product.discountPercent?.toString();

    return GestureDetector(
      onTap: onTap,
      child: Container(
        decoration: BoxDecoration(
          color: AppColors.card,
          borderRadius: BorderRadius.circular(20),
          border: Border.all(color: AppColors.border),
          boxShadow: const [
            BoxShadow(
              color: Color(0x1218212B),
              blurRadius: 16,
              offset: Offset(0, 7),
            ),
          ],
        ),
        clipBehavior: Clip.antiAlias,
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            AspectRatio(
              aspectRatio: compact ? 1.25 : 1.12,
              child: Stack(
                children: [
                  Container(
                    color: AppColors.surfaceSoft,
                    alignment: Alignment.center,
                    child: image == null
                        ? const Icon(
                            Icons.image_outlined,
                            size: 42,
                            color: AppColors.textMuted,
                          )
                        : Image.network(
                            image,
                            fit: BoxFit.contain,
                            width: double.infinity,
                            errorBuilder: (context, error, stackTrace) =>
                                const Icon(
                                  Icons.image_outlined,
                                  size: 42,
                                  color: AppColors.textMuted,
                                ),
                          ),
                  ),
                  if (tag != null)
                    Positioned(
                      left: 10,
                      top: 10,
                      child: DecoratedBox(
                        decoration: BoxDecoration(
                          color: AppColors.surfaceAccent,
                          borderRadius: BorderRadius.circular(8),
                        ),
                        child: Padding(
                          padding: const EdgeInsets.symmetric(
                            horizontal: 8,
                            vertical: 4,
                          ),
                          child: Text(
                            tag,
                            style: GoogleFonts.plusJakartaSans(
                              color: AppColors.primaryDark,
                              fontSize: 9,
                              fontWeight: FontWeight.w800,
                            ),
                          ),
                        ),
                      ),
                    ),
                  if (onWishlistToggle != null)
                    Positioned(
                      right: 10,
                      top: 10,
                      child: Material(
                        color: Colors.white,
                        shape: const CircleBorder(),
                        elevation: 2,
                        child: InkWell(
                          customBorder: const CircleBorder(),
                          onTap: onWishlistToggle,
                          child: Padding(
                            padding: const EdgeInsets.all(7),
                            child: Icon(
                              isWishlisted
                                  ? Icons.favorite_rounded
                                  : Icons.favorite_border_rounded,
                              size: 16,
                              color: isWishlisted
                                  ? AppColors.primary
                                  : AppColors.textBody,
                            ),
                          ),
                        ),
                      ),
                    ),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(12, 11, 12, 12),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    product.name,
                    maxLines: 1,
                    overflow: TextOverflow.ellipsis,
                    style: GoogleFonts.plusJakartaSans(
                      color: AppColors.textDark,
                      fontSize: 13,
                      fontWeight: FontWeight.w800,
                    ),
                  ),
                  if (!compact && product.description != null) ...[
                    const SizedBox(height: 3),
                    Text(
                      product.description!,
                      maxLines: 1,
                      overflow: TextOverflow.ellipsis,
                      style: GoogleFonts.plusJakartaSans(
                        color: AppColors.textMuted,
                        fontSize: 10,
                        fontWeight: FontWeight.w500,
                      ),
                    ),
                  ],
                  const SizedBox(height: 7),
                  Row(
                    children: [
                      const Icon(
                        Icons.star_rounded,
                        size: 14,
                        color: Color(0xFFF59E0B),
                      ),
                      const SizedBox(width: 3),
                      Text(
                        '${product.rating.toStringAsFixed(1)} (${product.reviewsCount})',
                        style: GoogleFonts.plusJakartaSans(
                          color: AppColors.textBody,
                          fontSize: 10,
                          fontWeight: FontWeight.w700,
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 7),
                  Row(
                    children: [
                      Text(
                        '\$${product.effectivePrice.toStringAsFixed(2)}',
                        style: GoogleFonts.plusJakartaSans(
                          color: AppColors.primary,
                          fontSize: 15,
                          fontWeight: FontWeight.w900,
                        ),
                      ),
                      if (oldPrice != null) ...[
                        const SizedBox(width: 5),
                        Text(
                          '\$${product.price.toStringAsFixed(2)}',
                          style: GoogleFonts.plusJakartaSans(
                            color: AppColors.textMuted,
                            fontSize: 10,
                            decoration: TextDecoration.lineThrough,
                          ),
                        ),
                      ],
                    ],
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
