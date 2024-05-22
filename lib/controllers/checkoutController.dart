
import 'package:booking_hotel/widgets/success_page.dart';
import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:get_storage/get_storage.dart';
import 'package:booking_hotel/constants/constants.dart';
import 'package:logger/logger.dart';

class CheckoutController extends GetxController {
  final isLoading = false.obs;
  final token = ''.obs;
  final box = GetStorage();
  var logger = Logger();
    @override
  void onInit() {
    super.onInit();
  getOrderDetail(); // Await this before getOrderDetail
 
  }
  Future<void> getOrderDetail() async {
  try {
    isLoading.value = true;
    var response = await http.get(
      Uri.parse('${url}account'),
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ${box.read('token')}',
      },
    );
    if (response.statusCode == 200) {
      var responseData = json.decode(response.body);

      // Check if responseData contains bookingDetails and user
      if (responseData['bookingDetails'] != null && responseData['user'] != null) {
        box.write('bookingDetails', responseData['bookingDetails']);
        box.write('user', responseData['user']);
      } else {
        // Handle the case where bookingDetails or user is not found in the response
        logger.e('Missing bookingDetails or user in response');
      }

      isLoading.value = false;
    } else {
      isLoading.value = false;
    }
  } catch (e) {
    isLoading.value = false;
    logger.e('Error occurred: $e');
  }
}
  Future checkout({
    required String name,
    required String email,
    required String phone,
     required String address,
      required String method,
    required String productNames,
    required String totalPriceText,
    required int quantities,
   required int userId,
     
  }) async {
    try { 
      print('$name');
        print('$email');
          print('$phone');
            print('$address');
              print('$productNames');
                print('$totalPriceText');
                  print('$method');
                     print('$quantities');
                        print('$userId');
      isLoading(true);
      var data = {'reservate_name': name, 'reservate_email': email, 'reservate_phone': phone,
      'reservate_address': address,'reservate_method':method,'room_type':productNames,'room_price':totalPriceText,'quantity':quantities.toString(),
      'userid':userId.toString()
      };
      var response = await http.post(
        Uri.parse('${url}payment'),
        headers: {
          'Accept': 'application/json',
        },
        body: data,
      );
      // logger.d('Response status code: ${response.statusCode}');
      // logger.d('Response body: ${response.body}');
      if (response.statusCode == 201) {
  isLoading.value = false;
  // Parse dữ liệu từ phản hồi
  var responseData = json.decode(response.body);
  
  // Truy cập thông tin từ phản hồi
  var reservateData = responseData['reservate'];
  var bookData = responseData['book'];
  var bookDetailsData = responseData['bookdetails'];
  
  // Tiếp theo, bạn có thể sử dụng thông tin này theo ý của bạn
  // Ví dụ:
  var reservateId = reservateData['reservate_id'];
  var bookId = bookData['book_id'];
  var bookDetailsId = bookDetailsData['id'];
  
  // Tiếp tục xử lý dữ liệu theo cách bạn muốn
  Get.offAll(() => const SuccessView());
} else {
  print('Failed to payment. Status code: ${response.statusCode}');
}
    } catch (e) {
      isLoading.value = false;
      logger.e('Error occurred: $e');
    }
  }
   
}