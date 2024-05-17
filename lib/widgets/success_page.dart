import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/pages/home_page.dart';
import 'package:booking_hotel/widgets/bottom_navbar.dart';
import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';
import 'package:flutter/material.dart';
import 'package:lottie/lottie.dart';
class SuccessView extends StatelessWidget {
  const SuccessView({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
             Lottie.asset('assets/animations/success.json',),
                // decoration: BoxDecoration(
                //   image: DecorationImage(
                //     image: AssetImage('assets/images/payment/Success.png'),
                //     scale: 2.0,
                //   ),
                // ),
            
            
              Text(
                'Thank you for your reservation',
                style: TextStyle(
                  fontSize: 20,
                
                  fontWeight: FontWeight.w800
                ),
              ),
              Text(
                'Thank you for your reservation',
                style: TextStyle(
                  fontSize: 16,
                
                  fontWeight: FontWeight.w200
                ),
              ),
              const SizedBox(
                height: 20,
              ),
              GestureDetector(
                onTap: () {
                  Get.to(()=>BottomNavBar());
                },
                child: Container(
                  height: 55,
                  width: Get.width * 0.8,
                  alignment: Alignment.center,
                  padding: const EdgeInsets.symmetric(vertical: 14),
                  decoration: BoxDecoration(
                    color: Colors.lightBlue,
                    borderRadius: BorderRadius.circular(8),
                  ),
                  child: Text(
                    'Back to Home',
                    style: TextStyle(
                      fontSize: 18,
                      color: kWhiteColor,
                    ),
                  ),
                ),
              )
            ],
          ),
        ));
  }
}