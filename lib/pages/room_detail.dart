import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/models/RoomModel.dart';
import 'package:booking_hotel/models/nearby_places_model.dart';
import 'package:booking_hotel/pages/cart_page.dart';
import 'package:booking_hotel/widgets/app_text.dart';
import 'package:booking_hotel/widgets/custom_rating.dart';
import 'package:booking_hotel/widgets/icon_btn.dart';
import 'package:booking_hotel/widgets/option_dropdown.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:persistent_shopping_cart/model/cart_model.dart';
import 'package:persistent_shopping_cart/persistent_shopping_cart.dart';

class RoomDetailScreen extends StatefulWidget {
  const RoomDetailScreen({
    Key? key,
    required this.room_id,
    required this.room,
    required this.type,
    required this.image,
    required this.price,
    required this.desc,
    required this.HotelName,
    required this.address,
  }) : super(key: key);

  final RoomModel room;
  final int room_id;
  final String type;
  final String image;
  final BigInt price;
  final String desc;
  final String HotelName;
  final String address;

  @override
  State<RoomDetailScreen> createState() => _RoomDetailScreenState();
}

class _RoomDetailScreenState extends State<RoomDetailScreen> {
  PersistentShoppingCart cart = PersistentShoppingCart();
  @override
  Widget build(BuildContext context) {
    final size = MediaQuery.of(context).size;
    final List<PlacesModel> places = [
      nearbyPlaces[0],
      nearbyPlaces[1],
      nearbyPlaces[2],
      nearbyPlaces[3],
      nearbyPlaces[4],
      // Add more instances as needed
    ];
    return Scaffold(
      body: Stack(
        children: [
          Align(
            alignment: Alignment.topCenter,
            child: Image.asset(
              "assets/images/room/${widget.image}",
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
                        _HotelTitleSection(
                          HotelName: widget.HotelName,
                          address: widget.address,
                        ),
                        const SizedBox(height: 16),
                        const _FacilitiesSection(),
                      ],
                    ),
                  ),
                  _GallerySection(
                    image: nearbyPlaces.map((place) => place.image).toList(),
                  ),
                  const OptionDrop(),
                  Padding(
                    padding: const EdgeInsets.all(20),
                    child: _LocationSection(
                      address: widget.address,
                      description: widget.desc,
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
                    IconBtn(
                      icon: const Icon(FontAwesomeIcons.arrowLeft),
                      onPressed: () => Navigator.of(context).pop(),
                    ),
                    PersistentShoppingCart().showCartItemCountWidget(
                        cartItemCountWidgetBuilder: (itemCount) => IconButton(
                            onPressed: () {
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                      builder: (context) => CartScreen()));
                            },
                            icon: Badge(
                              label: Text(itemCount.toString()),
                              child: Icon(FontAwesomeIcons.cartShopping),
                            )))
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
      bottomNavigationBar: _ReserveBar(
        price: widget.price,
        room_id: widget.room_id,
        type: widget.type,
        image: widget.image,
        desc: widget.desc,
      ),
    );
  }
}

class _HotelTitleSection extends StatelessWidget {
  const _HotelTitleSection({
    Key? key,
    required this.HotelName,
    required this.address,
  }) : super(key: key);

  final String HotelName;
  final String address;
  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        AppText.large(
          HotelName,
          textAlign: TextAlign.left,
        ),
        const SizedBox(height: 5),
        Row(
          children: [
            const Icon(FontAwesomeIcons.location),
            const SizedBox(width: 5),
            Expanded(
              child: AppText.small(
                address,
                textOverflow: TextOverflow.ellipsis,
              ),
            ),
          ],
        ),
        const SizedBox(height: 10),
        CustomRating(
          ratingScore: 5,
          showReviews: true,
          totalReview: 67,
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
        AppText.medium('Tiện nghi phổ biến', fontWeight: FontWeight.bold),
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
          AppText.small(label, fontWeight: FontWeight.normal),
        ],
      ),
    );
  }
}

class _GallerySection extends StatelessWidget {
  const _GallerySection({
    Key? key,
    required this.image,
  }) : super(key: key);

  final List<String> image;

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        Padding(
          padding: const EdgeInsets.symmetric(horizontal: 20),
          child: AppText.medium('Hình ảnh', fontWeight: FontWeight.bold),
        ),
        const SizedBox(height: 5),
        SizedBox(
          height: 150,
          child: ListView.builder(
            shrinkWrap: true,
            scrollDirection: Axis.horizontal,
            padding: const EdgeInsets.only(left: 10),
            itemCount: image.length,
            itemBuilder: (context, index) {
              final imagePath = image[index];
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
          'Địa chỉ',
          fontWeight: FontWeight.bold,
          color: Color.fromARGB(255, 7, 79, 139),
        ),
        const SizedBox(height: 10),
        AppText.medium(address, fontWeight: FontWeight.normal),
        const SizedBox(height: 10),
        AppText.medium(
          'Mô tả',
          fontWeight: FontWeight.normal,
          color: Color.fromARGB(255, 5, 67, 119),
        ),
        const SizedBox(height: 10),
        AppText.medium(description, fontWeight: FontWeight.normal),
        const SizedBox(height: 10),
        AppText.medium('Show more')
      ],
    );
  }
}

class _ReserveBar extends StatelessWidget {
  const _ReserveBar(
      {Key? key,
      required this.price,
      required this.room_id,
      required this.type,
      required this.image,
      required this.desc})
      : super(key: key);

  final BigInt price;
  final int room_id;
  final String type;
  final String image;
  final String desc;
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
              AppText.medium('Tổng giá', fontWeight: FontWeight.normal),
              RichText(
                text: TextSpan(
                  children: [
                    AppTextSpan.large('$price đ', color: tPrice),
                    AppTextSpan.medium(' /đêm'),
                  ],
                ),
              ),
            ],
          ),
          PersistentShoppingCart().showAndUpdateCartItemWidget(
              inCartWidget: Container(
                height: 50,
                width: 110,
                decoration: BoxDecoration(
                  color: red,
                  borderRadius: BorderRadius.circular(25),
                ),
                child: Row(
                  mainAxisAlignment:
                      MainAxisAlignment.center, // Căn giữa theo chiều ngang
                  crossAxisAlignment:
                      CrossAxisAlignment.center, // Căn giữa theo chiều dọc
                  children: [
                    Text(
                      'Hủy',
                      style: TextStyle(
                        fontSize: 15,
                        fontWeight: FontWeight.bold,
                        color: tWhite,
                      ),
                    ),
                  ],
                ),
              ),
              notInCartWidget: Container(
                height: 50,
                width: 110,
                decoration: BoxDecoration(
                  color: tPrimaryColor,
                  borderRadius: BorderRadius.circular(25),
                ),
                child: Row(
                  mainAxisAlignment:
                      MainAxisAlignment.center, // Căn giữa theo chiều ngang
                  crossAxisAlignment:
                      CrossAxisAlignment.center, // Căn giữa theo chiều dọc
                  children: [
                    Text(
                      'Đặt phòng',
                      style: TextStyle(
                        fontSize: 15,
                        fontWeight: FontWeight.bold,
                        color: tWhite,
                      ),
                    ),
                  ],
                ),
              ),
              product: PersistentShoppingCartItem(
                  productId: room_id.toString(),
                  productName: type,
                  unitPrice: double.parse(price.toString()),
                  quantity: 1,
                  productThumbnail: image,
                  productDescription: desc)),
          // ElevatedButton(

          //   style: ButtonStyle(
          //     backgroundColor: MaterialStateProperty.all<Color>(tPrimaryColor),
          //   ),
          //   onPressed: () => Get.to(() => CartScreen()),
          //   child: const Text(
          //     'Đặt phòng',
          //     style: TextStyle(
          //       fontSize: 15,
          //       fontWeight: FontWeight.bold,
          //       color: tWhite,
          //     ),
          //   ),
          // ),
        ],
      ),
    );
  }
}
