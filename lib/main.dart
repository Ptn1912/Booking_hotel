import 'package:booking_hotel/controllers/NearbyPlacesController.dart';
import 'package:booking_hotel/pages/login_page.dart';
import 'package:booking_hotel/pages/social_page.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:persistent_shopping_cart/persistent_shopping_cart.dart';
void main() async{
  await PersistentShoppingCart().init();
   Get.put(NearbyPlacesController()); 
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});
  @override
  Widget build(BuildContext context) {
    Get.put(NearbyPlacesController());
    return GetMaterialApp(
      title: 'Travel App',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
       backgroundColor: Colors.white,
        textTheme: GoogleFonts.mulishTextTheme(
          Theme.of(context).textTheme,
        ),
      ),
      home: SocialScreen(),
    
    );
  }
}
