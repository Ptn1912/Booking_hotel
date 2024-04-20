import 'package:booking_hotel/constant/color.dart';
import 'package:booking_hotel/pages/Apptext.dart';
import 'package:booking_hotel/widgets/option_dropdown.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import '../models/hotel_model.dart';
import '../widgets/custom_icon_container.dart';
import '../widgets/custom_rating.dart';

class HotelDetailScreen extends StatelessWidget {
  const HotelDetailScreen({
    Key? key,
    required this.hotel,
  }) : super(key: key);

  final HotelModel hotel;

  @override
  Widget build(BuildContext context) {
    final size = MediaQuery.of(context).size;
    return Scaffold(
      body: Stack(
        children: [
          Align(
            alignment: Alignment.topCenter,
            child: Image.asset(
              hotel.thumbnailPath,
              fit: BoxFit.cover,
            ),
          ),
          SingleChildScrollView(
            child: Container(
              margin: EdgeInsets.only(top: size.height * 0.4),
              decoration: const BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.only(
                  topLeft: Radius.circular(20),
                  topRight: Radius.circular(20),
                ),
              ),
              child: Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.all(20),
                    child: Column(
                      children: [
                        _HotelTitleSection(hotel: hotel),
                        const SizedBox(height: 16),
                        const _FacilitiesSection(),
                      ],
                    ),
                  ),
                  _GallerySection(
                    imagePaths: hotel.imagePaths,
                  ),
                  const OptionDrop(),
                  Padding(
                    padding: const EdgeInsets.all(20),
                    child: _LocationSection(
                      address: hotel.address,
                      description: hotel.description,
                    ),
                  ),
                ],
              ),
            ),
          ),
          Align(
            alignment: Alignment.topCenter,
            child: SafeArea(
              child: Container(
                margin: const EdgeInsets.all(16),
                height: 50,
                color: Colors.transparent,
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    CustomIconButton(
                      icon: const Icon(FontAwesomeIcons.arrowLeft),
                      onPressed: () => Navigator.of(context).pop(),
                    ),
                    const CustomIconButton(
                      icon: Icon(FontAwesomeIcons.heart),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
      bottomNavigationBar: _ReserveBar(price: hotel.price),
    );
  }
}

class _HotelTitleSection extends StatelessWidget {
  const _HotelTitleSection({
    Key? key,
    required this.hotel,
  }) : super(key: key);

  final HotelModel hotel;

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        AppText.large(
          text: hotel.title,
          textAlign: TextAlign.left,
        ),
        const SizedBox(height: 5),
        Row(
          children: [
            const Icon(FontAwesomeIcons.location),
            const SizedBox(width: 10),
            AppText.small(text: hotel.location),
          ],
        ),
        const SizedBox(height: 10),
        CustomRating(
          ratingScore: hotel.ratingScore,
          showReviews: true,
          totalReview: hotel.totalReview,
        ),
        const SizedBox(height: 10),
      ],
    );
  }
}

class _FacilitiesSection extends StatelessWidget {
  const _FacilitiesSection({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        AppText.medium(text: 'Tiện nghi phổ biến', fontWeight: FontWeight.bold),
        const SizedBox(height: 10),
        Table(
          columnWidths: const {0: FlexColumnWidth(), 1: FlexColumnWidth()},
          children: [
            TableRow(
              children: [
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.bell,
                    size: 18,
                  ),
                  'Khách sạn 4 sao',
                ),
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.server,
                    size: 18,
                  ),
                  'Dịch vụ phòng',
                ),
              ],
            ),
            TableRow(
              children: [
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.wifi,
                    size: 18,
                  ),
                  'Wi-Fi miễn phí',
                ),
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.store,
                    size: 18,
                  ),
                  'Nhà hàng',
                ),
              ],
            ),
            TableRow(
              children: [
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.car,
                    size: 18,
                  ),
                  'Xe đưa đón',
                ),
                _buildIconWithLabel(
                  const Icon(
                    FontAwesomeIcons.swimmingPool,
                    size: 18,
                  ),
                  'Hồ bơi',
                ),
              ],
            )
          ],
        ),
      ],
    );
  }

  Padding _buildIconWithLabel(
    Icon icon,
    String label,
  ) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 5.0),
      child: Row(
        mainAxisSize: MainAxisSize.min,
        children: [
          icon,
          const SizedBox(width: 15),
          AppText.small(text: label, fontWeight: FontWeight.normal),
        ],
      ),
    );
  }
}

class _GallerySection extends StatelessWidget {
  const _GallerySection({
    Key? key,
    required this.imagePaths,
  }) : super(key: key);

  final List<String> imagePaths;

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        Padding(
          padding: const EdgeInsets.symmetric(horizontal: 20),
          child: AppText.medium(text: 'Hình ảnh', fontWeight: FontWeight.bold),
        ),
        const SizedBox(height: 5),
        SizedBox(
          height: 150,
          child: ListView.builder(
            shrinkWrap: true,
            scrollDirection: Axis.horizontal,
            padding: const EdgeInsets.only(left: 10),
            itemCount: imagePaths.length,
            itemBuilder: (context, index) {
              final imagePath = imagePaths[index];
              return AspectRatio(
                aspectRatio: 1,
                child: Container(
                  margin: const EdgeInsets.all(5),
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(20),
                    image: DecorationImage(
                      image: AssetImage(imagePath),
                      fit: BoxFit.cover,
                    ),
                  ),
                ),
              );
            },
          ),
        ),
      ],
    );
  }
}

class _LocationSection extends StatelessWidget {
  const _LocationSection({
    Key? key,
    required this.address,
    required this.description,
  }) : super(key: key);

  final String address;

  final String description;

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        AppText.medium(
          text: 'Địa chỉ',
          fontWeight: FontWeight.bold,
          color: Color.fromARGB(255, 7, 79, 139),
        ),
        const SizedBox(height: 10),
        AppText.medium(text: address, fontWeight: FontWeight.normal),
        const SizedBox(height: 10),
        AppText.medium(
          text: 'Mô tả',
          fontWeight: FontWeight.normal,
          color: Color.fromARGB(255, 5, 67, 119),
        ),
        const SizedBox(height: 10),
        AppText.medium(text: description, fontWeight: FontWeight.normal),
        const SizedBox(height: 10),
        AppText.medium(text: 'Show more')
      ],
    );
  }
}

class _ReserveBar extends StatelessWidget {
  const _ReserveBar({
    Key? key,
    required this.price,
  }) : super(key: key);

  final double price;

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 90,
      padding: const EdgeInsets.all(20.0).copyWith(top: 10.0),
      color: Colors.white,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              AppText.medium(text: 'Tổng giá', fontWeight: FontWeight.normal),
              RichText(
                text: TextSpan(
                  children: [
                    AppTextSpan.large(text: '$price đ', color: tPrice),
                    AppTextSpan.medium(text: ' /đêm'),
                  ],
                ),
              ),
            ],
          ),
          ElevatedButton(
            style: ButtonStyle(
              backgroundColor: MaterialStateProperty.all<Color>(tPrimaryColor),
            ),
            onPressed: () {},
            child: const Text(
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
    );
  }
}
