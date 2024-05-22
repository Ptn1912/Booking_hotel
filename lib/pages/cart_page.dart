import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/pages/checkout_page.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/cart_items.dart';
import 'package:booking_hotel/widgets/empty_cart.dart';
import 'package:flutter/material.dart';
import 'package:persistent_shopping_cart/model/cart_model.dart';
import 'package:persistent_shopping_cart/persistent_shopping_cart.dart';

class CartScreen extends StatefulWidget {
  const CartScreen({super.key});

  @override
  State<CartScreen> createState() => _CartScreenState();
}

class _CartScreenState extends State<CartScreen> {
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: kcontentColor,
      appBar: MyAppBar(
        title: 'My cart',
      ),
      bottomSheet: Container(
        height: 190,
        width: double.infinity,
        decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.only(
              topRight: Radius.circular(35),
              topLeft: Radius.circular(35),
            )),
        padding: EdgeInsets.all(20),
        child: PersistentShoppingCart().showTotalAmountWidget(
          cartTotalAmountWidgetBuilder: (totalAmount) => Visibility(
            visible: totalAmount == 0.0 ? false : true,
            child: Column(
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    const Text(
                      'Total',
                      style: TextStyle(color: Colors.grey, fontSize: 18),
                    ),
                    Text(
                      r"$" + totalAmount.toString(),
                      style: const TextStyle(
                          fontWeight: FontWeight.bold, fontSize: 18),
                    ),
                  ],
                ),
                SizedBox(
                  height: 20,
                ),
                Divider(),
                SizedBox(
                  height: 20,
                ),
                ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      elevation: 0,
                      minimumSize: Size(327, 50),
                      backgroundColor: kPrimaryColor,
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.all(Radius.circular(50))),
                    ),
                    onPressed: () {
                      final shoppingCart = PersistentShoppingCart();
                      Map<String, dynamic> cartData =
                          shoppingCart.getCartData();
                      List<PersistentShoppingCartItem> cartItems =
                          cartData['cartItems'];
                      double totalPrice = cartData['totalPrice'];
                     
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) =>
                              CheckoutPage(totalPrice: totalPrice,cartItems:cartItems),
                        ),
                      );
                    },
                    child: const Text(
                      'Checkout',
                      style: TextStyle(color: kWhiteColor, fontSize: 18),
                    ))
              ],
            ),
          ),
        ),
      ),
      body: SafeArea(
        child: Padding(
            padding: EdgeInsets.symmetric(horizontal: 10),
            child: Column(
              children: [
                Expanded(
                  child: PersistentShoppingCart().showCartItems(
                    cartTileWidget: ({required data}) =>
                        CartTileWidget(data: data),
                    showEmptyCartMsgWidget: const EmptyCartMsgWidget(),
                  ),
                ),
              ],
            )),
      ),
    );
  }
}
