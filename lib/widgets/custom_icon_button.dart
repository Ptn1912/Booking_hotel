// ignore_for_file: public_member_api_docs, sort_constructors_first
import 'package:flutter/material.dart';

class CustomIconButton extends StatelessWidget {
  const CustomIconButton({
    Key? key,
    required this.icon, 
    required this.color, 
    required this.backgroundColor, 
  }) : super(key: key);
  final Widget icon;
  final Color color;
   final Color backgroundColor;
  @override
  Widget build(BuildContext context) {
   return Container(
    width: 35, // Đây là chiều rộng mới của Container
  height: 35,
  decoration: BoxDecoration(
    color: backgroundColor,
    border: Border.all(color: Colors.grey[300]!),
    shape: BoxShape.circle,
  ),
  child: IconButton(
    onPressed: () {},
    constraints: const BoxConstraints.tightFor(width: 40),
    color: color,
    icon: icon,
    splashRadius: 14,
    iconSize: 13, // Đây là kích thước của biểu tượng
  ),
);

  }
}
