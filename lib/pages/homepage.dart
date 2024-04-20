import 'package:booking_hotel/providers/all_hotels_provider.dart';
import 'package:booking_hotel/widgets/custom_button.dart';
import 'package:booking_hotel/widgets/custom_text_field.dart';
import 'package:booking_hotel/widgets/hotel_card.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/constant/image.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:booking_hotel/widgets/custom_icon_button.dart';
import 'package:booking_hotel/pages/Apptext.dart';
import 'package:intl/intl.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';

class HotelPage extends StatelessWidget {
  const HotelPage({super.key});

  @override
  Widget build(BuildContext context) {
    final size = MediaQuery.of(context).size;
    return Scaffold(
      // bottomNavigationBar: const CustomNavBar(index: 0),
      backgroundColor: tPrimaryColor,
      body: SafeArea(
        bottom: false,
        child: Stack(
          children: [
            Container(
              height: double.infinity,
              margin: EdgeInsets.only(top: size.height * 0.25),
              color: tCardBgColor,
            ),
            const Padding(
              padding: EdgeInsets.all(
                20.0,
              ),
              child: Column(
                children: [
                  _HeaderSection(),
                  _SearchCard(),
                  SizedBox(
                    height: 20.0,
                  ),
                  // _NearbyHotels(),
                ],
              ),
            ),
            const Padding(
              padding: EdgeInsets.only(top: 340.0, left: 20.0, right: 20.0),
              child: SingleChildScrollView(
                child: Column(
                  children: [
                    // _HeaderSection(),
                    // _SearchCard(),
                    SizedBox(
                      height: 20.0,
                    ),
                    _NearbyHotels(),
                  ],
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
        Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            const CircleAvatar(
              radius: 25.0,
              backgroundImage: AssetImage(tplace1),
            ),
            CustomIconButton(
              icon: const Icon(FontAwesomeIcons.bell),
              onPressed: () {},
            ),
          ],
        ),
        Padding(
            padding: const EdgeInsets.all(10.0),
            child: AppText.large(
              text: 'Welcome Back  👏',
              color: tSecondaryColor,
            ))
      ],
    );
  }
}

class _SearchCard extends StatelessWidget {
  const _SearchCard({super.key});

  @override
  Widget build(BuildContext context) {
    final locationTextController = TextEditingController();
    final dateFromTextController = TextEditingController();
    final dateToTextController = TextEditingController();

    locationTextController.text = 'Ngũ Hành Sơn, Đà Nẵng';
    dateFromTextController.text = dateFromTextController.text =
        DateFormat('dd MMM yyyy').format(DateTime.now());
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 20.0, vertical: 10.0),
      decoration: BoxDecoration(
          color: tCardBgColor,
          borderRadius: BorderRadius.circular(20),
          border: Border.all(
            color: tDarkColor,
          )),
      child: Column(
        children: [
          Row(
            children: [
              const Icon(
                FontAwesomeIcons.locationDot,
                color: tPrimaryColor,
              ),
              const SizedBox(
                width: 20.0,
              ),
              CustomTextField(
                label: 'Address',
                controller: locationTextController,
              ),
            ],
          ),
          const Divider(),
          Row(
            children: [
              const Icon(
                FontAwesomeIcons.solidCalendar,
                color: tPrimaryColor,
              ),
              const SizedBox(
                width: 20.0,
              ),
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
          const SizedBox(
            height: 10,
          ),
          const CustomButton(
            text: 'Search',
          ),
        ],
      ),
    );
  }
}

class _NearbyHotels extends ConsumerWidget {
  const _NearbyHotels({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final hotels = ref.watch(allHotelsProvider);
    return Column(
      children: [
        const Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            Text(
              'Khách sạn gần đây',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontSize: 15,
              ),
            ),
            Text(
              'Xem tất cả',
              style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 14,
                  color: Colors.blue),
            ),
          ],
        ),
        hotels.when(
          data: (hotels) {
            return ListView.builder(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              itemCount: hotels.length,
              itemBuilder: (context, index) {
                return HotelCard(hotel: hotels[index]);
              },
            );
          },
          error: (error, stackTrace) => Text('Error: $error'),
          loading: () => const Center(child: CircularProgressIndicator()),
        ),
      ],
    );
  }
}
