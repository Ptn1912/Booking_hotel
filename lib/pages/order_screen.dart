import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/order.dart';
import 'package:flutter/material.dart';

class OrderScreen extends StatelessWidget {
  const OrderScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: kWhiteColor,
       appBar: MyAppBar(
          title: 'My orders',
        ),
        body: const Padding(
          
          padding: EdgeInsets.all(12),
          child: TOrderListItem(),

          ),
    )
    ;
  }
}