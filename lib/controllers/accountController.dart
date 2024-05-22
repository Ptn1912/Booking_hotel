import 'dart:convert';
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
    super.onInit();
    getUserDetail(); // Await this before getOrderDetail
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


}
