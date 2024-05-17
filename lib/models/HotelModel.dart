class HotelModel {
  final int id;
  final String HotelName;
  final String ImageHotel;
  final String address;
  final int status;
    
  HotelModel({
    required this.id,
    required this.HotelName,
    required this.ImageHotel,
    required this.address,
    required this.status,
    
  });

  factory HotelModel.fromJson(Map<String, dynamic> json) {
    return HotelModel(
      id: json['HotelID'] as int,
      HotelName: json['name'] as String,
      ImageHotel: json['ImageHotel'] as String,
      address: json['address'] as String,
      status: json['status'] as int,
    );
  }
 
}
