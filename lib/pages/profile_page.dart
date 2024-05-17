import 'package:booking_hotel/controllers/authentication.dart';
import 'package:booking_hotel/pages/login_page.dart';
import 'package:booking_hotel/pages/order_screen.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:booking_hotel/pages/update_profile.dart';
import 'package:booking_hotel/widgets/profile_menu.dart';
import 'package:booking_hotel/consts.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/controllers/accountController.dart';

class ProfileScreen extends StatefulWidget {
  const ProfileScreen({Key? key}) : super(key: key);

  @override
  State<ProfileScreen> createState() => _ProfileScreenState();
}

class _ProfileScreenState extends State<ProfileScreen> {
  final AccountController _accountController = Get.put(AccountController());
  final AuthenticationController _authenticationController =
      Get.put(AuthenticationController());
  String username = '';
  late int id;
  String email = '';
  String password = '';
  String address = '';
  String phone = '';
  String token = '';
  @override
  void initState() {
    super.initState();
    loadUserDataa();
  }

  Future<void> loadUserDataa() async {
    final box = GetStorage();
    final userData = box.read('user');
    setState(() {
      id = userData != null ? userData['id'] ?? 'Unknown' : 'Unknown';
      username =
          userData != null ? userData['username'] ?? 'Unknown' : 'Unknown';
      email = userData != null ? userData['email'] ?? 'Unknown' : 'Unknown';
      address = userData != null ? userData['address'] ?? 'Unknown' : 'Unknown';
      password =
          userData != null ? userData['password'] ?? 'Unknown' : 'Unknown';
      phone = userData != null ? userData['phone'] ?? 'Unknown' : 'Unknown';
      token = userData != null ? userData['token'] ?? 'Unknown' : 'Unknown';
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: MyAppBar(
          title: '$username',
        ),
        body: GetBuilder<AccountController>(builder: (controller) {
          return SingleChildScrollView(
            child: Container(
              padding: const EdgeInsets.all(20),
              child: Column(
                children: [
                  Stack(
                    children: [
                      SizedBox(
                        width: 120,
                        height: 120,
                        child: ClipRRect(
                            borderRadius: BorderRadius.circular(100),
                            child: const Image(
                                image: AssetImage("assets/images/rose.jpg"))),
                      ),
                      Positioned(
                        bottom: 0,
                        right: 0,
                        child: Container(
                          width: 35,
                          height: 35,
                          decoration: BoxDecoration(
                              borderRadius: BorderRadius.circular(100),
                              color: tPrimaryColor),
                          child: const Icon(
                            FontAwesomeIcons.pencil,
                            color: Colors.black,
                            size: 20,
                          ),
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 10),
                  Text("$username",
                      style: Theme.of(context).textTheme.headline5),
                  Text("$email", style: Theme.of(context).textTheme.bodyText2),
                  const SizedBox(height: 20),
                  SizedBox(
                    width: 200,
                    child: ElevatedButton(
                      onPressed: () {
                        Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => UpdateProfileScreen(
                                    id: id,
                                    username: username,
                                    email: email,
                                    phone: phone,
                                    address: address,
                                    password: password,
                                    token: token)));
                      },
                      style: ElevatedButton.styleFrom(
                          backgroundColor: tPrimaryColor,
                          side: BorderSide.none,
                          shape: const StadiumBorder()),
                      child: const Text("Edit Profile",
                          style: TextStyle(color: tDarkColor)),
                    ),
                  ),
                  const SizedBox(height: 30),
                  const Divider(),
                  const SizedBox(height: 10),
                  ProfileMenuWidget(
                      title: "Settings",
                      icon: FontAwesomeIcons.cog,
                      onPress: () {}),
                  ProfileMenuWidget(
                      title: "My Orders",
                      icon: FontAwesomeIcons.suitcase,
                      onPress: () {
                         Navigator.push(context,
                  MaterialPageRoute(builder: (context) => OrderScreen()));
                      }),
                  ProfileMenuWidget(
                      title: "User Management",
                      icon: FontAwesomeIcons.userCheck,
                      onPress: () {
                      }),
                  const Divider(),
                  const SizedBox(height: 10),
                  ProfileMenuWidget(
                      title: "Information",
                      icon: FontAwesomeIcons.info,
                      onPress: () {}),
                  ProfileMenuWidget(
                      title: "Logout",
                      icon: FontAwesomeIcons.arrowRightFromBracket,
                      textColor: Colors.red,
                      endIcon: false,
                      onPress: () {
                        Get.defaultDialog(
                          title: "LOGOUT",
                          titleStyle: const TextStyle(fontSize: 20),
                          content: const Padding(
                            padding: EdgeInsets.symmetric(vertical: 15.0),
                            child: Text("Are you sure, you want to Logout?"),
                          ),
                          confirm: Expanded(
                            child: ElevatedButton(
                              onPressed: () async {
                                await _authenticationController.logout();
                                // Navigate back to login page and remove all routes
                                Navigator.of(context).pushAndRemoveUntil(
                                  MaterialPageRoute(
                                      builder: (context) => LoginPage()),
                                  (route) => false,
                                );
                              },
                              style: ElevatedButton.styleFrom(
                                  backgroundColor: Colors.redAccent,
                                  side: BorderSide.none),
                              child: const Text("Yes"),
                            ),
                          ),
                          cancel: OutlinedButton(
                              onPressed: () => Get.back(),
                              child: const Text("No")),
                        );
                      }),
                ],
              ),
            ),
          );
        }));
  }
}
