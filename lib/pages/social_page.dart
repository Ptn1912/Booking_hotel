import 'package:booking_hotel/controllers/NearbyPlacesController.dart';
import 'package:booking_hotel/pages/up_social_page.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/widgets/background.dart';
import 'package:booking_hotel/consts.dart';
import 'package:get/get.dart';
import 'package:intl/intl.dart';

class SocialScreen extends StatefulWidget {
  const SocialScreen({Key? key}) : super(key: key);

  @override
  State<SocialScreen> createState() => _SocialScreenState();
}

class _SocialScreenState extends State<SocialScreen> {
  final NearbyPlacesController blogController =
      Get.find<NearbyPlacesController>();

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: MyAppBar(
        title: 'Social',
      ),
      body: Stack(
        children: [
          Background(
            child: Obx(() {
              if (blogController.isLoading.value) {
                return Center(child: CircularProgressIndicator());
              } else if (blogController.blogs.isEmpty) {
                return Center(child: Text("No blogs found."));
              } else {
                return SingleChildScrollView(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const SizedBox(height: 20.0),
                      SingleChildScrollView(
                        scrollDirection: Axis.horizontal,
                        child: Row(
                          children: [
                            Container(
                              height: 56.0,
                              width: 56.0,
                              alignment: Alignment.center,
                              margin: const EdgeInsets.only(left: 24.0),
                              decoration: BoxDecoration(
                                shape: BoxShape.circle,
                                gradient: k3GradientAccent,
                                border: Border.all(
                                  color: Colors.blue,
                                  width: 2.0,
                                ),
                                boxShadow: [
                                  BoxShadow(
                                    blurRadius: 12.0,
                                    offset: const Offset(0, 4),
                                    color: k3Pink.withOpacity(0.52),
                                  ),
                                ],
                              ),
                              child: IconButton(
                                onPressed: () {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                      builder: (context) => UpSocialPage(),
                                    ),
                                  );
                                },
                                icon: Icon(Icons.add),
                              ),
                            ),
                            ...List.generate(
                              5,
                              (index) => Container(
                                height: 56.0,
                                width: 56.0,
                                margin: EdgeInsets.only(
                                  left: 30.0,
                                  right: index == 4 ? 30.0 : 0.0,
                                ),
                                alignment: Alignment.center,
                                decoration: BoxDecoration(
                                  shape: BoxShape.circle,
                                  border: Border.all(
                                      width: 2.0, color: Colors.blueAccent),
                                  image: DecorationImage(
                                    image: AssetImage(
                                        'assets/places/place${index + 1}.jpg'),
                                    fit: BoxFit.cover,
                                  ),
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                      ...blogController.blogs.map((blog) {
                        return Padding(
                          padding: const EdgeInsets.all(20.0),
                          child: Column(
                            children: [
                              Row(
                                children: [
                                  CircleAvatar(
                                    backgroundImage:
                                        AssetImage('assets/images/blink.jpg'),
                                    maxRadius: 20.0,
                                  ),
                                  SizedBox(width: 8.0),
                                  Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        blog.username,
                                        style: Theme.of(context)
                                            .textTheme
                                            .titleMedium!
                                            .copyWith(color: Colors.black),
                                      ),
                                      Text(
                                        DateFormat('yyyy-MM-dd HH:mm').format(blog.createdAt),
                                        style: Theme.of(context)
                                            .textTheme
                                            .labelLarge!
                                            .copyWith(
                                                color: Color.fromARGB(
                                                    255, 18, 17, 17)),
                                      ),
                                    ],
                                  ),
                                  Spacer(),
                                  IconButton(
                                    onPressed: () {},
                                    icon: Icon(Icons.more_vert,
                                        color: Colors.white),
                                  ),
                                ],
                              ),
                              Row(
                                children: [
                                  Text(
                                    blog.review,
                                    style: Theme.of(context)
                                        .textTheme
                                        .titleMedium!
                                        .copyWith(
                                            color: Color.fromARGB(
                                                255, 18, 17, 17)),
                                  ),
                                ],
                              ),
                               SizedBox(height: 15,),
                              Container(
                                padding: const EdgeInsets.all(14.0),
                                height: size.height * 0.30,
                                width: size.width,
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(20.0),
                                  image: DecorationImage(
                                    image:
                                        AssetImage('assets/blog/${blog.image}'),
                                    fit: BoxFit.cover,
                                  ),
                                ),
                                child: Column(
                                  children: [
                                    Spacer(),
                                    Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.spaceAround,
                                      children: [
                                        _buildPostStat(
                                          context: context,
                                          iconPath: Icons.favorite,
                                          value: '5.2K',
                                        ),
                                        _buildPostStat(
                                          context: context,
                                          iconPath: Icons.bookmark,
                                          value: '1.1K',
                                        ),
                                        _buildPostStat(
                                          context: context,
                                          iconPath: Icons.share,
                                          value: '5.2K',
                                        ),
                                      ],
                                    )
                                  ],
                                ),
                              ),
                            ],
                          ),
                        );
                      }),
                    ],
                  ),
                );
              }
            }),
          ),
        ],
      ),
    );
  }

  Container _buildPostStat({
    required BuildContext context,
    required IconData iconPath,
    required String value,
  }) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 8.0, vertical: 4.0),
      decoration: BoxDecoration(
        color: Color.fromARGB(255, 43, 39, 39).withOpacity(0.40),
        borderRadius: BorderRadius.circular(35.0),
      ),
      child: Row(
        children: [
          Icon(
            iconPath,
            color: Colors.white,
          ),
          const SizedBox(width: 8.0),
          Text(
            value,
            style: Theme.of(context)
                .textTheme
                .labelSmall!
                .copyWith(color: Colors.white),
          ),
        ],
      ),
    );
  }
}
