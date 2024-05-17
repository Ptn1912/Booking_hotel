import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/constants/constants.dart';
import 'package:logger/logger.dart';

class AccountController extends GetxController {
  final isLoading = false.obs;
  
  final token = ''.obs;
  final box = GetStorage();
  var logger = Logger();
  @override
  void onInit() {
    getUserDetail();
    super.onInit();
  }
  Future<void> getUserDetail() async {
    try {
      isLoading.value = true;
      var response = await http.get(
        Uri.parse('${url}user'),
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ${box.read('token')}',
        },
      );
      if (response.statusCode == 200) {
        var responseData = json.decode(response.body);
        // Store user data in the box
      } else {
        isLoading.value = false;
      }
    } catch (e) {
      isLoading.value = false;
      logger.e('Error occurred: $e');
    }
  }

Future<void> UpdateAccount({
    required int id,
    required String username,
    required String email,
    required String address,
    required String phone,
    required String password,
     required String token,
  }) async {
    try {
     isLoading(true);
      print('id: $id');
      print('Username: $username');
      print('Email: $email');
      print('Address: $address');
      print('Phone: $phone');
      print('Password: $password');
      if (username.isEmpty ||
          email.isEmpty ||
          address.isEmpty ||
          phone.isEmpty ||
          password.isEmpty) {
        throw Exception("All fields are required");
      }
      var data = {
        'username': username,
        'email': email,
      
          'address':
              address, // Kiểm tra và gán giá trị address nếu không phải là null
       
          'phone':
              phone, // Kiểm tra và gán giá trị phone nếu không phải là null
        'password': password,
      };

      var response = await http.post(
        Uri.parse('${url}update_account/$id'),
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: data,
      );

      if (response.statusCode == 201) {
        isLoading.value = false;
        // token.value = json.decode(response.body)['token'];
        // box.write('token', token.value);
        // print('Token: ${token.value}');
        Get.snackbar(
          'Update successfull',
          
          json.decode(response.body)['message'],
          snackPosition: SnackPosition.TOP,
          backgroundColor: Colors.green,
          colorText: Colors.white,
        );
      } else {
        print('Failed to update account. Status code: ${response.statusCode}');
      }
    } catch (e) {
      isLoading.value = false;
      
      Get.snackbar(
        'Success',
        'Update successfull',
       
        snackPosition: SnackPosition.TOP,
        backgroundColor: Colors.green,
        colorText: Colors.white,
      );
    }


  }

}
