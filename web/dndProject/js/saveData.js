




function character(name, currentHP, maxHP, currentHitDice, ac) {
    this.name = name;
    this.currentHP = currentHP;
    this.maxHP = maxHP;
    this.currentHitDice = currentHitDice;
    this.ac = ac;
}

function save(toBeSaved) {
    console.log("inside toBeSaved");
    console.log("saving " + toBeSaved);
}


function saveCharacter(){
    console.log("inside saveCharacter");
    var character = document.getElementById('characterName').textContent;
    var currentHitDice = document.getElementById('currentHitDice').value;
    var maxHp = document.getElementById('maxHP').value;
    var currentHP = document.getElementById('currentHP').value;
    var ac = document.getElementById('ac').value;

    console.log("character" + character);
    console.log("currentHitDice" + currentHitDice);
    console.log("maxHp" + maxHp);
    console.log("currentHP" + currentHP);
    console.log("ac" + ac);

    var newguy = new character(character, character, currentHitDice, maxHp, currentHP, ac);

    // if (localStorage.characters.find())
    // localStorage.characters.push(new character());
}

function isCharacter() {
    console.log("inside isCharacter");
}
