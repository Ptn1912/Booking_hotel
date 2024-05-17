import 'package:booking_hotel/pages/welcome_page.dart.dart';
import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:booking_hotel/pages/home_musics.dart';
import 'package:booking_hotel/pages/home_page.dart';
import 'package:booking_hotel/pages/hotel_page.dart';
import 'package:booking_hotel/pages/profile_page.dart';

class BottomNavBar extends StatefulWidget {
  BottomNavBar({Key? key}) : super(key: key);

  @override
  State<BottomNavBar> createState() => _BottomNavBarState();
}

class _BottomNavBarState extends State<BottomNavBar> {
  int _page = 0;

  GlobalKey<CurvedNavigationBarState> _bottomNavigationKey = GlobalKey();

  final List<Widget> _screens = [
   HomePage(),
    HotelPage(),
    HomeMusics(),
    WelcomeScreen(),  
    ProfileScreen(),
  ];

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      top: false,
      child: Scaffold(
        extendBody: true,
        backgroundColor: Colors.lightBlue,
        bottomNavigationBar: CurvedNavigationBar(
          height: 60,
          animationDuration: Duration(milliseconds: 300),
          animationCurve: Curves.easeInOut,
          color: Colors.lightBlue,
          backgroundColor: Colors.white,
          key: _bottomNavigationKey,
          items: <Widget>[
             Icon(FontAwesomeIcons.home, color: Colors.white),
            Icon(FontAwesomeIcons.bagShopping, color: Colors.white),
            Icon(FontAwesomeIcons.spotify, color: Colors.white),
            Icon(FontAwesomeIcons.instagram, color: Colors.white),
               Icon(FontAwesomeIcons.userLarge, color: Colors.white),
          ],
          onTap: (index) {
            setState(() {
              _page = index;
            });
          },
        ),
        body: _screens[_page],
      ),
    );
  }
}
