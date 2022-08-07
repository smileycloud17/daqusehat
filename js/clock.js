// Analog Jam
const deg = 6;
const hr = document.querySelector('#hr');
const mn = document.querySelector('#mn');
const sc = document.querySelector('#sc');

setInterval(() => {

  let day = new Date();
  let jamm = day.getHours() * 30;
  let menitt = day.getMinutes() * deg;
  let detikk = day.getSeconds() * deg;

  hr.style.transform = `rotateZ(${(jamm)+(menitt/12)}deg)`;
  mn.style.transform = `rotateZ(${menitt}deg)`;
  sc.style.transform = `rotateZ(${detikk}deg)`;
});

// tanggal hari 
function updateHari() {
  var sekarang = new Date();
  var hari = sekarang.getDay(),
    bulan = sekarang.getMonth(),
    tgl = sekarang.getDate(),
    tahun = sekarang.getFullYear();

  var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
  var ids = ["dayname", "month", "daynum", "year"];
  var values = [week[hari], months[bulan], tgl, tahun];
  for (var i = 0; i < ids.length; i++)
    document.getElementById(ids[i]).firstChild.nodeValue = values[i];
}

function harian() {
  updateHari();
  window.setInterval("updateHari()", 1)
}