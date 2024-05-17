
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
   
  Future checkout({
    required String name,
    required String email,
    required String phone,
     required String address,
      required String method,
    required String productNames,
    required String totalPriceText,
    required int quantities,
     
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
      isLoading(true);
      var data = {'reservate_name': name, 'reservate_email': email, 'reservate_phone': phone,
      'reservate_address': address,'reservate_method':method,'room_type':productNames,'room_price':totalPriceText,'quantity':quantities.toString()
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