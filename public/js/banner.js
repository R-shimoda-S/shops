
const img = ["/png/new.png", "/png/sale.png"];

let count = -1;

bannerChange();

function bannerChange() {

    count++;
    if (count == img.length) {
        count = 0;
    }
    pic.src = img[count];

    setTimeout("bannerChange()", 2000);
}