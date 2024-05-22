import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/controllers/NearbyPlacesController.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/app_text.dart';
import 'package:booking_hotel/widgets/custom_text_field.dart';
import 'package:booking_hotel/widgets/nearby_places.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';
import 'package:intl/intl.dart';

class HotelPage extends StatelessWidget {
  const HotelPage({super.key});

  @override
  Widget build(BuildContext context) {
    final size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: MyAppBar(
        title: 'Hotel',
      ),
      backgroundColor: Colors.lightBlue,
      body: SafeArea(
        bottom: false,
        child: Stack(
          children: [
            Container(
              height: double.infinity,
              margin: EdgeInsets.only(top: size.height * 0.25),
              color: tCardBgColor,
            ),
            Padding(
              padding: EdgeInsets.all(20.0),
              child: Column(
                children: [
                  _HeaderSection(),
                  _SearchCard(),
                  SizedBox(height: 20.0),
                 
                ],
              ),
            ),
            const Padding(
              padding: EdgeInsets.only(top: 240.0, left: 20.0, right: 20.0),
              child: SingleChildScrollView(
                child: Column(
                  children: [NearbyPlaces()],
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}

class _HeaderSection extends StatelessWidget {
  const _HeaderSection({super.key});

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Padding(
            padding: const EdgeInsets.all(10.0),
            child: AppText.large(
              'Welcome Back  👏',
              color: tSecondaryColor,
            ))
      ],
    );
  }
}

class _SearchCard extends StatefulWidget {
  const _SearchCard({Key? key}) : super(key: key);

  @override
  _SearchCardState createState() => _SearchCardState();
}

class _SearchCardState extends State<_SearchCard> {
  late TextEditingController locationTextController;
  late TextEditingController dateFromTextController;
  late TextEditingController dateToTextController;
  final NearbyPlacesController _nearbyPlacesController = Get.put(NearbyPlacesController());
  // final AccountController account =
  //     Get.put(AccountController());
  @override
  void initState() {
    super.initState();
    locationTextController =
        TextEditingController(text: 'Ngũ Hành Sơn, Đà Nẵng');
    dateFromTextController = TextEditingController(
        text: DateFormat('dd MMM yyyy').format(DateTime.now()));
    dateToTextController = TextEditingController(
        text: DateFormat('dd MMM yyyy').format(DateTime.now()));
  }

  @override
  void dispose() {
    locationTextController.dispose();
    dateFromTextController.dispose();
    dateToTextController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 20.0, vertical: 10.0),
      decoration: BoxDecoration(
        color: tCardBgColor,
        borderRadius: BorderRadius.circular(20),
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.5), // Màu của box shadow và độ mờ
            spreadRadius: 5, // Bán kính mờ
            blurRadius: 7, // Độ nhòe của đường viền
            offset: Offset(0, 3), // Độ lệch của box shadow
          ),
        ],
      ),
      child: Column(
        children: [
          Row(
            children: [
              Flexible(
                child: TextField(
                  autofocus: false,
               onChanged: (val) {
                    if (val.isEmpty) {
                      _nearbyPlacesController.fetchHotels();
                    } else {
                      _nearbyPlacesController.searchHotels(val);
                    }
                  },
                  decoration: InputDecoration(
                      hintText: 'Search...',
                      contentPadding: const EdgeInsets.symmetric(
                          horizontal: 14, vertical: 16),
                      fillColor: Colors.white,
                      filled: true,
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(24),
                          borderSide: BorderSide.none),
                      prefixIcon: const Icon(FontAwesomeIcons.search)),
                ),
              ),
            ],
          ),
          Row(
            children: [
              const Icon(
                FontAwesomeIcons.solidCalendar,
                color: tPrimaryColor,
              ),
              const SizedBox(width: 20.0),
              CustomTextField(
                label: 'From',
                controller: dateFromTextController,
              ),
              CustomTextField(
                label: 'To',
                controller: dateToTextController,
              ),
            ],
          ),
        ],
      ),
    );
  }
}
