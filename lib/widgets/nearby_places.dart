import 'package:booking_hotel/constants/constants.dart';
import 'package:booking_hotel/models/HotelModel.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:booking_hotel/pages/room_of_hotel.dart';
import 'package:ionicons/ionicons.dart';

class NearbyPlaces extends StatefulWidget {
  const NearbyPlaces({Key? key}) : super(key: key);

  @override
  State<NearbyPlaces> createState() => _NearbyPlacesState();
}

class _NearbyPlacesState extends State<NearbyPlaces> {
  List<HotelModel> hotels = [];
  bool _isLoading = true;
  
  @override
  void initState() {
    super.initState();
    fetchHotels();
  }

  Future<void> fetchHotels() async {
    try {
      var response = await http.get(
        Uri.parse('${url}book'),
        headers: {
          'Accept': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        List<dynamic> jsonResponse = json.decode(response.body);
        setState(() {
          hotels =
              jsonResponse.map((hotel) => HotelModel.fromJson(hotel)).toList();
        });
      } else {
        throw Exception('Failed to load hotels');
      }
    } catch (e) {
      print('Error fetching hotels: $e');
    }
  }
   
  @override
  Widget build(BuildContext context) {
    return hotels.isEmpty
        ? Center(child: CircularProgressIndicator())
        : SingleChildScrollView(
            child: Column(
              children: List.generate(hotels.length, (index) {
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
                                  HotelID: hotels[index].id,
                                  address: hotels[index].address,
                                  HotelName: hotels[index].HotelName),
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
                                  "assets/images/hotel/${hotels[index].ImageHotel}",
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
                                      hotels[index]
                                          .HotelName, // Remove unnecessary string interpolation
                                      style: TextStyle(
                                        fontSize: 16,
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),

                                    const SizedBox(height: 10),
                                    // DISTANCE WIDGET
                                    SizedBox(
                                      height: 20, // Adjust height as needed
                                      child: Distance(
                                          address: hotels[index].address),
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
                                                color: Theme.of(context)
                                                    .primaryColor,
                                              ),
                                              text: "\$22",
                                              children: const [
                                                TextSpan(
                                                    style: TextStyle(
                                                      fontSize: 12,
                                                      color: Colors.black54,
                                                    ),
                                                    text: "/ Person")
                                              ]),
                                        )
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
