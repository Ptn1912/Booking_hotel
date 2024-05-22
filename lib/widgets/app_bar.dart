import 'package:booking_hotel/consts.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class MyAppBar extends StatelessWidget implements PreferredSizeWidget {
  final String title;
  final Function()? leadingCallback;

  const MyAppBar({
    Key? key,
    required this.title,
    this.leadingCallback,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
     return AppBar(
      backgroundColor: kcontentColor,
       leading: IconButton(
       onPressed: leadingCallback ?? () => Navigator.of(context).pop(),
      icon: const Icon(FontAwesomeIcons.angleLeft),
   ),
   title: Text(
         title,
         textAlign: TextAlign.center,
         style: TextStyle(fontSize: 22),
     ),
      centerTitle: true, // Đặt tiêu đề ở giữa
    );
  }

  @override
  Size get preferredSize => const Size.fromHeight(kToolbarHeight);
  
}
