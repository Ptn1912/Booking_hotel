import 'package:booking_hotel/consts.dart';
import 'package:booking_hotel/controllers/checkoutController.dart';
import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:booking_hotel/widgets/billing_address_section.dart';
import 'package:booking_hotel/widgets/billing_amount_section.dart';
import 'package:booking_hotel/widgets/billing_payment_section.dart';
import 'package:booking_hotel/widgets/cart_items.dart';
import 'package:booking_hotel/widgets/success_page.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:get/get.dart';
import 'package:persistent_shopping_cart/model/cart_model.dart';

class CheckoutPage extends StatefulWidget {
  final double totalPrice;
  List<PersistentShoppingCartItem> cartItems;
  CheckoutPage({super.key, required this.totalPrice, required this.cartItems});

  @override
  State<CheckoutPage> createState() => _CheckoutWidgetState();
}

class _CheckoutWidgetState extends State<CheckoutPage> {
  final CheckoutController _checkoutController = Get.put(CheckoutController());
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _phoneController = TextEditingController();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _addressController = TextEditingController();
  late String totalPriceText = '${widget.totalPrice.toString()}';
  late String quantityText;
  late String productNameText;
  String selectedPaymentMethod = '';
  final _formKey = GlobalKey<FormState>();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: MyAppBar(
        title: 'Checkout',
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(TSize.defaultSpace),
          child: Form(
            key: _formKey,
            child: Column(
              children: [
                SizedBox(height: TSize.spaceBtnSection),
                Container(
                  padding: EdgeInsets.all(16),
                  decoration: BoxDecoration(
                    border: Border.all(color: iconColor),
                    borderRadius: BorderRadius.circular(16),
                  ),
                  child: Column(
                    children: [
                      for (var item in widget.cartItems)
                        TBillingAmountSection(
                          productName: item.productName,
                          quantity: item.quantity,
                        ),
                      SizedBox(height: 8),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(
                            'Order Total',
                            style: Theme.of(context).textTheme.bodyMedium,
                          ),
                          Text(
                            '\$${widget.totalPrice}',
                            style: Theme.of(context).textTheme.titleMedium,
                          ),
                        ],
                      ),
                      SizedBox(height: 16),
                      Divider(),
                      SizedBox(height: 16),
                      TBillingPaymentSection(onPaymentMethodSelected: (method) {
                        setState(() {
                          selectedPaymentMethod = method;
                        });
                      }),
                      SizedBox(height: 16),
                      TBillingAddressSection(),
                      SizedBox(height: 16),
                      TextFormField(
                        autovalidateMode: AutovalidateMode.onUserInteraction,
                        controller: _nameController,
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Name is required';
                          }
                          return null;
                        },
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                            
                              borderRadius: BorderRadius.circular(10)),
                          fillColor: Colors.grey.withOpacity(0.5),
                          prefixIcon: Icon(
                            FontAwesomeIcons.userLarge,
                          ),
                          labelText: 'Name',
                        ),
                      ),
                      SizedBox(height: 16),
                      TextFormField(
                        autovalidateMode: AutovalidateMode.onUserInteraction,
                        controller: _emailController,
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Email is required';
                          }
                          // Kiểm tra tính hợp lệ của email bằng biểu thức chính quy
                          if (!RegExp(
                                  r'\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b',
                                  caseSensitive: false)
                              .hasMatch(value)) {
                            return 'Invalid email address';
                          }
                          return null;
                        },
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(10)),
                          prefixIcon: Icon(FontAwesomeIcons.envelope),
                          labelText: 'Email',
                        ),
                      ),
                      SizedBox(height: 16),
                      TextFormField(
                        autovalidateMode: AutovalidateMode.onUserInteraction,
                        keyboardType: TextInputType.streetAddress,
                        controller: _addressController,
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Address is required';
                          }
                          return null;
                        },
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(10)),
                          prefixIcon: Icon(FontAwesomeIcons.locationDot),
                          labelText: 'Address',
                        ),
                      ),
                      SizedBox(height: 16),
                      TextFormField(
                        autovalidateMode: AutovalidateMode.onUserInteraction,
                        keyboardType: TextInputType.phone,
                        controller: _phoneController,
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Phone is required';
                          }
                          if (!RegExp(r'^[0-9]+$').hasMatch(value)) {
                            return 'Invalid phone number';
                          }
                          return null;
                        },
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(10)),
                          prefixIcon: Icon(FontAwesomeIcons.mobile),
                          labelText: 'Phone',
                        ),
                      ),
                    ],
                  ),
                ),
                SizedBox(height: TSize.spaceBtnSection),
              ],
            ),
          ),
        ),
      ),
      bottomNavigationBar: Padding(
        padding: const EdgeInsets.all(TSize.defaultSpace),
        child: ElevatedButton(
          onPressed: _handleCheckout,
          style: ElevatedButton.styleFrom(
            backgroundColor: Colors.lightBlue,
          ),
          child: Obx(() {
            return _checkoutController.isLoading.value
                ? CircularProgressIndicator(color: Colors.white)
                : Text(
                    'Total Price: \$${widget.totalPrice.toString()}',
                    style: TextStyle(color: Colors.white),
                  );
          }),
        ),
      ),
    );
  }

  void _handleCheckout() async {
     List<String> productNames = [];
      for (var item in widget.cartItems) {
        productNames.add(item.productName);
      }

      int totalQuantity = 0;
      int sum = 0;
      for (var item in widget.cartItems) {
        productNames.add(item.productName);
        sum += item.quantity;
      }
      totalQuantity = sum;
    if (_formKey.currentState!.validate()) {
      String name = _nameController.text.trim();
      String email = _emailController.text.trim();
      String phone = _phoneController.text.trim();
      String address = _addressController.text.trim();
      if (selectedPaymentMethod == null || selectedPaymentMethod.isEmpty) {
        showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              title: Text('Thông báo'),
              content: Text('Vui lòng chọn một phương thức thanh toán.'),
              actions: [
                TextButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text('Đóng'),
                ),
              ],
            );
          },
        );
        return;
      }
      await _checkoutController.checkout(
        name: name,
        email: email,
        phone: phone,
        address: address,
        productNames: productNames.join(','),
        totalPriceText: widget.totalPrice.toString(),
        quantities: totalQuantity,
        method: selectedPaymentMethod,
      );
    }
  }
}
