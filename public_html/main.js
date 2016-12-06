var toDoubleDigits = function(num) {
    num += "";
    if (num.length === 1) {
    num = "0" + num;
    }
    return num;
};
function showClock() {
  var nowTime = new Date();
  var nowYear = nowTime.getFullYear();
  var nowMonth = toDoubleDigits(nowTime.getMonth() + 1);
  var nowDay = toDoubleDigits(nowTime.getDate());
  var nowHour = toDoubleDigits(nowTime.getHours());
  var nowMin = toDoubleDigits(nowTime.getMinutes());
  var nowSec = toDoubleDigits(nowTime.getSeconds());
  var msg = nowYear +"年" + nowMonth + "月" + nowDay + "日 "+ nowHour + ":" + nowMin + ":" + nowSec + "";
  document.getElementById("ClockArea").innerHTML = msg;
  }
  setInterval('showClock()',1000);