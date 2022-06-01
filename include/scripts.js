function toTop() {
    document.body.scrollTop = 0;
};
function scoreSelect(side){
    var S1 = document.getElementById("s1");
    var S2 = document.getElementById("s2");
    var S3 = document.getElementById("s3");
    var S1c = getComputedStyle(S1);
    var S3c = getComputedStyle(S3);
    if(side == "l" && S1c.backgroundColor != "rgb(40, 40, 43)"){
        S1.style.backgroundColor = "#28282B";
        S2.style.backgroundColor = "#28282B";
        S3.style.backgroundColor = "#D2042D";
    } else if(side == "r" && S3c.backgroundColor != "rgb(40, 40, 43)"){
        S1.style.backgroundColor = "#D2042D";
        S2.style.backgroundColor = "#28282B";
        S3.style.backgroundColor = "#28282B";
    }
}