
const shootform = document.getElementById("rps-shoot");
const restartform = document.getElementById("rps-restart");
const cashoutform = document.getElementById("rps-cashout");

let score = 0;

shootform.addEventListener("submit", function(event) {
    event.preventDefault();
    rps(shootform);
});

function rps(form) {
    const data = new FormData(form);
    let userChoice = "";
    score = document.getElementById("score").value;

    for (const entry of data) {
        userChoice = `${entry[1]}`;
    }
    let computerChoice = computerShoot();

    shoot(userChoice, "rps-user");
    shoot(computerChoice, "rps-com");

    document.getElementById("rps-shoot").style.cssText = "display: none;";

    document.getElementById("result").innerHTML = declareWinner(userChoice, computerChoice);

    if(document.getElementById("result").innerHTML == "You win!") {
        if(score==0){
            score+=10;
        }
        else {
            score*2;
        }
        document.getElementById("double").style.cssText = "display: inline;";
    }

    if(document.getElementById("result").innerHTML == "You lose!") {
        score = 0;
        document.getElementById("rematch").style.cssText = "display: inline;";
    }

    if(score > 0){
        document.getElementById("cashout").style.cssText = "display: inline;";
    }
    else {
        document.getElementById("cashout").style.cssText = "display: none;";
        document.getElementById("double").style.cssText = "display: none;";
        document.getElementById("rematch").style.cssText = "display: inline;";
        
    }

    document.getElementById("score").value = score;
    document.getElementById("coins").innerHTML = score;

}

function computerShoot() {
    const numberChoice = rand(0, 3);
    if (numberChoice == 0) {
        return "Rock";
    } 
    else if (numberChoice == 1) {
        return "Paper";
    }
    else {
        return "Scissors";
    }
}

function shoot(choice, playerID) {
    if(choice == "Rock") {
        document.getElementById(playerID).style.cssText = "background-image: url('../images/games/rock-rps.png'); animation: none; transform:"
    }
    else if(choice == "Paper") {
        document.getElementById(playerID).style.cssText = "background-image: url('../images/games/paper-rps.png'); animation: none; transform:"
    }
    else {
        document.getElementById(playerID).style.cssText = "background-image: url('../images/games/scissors-rps.png'); animation: none; transform:"
    }
}

function declareWinner(userChoice, computerChoice) {
    if(userChoice == computerChoice) {
        return "It's a tie!";
    }
    else if(userChoice == "Rock" && computerChoice == "Scissors" || userChoice == "Paper" && computerChoice == "Rock" || userChoice == "Scissors" && computerChoice == "Paper") {
        return "You win!";
    }
    else {
        return "You lose!";
    }
}

function reset() {
    document.getElementById("rps-user").style.cssText = "background-image: url('../images/games/rock-rps.png'); animation: none; animation: bounce 0.7s cubic-bezier(0,0,0.50,1) infinite alternate;";
    document.getElementById("rps-com").style.cssText = "background-image: url('../images/games/rock-rps.png'); animation: bounce 0.7s cubic-bezier(0,0,0.50,1) infinite alternate;";
    document.getElementById("result").innerHTML = "Rock, Paper, Scissors...";

    document.getElementById("rematch").style.cssText = "display: none;";
    document.getElementById("double").style.cssText = "display: none;";
    document.getElementById("cashout").style.cssText = "display: none;";

    document.getElementById("rps-shoot").style.cssText = "display: block;";
}

function cashout() {
    score = 0;
    score = document.getElementById("score").value;
    document.getElementById("submit-score").submit();

    score = 0;
    document.getElementById("score").value = score;
    document.getElementById("coins").innerHTML = score;

    reset();
}

function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled) + minCeiled); // The maximum is exclusive and the minimum is inclusive
  }
  