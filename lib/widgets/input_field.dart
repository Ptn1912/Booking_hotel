import 'package:booking_hotel/consts.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class InputField extends StatelessWidget {
  const InputField(
      {super.key,
      required this.hintText,
      
      required this.controller,
      required this.obcureText, required this.icon});
  final String hintText;
 
  final TextEditingController controller;
  final bool obcureText;
  final FaIcon icon;
  @override
  Widget build(BuildContext context) {
    return TextField(
            style: const TextStyle(color: kInputColor),
            controller: controller,
            obscureText: obcureText,
            
            decoration: InputDecoration(
         
              contentPadding:const EdgeInsets.symmetric(vertical: 22.0),
              prefixIcon: IconButton(icon: icon,onPressed: (){},),
                filled: true,
                  fillColor:Colors.white ,
                border: OutlineInputBorder(
                    borderSide: BorderSide.none,
                    borderRadius: BorderRadius.circular(22)),
                hintText: hintText,
            )
          );
       
  }
}
