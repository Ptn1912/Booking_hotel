import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/models/OrderModel.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/constants/constants.dart';
class TOrderListItem extends StatefulWidget {
  
 
  const TOrderListItem({Key? key,
  
  }) : super(key: key);

  @override
  State<TOrderListItem> createState() => _TOrderListItemState();
}

class _TOrderListItemState extends State<TOrderListItem> {
   String roomType = '';
  late int id;
  String roomPrice = '';
  late int quantity;
  String date = '';
  String reservateName = '';
  String phone = '';
  String username= '';
  final box = GetStorage();
 String token = '';
 List<OrderModel> orders = [];
    
  @override
  void initState() {
    super.initState();
    getOrderDetail();
  }

  Future<void> getOrderDetail() async {
    final userData = box.read('user');

    setState(() {
      username = userData != null ? userData['username'] ?? 'Unknown' : 'Unknown';
    });
    try {
      var response = await http.get(
        Uri.parse('${url}account'),
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
      );
      if (response.statusCode == 200) {
         Map<String, dynamic> jsonResponse = json.decode(response.body);
        List<dynamic>? roomsData =
            jsonResponse['bookingDetails']; // Use 'room' key to access rooms data
        if (roomsData != null) {
          setState(() {
            orders = roomsData.map((room) => OrderModel.fromJson(room)).toList();
          });
        } else {
          throw Exception('Rooms data is null or missing');
        }
      } else {
        print('Failed to load data: ${response.statusCode}');
      }
    } catch (e) {
      print('Error occurred: $e');
    }
  }
  @override
  Widget build(BuildContext context) {
  return orders.isEmpty
            ? Center(child: CircularProgressIndicator())
            : SingleChildScrollView(
        child: Container(
          decoration: BoxDecoration(
            color: Colors.grey[100],
            borderRadius: BorderRadius.circular(20),
            border: null,
          ),
          padding: EdgeInsets.all(16),
          child: Column(
            mainAxisSize: MainAxisSize.min,
             children: List.generate(orders.length, (index) {
         return Padding(
                      padding: const EdgeInsets.only(bottom: 10),
             child: Row(
                children: [
                  Icon(FontAwesomeIcons.truckFast),
                  SizedBox(width: 10),
                  Column(
                    mainAxisSize: MainAxisSize.min,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        'Price $username',
                        style: Theme.of(context).textTheme.bodyText1!.apply(color: kTextColor, fontWeightDelta: 1),
                      ),
                      Text(
                        orders[index].room_price.toString(),
                        style: Theme.of(context).textTheme.headline6,
                      ),
                    ],
                  ),
                ],
              ),
             
              // Row(
              //   children: [
              //     Expanded(
              //       child: Row(
              //         children: [
              //           Icon(FontAwesomeIcons.tag),
              //           SizedBox(width: 10),
              //           Expanded(
              //             child: Column(
              //               mainAxisSize: MainAxisSize.min,
              //               crossAxisAlignment: CrossAxisAlignment.start,
              //               children: [
              //                 Text('Order',
              //                     style: Theme.of(context).textTheme.labelMedium),
              //                 Text(
              //                   orders[index].room_type,
              //                   style: Theme.of(context).textTheme.titleMedium,
              //                 ),
              //               ],
              //             ),
              //           ),
              //         ],
              //       ),
              //     ),
              //     Expanded(
              //       child: Row(
              //         children: [
              //           Icon(FontAwesomeIcons.calendar),
              //           SizedBox(width: 10),
              //           Expanded(
              //             child: Column(
              //               mainAxisSize: MainAxisSize.min,
              //               crossAxisAlignment: CrossAxisAlignment.start,
              //               children: [
              //                 Text('Shipping Date',
              //                     style: Theme.of(context).textTheme.labelMedium),
              //                 Text(
              //                   orders[index].date,
              //                   style: Theme.of(context).textTheme.titleMedium,
              //                 ),
              //               ],
              //             ),
              //           ),
              //         ],
              //       ),
              //     ),
              //   ],
              // );
         );
   } ),
        )
        ),
      );
    }
  
  }



