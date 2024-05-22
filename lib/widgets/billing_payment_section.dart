import 'package:booking_hotel/consts.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class TBillingPaymentSection extends StatefulWidget {
  final Function(String) onPaymentMethodSelected;

  const TBillingPaymentSection({
    Key? key,
    required this.onPaymentMethodSelected,
  }) : super(key: key);

  @override
  State<TBillingPaymentSection> createState() => _TBillingPaymentSectionState();
}

class _TBillingPaymentSectionState extends State<TBillingPaymentSection> {
  String selectedPaymentMethod = '';

  void selectPaymentMethod(String method) {
    setState(() {
      selectedPaymentMethod = method;
    });

    widget.onPaymentMethodSelected(selectedPaymentMethod);
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            Text(
              'Payment Method',
              style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
              maxLines: 1,
              overflow: TextOverflow.ellipsis,
            ),
            TextButton(
                onPressed: () {
                  showModalBottomSheet(
                      context: context,
                      builder: (BuildContext context) {
                        return Padding(
                          padding: const EdgeInsets.only(left: 20.0, top: 20),
                          child: Center(
                            child: Column(
                              children: [
                                Text(
                                  'Select Payment Method',
                                  style: TextStyle(
                                      fontWeight: FontWeight.bold,
                                      fontSize: 20),
                                ),
                                SizedBox(
                                  height: 30,
                                ),
                                ListTile(
                                  onTap: () {
                                    setState(() {
                                      selectedPaymentMethod = 'Paypal';
                                    });
                                    widget.onPaymentMethodSelected(
                                        selectedPaymentMethod);
                                    Navigator.pop(context);
                                  },
                                  leading: Container(
                                    width: 80,
                                    height: 70,
                                    decoration: BoxDecoration(
                                        color: kWhiteColor,
                                        borderRadius:
                                            BorderRadius.circular(16)),
                                    child: Image(
                                      image: AssetImage(
                                          "assets/images/payment/paypal.png"),
                                      fit: BoxFit.contain,
                                    ),
                                  ),
                                  title: Text(
                                    'Paypal',
                                    style: TextStyle(
                                        fontSize: 18,
                                        fontWeight: FontWeight.bold),
                                  ),
                                ),
                                SizedBox(
                                  height: 15,
                                ),
                                ListTile(
                                  onTap: () {
                                    setState(() {
                                      selectedPaymentMethod = 'Momo';
                                    });
                                    widget.onPaymentMethodSelected(
                                        selectedPaymentMethod);
                                    Navigator.pop(context);
                                  },
                                  leading: Container(
                                    width: 80,
                                    height: 60,
                                    decoration: BoxDecoration(
                                        color: kWhiteColor,
                                        borderRadius:
                                            BorderRadius.circular(16)),
                                    child: Image(
                                      image: AssetImage(
                                          "assets/images/payment/momo.png"),
                                      fit: BoxFit.contain,
                                    ),
                                  ),
                                  title: Text(
                                    'Momo',
                                    style: TextStyle(
                                        fontSize: 18,
                                        fontWeight: FontWeight.bold),
                                  ),
                                ),
                                SizedBox(
                                  height: 15,
                                ),
                                ListTile(
                                  onTap: () {
                                    setState(() {
                                      selectedPaymentMethod = 'Credit Card';
                                    });
                                    widget.onPaymentMethodSelected(
                                        selectedPaymentMethod);
                                    Navigator.pop(context);
                                  },
                                  leading: Container(
                                    width: 80,
                                    height: 60,
                                    decoration: BoxDecoration(
                                        color: kWhiteColor,
                                        borderRadius:
                                            BorderRadius.circular(16)),
                                    child: Icon(FontAwesomeIcons.creditCard),
                                  ),
                                  title: Text(
                                    'Credit Card',
                                    style: TextStyle(
                                        fontSize: 18,
                                        fontWeight: FontWeight.bold),
                                  ),
                                ),
                              ],
                            ),
                          ),
                        );
                      });
                },
                child: const Text("Change"))
          ],
        ),
        SizedBox(
          height: 8,
        ),
        Row(
          children: [
            Container(
              width: 80,
              height: 60,
              decoration: BoxDecoration(
                  color: kWhiteColor, borderRadius: BorderRadius.circular(16)),
              child: selectedPaymentMethod == 'Paypal'
                  ? Image(
                      image: AssetImage("assets/images/payment/paypal.png"),
                      fit: BoxFit.contain,
                    )
                  : selectedPaymentMethod == 'Momo'
                      ? Image(
                          image: AssetImage("assets/images/payment/momo.png"),
                          fit: BoxFit.contain,
                        )
                      : Icon(FontAwesomeIcons.creditCard),
            ),
            SizedBox(width: 8),
            Text(
              selectedPaymentMethod.isNotEmpty
                  ? selectedPaymentMethod
                  : 'Select a payment method',
              style: Theme.of(context).textTheme.bodyText1,
            ),
            SizedBox(width: 10),
          ],
        ),
      ],
    );
  }
}
