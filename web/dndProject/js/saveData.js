




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

    if (localStorage.characters == NULL) {
        console.log("localStorage.characters is null");
        localStorage.characters = [];
    }



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

    var addNewGuy = true;
    // if (localStorage.characters.length != undefined) {
    //     for(i = 0; i< localStorage.characters.length; i++){
    //         if (localStorage.characters[i].name == newguy.name){
    //             addNewGuy = false;
    //         }
    //     }
    // } else {
    //     console.log("localStorage is undefined");
    // }

    // if (addNewGuy) {
    //     localStorage.characters.push(newguy);
    //     console.log("added new guy");
    // }


    console.log("Lets see whats in localStorage");
    console.log(localStorage);
}

function isCharacter() {
    console.log("inside isCharacter");
}
