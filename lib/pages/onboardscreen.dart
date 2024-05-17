// ignore: unused_import
import 'package:booking_hotel/pages/login_page.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/consts.dart';
import '../models/onboard_model.dart';


class OnboardScreen extends StatefulWidget {
  const OnboardScreen({super.key});

  @override
  State<OnboardScreen> createState() => _OnboardScreenState();
}

class _OnboardScreenState extends State<OnboardScreen> {
  int _currentPage = 0;
  @override
  Widget build(BuildContext context) {
    final size = MediaQuery.of(context).size;
    return Scaffold(
      body: Stack(
        fit: StackFit.expand,
        children: <Widget>[
          Image.asset(
            pages[_currentPage].img,
            fit: BoxFit.cover,
          ),
          const SafeArea(
              child: Align(
            alignment: Alignment.topRight,
            child: Padding(
              padding: EdgeInsets.only(right: 20.0),
              child: Text(
                "Skip Tutorial",
                style:
                    TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
              ),
            ),
          )),
          Align(
            alignment: Alignment.bottomCenter,
            child: Container(
              height: size.height * .4,
              width: size.width,
              margin: const EdgeInsets.all(5),
              padding: const EdgeInsets.symmetric(vertical: 20, horizontal: 10),
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(30),
              ),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                children: <Widget>[
                  Icon(
                    pages[_currentPage].icon,
                    size: 40,
                    color: Colors.red[600],
                  ),
                  Text(
                    pages[_currentPage].title,
                    style: const TextStyle(
                        fontSize: 30, fontWeight: FontWeight.bold),
                  ),
                  Container(
                    width: size.width * .7,
                    child: Text(
                      pages[_currentPage].subtitle,
                      textAlign: TextAlign.center,
                    ),
                  ),
                  Container(
                    height: 50,
                    width: size.width * .8,
                    child: ClipRRect(
                      borderRadius: BorderRadius.circular(20),
                      child: Material(
                        color: Colors.grey[200],
                        child: InkWell(
                          splashColor: tPrimaryColor,
                          onTap: () {
                            if (_currentPage < 2)
                              setState(() {
                                _currentPage++;
                              });
                            else {
                              Navigator.pushReplacement(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => LoginPage()),
                              );
                            }
                          },
                          child: Container(
                            decoration: const BoxDecoration(),
                            child: Center(
                              child: Text(
                                _currentPage == 2 ? "Let's Start" : "Next",
                                style: const TextStyle(
                                    fontWeight: FontWeight.bold),
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: List.generate(
                      3,
                      (index) => Container(
                        height: 10,
                        width: 10,
                        margin: const EdgeInsets.symmetric(horizontal: 3),
                        decoration: BoxDecoration(
                            color: index == _currentPage
                                ? tPrimaryColor
                                : Colors.grey[200],
                            shape: BoxShape.circle),
                      ),
                    ),
                  )
                ],
              ),
            ),
          )
        ],
      ),
    );
  }
}
