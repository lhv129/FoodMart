function inNoiDung() {
    var printContents = document.getElementById("noiDungIn").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

document.querySelectorAll(".changeRole").forEach(function (select) {
    select.addEventListener("change", function () {
        this.form.submit();
    });
});
