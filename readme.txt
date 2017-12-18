Bảng book.price kiểu dữ liệu: decimal(10,2) do là sách T.A nên giá sẽ nhỏ.
Bảng orderbook thêm trường total: decimal(10,2) lưu tổng giá trị đơn hàng
Bảng customer thì 2 cột email, gender thì bỏ tùy chọn NOT NULL đi vì t không dùng 2 cái đấy

Thêm 2 function trong mysql:

CREATE DEFINER=`root`@`localhost` FUNCTION `insertOrderBook`($orderid int, $bookid int, $quantity int) RETURNS int(11)
BEGIN
	declare $cost float;
    set $cost = $quantity * (getPrice($bookid));
    insert into orderdetail values($bookid, $orderid, $quantity, $cost);
RETURN $cost;
END

------------------------------------

CREATE DEFINER=`root`@`localhost` FUNCTION `getPrice`($bookid int) RETURNS float
BEGIN
	declare $ret float;
	select price from book_brief_view where bookid=$bookid into $ret;
RETURN $ret;
END