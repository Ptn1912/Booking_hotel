import 'package:booking_hotel/constants/constants.dart';
import 'package:booking_hotel/models/RoomModel.dart';
import 'package:booking_hotel/pages/room_detail.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class TouristDetailsPage extends StatefulWidget {
  final int HotelID;
  final String address;
  final String HotelName;

  TouristDetailsPage({
    Key? key,
    required this.HotelID,
    required this.address,
    required this.HotelName,
  }) : super(key: key);

  @override
  State<TouristDetailsPage> createState() => _TouristDetailsPageState();
}

class _TouristDetailsPageState extends State<TouristDetailsPage> {
  List<RoomModel> rooms = [];
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    fetchRooms(); // Call fetchRooms() in initState
  }

  Future<void> fetchRooms() async {
    try {
      var response = await http.get(
        Uri.parse('${url}detail/${widget.HotelID}'),
        headers: {
          'Accept': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        Map<String, dynamic> jsonResponse = json.decode(response.body);
        List<dynamic>? roomsData =
            jsonResponse['room']; // Use 'room' key to access rooms data
        if (roomsData != null) {
          setState(() {
            rooms = roomsData.map((room) => RoomModel.fromJson(room)).toList();
          });
        } else {
          throw Exception('Rooms data is null or missing');
        }
      } else {
        throw Exception(
            'Failed to load hotels. Status Code: ${response.statusCode}');
      }
    } catch (e) {
      print('Error fetching rooms: $e');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: MyAppBar(
          title: widget.HotelName,
        ),
        body: rooms.isEmpty
            ? Center(child: CircularProgressIndicator())
            : SingleChildScrollView(
                child: Column(
                  children: List.generate(rooms.length, (index) {
                    return Padding(
                      padding: const EdgeInsets.only(bottom: 10),
                      child: SizedBox(
                        height: 350,
                        width: double.maxFinite,
                        child: Card(
                          elevation: 0.4,
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(12),
                          ),
                          child: InkWell(
                            borderRadius: BorderRadius.circular(12),
                            child: Padding(
                              padding: const EdgeInsets.all(8.0),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.center,
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  AspectRatio(
                                    aspectRatio:
                                        2, // Adjust the aspect ratio as needed
                                    child: ClipRRect(
                                      borderRadius: BorderRadius.circular(12),
                                      child: Image.asset(
                                        "assets/images/room/${rooms[index].room_Image}",
                                        fit: BoxFit.cover,
                                      ),
                                    ),
                                  ),
                                  Row(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.center,
                                    children: [
                                      Expanded(
                                          child: Container(
                                        child: Padding(
                                          padding: EdgeInsets.only(
                                              top: 8,
                                              bottom: 8,
                                              right: 8,
                                              left: 16),
                                          child: Column(
                                            mainAxisAlignment:
                                                MainAxisAlignment.center,
                                            crossAxisAlignment:
                                                CrossAxisAlignment.start,
                                            children: [
                                              Row(
                                                mainAxisAlignment:
                                                    MainAxisAlignment
                                                        .spaceBetween,
                                                children: [
                                                  Text(
                                                    rooms[index].room_type,
                                                    style: TextStyle(
                                                        fontSize: 22,
                                                        fontWeight:
                                                            FontWeight.bold),
                                                    textAlign: TextAlign.left,
                                                  ),
                                                  RichText(
                                                    text: TextSpan(
                                                        style: TextStyle(
                                                          fontSize: 20,
                                                          color:
                                                              Theme.of(context)
                                                                  .primaryColor,
                                                        ),
                                                        text: rooms[index]
                                                            .room_price
                                                            .toString(),
                                                        children: const [
                                                          TextSpan(
                                                              style: TextStyle(
                                                                fontSize: 12,
                                                                color: Colors
                                                                    .black54,
                                                              ),
                                                              text: "/ Night")
                                                        ]),
                                                  )
                                                ],
                                              ),
                                              Column(
                                                children: [
                                                  Row(
                                                    mainAxisAlignment:
                                                        MainAxisAlignment
                                                            .spaceBetween,
                                                    children: [
                                                      Container(
                                                        child: Row(
                                                          children: [
                                                            Icon(
                                                              FontAwesomeIcons
                                                                  .shower,
                                                              size: 12,
                                                            ),
                                                            SizedBox(
                                                              width: 4,
                                                            ),
                                                            Text(
                                                              'Vòi sen',
                                                            ),
                                                          ],
                                                        ),
                                                      ),
                                                      TextButton(
                                                        onPressed: () {
                                                          Navigator.push(
                                                            context,
                                                            MaterialPageRoute(
                                                                builder:
                                                                    (context) =>
                                                                        RoomDetailScreen(
                                                                          room_id:
                                                                              rooms[index].room_id,
                                                                          HotelName:
                                                                              widget.HotelName,
                                                                          address:
                                                                              widget.address,
                                                                          room:
                                                                              rooms[index],
                                                                          type:
                                                                              rooms[index].room_type,
                                                                          image:
                                                                              rooms[index].room_Image,
                                                                          price:
                                                                              rooms[index].room_price, // Assign BigInt directly
                                                                          desc:
                                                                              rooms[index].room_description,
                                                                        )),
                                                          );
                                                        },
                                                        style: ButtonStyle(
                                                          backgroundColor:
                                                              MaterialStateProperty
                                                                  .all<Color>(
                                                                      Colors
                                                                          .blue),
                                                          maximumSize:
                                                              MaterialStateProperty
                                                                  .all(
                                                            Size.fromHeight(60),
                                                          ),
                                                          // Màu nền
                                                        ),
                                                        child: const Text(
                                                          "Chi tiết",
                                                          style: TextStyle(
                                                              color:
                                                                  Colors.white,
                                                              fontSize:
                                                                  16 // Màu văn bản
                                                              ),
                                                        ),
                                                      ),
                                                    ],
                                                  ),
                                                  Row(
                                                    children: [
                                                      Icon(
                                                          FontAwesomeIcons
                                                              .banSmoking,
                                                          size: 12),
                                                      SizedBox(
                                                        width: 4,
                                                      ),
                                                      Text(
                                                        'No Smoking',
                                                      ),
                                                    ],
                                                  ),
                                                  Row(
                                                    children: [
                                                      Row(
                                                        children: const [
                                                          Icon(
                                                            FontAwesomeIcons
                                                                .star,
                                                            size: 12,
                                                          ),
                                                          Icon(
                                                            FontAwesomeIcons
                                                                .starHalfStroke,
                                                            size: 12,
                                                            color:
                                                                Colors.yellow,
                                                          ),
                                                          Icon(
                                                            FontAwesomeIcons
                                                                .star,
                                                            size: 12,
                                                          ),
                                                          // Include more stars as needed
                                                        ],
                                                      ),
                                                      SizedBox(
                                                        width: 4,
                                                      ),
                                                      Text(
                                                        '74',
                                                      ),
                                                    ],
                                                  )
                                                ],
                                              ),
                                            ],
                                          ),
                                        ),
                                      ))
                                    ],
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
              ));
  }
}
