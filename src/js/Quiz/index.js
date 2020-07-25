import Quiz from "./_Quiz";

new Quiz();

let location = window.location.href;
let quizzes = document.getElementsByClassName("quiz"))

if (location.match(/quiz/)) {
  Array.from(quizzes).forEach((el) => {
    new Quiz(el);
  });
} else {
  console.log("No Quiz here.");
}
