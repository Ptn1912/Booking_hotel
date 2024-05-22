import 'package:booking_hotel/controllers/NearbyPlacesController.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:booking_hotel/pages/room_of_hotel.dart';
import 'package:ionicons/ionicons.dart';

class NearbyPlaces extends StatefulWidget {
  const NearbyPlaces({Key? key}) : super(key: key);

  @override
  State<NearbyPlaces> createState() => _NearbyPlacesState();
}

class _NearbyPlacesState extends State<NearbyPlaces> {
  final NearbyPlacesController _nearbyPlacesController = Get.find<NearbyPlacesController>();

  @override
  Widget build(BuildContext context) {
    return Obx(() {
      if (_nearbyPlacesController.isLoading.value) {
        return Center(child: CircularProgressIndicator());
      } else if (_nearbyPlacesController.hotels.isEmpty) {
        return Center(child: Text("No hotels found."));
      } else {
        return SingleChildScrollView(
          child: Column(
            children: List.generate(_nearbyPlacesController.hotels.length, (index) {
              return Padding(
                padding: const EdgeInsets.only(bottom: 10),
                child: SizedBox(
                  height: 135,
                  width: double.maxFinite,
                  child: Card(
                    elevation: 0.4,
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: InkWell(
                      borderRadius: BorderRadius.circular(12),
                      onTap: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                            builder: (context) => TouristDetailsPage(
                              HotelID: _nearbyPlacesController.hotels[index].id,
                              address: _nearbyPlacesController.hotels[index].address,
                              HotelName: _nearbyPlacesController.hotels[index].HotelName,
                            ),
                          ),
                        );
                      },
                      child: Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            ClipRRect(
                              borderRadius: BorderRadius.circular(12),
                              child: Image.asset(
                                "assets/images/hotel/${_nearbyPlacesController.hotels[index].ImageHotel}",
                                height: double.maxFinite,
                                width: 130,
                                fit: BoxFit.cover,
                              ),
                            ),
                            const SizedBox(width: 10),
                            Expanded(
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    _nearbyPlacesController.hotels[index].HotelName,
                                    style: TextStyle(
                                      fontSize: 16,
                                      fontWeight: FontWeight.bold,
                                    ),
                                  ),
                                  const SizedBox(height: 10),
                                  SizedBox(
                                    height: 20,
                                    child: Distance(address: _nearbyPlacesController.hotels[index].address),
                                  ),
                                  const Spacer(),
                                  Row(
                                    children: [
                                      Icon(
                                        Icons.star,
                                        color: Colors.yellow.shade700,
                                        size: 14,
                                      ),
                                      const Text(
                                        "4.5",
                                        style: TextStyle(
                                          fontSize: 12,
                                        ),
                                      ),
                                      const Spacer(),
                                      RichText(
                                        text: TextSpan(
                                          style: TextStyle(
                                            fontSize: 20,
                                            color: Theme.of(context).primaryColor,
                                          ),
                                          text: "\$22",
                                          children: const [
                                            TextSpan(
                                              style: TextStyle(
                                                fontSize: 12,
                                                color: Colors.black54,
                                              ),
                                              text: "/ Person",
                                            )
                                          ],
                                        ),
                                      ),
                                    ],
                                  )
                                ],
                              ),
                            )
                          ],
                        ),
                      ),
                    ),
                  ),
                ),
              );
            }),
          ),
        );
      }
    });
  }
}


class Distance extends StatelessWidget {
  Distance({Key? key, required this.address}) : super(key: key);
  String address;
  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        const Icon(
          Ionicons.location_outline,
          color: Colors.black54,
          size: 14,
        ),
        const SizedBox(width: 5),
        Expanded(
          child: Text(
            address,
            style: TextStyle(
              color: Colors.black54,
            ),
            overflow: TextOverflow.ellipsis, // Add this line to handle overflow
          ),
        ),
      ],
    );
  }
}
