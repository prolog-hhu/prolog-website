import Cookies from 'js-cookie';

import { listUnique } from '../Utils';

import ChoiceAnswer from "./_ChoiceAnswer";
import DropdownAnswer from "./_DropdownAnswer";
import InputAnswer from "./_InputAnswer";

class Quiz {
  constructor(el) {
    // save self DOM element, state handler
    this.quiz = el;
    this.state = null;
    this.submitCount = 0;

    // construct sub components
    this.answers = this.constructAnswers();
    this.submit = this.constructSubmit();
    this.solve = this.constructSolve();

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

  constructSolve() {
    let solve = this.quiz.querySelector('button#solve');
    solve.addEventListener("click", this.handleSolve.bind(this), false);

    return solve;
  }

  handleSubmit(e) {
    e.preventDefault();

    this.state = true;

    this.submitCount += 1;
    if(this.submitCount > 3) {
      this.solve.classList.remove("v-hidden")
    }

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

      // update and make list items unique
      this.progress["progress"].push(window.location.pathname);
      this.progress["progress"] = listUnique(this.progress["progress"]);

      // update cookie
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

  handleSolve(e) {
      e.preventDefault();

      if(this.submitCount > 3) {
        this.answers.forEach((item) => {
          item.solve();
        })

        this.handleSubmit(e);
      }
  }

  getProgress() {
    let data = Cookies.get("quiz_progress");

    if(data != undefined) {
      return JSON.parse(data)

    } else {
      return {"progress": []}
    }

  }
}

const config = {
  DefaultResponseTrue: "Super, alles richtig!",
  DefaultResponseFalse:
    "Leider nicht richtig! Schaue dir bitte die Rückmeldung an.",
};

export default Quiz;
