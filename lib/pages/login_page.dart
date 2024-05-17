import 'package:booking_hotel/controllers/authentication.dart';
import 'package:booking_hotel/pages/register_page.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/widgets/input_field.dart';
import 'package:booking_hotel/consts.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';
// import 'package:get_storage/get_storage.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final AuthenticationController _authenticationController =
      Get.put(AuthenticationController());

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(
          gradient: LinearGradient(
            begin: Alignment.topCenter,
            colors: [
              backgroundColor2,
              backgroundColor2,
              backgroundColor4,
            ],
          ),
        ),
        child: SingleChildScrollView(
          child: Padding(
              padding: EdgeInsets.all(size.height * 0.024),
              child: OverflowBar(
                overflowAlignment: OverflowBarAlignment.center,
                overflowSpacing: size.height * 0.020,
                children: [
                  Container(
                      height: 120,
                      width: 120,
                      child: Image.asset(
                        "assets/lg3.png",
                        fit: BoxFit.cover,
                      )),
                  Text(
                    "Login",
                    textAlign: TextAlign.center,
                    style: TextStyle(
                        fontSize: 27,
                        color: textColor2,
                        height: 1.2,
                        fontWeight: FontWeight.bold),
                  ),
                  InputField(
                    icon: FaIcon(FontAwesomeIcons.solidUser),
                    controller: _emailController,
                    hintText: 'Email',
                    obcureText: false,
                  ),
                  InputField(
                    icon: FaIcon(FontAwesomeIcons.key),
                    controller: _passwordController,
                    hintText: 'Password',
                    obcureText: true,
                  ),
                  SizedBox(
                    height: 5,
                  ),
                  Align(
                    alignment: Alignment.centerRight,
                    child: Text(
                      "Forget Password               ",
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 16,
                        color: textColor2,
                      ),
                    ),
                  ),
                  SizedBox(height: 10),
                  CupertinoButton(
                    padding: EdgeInsets.zero,
                    onPressed: () async {
                      await _authenticationController.login(
                        email: _emailController.text.trim(),
                        password: _passwordController.text.trim(),
                      );
                    },
                    child: Container(
                      alignment: Alignment.center,
                      width: double.infinity,
                      height: size.height * 0.080,
                      decoration: BoxDecoration(
                        color: kButtonColor,
                        borderRadius: BorderRadius.circular(15),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.grey.withOpacity(
                                0.5), // Màu của box shadow và độ mờ
                            spreadRadius: 5, // Bán kính mờ
                            blurRadius: 7, // Độ nhòe của đường viền
                            offset: Offset(0, 3), // Độ lệch của box shadow
                          ),
                        ],
                      ),
                      child: Obx(() {
                        return _authenticationController.isLoading.value
                            ? CircularProgressIndicator(
                                color: Colors.white,
                              )
                            : const Text(
                                "Log In",
                                style: TextStyle(
                                  color: kWhiteColor,
                                  fontSize: 22,
                                  fontWeight: FontWeight.w700,
                                ),
                              );
                      }),
                    ),
                  ),
                  SizedBox(height: size.height * 0.01),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Container(
                        height: 2,
                        width: size.width * 0.2,
                        color: Colors.black12,
                      ),
                      Text(
                        "  Or continue with   ",
                        style: TextStyle(
                          fontWeight: FontWeight.bold,
                          color: textColor2,
                          fontSize: 16,
                        ),
                      ),
                      Container(
                        height: 2,
                        width: size.width * 0.2,
                        color: Colors.black12,
                      ),
                    ],
                  ),
                  SizedBox(height: size.height * 0.01),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      socialIcon("assets/google.png"),
                      socialIcon("assets/apple.png"),
                      socialIcon("assets/facebook.png"),
                    ],
                  ),
                  CupertinoButton(
                      padding: EdgeInsets.zero,
                      child: Container(
                        alignment: Alignment.center,
                        width: double.infinity,
                        height: size.height * 0.080,
                        decoration: BoxDecoration(
                          boxShadow: const [
                            BoxShadow(
                                blurRadius: 20,
                                spreadRadius: 0,
                                color: Color.fromRGBO(120, 37, 139, 0.25),
                                offset: Offset(0, 10))
                          ],
                          color: Color.fromRGBO(225, 225, 225, 0.28),
                          borderRadius: BorderRadius.circular(37),
                        ),
                        child: Text("Create an account",
                            style: TextStyle(
                                color: textColor2,
                                fontWeight: FontWeight.w700)),
                      ),
                      onPressed: () {
                        Navigator.push(context,
                            MaterialPageRoute(builder: (_) => RegisterPage()));
                      }),
                ],
              )),
        ),
      ),
    );
  }

  Container socialIcon(image) {
    return Container(
      padding: const EdgeInsets.symmetric(
        horizontal: 32,
        vertical: 15,
      ),
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(12),
        border: Border.all(
          color: Colors.white,
          width: 2,
        ),
      ),
      child: Image.asset(
        image,
        height: 35,
      ),
    );
  }
}
