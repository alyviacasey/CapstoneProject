
const form = document.querySelector("form");

form.addEventListener(
  "submit",
  (event) => {
    const data = new FormData(form);
    let userChoice = "";
    for (const entry of data) {
        userChoice = `${entry[1]}\r`;
    }
    let computerChoice = computerShoot();

    shoot(userChoice, "rps-user");
    shoot(computerChoice, "rps-com");

    document.getElementById($result).innerHTML = declareWinner(userChoice, computerChoice);

    event.preventDefault();
  },
  false,
);

function computerShoot() {
    $numberChoice = rand(0, 2);
    if ($numberChoice == 0) {
        return "Rock";
    } 
    else if ($numberChoice == 1) {
        return "Paper";
    }
    else {
        return "Scissors";
    }
}

function shoot($choice, $playerID) {
    if($choice == "Rock") {
        document.getElementById($playerID).style.cssText = "background-image: url('../images/games/rock-rps.png'); animation: none;"
    }
    else if($choice == "Paper") {
        document.getElementById($playerID).style.cssText = "background-image: url('../images/games/paper-rps.png'); animation: none;"
    }
    else {
        document.getElementById($playerID).style.cssText = "background-image: url('../images/games/scissors-rps.png'); animation: none;"
    }
}

function declareWinner($userChoice, $computerChoice) {
    if($userChoice == $computerChoice) {
        return "It's a tie!";
    }
    else if($userChoice == "Rock" && $computerChoice == "Scissors" || $userChoice == "Paper" && $computerChoice == "Rock" || $userChoice == "Scissors" && $computerChoice == "Paper") {
        return "You win!";
    }
    else {
        return "You lose!";
    }
}