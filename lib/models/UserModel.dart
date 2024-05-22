class UserModel {
  int? id;
  String? username;
  String? email;
  String? password;
  String? address;
  String? phone;
  UserModel({
     this.id,
    this.username , // Provide default value or mark as required
    this.email,
    this.password ,
    this.address ,
    this.phone ,
  });

  factory UserModel.fromJson(Map<String, dynamic> json) {
  return UserModel(
    id: json['user']['id'] , // Provide a default value or handle null
    username: json['user']['username'] , // Provide a default value or handle null
    email: json['user']['email'] , // Provide a default value or handle null
    password: json['user']['password'] , // Provide a default value or handle null
    address: json['user']['address'] ,
    phone: json['user']['phone'] , // Provide a default value or handle null
  );
}

}
