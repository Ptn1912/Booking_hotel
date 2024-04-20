import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/pages/Apptext.dart';
import 'package:flutter/material.dart';

class CustomRating extends StatelessWidget {
  final double ratingScore;
  final int totalReview;
  final bool showReviews;
  const CustomRating(
      {required this.ratingScore,
      this.totalReview = 0,
      this.showReviews = false,
      super.key});

  @override
  Widget build(BuildContext context) {
    const size = 15.0;
    return Row(
      children: [
        for (int i = 1; i <= 5; i++)
          Container(
            margin: const EdgeInsets.all(1.0),
            height: size,
            width: size,
            decoration: BoxDecoration(
                color: i <= ratingScore ? tStar : tWhite,
                shape: BoxShape.circle,
                border: Border.all(
                  color: tStar,
                  width: 2.0,
                )),
          ),
        const SizedBox(
          width: 10.0,
        ),
        AppText.small(
          text: '$ratingScore',
          fontWeight: FontWeight.w700,
        ),
      ],
    );
  }
}
