import 'package:booking_hotel/constant/image.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class HotelModel {
  final String id;
  final String title;
  final String location;
  final String address;
  final String description;
  final String thumbnailPath;
  final List<String> imagePaths;
  final int totalReview;
  final double ratingScore;
  final double price;
  final LatLng coordinate;

  const HotelModel({
    required this.id,
    required this.title,
    required this.location,
    required this.address,
    required this.description,
    required this.thumbnailPath,
    required this.imagePaths,
    required this.price,
    required this.coordinate,
    this.totalReview = 0,
    this.ratingScore = 0,
  });
  static List<HotelModel> sampleHotels = const [
    HotelModel(
      id: '1',
      title: 'Sala Danang Beach Hotel',
      location: 'Sơn Trà, Đà Nẵng',
      address: '120 Đỗ Bá',
      description:
          'Khách sạn của chúng tôi nằm gần khu vui chơi và trung tâm mua sắm, mang lại sự thuận tiện tối đa cho bạn.',
      thumbnailPath: hotel1,
      imagePaths: [
        tplace1,
        tplace2,
        tplace3,
      ],
      price: 1500,
      coordinate: LatLng(16.0544, 108.2022),
      totalReview: 150,
      ratingScore: 4.5,
    ),
    HotelModel(
      id: '1',
      title: ' Havana Nha Trang Hotel',
      location: 'Nha Trang',
      address: '120 Đỗ Bá',
      description:
          'Khách sạn của chúng tôi nằm gần khu vui chơi và trung tâm mua sắm, mang lại sự thuận tiện tối đa cho bạn.',
      thumbnailPath: hotel2,
      imagePaths: [
        tplace1,
        tplace2,
        tplace3,
      ],
      price: 1200,
      coordinate: LatLng(16.0544, 108.2022),
      totalReview: 150,
      ratingScore: 3.7,
    ),
    HotelModel(
      id: '1',
      title: 'La Siesta Hoi An Resort & Spa',
      location: 'Sơn Trà, Đà Nẵng',
      address: '120 Đỗ Bá',
      description:
          'Khách sạn của chúng tôi nằm gần khu vui chơi và trung tâm mua sắm, mang lại sự thuận tiện tối đa cho bạn.',
      thumbnailPath: hotel3,
      imagePaths: [
        tplace1,
        tplace2,
        tplace3,
      ],
      price: 800,
      coordinate: LatLng(16.0544, 108.2022),
      totalReview: 150,
      ratingScore: 2.5,
    ),
    HotelModel(
      id: '1',
      title: 'Khách sạn Mường Thanh',
      location: 'Sơn Trà, Đà Nẵng',
      address: '120 Đỗ Bá',
      description:
          'Khách sạn của chúng tôi nằm gần khu vui chơi và trung tâm mua sắm, mang lại sự thuận tiện tối đa cho bạn.',
      thumbnailPath: hotel4,
      imagePaths: [
        tplace1,
        tplace2,
        tplace3,
      ],
      price: 2000,
      coordinate: LatLng(16.0544, 108.2022),
      totalReview: 150,
      ratingScore: 4.25,
    ),
    HotelModel(
      id: '1',
      title: 'Khách sạn Mường Thanh',
      location: 'Sơn Trà, Đà Nẵng',
      address: '120 Đỗ Bá',
      description:
          'Khách sạn của chúng tôi nằm gần khu vui chơi và trung tâm mua sắm, mang lại sự thuận tiện tối đa cho bạn.',
      thumbnailPath: hotel5,
      imagePaths: [
        tplace1,
        tplace2,
        tplace3,
      ],
      price: 1500,
      coordinate: LatLng(16.0544, 108.2022),
      totalReview: 150,
      ratingScore: 4.25,
    )
  ];
}
