import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/models/recommended_places_model.dart';
import 'package:flutter/material.dart';

class RecommendedPlaces extends StatelessWidget {
  RecommendedPlaces({Key? key}) : super(key: key);

  final List<RecommendedPlaceModel> places = [
    recommendedPlaces[0],
    recommendedPlaces[1],
    recommendedPlaces[2],
    recommendedPlaces[3],
    recommendedPlaces[4],
    // Add more instances as needed
  ];

  Widget build(BuildContext context) {
    return SizedBox(
      height: 235,
      child: ListView.separated(
        physics: const BouncingScrollPhysics(),
        scrollDirection: Axis.horizontal,
        itemBuilder: (context, index) {
          return _buildPlaceCard(index);
        },
        separatorBuilder: (context, index) => const Padding(
          padding: EdgeInsets.only(right: 10),
        ),
        itemCount: recommendedPlaces.length,
      ),
    );
  }
}

Widget _buildPlaceCard(int index) {
  return SizedBox(
    width: 300,
    child: Card(
      elevation: 0.4,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.all(
          Radius.circular(12),
        ),
      ),
      child: InkWell(
        borderRadius: BorderRadius.circular(12),
        child: Padding(
          padding: const EdgeInsets.all(10),
          child: Column(
            children: [
              ClipRRect(
                borderRadius: BorderRadius.circular(12),
                child: Image.asset(
                  recommendedPlaces[index].image,
                  width: double.maxFinite,
                  fit: BoxFit.cover,
                  height: 150,
                ),
              ),
              const SizedBox(height: 5),
              Row(
                children: [
                  Text(
                    recommendedPlaces[index].rating.toString(),
                    style: TextStyle(
                      fontSize: 15,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  Spacer(),
                  Icon(
                    Icons.star,
                    color: Colors.yellow.shade700,
                    size: 14,
                  ),
                  Text(
                    "4.4",
                    style: TextStyle(
                      fontSize: 12,
                    ),
                  )
                ],
              ),
              const SizedBox(height: 5),
              Row(
                children: [
                  Icon(
                    Icons.location_on,
                    color: primaryColor,
                    size: 16,
                  ),
                  const SizedBox(width: 5),
                  Text(
                    recommendedPlaces[index].location,
                    style: TextStyle(
                      fontSize: 12,
                    ),
                  )
                ],
              )
            ],
          ),
        ),
      ),
    ),
  );
}
