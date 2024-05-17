// ignore: unused_import
import 'package:flutter/material.dart';

List<OnboardModel> pages = [
  OnboardModel(
      icon: Icons.place,
      title: "Booking Hotels",
      subtitle: " Keep track of all the countries you're visited",
      img: "assets/onboard/onb1.jpg"),
  OnboardModel(
      icon: Icons.stars,
      title: "Leaderboard",
      subtitle: " Keep track of all the countries you're visited",
      img: "assets/onboard/onb2.jpg"),
  OnboardModel(
      icon: Icons.place,
      title: "New Destinations",
      subtitle: " Keep track of all the countries you're visited",
      img: "assets/onboard/onb3.jpg"),
];

class OnboardModel {
  final IconData icon;
  final String title, subtitle, img;

  OnboardModel({
    required this.icon,
    required this.title,
    required this.subtitle,
    required this.img,
  });
}
