import 'package:booking_hotel/pages/cart_page.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';


class CartItemCountWidget extends StatelessWidget {
  final int itemCount;
  final VoidCallback onPressed;

  const CartItemCountWidget({
    required this.itemCount,
    required this.onPressed,
  });

  @override
  Widget build(BuildContext context) {
    return IconButton(
      onPressed: onPressed,
      icon: Badge(
        label: Text(itemCount.toString()),
        child: Icon(FontAwesomeIcons.cartShopping),
      ),
    );
  }
}
