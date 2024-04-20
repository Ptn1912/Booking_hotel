import 'package:booking_hotel/constant/color.dart';
import 'package:flutter/material.dart';

class OptionDrop extends StatefulWidget {
  const OptionDrop({super.key});

  @override
  State<OptionDrop> createState() => _OptionDropState();
}

class _OptionDropState extends State<OptionDrop> {
  String dropdownValue = 'One';
  @override
  Widget build(BuildContext context) {
    return Container(
      alignment: Alignment.topLeft,
      child: Padding(
          padding: EdgeInsets.all(15.0),
          child: Row(
            children: [
              DropdownButton<String>(
                value: dropdownValue,
                icon: const Icon(Icons.arrow_drop_down),
                style: const TextStyle(color: Colors.blue),
                underline: Container(
                  height: 1,
                  color: tDarkColor,
                ),
                onChanged: (String? newValue) {
                  setState(() {
                    dropdownValue = newValue!;
                  });
                },
                items: const [
                  DropdownMenuItem<String>(
                    value: 'One',
                    child: Text(
                      'Phòng đơn',
                      style: TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                  ),
                  DropdownMenuItem<String>(
                    value: 'two',
                    child: Text(
                      'Phòng đôi',
                      style: TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                  ),
                  DropdownMenuItem<String>(
                    value: 'three',
                    child: Text(
                      'Phòng ba',
                      style: TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                  ),
                  DropdownMenuItem<String>(
                    value: 'for',
                    child: Text(
                      'Phòng hướng biển',
                      style: TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                  ),
                  DropdownMenuItem<String>(
                    value: 'fine',
                    child: Text(
                      'Phòng gia đình',
                      style: TextStyle(
                        fontSize: 18.0,
                      ),
                    ),
                  )
                ],
              ),
            ],
          )),
    );
  }
}
