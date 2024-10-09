const stars = document.querySelectorAll(".stars i");

stars.forEach((star, index1) => {
    star.addEventListener("click", () => {
        console.log(index1);
        stars.forEach((star, index2) => {
            index1 >= index2 ? star.classList.add("checked") : star.classList.remove("checked");
        });
    });
});