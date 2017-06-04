




function character(name, currentHP, maxHP, currentHitDice, AC) {
    this.name = name;
    this.currentHP = currentHP;
    this.maxHP = maxHP;
    this.currentHitDice = currentHitDice;
    this.AC = AC;
}

function save(toBeSaved){

}


function saveCharacter(){
    var character = document.getElementById('characterName').textContent;
    var currentHitDice = document.getElementById('currentHitDice').value;
    var maxHp = document.getElementById('maxHp').value;
    var currentHP = document.getElementById('currentHP').value;
    var AC = document.getElementById('AC').value;

    console.log(character);
    console.log(currentHitDice);
    console.log(maxHp);
    console.log(currentHP);
    console.log(AC);

    var newguy = new character(character, )

    // if (localStorage.characters.find())
    // localStorage.characters.push(new character());
}

funciton isCharacter()
