import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:image_picker/image_picker.dart';
import 'dart:io';
import 'package:http/http.dart' as http;
import 'package:booking_hotel/constants/constants.dart';

class UpSocialPage extends StatefulWidget {
  @override
  _UpSocialPageState createState() => _UpSocialPageState();
}

class _UpSocialPageState extends State<UpSocialPage> {
  File? _pickedImage;
  late int id;
  final TextEditingController textEditingController = TextEditingController();

  void postBlog(
      String textContent, File? imageFile, int userId, String username) async {
    try {
      var request = http.MultipartRequest('POST', Uri.parse('${url}post_blog'));
      request.fields['review'] = textContent;
      request.fields['userid'] = userId.toString();
      request.fields['username'] = username;

      if (imageFile != null) {
        var imageStream = http.ByteStream(imageFile.openRead());
        var length = await imageFile.length();
        var multipartFile = http.MultipartFile('image', imageStream, length,
            filename: imageFile.path);
        request.files.add(multipartFile);
      }
      var response = await request.send();
      if (response.statusCode == 200) {
        var responseData = await response.stream.bytesToString();
        var responseJson = json.decode(responseData);
        Get.snackbar(
          'Post successful',
          responseJson['message'],
          snackPosition: SnackPosition.TOP,
          backgroundColor: Colors.green,
          colorText: Colors.white,
        );
        Get.back(result: true); // Trả về kết quả thành công
      } else {
        Get.snackbar(
          'Post failed',
          'Đã xảy ra lỗi khi đăng bài viết: ${response.reasonPhrase}',
          snackPosition: SnackPosition.TOP,
          backgroundColor: Colors.red,
          colorText: Colors.white,
        );
        Get.back(result: false); // Trả về kết quả thất bại
      }
    } catch (e) {
      print("Exception occurred: $e");
      Get.snackbar(
        'Error',
        'Đã xảy ra lỗi: $e',
        snackPosition: SnackPosition.TOP,
        backgroundColor: Colors.red,
        colorText: Colors.white,
      );
    }
  }
  @override
  Widget build(BuildContext context) {
    final box = GetStorage();
    final userData = box.read('user');
    String userName =
        userData != null ? userData['username'] ?? 'Unknown' : 'Unknown';
    int userId = userData != null ? userData['id'] ?? -1 : -1;
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Tạo bài viết',
        ),
        actions: [
          TextButton(
              onPressed: () {
                postBlog(
                    textEditingController.text, _pickedImage, userId, userName);
              },
              child: const CircleAvatar(
                radius: 20,
                child: Icon(Icons.send),
              )),
        ],
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Row(
                children: [
                  CircleAvatar(
                      radius: 25,
                      backgroundImage: AssetImage("assets/images/blink.jpg")),
                  SizedBox(width: 10),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        userName,
                        style: TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 18,
                        ),
                      ),
                      Text(
                        '1K người theo dõi',
                        style: TextStyle(
                          color: Colors.grey,
                        ),
                      ),
                    ],
                  ),
                ],
              ),
              SizedBox(height: 20),
              Container(
                decoration: BoxDecoration(
                  boxShadow: [
                    BoxShadow(
                      color: Colors.grey.withOpacity(0.5),
                      spreadRadius: 2,
                      blurRadius: 5,
                      offset: Offset(0, 3), // changes position of shadow
                    ),
                  ],
                ),
                child: TextField(
                  controller: textEditingController,
                  maxLines: 5,
                  decoration: InputDecoration(
                    hintText: 'Bạn đang nghĩ gì?',
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(12.0),
                      borderSide: BorderSide.none, // Remove default border
                    ),
                    filled: true, // Fill the background
                    fillColor: Colors.white, // Set the background color
                  ),
                ),
              ),
              SizedBox(height: 20),
              Row(
                children: [
                  IconButton(
                    icon: _pickedImage != null
                        ? Image.file(
                            _pickedImage!,
                            width: 150,
                            height: 120,
                            fit: BoxFit.cover,
                          )
                        : Icon(
                            FontAwesomeIcons.images,
                            color: Colors.blue,
                            size: 12,
                          ),
                    onPressed: () async {
                      try {
                        final pickedFile = await ImagePicker()
                            .pickImage(source: ImageSource.gallery);

                        if (pickedFile != null) {
                          setState(() {
                            _pickedImage = File(pickedFile.path);
                          });
                        } else {
                          print('Người dùng đã hủy chọn ảnh');
                        }
                      } catch (e) {
                        print('Lỗi khi chọn ảnh: $e');
                      }
                    },
                  ),
                  IconButton(
                    icon: Icon(
                      FontAwesomeIcons.camera,
                      color: Colors.blue,
                      size: 24,
                    ),
                    onPressed: () {},
                  ),
                ],
              ),
              SizedBox(height: 10),
              _buildAdditionalOption(
                icon: FontAwesomeIcons.userTag,
                text: 'Gắn thẻ người khác',
                onTap: () {},
              ),
              _buildAdditionalOption(
                icon: FontAwesomeIcons.video,
                text: 'Video trực tiếp',
                onTap: () {},
              ),
              _buildAdditionalOption(
                icon: FontAwesomeIcons.mapMarkerAlt,
                text: 'Vị trí ',
                onTap: () {},
              ),
              _buildAdditionalOption(
                icon: FontAwesomeIcons.folderPlus,
                text: 'Thêm vào album',
                onTap: () {},
              ),
              _buildAdditionalOption(
                icon: FontAwesomeIcons.music,
                text: 'Thêm nhạc',
                onTap: () {},
              ),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildAdditionalOption(
      {required IconData icon,
      required String text,
      required VoidCallback onTap}) {
    return ListTile(
      leading: Icon(
        icon,
        color: Colors.blue,
      ),
      title: Text(text),
      onTap: onTap,
    );
  }
}
