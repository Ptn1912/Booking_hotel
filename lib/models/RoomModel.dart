class RoomModel {
  final int room_id;
  final int HotelID;
  final String room_type;
  final String room_Image;
  final BigInt room_price;
  final int room_no;
  final int room_status;
  final String room_description;
      
  RoomModel({
     required this.room_id,
    required this.HotelID,
    required this.room_type,
    required this.room_Image,
    required this.room_price,
    required this.room_no,
    required this.room_status,
    required this.room_description,
  });

  factory RoomModel.fromJson(Map<String, dynamic> json) {
    return RoomModel(
       room_id: json['room_id'] as int,
      HotelID: json['HotelID'] as int,
      room_type: json['room_type'] as String,
      room_Image: json['room_Image'] as String,
     room_price: json['room_price'] is int ? BigInt.from(json['room_price'] as int) : json['room_price'] as BigInt,
      room_no: json['room_no'] as int,
      room_status: json['room_status'] as int,
       room_description: json['room_description'] as String,
    );
  }
}