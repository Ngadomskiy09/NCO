var perm = $("h1[class=disappear]").html();

console.log(perm);

switch (perm) {
    case "Ope":
        $(".ope").removeAttr("readonly");
    case "Lay":
        $(".lay").removeAttr("readonly");
    case "Tea":
        $(".tea").removeAttr("readonly");
}