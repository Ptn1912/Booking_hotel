import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:persistent_shopping_cart/model/cart_model.dart';
import 'package:persistent_shopping_cart/persistent_shopping_cart.dart';

class CartTileWidget extends StatelessWidget {
  final PersistentShoppingCartItem data;

  CartTileWidget({Key? key, required this.data}) : super(key: key);

  final PersistentShoppingCart _shoppingCart = PersistentShoppingCart();

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(20),
      margin: const EdgeInsets.only(top: 15),
      width: double.infinity,
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(10),
      ),
      child: Row(
        children: [
          Container(
            decoration: BoxDecoration(
              borderRadius: BorderRadius.all(Radius.circular(10)),
            ),
            child: Image.asset(
              'assets/images/room/${data.productThumbnail.toString()}',
              height:80,
              width: 100,
              fit: BoxFit.cover,
            ),
          ),
          const SizedBox(width: 10),
          Expanded(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text(
                      data.productName,
                      style: const TextStyle(
                          fontSize: 18,
                          fontWeight: FontWeight.w700,
                          ),
                    ),
                    InkWell(
                      onTap: () async {
                        bool removed =
                            await _shoppingCart.removeFromCart(data.productId);
                        if (removed) {
                          // Handle successful removal
                          showSnackBar(context, removed);
                        } else {
                          // Handle the case where if product was not found in the cart
                        }
                      },
                        child: Icon(FontAwesomeIcons.trash,color: Colors.red,size: 20,),
                     
                    )
                  ],
                ),
                SizedBox(height: 20,),
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text(
                      "\$ ${data.unitPrice}",
                      style: TextStyle(color: Colors.orange),
                      
                    ),
                    const SizedBox(width: 20),
                    InkWell(
                onTap: () {
                  _shoppingCart.incrementCartItemQuantity(data.productId);
                },
                child: Container(
                  padding: const EdgeInsets.all(2),
                  decoration: BoxDecoration(
                    color: Colors.grey.withOpacity(.2),
                    borderRadius: BorderRadius.circular(20),
                  ),
                  child: const Icon(Icons.add),
                ),
              ),
              Text(
                data.quantity.toString(),
                style: Theme.of(context).textTheme.bodyLarge,
              ),
              InkWell(
                onTap: () {
                  _shoppingCart.decrementCartItemQuantity(data.productId);
                },
                child: Container(
                  padding: const EdgeInsets.all(2),
                  decoration: BoxDecoration(
                    color: Colors.grey.withOpacity(.2),
                    borderRadius: BorderRadius.circular(20),
                  ),
                  child: const Icon(Icons.remove),
                ),
              )
                  ],
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
  void showSnackBar(BuildContext context, bool removed) {
    final snackBar = SnackBar(
      content: Text(
        removed
            ? 'Product removed from cart.'
            : 'Product not found in the cart.',
      ),
      backgroundColor: removed ? Colors.green : Colors.red,
      duration: const Duration(seconds: 1),
    );
    ScaffoldMessenger.of(context).showSnackBar(snackBar);
  }
}
