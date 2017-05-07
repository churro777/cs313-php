function product(title, itemKey, imgSrc, price, alt){
    this.title = title;
    this.itemKey = itemKey;
    this.imgSrc = imgSrc;
    this.price = price;
    this.alt = alt;
    this.createHTML = function(){
        var col = document.createElement("div");
        col.class = "col-xs--3";

        var itemDiv = document.createElement("div");
        itemDiv.class = "item";

        var row1 = document.createElement("div");
        row1.class = "row";

        var itemTitle = document.createElement("div");
        itemTitle.class = "itemTitle col-xs-12";
        itemTitle.innerText = this.title + " - $" + this.price;

        var row2 = document.createElement("div");
        row2.class = "row";

        var itemImgContainer = document.createElement("div");
        itemImgContainer.class = "itemImgContainer col-xs-offset-2 col-xs-8";

        var img = document.createElement("img");
        img.src = imgSrc;
        img.alt = alt;

        var row3 = document.createElement("div");
        row3.class = "row";

        var addToCart = document.createElement("a");
        addToCart.class = "addToCart col-xs-offset-3 col-xs-6";
        addToCart.href = "shop.php?item=" + this.itemKey;
        addToCart.innerText = "Add to Cart";

        row1.appendChild(itemTitle);

        itemImgContainer.appendChild(img);
        row2.appendChild(itemImgContainer);

        row3.appendChild(addToCart);

        item.appendChild(row1);
        item.appendChild(row2);
        item.appendChild(row3);

        col.appendChild(item);

    }
}
