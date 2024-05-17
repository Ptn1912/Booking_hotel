import 'package:booking_hotel/consts.dart';
import 'package:flutter/material.dart';
class IconBtn extends StatelessWidget {
  final Widget icon;
  final Function()? onPressed;
  final double size;
  const IconBtn({
    required this.icon,
    this.onPressed,
    this.size = 40,
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
          color: tCardBgColor, borderRadius: BorderRadius.circular(20.0)),
      child: IconButton(onPressed: onPressed, icon: icon),
    );
  }
}