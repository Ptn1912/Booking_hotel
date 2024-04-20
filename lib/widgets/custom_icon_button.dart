// ignore_for_file: public_member_api_docs, sort_constructors_first
import 'package:flutter/material.dart';
import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/constant/image.dart';

class CustomIconButton extends StatelessWidget {
  final Widget icon;
  final Function()? onPressed;
  final double size;
  const CustomIconButton({
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
