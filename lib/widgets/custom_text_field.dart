import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/pages/Apptext.dart';
import 'package:flutter/material.dart';

class CustomTextField extends StatelessWidget {
  final TextEditingController controller;
  final String label;
  const CustomTextField({
    super.key,
    required this.label,
    required this.controller,
  });

  @override
  Widget build(BuildContext context) {
    return Flexible(
      child: TextField(
        controller: controller,
        decoration: InputDecoration(
            label: AppText.small(
              text: label,
              color: tPrimaryColor,
            ),
            border: InputBorder.none),
      ),
    );
  }
}
