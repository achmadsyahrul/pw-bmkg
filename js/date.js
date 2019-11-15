function startTime(){
    var today = new Date();
    var day = today.getDay();
    var dd = today.getDate();
    var mm = today.getMonth();
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    dd = checkTime(dd);
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    // if (dd < 10) {
    //     dd = '0' + dd;
    // }
    if (day == 1){
        day = "Senin"
    }
    if (day == 2){
        day = "Selasa"
    }
    if (day == 3){
        day = "Rabu"
    }
    if (day == 4){
        day = "Kamis"
    }
    if (day == 5){
        day = "Jum'at"
    }
    if (day == 6){
        day = "Sabtu"
    }
    if (day == 7){
        day = "Minggu"
    }
    if (mm == 0) {
        mm = "Jan"
    }
    if (mm == 1) {
        mm = "Feb"
    }
    if (mm == 2) {
        mm = "Mar"
    }
    if (mm == 3) {
        mm = "Apr"
    }
    if (mm == 4) {
        mm = "Mei"
    }
    if (mm == 5) {
        mm = "Jun"
    }
    if (mm == 6) {
        mm = "Jul"
    }
    if (mm == 7) {
        mm = "Agu"
    }
    if (mm == 8) {
        mm = "Sep"
    }
    if (mm == 9) {
        mm = "Okt"
    }
    if (mm == 10) {
    mm = "Nov"
    } 
    if (mm == 11) {
        mm = "Des"
    }
    var date = day + ', ' + dd + ' ' + mm + ' ' + yyyy + ' ' + h + ':' + m + ':' + s;
    document.getElementById("date").innerHTML = date;
    setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}