import 'dart:async';
import 'package:flutter/material.dart';
import 'package:flutter/rendering.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import '../constant/color.dart';
import '../providers/all_hotels_provider.dart';
import '../widgets/custom_nav_bar.dart';
import '../widgets/list_hotel_card.dart';

List<String> imageTexts = [
  "Đỉnh PhanXipang",
  "Vịnh Hạ Long",
  "Mũi Né",
  "Suối Tiên",
  "Thác Bà",
];

class BookingPage extends StatefulWidget {
  const BookingPage({super.key});

  @override
  State<BookingPage> createState() => _BookingPageState();
}

class _BookingPageState extends State<BookingPage> {
  late PageController pageController;
  // final ScrollController _scrollController = ScrollController();
  int pageNo = 0;
  Timer? carasouelTmer;

  Timer getTimer() {
    return Timer.periodic(const Duration(seconds: 3), (timer) {
      if (pageNo == 5) {
        pageNo = 0;
      }
      // pageController.animateToPage(
      //   pageNo,
      //   duration: const Duration(seconds: 1),
      //   curve: Curves.easeInOutCirc,
      // );
      pageNo++;
    });
  }

  @override
  void initState() {
    pageController = PageController(initialPage: 0, viewportFraction: 0.85);
    carasouelTmer = getTimer();
    // _scrollController.addListener(() {
    //   if (_scrollController.position.userScrollDirection ==
    //       ScrollDirection.reverse) {
    //     showBtmAppBr = false;
    //     setState(() {});
    //   } else {
    //     showBtmAppBr = true;
    //     setState(() {});
    //   }
    // });
    super.initState();
  }

  @override
  // void dispose() {
  //   pageController.dispose();
  //   super.dispose();
  // }

  String getImageUrlForIndex(int index) {
    switch (index) {
      case 0:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161007355009.jpg';
      case 1:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161011139046.jpg';
      case 2:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161018165813.jpg';
      case 3:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161025555765.jpg';
      case 4:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161035285778.jpg';
      default:
        return 'https://cdn.tgdd.vn/Files/2022/01/18/1411528/10-dia-diem-du-lich-mien-bac-phai-den-1-lan-trong-doi-202202161044157265.jpg';
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: const CustomNavBar(index: 1),
      body: SafeArea(
        child: SingleChildScrollView(
          // controller: _scrollController,
          child: Column(
            children: [
              Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.all(24.0),
                    child: Row(
                      children: [
                        const CircleAvatar(
                          backgroundImage: NetworkImage(
                            'https://i.pinimg.com/564x/83/3a/db/833adbaf977c2d7290c4a4833ae24fb8.jpg',
                          ),
                          radius: 24.0,
                        ),
                        const SizedBox(width: 16.0),
                        Expanded(
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                "Kim Oanh",
                                style: Theme.of(context)
                                    .textTheme
                                    .subtitle1!
                                    .merge(
                                      const TextStyle(
                                        fontWeight: FontWeight.w700,
                                        fontSize: 18.0,
                                      ),
                                    ),
                              ),
                            ],
                          ),
                        ),
                        IconButton(
                          icon: const Icon(
                            FontAwesomeIcons.cartShopping,
                            color: tPrimaryColor,
                          ),
                          onPressed: () {},
                        ),
                        IconButton(
                          icon: const Icon(
                            FontAwesomeIcons.search,
                            color: tPrimaryColor,
                          ),
                          onPressed: () {},
                        ),
                      ],
                    ),
                  ),
                ],
              ),
              Padding(
                padding: const EdgeInsets.all(6.0),
                child: Column(
                  children: <Widget>[
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/canho.png',
                                  width: 45, height: 45),
                              const Text('Căn Hộ'),
                            ],
                          ),
                        ),
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/resort.png',
                                  width: 45, height: 45),
                              const Text('Resort'),
                            ],
                          ),
                        ),
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/giamgia.jpg',
                                  width: 45, height: 45),
                              const Text('Ưu Đãi'),
                            ],
                          ),
                        ),
                      ],
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/theogio.png',
                                  width: 45, height: 45),
                              const Text('Theo Giờ'),
                            ],
                          ),
                        ),
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/theongay.jpg',
                                  width: 45, height: 45),
                              const Text('Theo Ngày'),
                            ],
                          ),
                        ),
                        GestureDetector(
                          onTap: () {},
                          child: Column(
                            children: <Widget>[
                              Image.asset('assets/icons/theodem.jpg',
                                  width: 45, height: 45),
                              const Text('Theo Đêm'),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 10),
              Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(left: 10.0),
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Địa điểm thịnh hành ",
                          style: TextStyle(
                            color: tPrimaryColor,
                            fontWeight: FontWeight.bold,
                            fontSize: 20,
                          ),
                        ),
                        TextButton(
                          onPressed: () {},
                          child: const Text(
                            "Xem tất cả >>",
                            style: TextStyle(color: tSecondaryColor),
                          ),
                        ),
                      ],
                    ),
                  ),
                  SizedBox(
                    height: 200,
                    child: PageView.builder(
                      controller: pageController,
                      onPageChanged: (index) {
                        pageNo = index;
                        setState(() {});
                      },
                      itemBuilder: (_, index) {
                        final imageUrl = getImageUrlForIndex(index);
                        final imageText = imageTexts[index];
                        return AnimatedBuilder(
                          animation: pageController,
                          builder: (ctx, child) {
                            return GestureDetector(
                              onTap: () {
                                ScaffoldMessenger.of(context).showSnackBar(
                                  SnackBar(
                                    content: Text(
                                        "Địa điểm đang thịnh hành ${index + 1}"),
                                  ),
                                );
                              },
                              onPanDown: (d) {
                                carasouelTmer?.cancel();
                                carasouelTmer = null;
                              },
                              onPanCancel: () {
                                carasouelTmer = getTimer();
                              },
                              child: Container(
                                margin: const EdgeInsets.only(
                                    right: 8, left: 8, top: 24, bottom: 12),
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(24.0),
                                  color: Colors.amberAccent,
                                ),
                                child: Stack(
                                  children: [
                                    Positioned.fill(
                                      child: ClipRRect(
                                        borderRadius:
                                            BorderRadius.circular(24.0),
                                        child: Image.network(
                                          imageUrl,
                                          fit: BoxFit.cover,
                                        ),
                                      ),
                                    ),
                                    Positioned(
                                      top: 8,
                                      left: 8,
                                      child: Text(
                                        imageText,
                                        style: const TextStyle(
                                          color: Colors.white,
                                          fontSize: 17,
                                          fontWeight: FontWeight.bold,
                                        ),
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                            );
                          },
                        );
                      },
                      itemCount: 5,
                    ),
                  ),
                ],
              ),
              const SizedBox(
                height: 12.0,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: List.generate(
                  5,
                  (index) => GestureDetector(
                    child: Container(
                      margin: const EdgeInsets.all(2.0),
                      child: Icon(
                        Icons.circle,
                        size: 12.0,
                        color: pageNo == index
                            ? Colors.indigoAccent
                            : Colors.grey.shade300,
                      ),
                    ),
                  ),
                ),
              ),
              const SizedBox(height: 10),
              const _NearbyHotels(),
            ],
          ),
        ),
      ),
    );
  }
}

class _NearbyHotels extends ConsumerWidget {
  const _NearbyHotels({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final hotels = ref.watch(allHotelsProvider);
    return Padding(
      padding: const EdgeInsets.all(20.0),
      child: Column(
        children: [
          const Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Text(
                'Khách sạn thịnh hành',
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
                  return ListHotelCard(hotel: hotels[index]);
                },
              );
            },
            error: (error, stackTrace) => Text('Error: $error'),
            loading: () => const Center(child: CircularProgressIndicator()),
          ),
        ],
      ),
    );
  }
}

class PopUpMen extends StatelessWidget {
  final List<PopupMenuEntry> menuList;
  final Widget? icon;
  const PopUpMen({Key? key, required this.menuList, this.icon})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return PopupMenuButton(
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(16.0),
      ),
      itemBuilder: ((context) => menuList),
      icon: icon,
    );
  }
}
