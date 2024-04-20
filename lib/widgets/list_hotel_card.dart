import 'package:booking_hotel/pages/hotel_page.dart';
import 'package:booking_hotel/widgets/custom_rating.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

import '../constant/color.dart';
import '../models/hotel_model.dart';
import '../pages/Apptext.dart';

class ListHotelCard extends StatelessWidget {
  final HotelModel hotel;
  const ListHotelCard({
    super.key,
    required this.hotel,
  });

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (context) => HotelDetailScreen(
              hotel: hotel,
            ),
          ),
        );
      },
      child: Container(
        margin: const EdgeInsets.only(top: 15.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Row(
              children: [
                Expanded(
                  child: Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 5.0),
                    child: ClipRRect(
                      borderRadius: BorderRadius.circular(10.0),
                      child: Image.asset(
                        hotel.thumbnailPath,
                        fit: BoxFit.cover,
                        height: 200,
                      ),
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 10),
            AppText.medium(
              text: hotel.title,
              textAlign: TextAlign.left,
            ),
            const SizedBox(
              height: 5,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Expanded(
                  child: Row(
                    children: [
                      Icon(
                        FontAwesomeIcons.locationDot,
                        size: 17.0,
                      ),
                      const SizedBox(
                        width: 4,
                      ),
                      AppText.small(text: hotel.location),
                    ],
                  ),
                ),
                ElevatedButton(
                  style: ButtonStyle(
                    backgroundColor:
                        MaterialStateProperty.all<Color>(tPrimaryColor),
                  ),
                  onPressed: () {},
                  child: Text(
                    'Đặt phòng',
                    style: TextStyle(
                      fontSize: 15,
                      fontWeight: FontWeight.bold,
                      color: tWhite,
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 5.0,
            ),
            CustomRating(
              ratingScore: hotel.ratingScore,
            ),
            const SizedBox(
              height: 5.0,
            ),
            RichText(
              text: TextSpan(
                children: [
                  AppTextSpan.large(text: '${hotel.price} đ', color: tPrice),
                  AppTextSpan.medium(text: '/đêm', color: tWhiteColor),
                ],
              ),
            ),
            const SizedBox(height: 10),
            Divider(color: Colors.grey),
          ],
        ),
      ),
    );
  }
}
