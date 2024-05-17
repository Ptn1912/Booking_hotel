import 'package:booking_hotel/consts.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class TOrderListItem extends StatelessWidget {
  const TOrderListItem({super.key});

  @override
  Widget build(BuildContext context) {
    return ListView.separated(
      shrinkWrap: true,
      itemCount: 5,
      separatorBuilder: (_,index)=>const SizedBox(height: 13,),
      itemBuilder: (_,index)=>
       Container(
        color: kWhiteColor,
        padding: EdgeInsets.all(16),
         child: Column(
         mainAxisSize: MainAxisSize.min,
      children: [
      Row(
        children: [
          Icon(FontAwesomeIcons.ship),
          SizedBox(width: 10,),
          Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
         Text('Processing',style: Theme.of(context).textTheme.bodyLarge!.apply(color: kTextColor,fontWeightDelta: 1)),
         Text('07 Nov 2024',style: Theme.of(context).textTheme.headlineSmall,)
            ],
          )
        ],
      ),
      Row(
        children: [
          Row(
            children: [
              Icon(FontAwesomeIcons.ship),
              SizedBox(width: 10,),
              Expanded(
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                             Text('Order',style: Theme.of(context).textTheme.labelMedium),
                             Text('07 Nov 2024',style: Theme.of(context).textTheme.titleMedium,)
                  ],
                ),
              ),
            ],
          ),
          //  Row(
          //   children: [
          //     Icon(FontAwesomeIcons.ship),
          //     SizedBox(width: 10,),
          //     Expanded(
          //       child: Column(
          //         mainAxisSize: MainAxisSize.min,
          //         crossAxisAlignment: CrossAxisAlignment.start,
          //         children: [
          //                    Text('Order',style: Theme.of(context).textTheme.labelMedium),
          //                    Text('07 Nov 2024',style: Theme.of(context).textTheme.titleMedium,)
          //         ],
          //       ),
          //     ),
          //   ],
          // ),
        ],
      )
         ],),
      ),
    );
  }
}