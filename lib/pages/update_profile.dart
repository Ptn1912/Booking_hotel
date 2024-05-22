import 'package:booking_hotel/controllers/authentication.dart';
import 'package:booking_hotel/models/UserModel.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/input_field.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/consts.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';

class UpdateProfileScreen extends StatefulWidget {
  final int id;
  final String username;
  final String email;
  final String? phone; // Make phone nullable
  final String? address;
  final String password;
  const UpdateProfileScreen({
    Key? key,
    required this.id,
    required this.username,
    required this.email,
    this.phone, // Add a question mark (?) after the type
    this.address,
    required this.password,
  }) : super(key: key);

  @override
  State<UpdateProfileScreen> createState() => _UpdateProfileScreenState();
}

class _UpdateProfileScreenState extends State<UpdateProfileScreen> {
  final TextEditingController _usernameController = TextEditingController();
 final TextEditingController _emailController = TextEditingController();
 final TextEditingController _phoneController = TextEditingController();
 final TextEditingController _addressController = TextEditingController();
 final TextEditingController _passwordController = TextEditingController();
  final AuthenticationController _accountController2 =
      Get.put(AuthenticationController());

  
  List<UserModel> rooms = [];

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: kWhiteColor,
      appBar: MyAppBar(
        title: 'Update profile',
      ),
      body: SingleChildScrollView(
        child: Container(
          padding: const EdgeInsets.all(20),
          child: Column(
            children: [
              // -- IMAGE with ICON
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
                      child: const Icon(FontAwesomeIcons.camera,
                          color: Colors.black, size: 20),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 50),
              Column(children: [
                InputField(
                  icon: FaIcon(FontAwesomeIcons.userLarge),
                  controller: _usernameController,
                  hintText: '${widget.username}',
                  obcureText: false,
                ),
                const SizedBox(height: 5),
                InputField(
                  icon: FaIcon(FontAwesomeIcons.envelope),
                  controller: _emailController,
                  hintText: '${widget.email}',
                  obcureText: false,
                ),
                const SizedBox(height: 5),
                InputField(
                  icon: FaIcon(FontAwesomeIcons.locationDot),
                  controller: _addressController,
                  hintText: '${widget.address}',
                  obcureText: false,
                ),
                const SizedBox(height: 5),
                InputField(
                  icon: FaIcon(FontAwesomeIcons.phone),
                  controller: _phoneController,
                  hintText: '${widget.phone}',
                  obcureText: false,
                ),
                const SizedBox(height: 5),
                InputField(
                  hintText: '${widget.password}',
                  icon: FaIcon(FontAwesomeIcons.fingerprint),
                  controller: _passwordController,
                  obcureText: true,
                ),
                const SizedBox(height: 5),
                CupertinoButton(
                  padding: EdgeInsets.zero,
                  child: Container(
                    alignment: Alignment.center,
                    width: double.infinity,
                    height: size.height * 0.080,
                    decoration: BoxDecoration(
                      color: kButtonColor,
                      borderRadius: BorderRadius.circular(37),
                    ),
                    child: Obx(() {
                      return _accountController2.isLoading.value
                          ? CircularProgressIndicator(
                              color: Colors.white,
                            )
                          : Text(
                              "Edit Profile",
                              style: TextStyle(
                                color: kWhiteColor,
                                fontWeight: FontWeight.w700,
                              ),
                            );
                    }),
                  ),
                  onPressed: _accountController2.isLoading.value
                      ? null // Disable button if loading
                      : () async {
                          await _accountController2.UpdateAccount(
                            id: widget.id,
                            username: _usernameController.text.trim(),
                            email: _emailController.text.trim(),
                            phone: _phoneController.text.trim(),
                            address: _addressController.text.trim(),
                            password: _passwordController.text.trim(),
                          );
                        },
                ),
              ]),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  const Text.rich(
                    TextSpan(
                      text: "Edit Profile",
                      style: TextStyle(fontSize: 12),
                      children: [
                        TextSpan(
                            text: "Joined 14 April 2024",
                            style: TextStyle(
                                fontWeight: FontWeight.bold, fontSize: 12))
                      ],
                    ),
                  ),
                  ElevatedButton(
                    onPressed: () {},
                    style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.redAccent.withOpacity(0.1),
                        elevation: 0,
                        foregroundColor: Colors.red,
                        shape: const StadiumBorder(),
                        side: BorderSide.none),
                    child: const Text("Delete"),
                  ),
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
