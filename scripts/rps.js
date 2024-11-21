
const shootform = document.getElementById("rps-shoot");
const restartform = document.getElementById("rps-restart");
let score = 0;

shootform.addEventListener("submit", function(event) {
    event.preventDefault();
    rps(shootform);
});

restartform.addEventListener("submit", function(event) {
    event.preventDefault();
    const selection = event.target.id

    if(selection == "rps-restart") {
        restart();
    }

});

function rps(form) {
    const data = new FormData(form);
    let userChoice = "";

    for (const entry of data) {
        userChoice = `${entry[1]}`;
    }
    let computerChoice = computerShoot();

    shoot(userChoice, "rps-user");
    shoot(computerChoice, "rps-com");

    form.cssText = "display: none;";

    document.getElementById("result").innerHTML = declareWinner(userChoice, computerChoice);

    if(document.getElementById("result").innerHTML == "You win!") {
        score+=10;
    }
    if(document.getElementById("result").innerHTML == "You lose!") {
        score = 0;
        document.getElementById("rematch").style.cssText = "display: inline;";
    }

    document.getElementById("score").value = score;
    console.log(score);
    console.log(event.target.id);

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

function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled) + minCeiled); // The maximum is exclusive and the minimum is inclusive
  }
  