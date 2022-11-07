window.setTimeout("waktu()", 1000);
function waktu() {
    let tanggal = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = tanggal.getHours();
    document.getElementById("menit").innerHTML = tanggal.getMinutes();
    document.getElementById("detik").innerHTML = tanggal.getSeconds();
}
