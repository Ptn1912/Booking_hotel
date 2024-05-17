import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class TBillingAddressSection extends StatelessWidget {
  const TBillingAddressSection({super.key});

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
        Text(
          'Shipping Address',
          style:TextStyle(fontWeight: FontWeight.bold,fontSize: 16),
        ),
          TextButton(onPressed: () {}, child: const Text("Change"))
          ]
        ),
         SizedBox(
              height: 8,
            ),
        Text(
          'Thảo Nhi',
          style:TextStyle(fontWeight: FontWeight.bold,fontSize: 12),
        ),
         SizedBox(
              height: 8,
            ),
        Row(
          children: [
            Icon(FontAwesomeIcons.phone, color: Colors.grey, size: 16),
            SizedBox(
              width: 16,
            ),
            Text(
              '0348990415',
              style: Theme.of(context).textTheme.bodySmall,
            )
          ],
        ),
        SizedBox(height: 16),
        Row(
          children: [
            Icon(FontAwesomeIcons.locationDot, color: Colors.grey, size: 16),
            SizedBox(
              width: 16,
            ),
            Expanded(
              child: Text(
                'Đà Nẵng',
                style: Theme.of(context).textTheme.bodySmall,
                softWrap: true,
              ),
            )
          ],
        ),
       
      ],
    );
  }
}
