// オンライン中のユーザーをsetTimeout関数でN秒ごとに取得
var countup = function(){
$("#lawyer").empty();
$(document).ready(function(){
  // /**
  // * Ajax通信メソッド
  // * @param type
  // * @param url
  // * @param dataType
  // ** /
  $.ajax({
  type: "POST",
  url: 'json.php',
  dataType: "json",

  success: function(data, dataType)
  {

    var $content = $('#lawyer');
    if(data == null)
    　$content.append("<li>只今、ログイン中の弁護士はいません</li>");

    for (var i = 0; i<data.length; i++)
    {
      $content.append("<li>" + data[i].name + "弁護士</li>");
    }
  },
  error: function(XMLHttpRequest, textStatus, errorThrown)
  {
    alert('Error : ' + errorThrown);
  }
});
});
// mysql呼び出しの時間
setTimeout(countup, 2000);
}
countup();