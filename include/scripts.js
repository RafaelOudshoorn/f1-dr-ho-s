function toTop() {
    document.body.scrollTop = 0;
};
function scoreSelect(block){
    var S = document.getElementById("s");
    var T1 = document.getElementById("t1");
    var T2 = document.getElementById("t2");
    var T3 = document.getElementById("t3");
    var T4 = document.getElementById("t4");
    switch (block){
        case 1:
            S.style.marginLeft = "0%";
            T1.style.display = "table";
            T2.style.display = "none";
            T3.style.display = "none";
            T4.style.display = "none";
            break;
        case 2:
            S.style.marginLeft = "25%";
            T1.style.display = "none";
            T2.style.display = "table";
            T3.style.display = "none";
            T4.style.display = "none";
            break;
        case 3:
            S.style.marginLeft = "50%";
            T1.style.display = "none";
            T2.style.display = "none";
            T3.style.display = "table";
            T4.style.display = "none";
            break;
        case 4:
            S.style.marginLeft = "75%";
            T1.style.display = "none";
            T2.style.display = "none";
            T3.style.display = "none";
            T4.style.display = "table";
            break;
    }
}