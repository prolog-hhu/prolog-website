import Cookies from 'js-cookie'


import ChoiceAnswer from "./_ChoiceAnswer";
import DropdownAnswer from "./_DropdownAnswer";
import InputAnswer from "./_InputAnswer";

class Quiz {
  constructor(el) {
    // save self DOM element, state handler
    this.quiz = el;
    this.state = null;

    // construct sub components
    this.answers = this.constructAnswers();
    this.submit = this.constructSubmit();
    this.response = this.quiz.querySelector(".return");

    this.progress = this.getProgress();
  }

  constructAnswers() {
    let answers = [];
    let answerObj = Object;

    // create choice answers
    if (this.quiz.dataset.type == "choice") {
      answerObj = ChoiceAnswer;
    }
    // create dropdown answers
    else if (this.quiz.dataset.type == "dropdown") {
      answerObj = DropdownAnswer;
    }
    // create input answers
    else if (this.quiz.dataset.type == "input") {
      answerObj = InputAnswer;
    }

    for (let el of this.quiz.getElementsByClassName("answer")) {
      answers.push(new answerObj(el));
    }

    return answers;
  }

  constructSubmit() {
    let submit = this.quiz.querySelector('button[type="submit"]');
    submit.addEventListener("click", this.handleSubmit.bind(this), false);

    return submit;
  }

  handleSubmit(e) {
    e.preventDefault();

    this.state = true;

    this.answers.forEach((item) => {
      if (item.updateState() === false) {
        this.state = false;
      }

      item.updateResponse();
    });

    this.updateResponse();
  }

  updateResponse() {
    this.response.removeAttribute("hidden");

    // quiz success
    if (this.state === true) {
      // handle user response
      this.response.classList.remove("flash-error");
      this.response.classList.add("flash-success");
      this.response.innerHTML = config["DefaultResponseTrue"];

      this.progress[window.location.pathname] = 1;
      Cookies.set('quiz_progress', this.progress)
    }
    // quiz failed
    else if (this.state === false) {
      // handle user response
      this.response.classList.remove("flash-success");
      this.response.classList.add("flash-error");
      this.response.innerHTML = config["DefaultResponseFalse"];
    }
  }

  getProgress() {
    let data = Cookies.get("quiz_progress");

    if(data != undefined) {
      return JSON.parse(data)

    } else {
      return {}
    }

  }
}

const config = {
  DefaultResponseTrue: "Super, alles richtig!",
  DefaultResponseFalse:
    "Leider nicht richtig! Schaue dir bitte die Rückmeldung an.",
};

export default Quiz;
