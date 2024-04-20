import 'package:riverpod_annotation/riverpod_annotation.dart';

import 'package:booking_hotel/models/hotel_model.dart';
import 'package:booking_hotel/repositories/hotel_repository.dart';

part 'selected_hotel_provider.g.dart';

@riverpod
class SelectedHotel extends _$SelectedHotel {
  @override
  Future<HotelModel> build() async {
    final HotelRepository hotelRepository = ref.watch(hotelRepositoryProvider);
    return await hotelRepository.getHotel('0.5');
  }

  void setSelectedHotel(hotelId) async {
    final HotelRepository hotelRepository = ref.watch(hotelRepositoryProvider);
    state = AsyncValue.data(
      await hotelRepository.getHotel(hotelId),
    );
  }
}
