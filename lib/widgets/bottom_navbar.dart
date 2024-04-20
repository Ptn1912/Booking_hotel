import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/pages/booking_page.dart';
import 'package:booking_hotel/pages/homepage.dart';
import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class BottomNavBar extends StatefulWidget {
  BottomNavBar({Key? key}) : super(key: key);

  @override
  State<BottomNavBar> createState() => _BottomNavBarState();
}

class _BottomNavBarState extends State<BottomNavBar> {
  int _page = 0;

  GlobalKey<CurvedNavigationBarState> _bottomNavigationKey = GlobalKey();

  final List<Widget> _screens = [
    HotelPage(),
    BookingPage(),
    HotelPage(),
    HotelPage(),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: CurvedNavigationBar(
        backgroundColor: Color.fromARGB(255, 95, 97, 200),
        key: _bottomNavigationKey,
        items: <Widget>[
          Icon(FontAwesomeIcons.home,
              size: 22, color: _page == 0 ? tPrimaryColor : Colors.grey),
          Icon(FontAwesomeIcons.hotel,
              size: 22, color: _page == 1 ? tPrimaryColor : Colors.grey),
          Icon(FontAwesomeIcons.spotify,
              size: 22, color: _page == 2 ? tPrimaryColor : Colors.grey),
          Icon(FontAwesomeIcons.user,
              size: 22, color: _page == 3 ? tPrimaryColor : Colors.grey),
        ],
        onTap: (index) {
          setState(() {
            _page = index;
          });
        },
      ),
      body: _screens[_page],
    );
  }
}
