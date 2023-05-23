const ratingStars = [...document.getElementsByClassName("rating__star")];

function executeRating(stars) {
  const starClassActive = "rating__star fas fa-star";
  const starClassInactive = "rating__star far fa-star";
  const starsLength = stars.length;
  const noRating = document.getElementsByClassName("fa-circle-xmark");


  noRating[0].onclick = function() {
    noRating[0].className = "fa-solid fa-circle-xmark";
    document.querySelector("#ocena").innerHTML = 'Brak'; 
      for(let j = 0; j < starsLength; ++j){
        stars[j].className = starClassInactive;
      }
    };


  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);
      if (star.className===starClassInactive) {
        for (i; i >= 0; --i){
         noRating[0].className = "fa-regular fa-circle-xmark";
         stars[i].className = starClassActive;
         document.querySelector("#ocena").innerHTML = stars.indexOf(star) + 1;
        }
      } else {
        for (i; i < starsLength; ++i) {
        noRating[0].className = "fa-regular fa-circle-xmark";
        stars[i+1].className = starClassInactive;
        document.querySelector("#ocena").innerHTML = stars.indexOf(star) + 1;
        }
      }
    };
  });
}
executeRating(ratingStars);
