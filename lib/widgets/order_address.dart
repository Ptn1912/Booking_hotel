// import 'package:booking_hotel/pages/checkout_page.dart';
// import 'package:booking_hotel/widgets/app_bar.dart';
// import 'package:flutter/cupertino.dart';
// import 'package:flutter/material.dart';
// import 'package:font_awesome_flutter/font_awesome_flutter.dart';
// import 'package:persistent_shopping_cart/model/cart_model.dart';
// import 'package:persistent_shopping_cart/persistent_shopping_cart.dart';

// class OrderAddress extends StatefulWidget {
//   const OrderAddress({super.key});

//   @override
//   State<OrderAddress> createState() => _OrderAddressState();
// }

// class _OrderAddressState extends State<OrderAddress> {
//   final TextEditingController _nameController = TextEditingController();
//   final TextEditingController _phoneController = TextEditingController();
//     final TextEditingController _emailController = TextEditingController();
//   final TextEditingController _addressController = TextEditingController();
//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//      appBar: MyAppBar(
//         title: 'Order Address',
//       ),
//       body: SingleChildScrollView(
//         child: Padding(
//           padding: EdgeInsets.all(24),
          
//           child: Column(children: [
//             TextFormField(
//                  controller: _nameController,
//                         decoration: InputDecoration(
//                             prefixIcon: Icon(FontAwesomeIcons.userLarge,),
//                             labelText: 'Name'),
//                       ),
//                       SizedBox(
//                         height: 16,
//                       ),
//                       TextFormField(
//                           controller: _emailController,
//                         decoration: InputDecoration(
//                             prefixIcon: Icon(FontAwesomeIcons.envelope),
//                             labelText:'Email'),
//                       ),
//                       SizedBox(
//                         height: 16,
//                       ),
//                       Row(
//                         children: [
//                           Expanded(
//                             child: TextFormField(
//                                 controller: _addressController,
//                               decoration: InputDecoration(
//                                   prefixIcon: Icon(FontAwesomeIcons.locationDot),
//                                   labelText: 'Address'),
//                             ),
//                           ),
//                           SizedBox(
//                             width: 16,
//                           ),
//                           Expanded(
//                             child: TextFormField(
//                           controller: _phoneController,
//                               decoration: InputDecoration(
//                                   prefixIcon: Icon(FontAwesomeIcons.mobile,),
//                                   labelText: 'Phone '),
//                             ),
//                           ),
//                         ],
//                       ),
//                        SizedBox(
//                         height: 16,
//                       ),
//                       ElevatedButton(onPressed: (){
//                          final shoppingCart = PersistentShoppingCart();
//                       Map<String, dynamic> cartData =
//                           shoppingCart.getCartData();
//                       List<PersistentShoppingCartItem> cartItems =
//                           cartData['cartItems'];
//                       double totalPrice = cartData['totalPrice'];
//                         Navigator.push(context, MaterialPageRoute(builder: (context)=>CheckoutPage(totalPrice: totalPrice)));
//                       }, child: Text('Save'))
//           ],),
//           ),
//       ),
//     );
//   }
// }