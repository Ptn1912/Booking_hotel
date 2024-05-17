import 'package:booking_hotel/widgets/custom_icon_button.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class Remove_add_button extends StatelessWidget {
  const Remove_add_button({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
             const SizedBox(
              width: 50,
            ),
            CustomIconButton(
              icon: Icon(FontAwesomeIcons.minus),
              color: Colors.black,
              backgroundColor: Colors.grey.shade200,
            ),
            const SizedBox(
              width: 8,
            ),
            Text(
              '2',
              style: Theme.of(context).textTheme.titleSmall,
            ),
            const SizedBox(
              width: 8,
            ),
            CustomIconButton(
              icon: Icon(FontAwesomeIcons.add),
              color: Colors.white,
              backgroundColor: Colors.indigo,
            ),
          ],
        ),
      ],
    );
  }
}
