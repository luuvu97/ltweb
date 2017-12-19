$("input[name='updateCart']").click(function(){
    var tmp = "";
    var list = document.getElementsByName('quantity');
    for(i = 0; i < list.length; i++){
        tmp += "bookid" + i + "=" + list[i].getAttribute('data');
        tmp += "&quantity" + i + "=" + list[i].innerText;
        if(i != list.length - 1){
            tmp += "&";
        }
    }
    var url = "updateCart.php?" + tmp;
    window.location.replace(url);
});

$("input[name='emptyCart']").click(function(){
    window.location.replace('emptyCart.php');
});  

$("div .add").click(function(){
    var bookid = $(this).attr('name');
    var tmp = "#quantity" + bookid;
    var lastQuantity = parseInt($(tmp).text());
    var newQuantity = lastQuantity + 1;
    $(tmp).text(newQuantity);
    tmp = "#price" + bookid;
    var price = parseFloat($(tmp).text());
    var amount = price * newQuantity;
    tmp = "#amount" + bookid;
    $(tmp).text(amount);
    tmp = "#total";
    var lastTotal = parseFloat($(tmp).text());
    var newToatl = lastTotal + price;
    $(tmp).text(newToatl);
});

$("div .minus").click(function(){
    var bookid = $(this).attr('name');
    var tmp = "#quantity" + bookid;
    var lastQuantity = parseInt($(tmp).text());
    var newQuantity = lastQuantity - 1;
    if(newQuantity < 0){
        alert("Cannot minus");
    }else{
        $(tmp).text(newQuantity);
        tmp = "#price" + bookid;
        var price = parseFloat($(tmp).text());
        var amount = price * newQuantity;
        tmp = "#amount" + bookid;
        $(tmp).text(amount);
        tmp = "#total";
        var lastTotal = parseFloat($(tmp).text());
        var newToatl = lastTotal - price;
        $(tmp).text(newToatl);
    }
});

$(document).ready(function(){
    $("div[name='customerInfo']").hide();
});

$("input[name='placeOrder']").click(function(){
    $("div[name='customerInfo']").show();
    $("input[name='name']").focus();    
});

$("input[name='sentOrder']").click(function(){
    if(!$("input[name='name']").val()){
        $("input[name='name']").focus();
        alert('Please fill your name!');
    }
    else if(!$("input[name='phone']").val()){
        $("input[name='phone']").focus();
        alert('Please fill your phone');
    }
    else if(!$("textarea[name='address']").val()){
        $("input[name='address']").focus();
        alert('Please fill your address');        
    }
    else if(!(parseInt($("input[name='phone']").val()) != NaN && ($("input[name='phone']").val().length == 10 || $("input[name='phone']").val() == 11))){
        $("input[name='phone']").focus();
        alert('You input wrong phone number type. Phone number have 10 or 11 digit from 0 to 9');
    }
    else if(confirm("Please make sure all your information is correct")){
        var tmp = "sendOrder.php";
        tmp += "?name=" + $("input[name='name']").val();
        tmp += "&phone=" + $("input[name='phone']").val();
        tmp += "&address=" + $("textarea[name='address']").val();
        window.location.replace(tmp);    
    }
});

$("a[name='remove']").click(function(){
    var bookid = $(this).attr('data');
    var tmp = "#quantity" + bookid;
    var qty = parseInt($(tmp).text());
    $(tmp).text("0");
    tmp = "#amount" + bookid;
    $(tmp).text("0");
    tmp = "#price" + bookid;
    var price = parseFloat($(tmp).text());
    tmp = "#total";
    var lastTotal = parseFloat($(tmp).text());
    var newToatl = lastTotal - price * qty;
    $(tmp).text(newToatl);    
});