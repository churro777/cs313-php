




function Character(name, currentHP, maxHP, currentHitDice, ac) {
    this.name = name;
    this.currentHP = currentHP;
    this.maxHP = maxHP;
    this.currentHitDice = currentHitDice;
    this.ac = ac;
}

function save(toBeSaved) {
    console.log("inside toBeSaved");
    console.log("saving " + toBeSaved);
    // switch (expression) {
    //     case expression:
    //
    //         break;
    //     default:
    //
    // }
}


function saveCharacter(){
    console.log("inside saveCharacter");
    var character = document.getElementById('characterName').textContent;
    var currentHitDice = document.getElementById('currentHitDice').value;
    var maxHP = document.getElementById('maxHP').value;
    var currentHP = document.getElementById('currentHP').value;
    var ac = document.getElementById('ac').value;

    console.log("character" + character);
    console.log("currentHitDice" + currentHitDice);
    console.log("maxHP" + maxHP);
    console.log("currentHP" + currentHP);
    console.log("ac" + ac);

    var newguy = new Character(character, character, currentHitDice, maxHP, currentHP, ac);

    // if (localStorage.characters.find())
    // localStorage.characters.push(new character());
}

function isCharacter() {
    console.log("inside isCharacter");
}
