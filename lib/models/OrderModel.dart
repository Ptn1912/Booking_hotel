class OrderModel {
  final int id;
  final String room_type;
  final String date;
  final BigInt room_price;
      
  OrderModel({
     required this.id,
    required this.room_type,
    required this.date,
    required this.room_price,
  });

  factory OrderModel.fromJson(Map<String, dynamic> json) {
    return OrderModel(
       id: json['id'] as int,
      room_type: json['room_type'] as String,
      date: json['room_Image'] as String,
     room_price: json['room_price'] is int ? BigInt.from(json['room_price'] as int) : json['room_price'] as BigInt,
    );
  }
}