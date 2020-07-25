import Quiz from "./_Quiz";

// get window location and quizzes
const location = window.location.href;
const quizzes = document.getElementsByClassName("quiz");

// loop over each quiz if user is in the correct location
if (location.match(/quiz/)) {
  Array.from(quizzes).forEach((el) => {
    // create new quiz object
    new Quiz(el);
  });
} else {
  console.log("No Quiz here.");
}
