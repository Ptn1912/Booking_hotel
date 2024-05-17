
import 'package:booking_hotel/widgets/bottom_navbar.dart';
import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:booking_hotel/pages/login_page.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/constants/constants.dart';
import 'package:logger/logger.dart';
import 'package:booking_hotel/models/UserModel.dart';

class AuthenticationController extends GetxController {
  final isLoading = false.obs;
  final token = ''.obs;
  final user = UserModel().obs; 
  final box = GetStorage();
  var logger = Logger();
   
  Future register({
    required String username,
    required String email,
    required String password,
  }) async {
    try {
      isLoading(true);
      var data = {'username': username, 'email': email, 'password': password};
      var response = await http.post(
        Uri.parse('${url}register'),
        headers: {
          'Accept': 'application/json',
        },
        body: data,
      );
     
      if (response.statusCode == 201) {
        isLoading.value = false;
        token.value = json.decode(response.body)['token'];
        box.write('token', token.value);
        print('Token: ${token.value}');
        Get.offAll(() => const LoginPage());
      } else {
        print('Failed to register. Status code: ${response.statusCode}');
      }
    } catch (e) {
      isLoading.value = false;
      logger.e('Error occurred: $e');
    }
  }
  Future<void> login({
  required String email,
  required String password,
}) async {
  try {
    isLoading.value = true;
    var data = {
      'email': email,
      'password': password,
    };

    var response = await http.post(
      Uri.parse('${url}login'),
      headers: {
        'Accept': 'application/json',
      },
      body: data,
    );
    if (response.statusCode == 200) {
      isLoading.value = false;
      var responseData = json.decode(response.body);
      token.value = responseData['token'];
      box.write('token', token.value);
      
      // Xóa dữ liệu người dùng cũ trước khi lưu dữ liệu mới
      await logout();
      
      // Lưu trữ dữ liệu người dùng mới
      var userData = responseData['user'];
      box.write('user', userData);
      
      Get.offAll(() => BottomNavBar());
    } else {
      isLoading.value = false;
      // Handle server error response
      Get.snackbar(
        'Error',
        json.decode(response.body)['message'],
        snackPosition: SnackPosition.TOP,
        backgroundColor: Colors.red,
        colorText: Colors.white,
      );
      logger.e(json.decode(response.body));
    }
  } catch (e) {
    isLoading.value = false;
    logger.e('Error occurred: $e');
    // Handle other exceptions
    Get.snackbar(
      'Error',
      'An error occurred. Please try again later.',
      snackPosition: SnackPosition.TOP,
      backgroundColor: Colors.red,
      colorText: Colors.white,
    );
  }
}

Future<void> logout() async {
  final box = GetStorage();
  await box.erase();
}

}
