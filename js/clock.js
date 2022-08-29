var Format = 1,
    TimeHolder = 0,
    StopChecker = 0;

function resetTimer() {
    $(".S1").removeClass().addClass("NumberHolder S1 show0");
    $(".S2").removeClass().addClass("NumberHolder S2 show0");

    $(".M1").removeClass().addClass("NumberHolder M1 show0");
    $(".M2").removeClass().addClass("NumberHolder M2 show0");

    $(".H1").removeClass().addClass("NumberHolder H1 show0");
    $(".H2").removeClass().addClass("NumberHolder H2 show0");
}

function SetDay(DD) {
    $(".WeekDays span:nth-child(" + ((DD + 2) % 7) + ")").addClass("active");
}

function Run24hr(S1, S2, M1, M2, H1, H2) {
    $(".S1")
        .removeClass()
        .addClass("NumberHolder S1 show" + S1);
    $(".S2")
        .removeClass()
        .addClass("NumberHolder S2 show" + S2);

    $(".M1")
        .removeClass()
        .addClass("NumberHolder M1 show" + M1);
    $(".M2")
        .removeClass()
        .addClass("NumberHolder M2 show" + M2);

    $(".H1")
        .removeClass()
        .addClass("NumberHolder H1 show" + H1);
    $(".H2")
        .removeClass()
        .addClass("NumberHolder H2 show" + H2);
}

function Run12hr(S1, S2, M1, M2, HH) {
    if (HH > 12) {
        HH = HH - 12;
        $(".Formats span:nth-child(2)").addClass("active");
    } else {
        $(".Formats span:nth-child(1)").addClass("active");
    }
    var H1 = Math.floor(HH / 10),
        H2 = HH % 10;

    $(".S1")
        .removeClass()
        .addClass("NumberHolder S1 show" + S1);
    $(".S2")
        .removeClass()
        .addClass("NumberHolder S2 show" + S2);

    $(".M1")
        .removeClass()
        .addClass("NumberHolder M1 show" + M1);
    $(".M2")
        .removeClass()
        .addClass("NumberHolder M2 show" + M2);

    if (H1 === 0) {
        $(".H1").fadeOut(0);
    } else {
        $(".H1")
            .fadeIn()
            .removeClass()
            .addClass("NumberHolder H1 show" + H1);
    }
    $(".H2")
        .removeClass()
        .addClass("NumberHolder H2 show" + H2);
}

function Stopwatch(TimeHolder) {
    var HH = Math.floor(TimeHolder / 3600),
        MM = Math.floor((TimeHolder - HH * 3600) / 60),
        SS = Math.floor(TimeHolder - HH * 3600 - MM * 60);

    var S1 = Math.floor(SS / 10),
        S2 = SS % 10,
        M1 = Math.floor(MM / 10),
        M2 = MM % 10,
        H1 = Math.floor(HH / 10),
        H2 = HH % 10;

    Run24hr(S1, S2, M1, M2, H1, H2);
}

function update_time() {
    var dt = new Date(),
        HH = dt.getHours(),
        MM = dt.getMinutes(),
        SS = dt.getSeconds(),
        DD = dt.getDay();
    SetDay(DD);

    var S1 = Math.floor(SS / 10),
        S2 = SS % 10,
        M1 = Math.floor(MM / 10),
        M2 = MM % 10,
        H1 = Math.floor(HH / 10),
        H2 = HH % 10;

    if (Format === 1) {
        Run24hr(S1, S2, M1, M2, H1, H2);
    } else if (Format === 2) {
        Run12hr(S1, S2, M1, M2, HH);
    } else if (Format === 3 && StopChecker === 0) {
        TimeHolder++;
        Stopwatch(TimeHolder);
    } else if (Format === 4 && StopChecker === 0) {
        TimeHolder--;
        if (TimeHolder === 0) {
            AlarmOut();
        } else {
            Stopwatch(TimeHolder);
        }
    }

    setTimeout(update_time, 1000);
}

$(".Type span").on("click", function () {
    $(".Type .active").removeClass("active");
    $(this).addClass("active");
    var T = $(this).html();
    if (T === "24hr") {
        Format = 1;
        $(".H1").fadeIn();
        $(".Formats span").removeClass("active");
    } else {
        Format = 2;
    }
});

update_time();


// Tanggal Bulan Taun

function updatehari() {
    var now = new Date();

    var harian = now.getDay(),
        tanggalan = now.getDate(),
        bulanan = now.getMonth(),
        taunan = now.getFullYear();

    var bulann = ["Januari", "Feburuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var minggu = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    var ids = ["hari", "tanggal", "bulan", "tahun"];
    var values = [minggu[harian], tanggalan, bulann[bulanan], taunan];
    for (var i = 0; i < ids.length; i++)
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];

}

function initcalender() {
    updatehari();
    window.setInterval("updatehari()", 1);
}