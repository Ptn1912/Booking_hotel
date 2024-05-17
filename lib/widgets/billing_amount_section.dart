import 'package:flutter/material.dart';

class TBillingAmountSection extends StatelessWidget {
  
   final String productName;
    final int quantity;
  const TBillingAmountSection({super.key,required this.productName,required this.quantity});

  @override
  Widget build(BuildContext context) {
    return  Column(
      children: [
        Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
             Text('Name',style:Theme.of(context).textTheme.bodyMedium),
              Text('${productName.toString()}',style:Theme.of(context).textTheme.bodyMedium),
          ],
        ),
        SizedBox(
          height: 8,
        ),  
        Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
             Text('Quantity',style:Theme.of(context).textTheme.bodyMedium),
              Text('${quantity.toString()}',style:Theme.of(context).textTheme.labelLarge),
          ],
        ),
       
        
      ],
    );
  }
}