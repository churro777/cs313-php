function cleanShop(){
    console.log("cleaning shop");
    var shop = document.getElementById("shop");
    for(i = 0; shop.childElementCount; i++){
        shop.removeChild(shop.childNodes[0]);
    }
}

var dicePrice = 2;
var metalDicePrice = 5;
var woodDiceTower = 12;
var specialtyDiceTower = 20;
var standardMini = 8;
var rareMini = 15;

var diceProducts = [
    new product("Blue Dice",        "blueDice",             "blue.jpg",                 dicePrice,      "dice"),
    new product("Copper Dice",      "copperDice",           "copper.png",               metalDicePrice, "dice"),
    new product("Five Sets",        "setOfFive",            "fiveWithBags.jpg",         10,             "dice"),
    new product("Green & Gold",     "greenGold",            "greenGold.jpg",            dicePrice,      "dice"),
    new product("Lime Dice",        "limeDice",             "lime.jpg",                 dicePrice,      "dice"),
    new product("Purple Dice",      "purpleDice",           "purple.jpg",               dicePrice,      "dice"),
    new product("Red Dice",         "redDice",              "red.jpg",                  dicePrice,      "dice"),
    new product("Red Dwarven",      "redDwarven",           "redDwarven.jpg",           metalDicePrice, "dice"),
    new product("Yello Dice",       "yellowTransluscent",   "yellowTransluscent.jpg",   dicePrice,      "dice")
];

var diceTowerProducts = [
    new product("Cherry Tower",     "cherryTower",  "cherryTower.jpg",  woodDiceTower,      'tower' ),
    new product("Hickory Tower",    "hickoryTower", "hickoryTower.jpg", woodDiceTower,      'tower' ),
    new product("Wenge Tower",      "wengeTower",   "wengeTower.jpg",   woodDiceTower,      'tower' ),
    new product("Castle Tower",     "castleTower",  "castleTower.jpg",  specialtyDiceTower, 'tower' ),
    new product("Stacks Tower",     "stacksTower",  "stacksTower.png",  specialtyDiceTower, 'tower' ),
    new product("Tamarin Tower",   "tamarindTower","tamarindTower.jpg", woodDiceTower,      'tower' )
];

var minisProducts = [
    new product("Drow Ranger", "drowRanger",    "drowRanger.jpg",   standardMini,   "mini"),
    new product("Owlbear",      "owlbear",      "owlbear.jpg",      standardMini,   "mini"),
    new product("Human Thug",   "humanThug",    "humanThug.jpg",    standardMini,   "mini"),
    new product("Fire Dwarf",   "fireDwarf",    "fireDwarf.jpg",    rareMini,       "mini"),
    new product("Kobold Figher","koboldFigher", "koboldFighter.jpg",standardMini,   "mini"),
    new product("Human Wizard", "humanWizard",  "humanWizard.jpg",  standardMini,   "mini"),
    new product("Fire Giant",   "fireGiant",    "fireGiant.png",    rareMini,       "mini"),
    new product("Human Fighter","humanFighter", "humanFighter.jpg", standardMini,   "mini"),
]

function generateAllProducts(code){
    switch (code) {
        // dice only
        case 1:
            cleanShop();
            generateHTML(diceProducts.sort());
            break;
        // dice tower only
        case 2:
            cleanShop();
            generateHTML(diceTowerProducts.sort());
            break;
        // mini only
        case 3:
            cleanShop();
            generateHTML(minisProducts.sort());
            break;
        // generate all products if not specified
        default:
            cleanShop();
            var products = diceProducts.concat(diceTowerProducts);
            products = products.concat(minisProducts);
            products.sort();
            generateHTML(products);
            break;
    }
}



// holds the count and rows for all products
var rowNum = -1;
var rows = [];

function generateHTML(products){
    for(i = 0; i < products.length; i++){
        // if at beginning of the list of a new row
        if(i % 4 == 0){
            var row = document.createElement("div");
            row.className = "row";
            rows.push(row);

            rowNum = rowNum + 1;
            // add product tile to row
            rows[rowNum].appendChild(products[i].createHTML());
            // add the row to the shop
            document.getElementById("shop").appendChild(row);
        } else {
            // add onto row
            rows[rowNum].appendChild(products[i].createHTML());
        }
    }
}





function product(title, itemKey, imgSrc, price, type){
    this.title = title;
    this.itemKey = itemKey;
    this.imgSrc = imgSrc;
    this.price = price;
    this.type = type;
    this.createHTML = function(){
        var col = document.createElement("div");
        col.className = "col-xs-3 " + type;

        var item = document.createElement("div");
        item.className = "item";

        var row1 = document.createElement("div");
        row1.className = "row";

        var itemTitle = document.createElement("div");
        itemTitle.className = "itemTitle col-xs-12";
        itemTitle.innerText = this.title + " - $" + this.price;

        var row2 = document.createElement("div");
        row2.className = "row";

        var itemImgContainer = document.createElement("div");
        itemImgContainer.className = "itemImgContainer col-xs-offset-2 col-xs-8";

        var img = document.createElement("img");
        img.className = "whiteBackground";
        img.src = "img/products/" + imgSrc;
        img.alt = this.title;

        var row3 = document.createElement("div");
        row3.className = "row";

        var addToCart = document.createElement("a");
        addToCart.className = "addToCart col-xs-offset-3 col-xs-6";
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

        return col;
    }
}
