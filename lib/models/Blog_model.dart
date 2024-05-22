class BlogModel {
  final int id;
   final String username;
  final String image;
  final String review;
  final int userid;
    final DateTime createdAt;
  BlogModel({
    required this.id,
     required this.username,
    required this.image,
    required this.review,
    required this.userid,
     required this.createdAt,
  });

  factory BlogModel.fromJson(Map<String, dynamic> json) {
    return BlogModel(
      id: json['id'] as int,
      username: json['username'] as String,
      image: json['image'] as String,
      review: json['review'] as String,
      userid: json['userid'] as int,
       createdAt: DateTime.parse(json['created_at'] as String),
    );
  }
 
}
