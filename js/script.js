const body = document.querySelector("body"),
  navigasi = body.querySelector(".navigasi"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text"),
  darkTheme = localStorage.getItem("gelap");

if (darkTheme)
  body.classList.add("dark");

modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark");

  if (body.classList.contains("dark")) {
    modeText.innerText = "Light Mode"
    localStorage.setItem("gelap", false);
  } else {
    modeText.innerText = "Dark Mode"
    localStorage.removeItem("gelap");
  }
});

let profilemenu = document.querySelector('.profilemenu');
let sub = document.querySelector('.sub');

profilemenu.addEventListener("click", () => {
  sub.classList.toggle('newsub');
});



// FUngsi Mata Batin Pada form edit profil
function matabatinn() {
  var x = document.getElementById("passusr");
  var y = document.getElementById("hide1");
  var z = document.getElementById("hide2");

  if (x.type === 'password') {
    x.type = "text";
    y.style.marginTop = "13";
    y.style.display = "inline";
    z.style.display = "none";
  } else {
    x.type = "password";
    y.style.display = "none";
    z.style.display = "inline";
  }
};

function matamataa() {
  var n = document.getElementById("consusr");
  var m = document.getElementById("hide3");
  var d = document.getElementById("hide4");

  if (n.type === 'password') {
    n.type = "text";
    m.style.display = "inline";
    d.style.display = "none";
  } else {
    n.type = "password";
    m.style.display = "none";
    d.style.display = "inline";
  }
};

//FORM CHECK Lemak
function lemakdsbl() {
  // check
  if (document.getElementById("lemak").checked == true) {
    document.getElementById("sublemak").style.display = "";
    document.getElementById("formlemak").style.display = "";
  } else {
    document.getElementById("sublemak").style.display = "none";
    document.getElementById("formlemak").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }

  // input
  if (document.getElementById("kolesterol").checked == true) {
    document.getElementById("kolesterolhasil").style.display = "";
  } else {
    document.getElementById("kolesterolhasil").style.display = "none";
  }

  if (document.getElementById("tryglyceride").checked == true) {
    document.getElementById("tryglyceridehasil").style.display = "";
  } else {
    document.getElementById("tryglyceridehasil").style.display = "none";
  }

  if (document.getElementById("hdl").checked == true) {
    document.getElementById("hdlhasil").style.display = "";
  } else {
    document.getElementById("hdlhasil").style.display = "none";
  }

  if (document.getElementById("ldl").checked == true) {
    document.getElementById("ldlhasil").style.display = "";
  } else {
    document.getElementById("ldlhasil").style.display = "none";
  }
}

//FORM CHECK Urinalisa
function urinalisadsbl() {
  // check
  if (document.getElementById("urinalisa").checked == true) {
    document.getElementById("suburinalisa").style.display = "";
    document.getElementById("formurinalisa").style.display = "";
  } else {
    document.getElementById("suburinalisa").style.display = "none";
    document.getElementById("formurinalisa").style.display = "none";

    document.getElementById("urine").checked = false;
    document.getElementById("teskehamilan").checked = false;
    document.getElementById("microalbumin").checked = false;
  }

  // input
  if (document.getElementById("urine").checked == true) {
    document.getElementById("urinehasil").style.display = "";
  } else {
    document.getElementById("urinehasil").style.display = "none";
  }

  if (document.getElementById("teskehamilan").checked == true) {
    document.getElementById("teshamilhasil").style.display = "";
  } else {
    document.getElementById("teshamilhasil").style.display = "none";
  }

  if (document.getElementById("microalbumin").checked == true) {
    document.getElementById("microalbuminhasil").style.display = "";
  } else {
    document.getElementById("microalbuminhasil").style.display = "none";
  }
}

//FORM CHECK kdd
function kdddsbl() {
  // check
  if (document.getElementById("kdd").checked == true) {
    document.getElementById("subkdd").style.display = "";
    document.getElementById("formkdd").style.display = "";
  } else {
    document.getElementById("subkdd").style.display = "none";
    document.getElementById("formkdd").style.display = "none";

    document.getElementById("grukosap").checked = false;
    document.getElementById("grukosapp").checked = false;
    document.getElementById("grukosas").checked = false;
    document.getElementById("hba1c").checked = false;
  }

  // input
  if (document.getElementById("grukosap").checked == true) {
    document.getElementById("gruphasil").style.display = "";
  } else {
    document.getElementById("gruphasil").style.display = "none";
  }

  if (document.getElementById("grukosapp").checked == true) {
    document.getElementById("grupphasil").style.display = "";
  } else {
    document.getElementById("grupphasil").style.display = "none";
  }

  if (document.getElementById("grukosas").checked == true) {
    document.getElementById("grushasil").style.display = "";
  } else {
    document.getElementById("grushasil").style.display = "none";
  }

  if (document.getElementById("hba1c").checked == true) {
    document.getElementById("hba1chasil").style.display = "";
  } else {
    document.getElementById("hba1chasil").style.display = "none";
  }
}

//FORM CHECK faalginjal
function faalginjaldsbl() {
  // check
  if (document.getElementById("faalginjal").checked == true) {
    document.getElementById("subfaalginjal").style.display = "";
    document.getElementById("formfaalginjal").style.display = "";
  } else {
    document.getElementById("subfaalginjal").style.display = "none";
    document.getElementById("formfaalginjal").style.display = "none";

    document.getElementById("ureum").checked = false;
    document.getElementById("creatin").checked = false;
    document.getElementById("uric").checked = false;
  }

  // input
  if (document.getElementById("ureum").checked == true) {
    document.getElementById("ureumhasil").style.display = "";
  } else {
    document.getElementById("ureumhasil").style.display = "none";
  }

  if (document.getElementById("creatin").checked == true) {
    document.getElementById("creatinhasil").style.display = "";
  } else {
    document.getElementById("creatinhasil").style.display = "none";
  }

  if (document.getElementById("uric").checked == true) {
    document.getElementById("urichasil").style.display = "";
  } else {
    document.getElementById("urichasil").style.display = "none";
  }
}

//FORM CHECK fk
function fkdsbl() {
  // check
  if (document.getElementById("fk").checked == true) {
    document.getElementById("subfk").style.display = "";
    document.getElementById("formfk").style.display = "";
  } else {
    document.getElementById("subfk").style.display = "none";
    document.getElementById("formfk").style.display = "none";

    document.getElementById("waktudarah").checked = false;
    document.getElementById("waktubeku").checked = false;
  }

  // input
  if (document.getElementById("waktudarah").checked == true) {
    document.getElementById("waktudarahhasil").style.display = "";
  } else {
    document.getElementById("waktudarahhasil").style.display = "none";
  }

  if (document.getElementById("waktubeku").checked == true) {
    document.getElementById("waktubekuhasil").style.display = "";
  } else {
    document.getElementById("waktubekuhasil").style.display = "none";
  }
}

//FORM CHECK hematologi
function hematologidsbl() {
  // check
  if (document.getElementById("hematologi").checked == true) {
    document.getElementById("formhematologi").style.display = "";
  } else {
    document.getElementById("formhematologi").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }
}

//FORM CHECK narkoba
function narkobadsbl() {
  // check
  if (document.getElementById("narkoba").checked == true) {
    document.getElementById("formnarkoba").style.display = "";
  } else {
    document.getElementById("formnarkoba").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }
}

//FORM CHECK narkoba
function narkobadsbl() {
  // check
  if (document.getElementById("narkoba").checked == true) {
    document.getElementById("formnarkoba").style.display = "";
  } else {
    document.getElementById("formnarkoba").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }
}

//FORM CHECK WIDAL
function widaldsbl() {
  // check
  if (document.getElementById("widal").checked == true) {
    document.getElementById("formwidal").style.display = "";
  } else {
    document.getElementById("formwidal").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }
}

//FORM CHECK FAAL HATI
function faalhatidsbl() {
  // check
  if (document.getElementById("faalhati").checked == true) {
    document.getElementById("formfaalhati").style.display = "";
  } else {
    document.getElementById("formfaalhati").style.display = "none";

    document.getElementById("kolesterol").checked = false;
    document.getElementById("tryglyceride").checked = false;
    document.getElementById("hdl").checked = false;
    document.getElementById("ldl").checked = false;
  }
}

$(document).ready(function () {

  // sembunyikan form kabupaten, kecamatan dan desa
  $("#form_kab").prop("disabled", true);;
  $("#form_kec").prop("disabled", true);;
  $("#form_des").prop("disabled", true);;
  // $("#form_prov").select2();
  
  // $("#form_prov").select2({
  //   placeholder: 'Pilih Provinsi',
  //   allowClear: true
  // });
  // $("#form_kab").select2();
  
  // $("#form_kab").select2({
  //   placeholder: 'Pilih Provinsi',
  //   allowClear: true
  // });

  // ambil data kabupaten ketika data memilih provinsi
  $('body').on("change", "#form_prov", function () {
    var id = $(this).val();
    var data = "id=" + id + "&data=kabupaten";
    $.ajax({
      type: 'POST',
      url: "get_daerah.php",
      data: data,
      success: function (hasil) {
        $("#form_kab").html(hasil);
        $("#form_kab").prop("disabled", false);
        $("#form_kec").prop("disabled", true);
        $("#form_des").prop("disabled", true);
      }
    });
  });

  // ambil data kecamatan/kota ketika data memilih kabupaten
  $('body').on("change", "#form_kab", function () {
    var id = $(this).val();
    var data = "id=" + id + "&data=kecamatan";
    $.ajax({
      type: 'POST',
      url: "get_daerah.php",
      data: data,
      success: function (hasil) {
        $("#form_kec").html(hasil);
        $("#form_kec").prop("disabled", false);
        $("#form_des").prop("disabled", true);
      }
    });
  });

  // ambil data desa ketika data memilih kecamatan/kota
  $('body').on("change", "#form_kec", function () {
    var id = $(this).val();
    var data = "id=" + id + "&data=desa";
    $.ajax({
      type: 'POST',
      url: "get_daerah.php",
      data: data,
      success: function (hasil) {
        $("#form_des").html(hasil);
        $("#form_des").prop("disabled", false);
      }
    });
  });

});


