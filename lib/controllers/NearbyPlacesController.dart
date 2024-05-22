import 'dart:convert';
import 'package:booking_hotel/models/Blog_model.dart';
import 'package:booking_hotel/models/HotelModel.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:booking_hotel/constants/constants.dart';
class NearbyPlacesController extends GetxController {
  var hotels = <HotelModel>[].obs;
   var blogs = <BlogModel>[].obs;
  var isLoading = true.obs;

  @override
  void onInit() {
    super.onInit();
    fetchHotels();
    fetchBlogs();
  }
  Future<void> fetchBlogs() async {
  try {
    isLoading(true);
    var response = await http.get(
      Uri.parse('${url}show_blog'),
      headers: {
        'Accept': 'application/json',
      },
    );

    if (response.statusCode == 200) {
      List<dynamic> jsonResponse = json.decode(response.body);
      blogs.value = jsonResponse.map((blog) => BlogModel.fromJson(blog as Map<String, dynamic>)).toList();
    } else {
      throw Exception('Failed to load blogs');
    }
  } catch (e) {
    print('Error fetching blogs: $e');
  } finally {
    isLoading(false);
  }
}

  Future<void> fetchHotels({String? query}) async {
    try {
      isLoading(true);
      var response = query == null || query.isEmpty
          ? await http.get(
              Uri.parse('${url}book'),
              headers: {
                'Accept': 'application/json',
              },
            )
          : await http.post(
              Uri.parse('${url}search/$query'),
              headers: {
                'Accept': 'application/json',
              },
              body: jsonEncode({'name': query}),
            );

      if (response.statusCode == 200) {
        List<dynamic> jsonResponse = json.decode(response.body);
        hotels.value = jsonResponse.map((hotel) => HotelModel.fromJson(hotel)).toList();
      } else {
        throw Exception('Failed to load hotels');
      }
    } catch (e) {
      print('Error fetching hotels: $e');
    } finally {
      isLoading(false);
    }
  }

  void searchHotels(String query) {
    fetchHotels(query: query);
  }
}
