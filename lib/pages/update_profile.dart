import 'package:booking_hotel/controllers/accountController.dart';
import 'package:booking_hotel/controllers/authentication.dart';
import 'package:booking_hotel/models/UserModel.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/input_field.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/consts.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/constants/constants.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class UpdateProfileScreen extends StatefulWidget {
  final int id;
  final String username;
  final String email;
  final String? phone; // Make phone nullable
  final String? address;
  final String password;
  final String token;
  const UpdateProfileScreen({
    Key? key,
    required this.id,
    required this.username,
    required this.email,
    this.phone, // Add a question mark (?) after the type
    this.address,
    required this.password,
     required this.token,
  }) : super(key: key);

  @override
  State<UpdateProfileScreen> createState() => _UpdateProfileScreenState();
}

class _UpdateProfileScreenState extends State<UpdateProfileScreen> {
  TextEditingController _usernameController = TextEditingController();
  TextEditingController _emailController = TextEditingController();
  TextEditingController _phoneController = TextEditingController();
  TextEditingController _addressController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();
  final AccountController _accountController2 = Get.put(AccountController());

  bool _isUpdating = false;
  List<UserModel> rooms = [];

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: kWhiteColor,
      appBar: MyAppBar(
        title: 'update profile',
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
                       child: _isUpdating
                        ? const Center(
                            child: CircularProgressIndicator(
                            color: Colors.white,
                          ))
                        : Text(
                            "Edit Profile",
                            style: TextStyle(
                                color: kWhiteColor,
                                fontWeight: FontWeight.w700),
                          ),
                  ),
                  onPressed: _isUpdating // Kiểm tra trạng thái cập nhật
                      ? null // Nếu đang cập nhật thì không cho nhấn nút
                      : () async {
                          // Nếu không phải đang cập nhật, thực hiện cập nhật
                          setState(() {
                            _isUpdating = true; // Đặt trạng thái cập nhật thành true
                          });
                          await _accountController2.UpdateAccount(
                              id: widget.id,
                              username: _usernameController.text.trim(),
                              email: _emailController.text.trim(),
                              phone: _phoneController.text.trim(),
                              address: _addressController.text.trim(),
                              password: _passwordController.text.trim(),
                               token: widget.token
                              );
                             
                          setState(() {
                            _isUpdating = false; // Cập nhật hoàn thành, đặt lại trạng thái thành false
                          });
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
