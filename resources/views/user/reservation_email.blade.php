<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <p>Xin chào {{ $reservate->reservate_name }},</p>
    <p>Cảm ơn bạn đã đặt hàng. Dưới đây là các thông tin đơn hàng của bạn:</p>

    <!-- Hiển thị các thông tin đơn hàng -->
    <p>Email: {{ $reservate->reservate_email }}</p>
    <p>Địa chỉ: {{ $reservate->reservate_address }}</p>
    <p>Điện thoại: {{ $reservate->reservate_phone }}</p>
    <p>Loại phòng: {{ $bookdetails->room_type }}</p>
    <p>Số ngày ở: {{  $bookdetails->quantity }}</p>
    <p>Tổng tiền: {{ $reservate->total_momo }}</p>

    <!-- Thêm thông tin khác nếu cần -->

    <p>Cảm ơn bạn đã mua hàng!</p>
</body>
</html>
