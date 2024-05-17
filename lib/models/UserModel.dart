class UserModel {
  int? id;
  String? username;
  String? email;
  String? password;
  String? address;
  String? phone;
 String? token;
  UserModel({
     this.id,
    this.username , // Provide default value or mark as required
    this.email,
    this.password ,
    this.address ,
    this.phone ,
    this.token ,
  });

  factory UserModel.fromJson(Map<String, dynamic> json) {
    return UserModel(
       id: json['user']['id'] ,
      username: json['user']['username'] , // Provide default value or handle null
      email: json['user']['email'],
      password: json['user']['password'] ,
      address: json['user']['address'] ,
      phone: json['user']['phone'] ,
      token:json['token']
    );
  }
}
