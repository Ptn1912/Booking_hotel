import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/models/hotel_model.dart';
import 'package:booking_hotel/pages/Apptext.dart';
import 'package:booking_hotel/pages/hotel_page.dart';
import 'package:booking_hotel/widgets/custom_rating.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class HotelCard extends StatelessWidget {
  final HotelModel hotel;
  const HotelCard({
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
          decoration: BoxDecoration(
              color: Color.fromARGB(176, 181, 200, 212),
              borderRadius: BorderRadius.circular(10.0)),
          child: Row(
            children: [
              Flexible(
                  flex: 1,
                  child: ClipRRect(
                    borderRadius: const BorderRadius.only(
                      topLeft: Radius.circular(10.0),
                      bottomLeft: Radius.circular(10.0),
                    ),
                    child: Image.asset(
                      hotel.thumbnailPath,
                      fit: BoxFit.cover,
                    ),
                  )),
              Flexible(
                  flex: 2,
                  child: Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 10.0),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        AppText.medium(
                          text: hotel.title,
                          textAlign: TextAlign.left,
                        ),
                        const SizedBox(
                          height: 5,
                        ),
                        Row(
                          children: [
                            Icon(
                              FontAwesomeIcons.locationDot,
                              size: 17.0,
                            ),
                            const SizedBox(
                              width: 4,
                            ),
                            AppText.small(text: hotel.location)
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
                              AppTextSpan.large(
                                  text: '${hotel.price} đ', color: tPrice),
                              AppTextSpan.medium(
                                  text: '/đêm', color: tWhiteColor),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 5.0,
                        ),
                      ],
                    ),
                  )),
            ],
          )),
    );
  }
}
