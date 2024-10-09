/*const stars = document.querySelectorAll(".stars i");

stars.forEach((star, index1) => {
    star.addEventListener("click", () => {
        stars.forEach((star, index2) => {
            index1 >= index2 ? star.classList.add("checked") : star.classList.remove("checked");
        });
    });
});*/

const stars = document.querySelectorAll(".stars i");

stars.forEach((star, i) => {
    star.onclick = function() {
        let star_level = i + 1;
        document.getElementById('rarity').value = star_level;

        stars.forEach((star, j) => {
            if (star_level >= j + 1) {
                star.classList.add("checked");
            }
            else {
                star.classList.remove("checked")
            }
        })
    }
})