import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/constant/image.dart';
import 'package:booking_hotel/pages/booking_page.dart';
import 'package:booking_hotel/pages/homepage.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:google_fonts/google_fonts.dart';

class CustomNavBar extends StatelessWidget {
  final int index;
  const CustomNavBar({required this.index, super.key});

  @override
  Widget build(BuildContext context) {
    return BottomAppBar(
      child: Padding(
        padding: const EdgeInsets.only(top: 6.0, left: 10.0, right: 10.0),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [
            _NavBarIcon(
              icondata: FontAwesomeIcons.home,
              text: 'Home',
              isSelected: index == 0,
              onTap: () {
                Navigator.pushReplacement(context,
                    MaterialPageRoute(builder: (context) => HotelPage()));
              },
            ),
            _NavBarIcon(
              icondata: FontAwesomeIcons.building,
              text: 'Booking',
              isSelected: index == 1,
              onTap: () {
                Navigator.pushReplacement(context,
                    MaterialPageRoute(builder: (context) => BookingPage()));
              },
            ),
            _NavBarIcon(
              icondata: FontAwesomeIcons.spotify,
              text: 'Spotify',
              isSelected: index == 3,
              onTap: () {
                // Navigator.pushReplacement(
                //     context, MaterialPageRoute(builder: (context) =>  ));
              },
            ),
            _NavBarIcon(
              icondata: FontAwesomeIcons.solidUser,
              text: 'Profile',
              isSelected: index == 4,
              onTap: () {
                // Navigator.pushReplacement(
                //     context, MaterialPageRoute(builder: (context) => Home()));
              },
            ),
          ],
        ),
      ),
    );
  }
}

class _NavBarIcon extends StatelessWidget {
  const _NavBarIcon({
    Key? key,
    required this.icondata,
    required this.text,
    this.onTap,
    this.isSelected = false,
  }) : super(key: key);

  final IconData icondata;
  final String text;
  final Function()? onTap;
  final bool isSelected;

  @override
  Widget build(BuildContext context) {
    final color = isSelected ? tAccentColor : tnav;
    return InkWell(
      onTap: onTap,
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        mainAxisSize: MainAxisSize.min,
        children: [
          Icon(
            icondata,
            color: color,
          ),
          const SizedBox(
            height: 5.0,
          ),
          Text(
            text,
            style: TextStyle(
              fontSize: 12,
              fontWeight: FontWeight.w600,
              color: color,
            ),
          )
        ],
      ),
    );
  }
}
