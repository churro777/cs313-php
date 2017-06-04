function setupFunctions(){
    document.getElementById("ac").addEventListener("onblur", save, false);
    document.getElementById("currentHitDice").addEventListener("onblur", save, false);
    document.getElementById("maxHP").addEventListener("onblur", save, false);
    document.getElementById("currentHP").addEventListener("onblur", save, false);
}


function save() {
    console.log(this);
    console.log("inside toBeSaved");
    console.log("saving " + toBeSaved);
    // switch (toBeSaved) {
    //     case "currentHitDice":
    //         console.log("currentHitDice is going to updated now");
    //         var newInfo = document.getElementById('currentHitDice').value;
    //         console.log(newInfo);
    //         if (newInfo != "") {
    //             location.assign("php/updateCharacter.php?column=currentHitDice&value=" + newInfo);
    //         }
    //         break;
    //     case "maxHP":
    //         console.log("maxHP is going to updated now");
    //         var newInfo = document.getElementById('maxHP').value;
    //         console.log(newInfo);
    //         if (newInfo != "") {
    //             location.assign("php/updateCharacter.php?column=maxHP&value=" + newInfo);
    //         }
    //         break;
    //     case "currentHP":
    //         console.log("currentHP is going to updated now");
    //         var newInfo = document.getElementById('currentHP').value;
    //         console.log(newInfo);
    //         if (newInfo != "") {
    //             location.assign("php/updateCharacter.php?column=currentHP&value=" + newInfo);
    //         }
    //         break;
    //     case "ac":
    //         console.log("ac is going to updated now");
    //         var newInfo = document.getElementById('ac').value;
    //         console.log(newInfo);
    //         if (newInfo != "") {
    //             location.assign("php/updateCharacter.php?column=ac&value=" + newInfo);
    //         }
    //         break;
    //     default:
    //
    // }
}
